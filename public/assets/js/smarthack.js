function sidebarHighlight() {
    // var link = localStorage.getItem('sidebarLink');
    let $sidebarLinks = $('.slidebar-item').find('a');
    let url = window.location.href;
    let link;
    $sidebarLinks.each(function () {
        if (url.includes($(this).attr('href'))) {
            link = $(this);
        }
    });

    if (link) {
        let $link = link;
        let $li = $link.closest('li');
        $li.addClass('active');
        let $ul = $li.closest('ul');
        $ul.removeClass('hidden-ul');
        $li = $ul.closest('li');
        $li.addClass('active');
    }
}

$(document).ready(function () {
    sidebarHighlight();

    $('a[data-popup=tooltip]').on('click', function () {
        $(this).siblings('#' + $(this).attr('aria-describedby')).remove();
    });
});