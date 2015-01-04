/**
 * Created by Beau on 4/9/14.
 */
jQuery(document).ready(function () {

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

        eventRender: function(event, element, view){

            event.closure ? element[0].className = 'closure' : element[0].className = 'event';


    },
        eventClick: function (calEvent, jsEvent, view) {
            window.location = 'details/' + calEvent.id;

        }


    });
});

/*
 var month = day ? dateObj.getMonth() + 1 : dateObj.getMonth();
 month = month < 10 ? '0' + month : month;
 */