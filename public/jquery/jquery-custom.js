$(function() {

    //User logout
    $( ".dropdown-toggle" ).bind( "click", function() {
       $(".dropdown-menu").css('display', 'block');
    });
    $(".dropdown-menu").bind( "mouseleave", function() {
        $(this).hide('fast');
    });

    //Show hide apoitment form
    $( "#setappointment" ).click(function() {
        $( "#topContent" ).hide('fast');
        $( "#appoitment" ).show();
    });

    //datepicker
    $.datetimepicker.setLocale('sr-YU');
    $('#datetimepicker').datetimepicker(
        {
            beforeShowDay: function(date) {
                var day = date.getDay();
                return [(day != 0), ''];
            },
            allowTimes:[
                '08:00',
                '09:00',
                '10:00',
                '11:00',
                '12:00',
                '13:00',
                '14:00',
                '15:00',
                '16:00',
                ],
            dayOfWeekStart:'1',

        }
    );
    //end datepicker





});