$(function() {
    // Add the active class in the main menu
    $('#mainmenu a[href="' + location.pathname + '"]').parent().addClass('active')
});