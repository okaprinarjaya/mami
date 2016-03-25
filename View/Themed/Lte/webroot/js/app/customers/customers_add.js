$(document).ready(function () {

    window.Parsley.on('field:error', function() {
        // This global callback will be called for any field that fails validation.
        $('#customer-tabs a[href="#base"]').tab('show');
    });
    
    $('#expire').daterangepicker({
        format: 'YYYY-MM-DD' ,
        singleDatePicker: true,
        showDropdowns: true
    });
    $('#birth').daterangepicker({
        format: 'YYYY-MM-DD' ,
        singleDatePicker: true,
        showDropdowns: true
    });
    $('#tax').daterangepicker({
        format: 'YYYY-MM-DD' ,
        singleDatePicker: true,
        showDropdowns: true
    });
    $('#customer-tabs a[href="#base"]').tab('show');
    
    $('#bank_type').on('change' , function(){
        var name = $('#bank_type').val();
        $.ajax({
            method: 'GET',
            url: __base_url+'customers/get_bank_code?name='+name,
            dataType: 'json'
        }).done(function (data) {
            var acc ='<option value="">--CHOOSE--</option>';
            $.each( data, function( key, value ) {
                acc += '<option value="'+value.code+'">'+value.name+'</option>';
            });
            $('#bank_code').html(acc);
            
            acc2 = '<input type="text" readonly="readonly" id="CustomerBRANCHNAME" class="form-control input-sm" name="data[Customer][BRANCH_NAME]">';
            $('#branch_name').html(acc2);
            
        }).fail(function (data) {
            alert('Failed to request data');
        }).always(function (data) {
        
        });
    });
    
    $('#bank_code').on('change' , function(){
        var code = $('#bank_code').val();
        $.ajax({
            method: 'GET',
            url: __base_url+'customers/get_bank_name?code='+code,
            dataType: 'json'
        }).done(function (data) {
            acc = '<input type="text" value="'+data.name+'" readonly="readonly" id="CustomerBRANCHNAME" class="form-control input-sm" name="data[Customer][BRANCH_NAME]">';
            $('#branch_name').html(acc);
        }).fail(function (data) {
            alert('Failed to request data');
        }).always(function (data) {
        
        });
    });
    
    $('.items').on('click', function () {
        var item_content = $(this).parent().parent().parent().find('.collapse');
        
        if (item_content.hasClass('in')) {
            item_content.removeClass('in');
        } else {
            item_content.addClass('in');
        }
    });

    var valueNation = $('#CustomerNATION').val();
    if (valueNation == 'I') {
        $('#CustomerBIRTHCOUNTRYCD').removeClass('required');
    } else if(valueNation == 'F') {
        $('#CustomerBIRTHCOUNTRYCD').addClass('required');
    }else{
        $('#CustomerBIRTHCOUNTRYCD').removeClass('required');
    }
    
    $('#CustomerNATION').on('change', function () {
        var value = $('#CustomerNATION').val();
        if (value == 'I') {
            $('#CustomerBIRTHCOUNTRYCD').removeClass('required');
        } else if(value == 'F'){
            $('#CustomerBIRTHCOUNTRYCD').addClass('required');
        }else{
            $('#CustomerBIRTHCOUNTRYCD').removeClass('required');
        }
    });
    
    
    
});
