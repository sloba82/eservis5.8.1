$(function() {


    $('.toService').on('click', function () {
        $('#cardReader').attr('action', '/sendCarToService');
        $('input').each(function () {
            $(this).removeAttr('disabled');
        });
    });



});