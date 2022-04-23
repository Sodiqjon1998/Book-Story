/* ===================================
    About
====================================== */

/*---------------------------------------------------------------------
    Theme Name: Woman Store
    Theme URI:
    Author: Themes Industry
    Author URI:
    Description: One Page , Multi Parallax Template
    Tags: one page, multi page, multipurpose, parallax, creative, html5

 ----------------------------------------------------------------------*/



//PAGE LOADER
$(window).on("load", function () {

    "use strict";
    $(".loader").fadeOut(800);

    $('.side-menu').removeClass('hidden');



    /*===================================
            Cube Portfolio OWL CAROUSEL
    ======================================*/

    $('#js-grid-blog-posts').cubeportfolio({
        filters: '#js-filters-blog-posts',
        search: '#js-search-blog-posts',
        defaultFilter: '*',
        animationType: '3dflip',
        gapHorizontal: 70,
        gapVertical: 30,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1500,
            cols: 3,
        }, {
            width: 1100,
            cols: 3,
        }, {
            width: 800,
            cols: 3,
        }, {
            width: 481,
            cols: 2,
            options: {}
        }, {
            width: 320,
            cols: 1,
            options: {}
        }],
        caption: 'none',
        displayType: 'fadeIn',
        displayTypeSpeed: 400,
    });

    /*===================================
        sync-portfolio- and Owl Carousel
======================================*/

    $('.sync-portfolio-carousel').owlCarousel({
        loop: true,
        margin: 0,
        dots: false,
        nav: true,
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

    $(".owl-prev").html('<div class="navigation-link-prev"><a class="prev-btn"><i class="lni-chevron-left"></i> </a></div>');
    $(".owl-next").html('<div class="navigation-link-next"><a class="next-btn"><i class="lni-chevron-right"></i> </a></div>');

    // $('.navigation-links a.prev-btn').click(function() {
//     var owl = $('.sync-portfolio-carousel');
//     owl.owlCarousel();
//     owl.trigger('next.owl.carousel');
// });
// $('.navigation-links a.next-btn').click(function() {
//     var owl = $('.sync-portfolio-carousel');
//     owl.owlCarousel();
//     owl.trigger('prev.owl.carousel', [300]);
// });




});

