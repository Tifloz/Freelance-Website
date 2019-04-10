$('.ui.stackable.menu .ui.button, #nav_logo').click(function () {
    $(window).attr('location', $(this).data('url'));
});