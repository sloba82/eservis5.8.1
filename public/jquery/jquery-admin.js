$(function () {


    $('#datetimepicker').datetimepicker({});




    $('#allresoult').DataTable({
        order: [[0, "desc"]],
        columnDefs: [
            {
                targets: -1,
                className: 'dt-body-right'
            }
        ],
        search: {
            "smart": true
        }
    });

    $('button').on('click', function () {

        if (this.id) {
            var Param = {
                url: '/appoitment/ajaxConfirm',
                id: this.id,
                field: $(this).attr('data-action')
            };

            AdminAjax.updateField(Param);
            $(this).attr('disabled', true);
            $(this).closest('tr').addClass('confirm');

        }
    });

    $( "#numberplate" ).autocomplete({
        autoFocus: true,
        delay: 3,
        position: { my : "right top", at: "right bottom" }
    });

    $('#numberplate').on('change keypress focus', function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                cache: false
            });
            var term = $( "#numberplate").val();
            $.ajax({
                type: 'POST',
                url: '/serviceautocomplate',
                dataType: 'json',
                data: {
                    AppData: {
                        term : term
                    }
                },
                success: function (response) {


                    console.log(response);
                    $( "#numberplate" ).autocomplete({
                        source: response
                    });
                }
            });
    });

    var currentdate = new Date();
    var dt = new Date();
    $('#service_date').val(  currentdate.getDate() + "/" + (currentdate.getMonth() + 1)+  "/" + currentdate.getFullYear()+" "+ currentdate.getHours() +":"+ currentdate.getMinutes());


    /*-------------Apointmen table resoults per page ajax------------ */

    $("[name='allresoult_length']").on('change', function () {

        event.stopPropagation();

        console.log($(this).val());

        var rezPerPage = $(this).val();

        $.get('/appointment/ajaxResoultPerPage/' + rezPerPage, function (data) {
            //TODO - how do we show the response data
        });




/*        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if ($(this).val()) {
            var Param = {
                url: '/appointment/ajaxResoultPerPage',
                pagenum: $(this).val()
            };

            AdminAjax.updateField(Param);
            $(this).attr('disabled', true);
            $(this).closest('tr').addClass('confirm');

        }*/



    });










});