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
                items: 5
            }
        }
    });

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
});
