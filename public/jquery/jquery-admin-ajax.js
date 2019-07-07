var AdminAjax = {


    updateField: function (Param) {



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: Param['url'],
            dataType: 'json',
            data: {AppData: Param},
            success: function (data) {

            }
        });
    }

};