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

$("#FooFromDate").datepicker({
    format: 'dd/mm/yyyy',
    autoclose: true
}).on("changeDate", function (e) {
    $("#FilterFromDateVal").val(e.format("yyyy-mm-dd"));
    $("#FilterPeriode").val('');        
});

$("#FooToDate").datepicker({
    format: 'dd/mm/yyyy',
    autoclose: true
}).on("changeDate", function (e) {
    $("#FilterToDateVal").val(e.format("yyyy-mm-dd"));
    $("#FilterPeriode").val('');
});

$("#FilterPeriode").on("change", function () {
    $("#FooFromDate").val("");
    $("#FooToDate").val("");
    $("#FilterFromDateVal").val("");
    $("#FilterToDateVal").val("");
});
