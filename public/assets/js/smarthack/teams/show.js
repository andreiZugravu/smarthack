$(document).ready(function () {
    $('.select-search').select2();

    $('#edit_modal').on('show.bs.modal', function () {
        $('input[name=display_name]').val($('#team-name').html());
        $('input[name=description]').val($('#team-description').html());
    });

    $('#delete-button').on('click', function () {
        $(this).closest('form').submit();
    });
});