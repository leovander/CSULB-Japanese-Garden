/**
 * Created by Beau on 4/9/14.
 * Full Calendar jQuery plugin provided by http://arshaw.com/fullcalendar/
 * Form Plugin provided by http://jquery.malsup.com/form/
 * Tabs provided by jQuery UI Tabs
 */
jQuery(document).ready(function () {
    //enable tabs view
    $("#tabs").tabs();
    $('#tabs').css('display', 'block');

    //initialize the forms handled by form plugin
    initAsyncForm();

    //Fill the hours of operation form with current hours
    $.get('gethours', function(data){
       var hours_of_operations = JSON.parse(data);

        for(var i=0; i<hours_of_operations.length; i++){
            var day = hours_of_operations[i];
            $('#'+day.day_of_week +'_open').val(day.open_time);
            $('#'+day.day_of_week +'_close').val(day.close_time);
            if(day.closed == 1) $('#'+day.day_of_week +'_isclosed').prop('checked', true);
        }
    });

    //Trigger image delete
    $(document).on('click', '.img-delete', function(){
        var imgName = $(this).attr('data-filename');
        if(!window.confirm('Are you sure you want to delete ' + imgName)) return false;
        deleteImage(imgName);
        $(this).parent().remove();
    });


//    $('#testbutton').click(function(){
//        console.log($('#date1').val() + 'T' + $('#start').val());
//    });
    /*
     Documentation at http://arshaw.com/fullcalendar/docs/event_data/events_array/
     page is now ready, initialize the calendar...
     */
    $('#calendar').fullCalendar({
        allDayDefault: false,
        //URI for data feed
        events: 'events/getevents',
        timeFormat: 'h(:mm)t',

        eventRender: function (event, element, view) {
            event.closure ? element[0].className = 'closure' : element[0].className = 'event';
        },

        eventClick: function (calEvent, jsEvent, view) {
            eventEditLightBox(calEvent);

        },
        dayClick: function (date, allDay, jsEvent, view) {
            eventEditLightBox(date);
        }

    });


    $(document).on('click', '#save', function (e) {
        e.preventDefault();
        $('#response').remove();

        var url = 'events/create';
//        var start = $('#date').val() + 'T' + $('#start').val();
//        var end = $('#date').val() + 'T' + $('#end').val()
        var start = $('#start').val();
        var end = $('#end').val();
        var title = htmlEntities($('#title').val());
        var closure = $('#closure').prop('checked');
        var description = htmlEntities($('#description').val());
        var id = $('#id').attr('data-id');
        var photo_url = $('#photo_url').val();
        $('#lightbox button').prop('disabled', true);
        $('div#id').empty();

        $.post(url, {title: title, start: start, end: end, description: description, closure: closure,
                photo_url: photo_url, id: typeof id == 'undefined' ? '' : id}
        )
            .done(function (data) {
                if (data == '') {
                    window.location = 'admin_login';
                }
                data = JSON.parse(data);
                $('#calendar').fullCalendar('refetchEvents');
                $('#id').attr('value', data.id);
                $('#id').attr('data-id', data.id);
                $('<div id="response">' + data.html + '</div>').insertAfter('#lightbox-event-submission');
                $('#lightbox button').prop('disabled', false);
            }).error(function () {
                $('<div id="response">' + '<span class="errors">Save Unsuccessful Unable to <br/> ' +
                    'Communicate with Server</span>' + '</div>').insertAfter('#lightbox-event-submission');
                $('#lightbox button').prop('disabled', false);
            }).always(function () {
                $('#lightbox button').prop('disabled', false);
                $('body').css('overflow-y', 'scroll');
            });
    });

    $(document).on('click', 'a[href="closelightbox"]', function (e) {
        e.preventDefault();
        closeLightBox()
    });
    $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        removeEvent($('#id').attr('data-id'));
        closeLightBox();
    });


});

function removeEvent(id) {
    eventId = {id: id}

    $.ajax({
        type: "POST",
        'url': "events/removeevent",
        data: eventId
    }).done(
        function (data) {
            $('#calendar').fullCalendar('refetchEvents');
        }
    ).fail(
        function () {
            alert('Unable to communicate with server');
        }
    );
}

function closeLightBox() {
    $('#lightbox').remove();
    $('#overlay').remove();
    $('body').css('overflow-y', 'scroll');
}

//Configure and initialize the form builder plugin. This will be called in the beginning of document.ready
function initAsyncForm() {

    //Configure Image Upload form
    var options = {
        url: 'uploadimage',
        type: 'post',
        clearForm: true,
        resetForm: true,
        timeout: 15000,

        beforeSubmit: function(){
            $('#file-error').remove();
            if(!imageValidation($('#photo')[0].files[0])){
                $('#photos h2').append('<h2 id="file-error" class="errors">Invalid FileType</h2>');
                return false;
            }
        },

        success: function (data) {
            if(data == ''){window.location = 'admin_login';}
            appendImage(data);
            //DO SOMETHING WITH DATA
        },

        error: function () {

        },


    };
    $('#file_upload_form').ajaxForm(options);
    $('file_upload_form').submit(function () {
        // submit the form
        $(this).ajaxSubmit();
        // return false to prevent normal browser submit and page navigation
        return false;
    });

    //Configure Hours of Operation form
    options = {};
    options = {
        url: 'sethours',
        type: 'post',
        clearForm: false,
        resetForm: false,
        timeout: 10000,

        beforeSubmit: function(){
            $('#response').remove();
        },

        success: function(data){
            if(data === "success"){
                $('<div id="response">' + '<span id="savesuccess">Save Successful</div>')
                    .insertAfter('#hours-of-operation');
            } else{
                $('<div id="response">' + '<span class="errors">Save Unsuccessful Unable to <br/> ' +
                    'Communicate with Server</span>' + '</div>').insertAfter('#hours-of-operation');
            }
        },

        error: function(data){
            $('<div id="response">' + '<span class="errors">Save Unsuccessful Unable to <br/> ' +
                'Communicate with Server</span>' + '</div>').insertAfter('#hours-of-operation');
        }
    }

    $('#hours-of-operation').ajaxForm(options);
    $('hours-of-operation').submit(function () {
        // submit the form
        $(this).ajaxSubmit();
        // return false to prevent normal browser submit and page navigation
        return false;
    });
}


