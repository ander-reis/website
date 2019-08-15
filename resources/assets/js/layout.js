$(document).ready(function () {
    /**
     * owl-carousel
     */
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 5,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
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

});
