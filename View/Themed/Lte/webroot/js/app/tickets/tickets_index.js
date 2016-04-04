$(document).ready(function () {
    
    $('#myModal').on('hidden.bs.modal', function (e) {
        $(this).removeData();
    });

    $('#FilterInteractionCode1').on('change', function () {
        if (this.value != '') {
            $.ajax({
                method: 'GET',
                url: __base_url+'tickets/ajax_get_interaction/'+this.value,
                dataType: 'text'
            }).done(function (data) {
                
                $('#FilterInteractionCode2').html(data);

            }).fail(function (data) {
                alert('Failed to request data');
            }).always(function (data) {
                //
            });
            
        } else {
            $('#FilterInteractionCode2').html('<option value="" selected="selected">--EMPTY--</option>');
        }
    });
    
});