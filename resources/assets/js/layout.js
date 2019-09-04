$(document).ready(function () {
    $('.owl-content .owl-carousel').owlCarousel({
    stagePadding: 4,
    loop: true,
    margin: 5,
    autoplay: 2000,
    smartSpeed: 1000, // duration of change of 1 slide
    responsiveClass:true,
    nav: true,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    navContainer: '.owl-content .custom-nav',
    responsive:{
        0:{
            items: 1
        },
        600:{
            items: 3
        },
        1000:{
            items: 4,
            autoplay: false
        }
    }
});
    /**
     * search-bar
     */
    /**
     * search-bar
     */
    $(".search-toggle").on("click", function (e) {
        e.preventDefault(),
            $(".search-bar").toggleClass("active");
    });
    $('#button-find-search').on('click', function (e) {
        e.preventDefault(),
            $(".search-bar").removeClass("active");
    });

    /**
     * Scroll to Top
     */
    $(window).scroll(function () {
        if ($(this).scrollTop() >= 50) {
            $('#return-to-top').fadeIn(200);
        } else {
            $('#return-to-top').fadeOut(200);
        }
    });
    $('#return-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
    });

    /**
     * dropdown submenu navbar
     */
    $('.dropdown-submenu > a').on("click", function(e) {
        var submenu = $(this);
        $('.dropdown-submenu .dropdown-menu').removeClass('show');
        submenu.next('.dropdown-menu').addClass('show');
        e.stopPropagation();
    });

    $('.dropdown').on("hidden.bs.dropdown", function() {
        // hide any open menus when parent closes
        $('.dropdown-menu.show').removeClass('show');
    });


});
