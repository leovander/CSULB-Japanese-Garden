/**
 * Created by Gyngai Ung on
 * 4/19/14.
 */


jQuery.validator.setDefaults({
    //debug: true,
    success: "valid"
});

//Method for value up 10 digits and 2 decimal points
jQuery.validator.addMethod("mynumber", function (value, element) {
    return this.optional(element) || /^(\d{1,10})(\.\d{1,2})?$/.test(value);
}, "Enter no more than two decimal values");

jQuery.validator.addMethod("mycreditcard", function (value, element) {
    //return this.optional(element) || /^((4\d{3})|(5[1-5]\d{2})|(6011)|(7\d{3}))-?\d{4}-?\d{4}-?\d{4}|3[4,7]\d{13}$/.test(value);
    return this.optional(element) || /[0-9]{13,16}$/.test(value);
}, "Enter the correct format");

$(document).ready( function () {

    $("#print").click(function () {
        var isValid = $("#validateform").validate().form();
        var errors = $("#validateform").validate().numberOfInvalids();

        if (isValid === true && errors === 0) {
            window.print();
        }
        return false; //stop the page from "submitting", to prevent clearing the form
    });

    $("#validateform").validate({
        rules: {
            //rule names are associated with the name of the input
            membershipLevel: {
                required: true
            },

            accept: {
                required: true
            },

            firstname: {
                required: true
            },

            lastname: {
                required: true
            },

            address: {
                required: true
            },

            city: {
                required: true
            },

            state: {
                required: true
            },

            zip: {
                required: true
            },

            homephone: {
                phoneUS: true
            },

            cellphone: {
                phoneUS: true
            },

            email: {
                required: true,
                email: true
            },

            amt: {
                required: true,
                mynumber: true,
                min: 0
            },

            nameOnCard: {
                required: true
            },

            cardtype: {
                required: true
            },

            cardNum: {
                required: true,
                mycreditcard: true
            },

            volunteertype: {
                required: true
            },

            /* rate our website and contact us page */
            full_name: {
                required: true
            },

            /* contact us page */
            subject: {
                required: true
            }
        },

        messages: {
            membershipLevel: "Select one of the membership levels",
            accept: "Select Accept or Decline",
            firstname: "Enter your first name",
            lastname: "Enter your last name",
            address: "Enter a street address",
            city: "Enter a city name",
            state: "Enter a state",
            zip: "Enter a zip code",
            homephone: "Enter a valid phone number",
            cellphone: "Enter a valid phone number",
            email: "Enter your email address",
            amt: "Enter a valid value",
            nameOnCard: "Enter the name on the credit card",
            cardtype: "Select one credit card type",
            cardNum: "Enter a valid credit card number",
            volunteertype: "Select one of the volunteer types",
            full_name: "Enter your full name",
            subject: "Enter the subject line"
        },

        errorPlacement:
            function (error, element) {
                if (element.is(":radio")) {
                    if (element.is("input[name='accept']")) {
                        error.appendTo('#acceptRadioGroup');
                    } else if (element.is("input[name='cardtype']")) {
                        error.appendTo('#cardRadioGroup');
                    } else if (element.is("input[name='volunteertype']")) {
                        error.appendTo('#volunteerRadioGroup');
                    }
                } else {
                    error.insertAfter(element);
                }
            }
    });

    //reset form
    $(".clear").click(function () {
        $("#validateform").validate().resetForm();
    });
});
