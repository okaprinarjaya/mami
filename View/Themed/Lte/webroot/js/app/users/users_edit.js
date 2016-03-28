$(document).ready(function () {
    
    $('#FooChpwd').on('click', function () {
        if ($('#FooChpwd').is(':checked')) {
            $('#UserPassword').attr('disabled', false);
        } else {
            $('#UserPassword').attr('disabled', true);
        }
    });

});
