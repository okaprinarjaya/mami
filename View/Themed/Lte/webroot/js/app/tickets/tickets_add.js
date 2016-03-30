$(document).ready(function () {

    $('#TicketAddForm').parsley();
    
    $('#TicketInteractionCode1').on('change', function () {
        var interaction = $('#TicketInteractionCode1 :selected');
        var interaction2 = $('#TicketInteractionCode2');
        var interaction3 = $('#TicketInteractionCode3');
        
        if (interaction.val() != '') {
            $.ajax({
                method: 'GET',
                url: __base_url+'tickets/ajax_get_interaction/'+interaction.val(),
                dataType: 'text'
            }).done(function (data) {
                
                $('#TicketInteractionCode2').html(data);

            }).fail(function (data) {
                alert('Failed to request data');
            }).always(function (data) {
                //
            });

            // Disable assign to dept
            if (interaction.val() == '1' || interaction.val() == '2') {
                $('#TicketDepartmentId').attr('disabled', true);
            } else {
                $('#TicketDepartmentId').attr('disabled', false);
            }

        } else {
            interaction2.html('<option value="" selected="selected">--EMPTY--</option>');
            interaction3.html('<option value="" selected="selected">--EMPTY--</option>');
        }

    });

    $('#TicketInteractionCode2').on('change', function () {
        var interaction2 = $('#TicketInteractionCode2 :selected');
        var interaction3 = $('#TicketInteractionCode3');
        
        if (interaction2.val() != '') {
            $.ajax({
                method: 'GET',
                url: __base_url+'tickets/ajax_get_interaction/'+interaction2.val(),
                dataType: 'text'
            }).done(function (data) {
                
                interaction3.html(data);

            }).fail(function (data) {
                alert('Failed to request data');
            }).always(function (data) {
                //
            });

        } else {
            interaction3.html('<option value="" selected="selected">--EMPTY--</option>');
        }

    });

});
