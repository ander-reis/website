$(document).ready(function () {
    $('.owl-content .owl-carousel').owlCarousel({
    stagePadding: 4,
    loop: true,
    // loop: false,
    margin: 5,
    autoplay: 2000,
    // autoplay: 0,
    smartSpeed: 1000, // duration of change of 1 slide
    // smartSpeed: 0,
    responsiveClass: true,
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

    $('input[name="boletimSind"]').change(function($x) {
        $("#num_cpf").prop("disabled", false);
        $("#ds_nome").prop("disabled", false);
        $("#ds_email").prop("disabled", false);
        $("#btnCadastrar").prop("disabled", false);

        if (this.value == 1) { //Sindicalizado
            $("#num_matricula").prop("disabled", false);
            $("#lecionar :checkbox").prop("disabled", true);
            $("#lecionar :checkbox").prop("checked", false);
        }
        else {
            $("#num_matricula").prop("disabled", true);
            $("#lecionar :checkbox").prop("disabled", false);
        }
    })

    $('#carousel-sinpro').carousel({
        interval: 3500
      })
});
