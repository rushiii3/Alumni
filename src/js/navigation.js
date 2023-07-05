$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#sidebar').addClass('heightFull');
        $('#sideBarLogo').toggleClass('show');
        $('#navBarLogo').toggleClass('hide');

    });
});