function appendImage(imgData){
    imgData = JSON.parse(imgData);
    var imgName = imgData.name;
    var imgUrl = imgData.url;

    $('#photos-viewport').prepend(
    '<figure class="admin-display-imgs">'+
        '<button data-filename="' + imgName + '" class="img-delete">Delete</button>' +
        '<img src="' + imgUrl +'"/>' +
        '<div>'+
            '<input type="text" class="img-url" value="'+imgUrl+'" readonly/>' +
            '<br/>'+
            '<input type="text" class="img-url" value="'+ imgName + '" readonly/>'+
        '</div>'+
    '</figure>'
    );
}

function eventEditLightBox(calEvent) {
    var startDate = calEvent.start ? dateObjToDateTimeString(calEvent.start) : dateObjToDateTimeString(calEvent);
    var endDate = calEvent.end ? dateObjToDateTimeString(calEvent.end) : startDate;
    var title = calEvent.title ? calEvent.title : '';
    var description = calEvent.description ? calEvent.description : '';
    var closure = calEvent.closure ? 'checked' : '';
    var photo_url = calEvent.photo ? calEvent.photo : '';
    var id = calEvent.id;

//hide the scroll bars
    $('body').css('overflow-y', 'hidden');

    $('<div id="overlay"></div>')
        .css('opacity', '0')
        .animate({'opacity': '0.5'}, 'slow')
        .appendTo('body');

    $('<div id="lightbox"><div>')
        .appendTo('body');

    $('<form id="lightbox-event-submission">' +
        '<fieldset class="left">' +
        '<label for="start"><h2>Start Date and Time</h2></label>' +
        '<input type="datetime-local" id="start" name="start" value="' + startDate + '"' + '/>' +
        '<label for="end"><h2>End Date and Time</h2></label>' +
        '<input type="datetime-local" id="end" name="end" value="' + endDate + '"' + '/>' +
        '<label for="photo_url"><h2>Photo URL</h2></label>'+
        '<input type="text" id="photo_url" name="photo_url" value="' + photo_url + '"' + '/>'+
        '<label for="closure"><h2>Closure</h2></label>' +
        '<input type="checkbox" id="closure" name="closure"' + closure + '/>' +
        '</fieldset> <fieldset class="right">' +
        '<label for="title"><h2>Title</h2></label>' +
        '<input type="text" id="title" name="title" value=' + '"' + title + '" />' +
        '<label for="description"><h2>Description</h2></label>' +
        '<textarea id="description" name="description">' + description + '</textarea>' +
        '<input type="submit" id="save" value="Save"><button id="delete">delete</button>' +
        '<input type="text" id="id" name="id" data-id="' + id + '" value="' + id + '" hidden/>' +
        '</fieldset>' +
        '</form>').appendTo('#lightbox');
    $('<a href="closelightbox" class="closeLightbox">X</a>').appendTo('#lightbox');
}

function dateObjToDateTimeString(dateObj, day) {

    var result = dateObj.getFullYear();
    /*
     Month count begins at 0.  Add 1 to make it currrent month
     */
    var month = dateObj.getMonth() < 10 ? '0' + ( dateObj.getMonth() + 1 ) : dateObj.getMonth() + 1;
    var date = dateObj.getDate() < 10 ? '0' + dateObj.getDate() : dateObj.getDate();
    var hours = dateObj.getHours() < 10 ? '0' + dateObj.getHours() : dateObj.getHours();

    var minutes = dateObj.getMinutes() < 10 ? '0' + dateObj.getMinutes() : dateObj.getMinutes();

    result += '-' + month + '-' + date + 'T' + hours + ':' + minutes + ':00';
    return result;
}

//Modified version of htmlEntities fount at http://css-tricks.com/snippets/javascript/htmlentities-for-javascript/
function htmlEntities(str) {
    return String(str).replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;')
        .replace('’', '&#8217').replace('“', '"').replace('”','"');
}

//Utility function to validate submitted files
function imageValidation(file) {
//    var maxSize = 5242880;
    var acceptable = [
        'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png'

    ];
    if ($.inArray(file.type, acceptable) === -1) return false;
//    if (file.size > maxSize) return false;
    return true;
};

function deleteImage(imgName){
    $.post(
        'deleteimage',
        {file_name: imgName}
    ).done(function(data){
            if (data == '') window.location = 'admin_login';
        });
}