$('.ui.stackable.menu .ui.button').click(function () {
    $(window).attr('location', $(this).data('url'));
});