jQuery(function ($) {
    "use strict";

    //let $window = $(window);
    // alert($window);

    /*------ STICKY MENU FIXED ------*/

    $(window).scroll(function () {

        if ($(document).scrollTop() > 240) {

            $('.fixed-header1').removeClass('position-relative');
            $('.header-area').addClass('fixednavbar');

        } else {
            $('.fixed-header1').addClass('position-relative');
            $('.header-area').removeClass('fixednavbar');
        }
    });

    /*------ End STICKY MENU FIXED ------*/


    /*------ DETECT SCREEN JS ------*/

    /*
     * Side menu collapse opener
     * */
    $(".collapsePagesSideMenu").on('click', function () {
        $(this).children().toggleClass("rotate-180");
    });

    $(".user-data").on('click', function () {
        // alert("yes");
        $(".user-data .dropdown-m").css({display: 'block'});
    });
    $(".slider").on('click', function () {
        // alert("yes");
        $(".user-data .dropdown-m").css({display: 'none'});
    });


//Drop Down For register And cart menu
    $(document).click(function (event) {
        //if you click on anything except the modal itself or the "open modal" link, close the modal
        if (!$(event.target).closest(".mini-menu-card .shopping-cart").length) {
            $("body").find(".mini-menu-card .shopping-cart").removeClass("show");
        }
    });
    $(document).click(function (event) {
        //if you click on anything except the modal itself or the "open modal" link, close the modal
        if (!$(event.target).closest("#mini-menu .user-utiliity").length) {
            $("body").find("#mini-menu .user-utiliity").removeClass("show");
        }
    });


    /*===================================
      //Mega Menu OWL Carousel
    ======================================*/

    $('.featured-megamenu-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
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


// Custom Mega Menu OWL
    $('.ini-customNextBtn').click(function () {
        var owl = $('.featured-megamenu-carousel');
        owl.owlCarousel();
        owl.trigger('next.owl.carousel');
    });
    $('.ini-customPrevBtn').click(function () {
        var owl = $('.featured-megamenu-carousel');
        owl.owlCarousel();
        owl.trigger('prev.owl.carousel', [300]);
    });


    /* ===================================
       Product Listing Owl Changes Images
    ====================================== */

    $('.product-listing-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
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


    /*===================================
         LATEST ARRIVALS OWL CAROUSEL
    ======================================*/
    $('.lastest_featured_products').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },

            600: {
                items: 2
            },
            1000: {
                items: 5
            }
        }
    });


    /*===================================
        SEARCH BOX MEDIA ITEAMS
    ======================================*/
    $('.search-box-meida-items').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
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


    /*===================================
              //Sticky Filter Nav
    ======================================*/
    var sidebar = $('#product-filter-nav');
    if (sidebar.length) {
        Stickyfill.add(sidebar);
    }


    /*===================================
              Price Range
    ======================================*/



    /* ===================================
         Search Side Menu
     ====================================== */


    $("#add_search_box").click(function () {
        $(".search-box-overlay").addClass("fixed-box");
    });

    $("#close-window").click(function(){
        $(".search-box-overlay").addClass("remove-fixed-box");
        setTimeout(function(){
            $(".search-box-overlay").removeClass("fixed-box");
            $(".search-box-overlay").removeClass("remove-fixed-box");
        }, 800);


    });


    $("#add_cart_box").click(function () {
        $(".cart-box-overlay").addClass("fixed-box");
    });

    $("#close-window1").click(function(){
        $(".cart-box-overlay").addClass("remove-fixed-box");
        setTimeout(function(){
            $(".cart-box-overlay").removeClass("fixed-box");
            $(".cart-box-overlay").removeClass("remove-fixed-box");
        }, 800);


    });



    $('[data-fancybox]').fancybox({
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'speedIn': 600,
        'speedOut': 200,
        buttons: [
            'slideShow',
            'fullScreen',
            'thumbs',
            'share',
            // 'download',
            'zoom',
            'close'
        ],
    });


    /*Menu Onclick*/
    let sideMenuToggle = $("#sidemenu_toggle");
    let sideMenu = $(".side-menu");
    if (sideMenuToggle.length) {
        sideMenuToggle.on("click", function () {
            $("body").addClass("overflow-hidden");
            sideMenu.addClass("side-menu-active");
            $(function () {
                setTimeout(function () {
                    $("#close_side_menu").fadeIn(300);
                }, 300);
            });
        });
        $("#close_side_menu , #btn_sideNavClose , .side-nav .nav-link.pagescroll").on("click", function () {
            $("body").removeClass("overflow-hidden");
            sideMenu.removeClass("side-menu-active");
            $("#close_side_menu").fadeOut(200);
            $(() => {
                setTimeout(() => {
                    $('.sideNavPages').removeClass('show');
                    $('.fas').removeClass('rotate-180');
                }, 400);
            });
        });
        $(document).keyup(e => {
            if (e.keyCode === 27) { // escape key maps to keycode `27`
                if (sideMenu.hasClass("side-menu-active")) {
                    $("body").removeClass("overflow-hidden");
                    sideMenu.removeClass("side-menu-active");
                    $("#close_side_menu").fadeOut(200);
                    $tooltip.tooltipster('close');
                    $(() => {
                        setTimeout(() => {
                            $('.sideNavPages').removeClass('show');
                            $('.fas').removeClass('rotate-180');
                        }, 400);
                    });
                }
            }
        });
    }



    /* =====================================
          Parallax
       ====================================== */

    if($(window).width() < 780) {
        $('.parallax').addClass("parallax-disable");
    } else {
        $('.parallax').removeClass("parallax-disable");

        // parallax
        $(".parallax").parallaxie({
            speed: 0.6,
            offset: 0,
        });
    }



    /* ===================================
        Stop Parallax Banner Index Page
    ======================================*/
    if ($(window).width() < 780) {
        $('.parallax-slide').addClass('paralax-data');
    } else {
        $('.parallax-slide').removeClass('paralax-data');
        $('.parallax-slide').parallaxie({
            speed: 0.6,
            offset: -200,
        });
    }



    /*===================================
              Swiper Sync Slider
    ======================================*/
    if ($("#gallery").length) {
        var galleryTop = new Swiper('#gallery', {
            effect: 'fade',
            direction: 'vertical',
            spaceBetween: 10,
            slidesPerView: 1,
            slidesPerGroup: 1,
            loop: true,
            initialSlide: 0,
            centeredSlides: true,
            loopAdditionalSlides: 5,
            touchRatio: 0.2,

        });

        var galleryThumbs = new Swiper('#thumbs', {
            direction: 'vertical',
            spaceBetween: 10,
            slidesPerView: 3,
            slidesPerGroup: 1,
            loop: true,
            initialSlide: 0,
            centeredSlides: true,
            loopAdditionalSlides: 3,
            touchRatio: 0.2,
            slideToClickedSlide: true
        });

        galleryTop.controller.control = galleryThumbs;
        galleryThumbs.controller.control = galleryTop;
    }


    /*===================================
              Input Number Counter
    ======================================*/


    $('.count').prop('disabled', true);
    $(document).on('click', '.plus', function () {
        $('.count').val(parseInt($('.count').val()) + 1);

    });
    $(document).on('click', '.minus', function () {
        $('.count').val(parseInt($('.count').val()) - 1);
        if ($('.count').val() <= -1) {
            $('.count').val(0);

        }
    });

    /* ===================================
              Wow Effects
    ======================================*/
    var wow = new WOW(
        {
            boxClass:'wow',      // default
            animateClass:'animated', // default
            offset:0,          // default
            mobile:false,       // default
            live:true        // default
        }
    );
    wow.init();




    /* ===================================
         //Scroll and Arrow Appear
    ======================================*/

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 300)
            $('.scroll-top-arrow').fadeIn('slow');
        else
            $('.scroll-top-arrow').fadeOut('3000');
    });

    //Click event to scroll to top
    $(document).on('click', '.scroll-top-arrow', function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });


    /* ===================================
              REV SLIDER
    ======================================*/
 if ($(".slider").length) {

     $("#rev_slider_1_1").show().revolution({
         sliderType: "standard",
         jsFileLocation: "//localhost/reveditor/revslider/public/assets/js/",
         sliderLayout: "fullscreen",
         dottedOverlay: "none",
         delay: 9000,
         navigation: {
             keyboardNavigation: "off",
             keyboard_direction: "horizontal",
             mouseScrollNavigation: "off",
             mouseScrollReverse: "default",
             onHoverStop: "off",
             arrows: {
                 style: "gyges",
                 enable: true,
                 hide_onmobile: true,
                 hide_under: 767,
                 hide_onleave: false,
                 tmp: '',
                 left: {
                     h_align: "left",
                     v_align: "center",
                     h_offset: 20,
                     v_offset: 0
                 },
                 right: {
                     h_align: "right",
                     v_align: "center",
                     h_offset: 20,
                     v_offset: 0
                 }
             }
         },
         responsiveLevels: [1240, 1024, 778, 480],
         visibilityLevels: [1240, 1024, 778, 480],
         gridwidth: [1140, 1024, 778, 480],
         gridheight: [700, 768, 960, 420],
         lazyType: "none",
         parallax: {
             type: "mouse",
             origo: "enterpoint",
             speed: 400,
             speedbg: 0,
             speedls: 0,
             levels: [2, 3, 5, 10, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 55],
             disable_onmobile: "on"
         },
         shadow: 0,
         spinner: "spinner2",
         stopLoop: "off",
         stopAfterLoops: -1,
         stopAtSlide: -1,
         shuffle: "off",
         autoHeight: "off",
         fullScreenAutoWidth: "off",
         fullScreenAlignForce: "off",
         fullScreenOffsetContainer: "",
         fullScreenOffset: "",
         disableProgressBar: "on",
         hideThumbsOnMobile: "off",
         hideSliderAtLimit: 0,
         hideCaptionAtLimit: 0,
         hideAllCaptionAtLilmit: 0,
         debugMode: false,
         fallbacks: {
             simplifyAll: "off",
             nextSlideOnWindowFocus: "off",
             disableFocusListener: false,
         }
     });
 }




});