$(document).ready(function () {
    $('a[data-popup=tooltip]').on('click', function () {
        $(this).siblings('#' + $(this).attr('aria-describedby')).remove();
    });
});