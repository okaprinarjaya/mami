$(document).ready(function () {
    
    $('#myModal').on('hidden.bs.modal', function (e) {
        $(this).removeData();
    });
    
});