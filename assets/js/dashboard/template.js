$(document).ready(function() {

    $(document.body).append('<div class="page-overlay"></div>');

    toggleFullScreen();
    toggleSidebarView();
    selectMenu();

});

$(window).on('load', function() {
    $('#loader-overlay').fadeOut();
});

function selectMenu() {
    $('.sidebar-links li a').click(function() {
        $('.sidebar-links').find('.active').removeClass('active');
        $(this).addClass('active');

        $(this).parent().find('ul').toggle(200);
    });
}

function toggleSidebarView() {

    $('.toggle-sidebar input').change(function() {
        if ($(this).is(':checked')) {
            $('body').removeClass('hidden-sidebar');
            $('.c-2').addClass('col-md-2');
            $('.page').removeClass('col-md-12').addClass('col-md-10');
        } else {
            $('body').addClass('hidden-sidebar');
            $('.c-2').removeClass('col-md-2');
            $('.page').removeClass('col-md-10').addClass('col-md-12');
        }
    });

    $('[data-open-sidebar]').click(function() {
        $('.page-overlay').toggle();
        $('aside.sidebar').toggleClass('sidebar-open');
    });
    $('.page-overlay').click(function() {
        $('asider.sidebar').removeClass('sidebar-open');
        $('.page-overlay').fadeOut();
    });

    $('.sidebar .toggle').click(function() {
        $(this).parent().find('ul').toggle(300);
    });

}

function toggleFullScreen() {
    /*
     * Fullscreen Browsing
     */
    if ($('[data-action="fullscreen"]')[0]) {
        var fs = $("[data-action='fullscreen']");
        fs.on('click', function(e) {
            e.preventDefault();

            //Launch
            function launchIntoFullscreen(element) {

                if (element.requestFullscreen) {
                    element.requestFullscreen();
                } else if (element.mozRequestFullScreen) {
                    element.mozRequestFullScreen();
                } else if (element.webkitRequestFullscreen) {
                    element.webkitRequestFullscreen();
                } else if (element.msRequestFullscreen) {
                    element.msRequestFullscreen();
                }
            }

            //Exit
            function exitFullscreen() {

                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                }
            }

            launchIntoFullscreen(document.documentElement);
            fs.closest('.dropdown').removeClass('open');
        });
    }


}