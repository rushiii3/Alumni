$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggle(600);
        $('#content').hide();
    });
    $('#CloseNav').on('click',function(){
        $('#sidebar').toggle(600);
        $('#content').show();
    })
});