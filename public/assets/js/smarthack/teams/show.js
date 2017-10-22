$(document).ready(function () {
    $('.select-search').select2();

    $('#edit_modal').on('show.bs.modal', function () {
        $('input[name=display_name]').val($('#team-name').html());
        $('input[name=description]').val($('#team-description').html());
    });

    $('#delete-team').on('click', function () {
        $.ajax({
            url: '/teams',
            method: 'POST',
            data: {
                '_method': 'DELETE',
                '_token': window.react
            },
            error: function (resp) {
                console.log(resp);
            }
        }) ;
    });
});