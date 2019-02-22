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
    $('#search-one').click(function () {
        $('#input-search').toggle();
    });

    $('#search-two').click(function () {
        $('#input-search').toggle();
    });

    $("#button-find-search").click(function(){
        $('#input-search').toggle();
    });

    $("#container").click(function(){
        $('#input-search').css('display', 'none');
    });
});
