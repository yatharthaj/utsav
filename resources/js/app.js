(function ($) {
    $(function () {

        $('.sidenav').sidenav({
            menuWidth: 500,
        });
        $('.carousel').carousel({fullWidth: true});

        $('.parallax').parallax();
        // var btn = $('#button');

        // $(window).scroll(function () {
        //     if ($(window).scrollTop() > 300) {
        //         btn.addClass('show');
        //     } else {
        //         btn.removeClass('show');
        //     }
        // });

        // btn.on('click', function (e) {
        //     e.preventDefault();
        //     $('html, body').animate({scrollTop: 0}, '300');
        // });
        $('.scrollspy').scrollSpy();
        $('#team-tab').tabs();
        $('.tripStart').datepicker();
        $('select').formSelect();
        $('.datepicker').datepicker();
        $('.dropdown-button').megaMenu({
            inDuration: 300,
            outDuration: 150,
            hover: true
        });
        $('#dob').datepicker();
        $('#exp').datepicker();
        $('.collapsible').collapsible();
        $('.scrollspy').scrollSpy();
        $('#product-tab').tabs();
        $('.partners').owlCarousel({
            loop: false,
            margin: 20,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 8
                }
            }
        });
        $('.home-slider').owlCarousel({
            loop: 1,
            nav: 0,
            animateOut: 'fadeOut',
            autoHeight: 1,
            autoplay: 1,
            autoplayTimeout: 5000,
            autoplayHoverPause: 0,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        $('.dropdown-trigger').dropdown();

}); // end of document ready
})
(jQuery); // end of jQuery name space


