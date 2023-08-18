(function ($) {
    "use strict";

    $(document).ready(function () {

        /**-----------------------------
         * Navbar fix
         * ---------------------------*/
        $(document).on('click', '.navbar-area .navbar-nav li.menu-item-has-children>a', function (e) {
            e.preventDefault();
        })
       
        /*-  menu -*/
        $('.navbar-area .menu').on('click', function() {
            $(this).toggleClass('open');
            $('.navbar-area .navbar-collapse').toggleClass('sopen');
        });
    
        // mobile menu
        if ($(window).width() < 992) {
            $(".in-mobile").clone().appendTo(".sidebar-inner");
            $(".in-mobile ul li.menu-item-has-children").append('<i class="fas fa-chevron-right"></i>');
            $('<i class="fas fa-chevron-right"></i>').insertAfter("");

            $(".menu-item-has-children a").on('click', function(e) {
                // e.preventDefault();

                $(this).siblings('.sub-menu').animate({
                    height: "toggle"
                }, 300);
            });
        }

        var menutoggle = $('.menu-toggle');
        var mainmenu = $('.navbar-nav');
        
        menutoggle.on('click', function() {
            if (menutoggle.hasClass('is-active')) {
                mainmenu.removeClass('menu-open');
            } else {
                mainmenu.addClass('menu-open');
            }
        });


        /* Menu Sidebar (Hidden) Content Toggle */
        if($('.menu-sidebar').length){
            //Show Form
            $('.menu-sidebar button').on('click', function(e) {
                e.preventDefault();
                $('body').toggleClass('side-content-visible');
            });
            //Hide Form
            $('.hidden-bar .inner-box .cross-icon,.form-back-drop,.close-menu').on('click', function(e) {
                e.preventDefault();
                $('body').removeClass('side-content-visible');
            });
            //Dropdown Menu
            $('.fullscreen-menu .navigation li.dropdown > a').on('click', function() {
                $(this).next('ul').slideToggle(500);
            });
        }
         
        
        /* Project Slider */
        if ($('.project-active').length) {
            $('.project-active').slick({
                infinite: true,
                arrows: true,
                dots: false,
                autoplay: false,
                autoplaySpeed: 5000,
                pauseOnHover: false,
                slidesToScroll: 1,
                slidesToShow: 1,
                prevArrow: '<button class="project-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button class="project-next"><i class="far fa-arrow-right"></i></button>',
            });
        }
        
        $('button[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
          $('.project-active').slick('setPosition');
        })
        
        
     
     
        

        /* product Slider */
        if ($('.realated-product-slider').length) {
            $('.realated-product-slider').slick({
                dots: true,
                infinite: true,
                autoplay: false,
                autoplaySpeed: 2000,
                arrows: false,
                speed: 1000,
                focusOnSelect: true,
                slidesToShow: 4,
                slidesToScroll: 2,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        } 

    
        
        
        /* Fact Counter  */
        if ($('.counter-item').length) {
            $('.counter-item').appear(function () {

                var $t = $(this),
                    n = $t.find(".count-text").attr("data-stop"),
                    r = parseInt($t.find(".count-text").attr("data-speed"), 10);

                if (!$t.hasClass("counted")) {
                    $t.addClass("counted");
                    $({
                        countNum: $t.find(".count-text").text()
                    }).animate({
                        countNum: n
                    }, {
                        duration: r,
                        easing: "linear",
                        step: function () {
                            $t.find(".count-text").text(Math.floor(this.countNum));
                        },
                        complete: function () {
                            $t.find(".count-text").text(this.countNum);
                        }
                    });
                }

            }, {
                accY: 0
            });
        }


        /*--------------------------------------------
           17. CountDown
        ---------------------------------------------*/
        // if($('.count-down').length !== 0){
        //     var $date = $('.count-down').attr('data-date');
        //         const second = 1000,
        //        minute = second * 60,
        //        hour = minute * 60,
        //        day = hour * 24;
        //      let countDown = new Date($date).getTime(),
        //  x = setInterval(function() {
        //    let now = new Date().getTime(),
        //        distance = countDown - now;
        //      document.getElementById('days').innerText = Math.floor(distance / (day)),
        //      document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
        //      document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
        //      document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
        //    //do something later when date is reached
        //    //if (distance < 0) {
        //    //  clearInterval(x);
        //    //  'IT'S MY BIRTHDAY!;
        //    //}
        //  }, second)
        // };
        

        /* Search Popup */
        // var bodyOvrelay =  $('#body-overlay');
        // var searchPopup = $('#td-search-popup');
        // var sidebarMenu = $('#sidebar-menu');

        // $(document).on('click','#body-overlay',function(e){
        //     e.preventDefault();
        //     bodyOvrelay.removeClass('active');
        //     searchPopup.removeClass('active');
        //     sidebarMenu.removeClass('active');
        // });
        // $(document).on('click','.search-bar-btn',function(e){
        //     e.preventDefault();
        //     searchPopup.addClass('active');
        //     bodyOvrelay.addClass('active');
        // });

    

        /* WOW Animation */
        //  if ($('.wow').length) {
        //         var wow = new WOW({
        //         boxClass: 'wow', // animated element css class (default is wow)
        //         animateClass: 'animated', // animation css class (default is animated)
        //         offset: 0, // distance to the element when triggering the animation (default is 0)
        //         mobile: true, // trigger animations on mobile devices (default is true)
        //         live: true // act on asynchronously loaded content (default is true)
        //     });
        //     wow.init();
        // }


    //     /* back to top */
    //     $(document).on('click', '.back-to-top', function () {
    //         $("html,body").animate({
    //             scrollTop: 0
    //         }, 500);
    //     });

     });

    // $(window).on("scroll", function() {
    //     /* 28. back to top */
    //     var ScrollTop = $('.back-to-top');
    //     if ($(window).scrollTop() > 400) {
    //         ScrollTop.fadeIn(300);
    //     } else {
    //         ScrollTop.fadeOut(300);
    //     }

    //     /*
    //        sticky header */
    //     var scroll = $(window).scrollTop();
    //     if (scroll < 100) {
    //         $(".header").removeClass("sticky-header");
    //     } else {
    //         $(".header").addClass("sticky-header");
    //     }

    // });


    // $(window).on('load', function () {

    //     /*-----------------
    //        preloader
    //     ------------------*/
    //     // var preLoder = $("#preloader");
    //     // preLoder.delay(500).fadeOut(500);

    //     /*-----------------
    //        back to top
    //     ------------------*/
    //     var backtoTop = $('.back-to-top')
    //     backtoTop.fadeOut();

    //     /*---------------------
    //         Cancel Preloader
    //     ----------------------*/
    //     // $(document).on('click', '.cancel-preloader a', function (e) {
    //     //     e.preventDefault();
    //     //     $("#preloader").fadeOut(2000);
    //     // });
        

    // });


})(jQuery);



window.onload = function(){
    document.querySelector(".preloader").style.display = "none";
}


 // Print Catagories Owl Carousel 
jQuery('.catagories').owlCarousel({
    items:6,
    loop: true,
    margin: 10,
    nav: false,
    dots: true,
    autoplay: true,
    navText: ["Prev", "Next"],
    smartSpeed: 1000,
    responsiveClass:true,
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 3
        },
        768: {
            items: 4
        },
        1000: {
            items: 5
        },

        1280: {
            items: 6
        }
    }
})


 // Testimonials Owl Carousel 
jQuery('.owl-carousel').owlCarousel({
    items:1,
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    autoplay: true,
     navText : [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>'
                
            ],

    smartSpeed: 1000,
    responsiveClass: true
   
})



    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 300, 'easeInOutExpo');
        return false;
    });




$(window).on("scroll", function() {
        /*---------------------------------------
           28. back to top
        -----------------------------------------*/
        // var ScrollTop = $('.back-to-top');
        // if ($(window).scrollTop() > 1000) {
        //     ScrollTop.fadeIn(300);
        // } else {
        //     ScrollTop.fadeOut(300);
        // }

        /*---------------------------------------
           29. sticky active
        -----------------------------------------*/
        // var scroll = $(window).scrollTop();
        // if (scroll < 200) {
        //     $("header").removeClass("sticky-active");
        // } else {
        //     $("header").addClass("sticky-active");
        // }

    });

    // Sticky Header 
    $(window).scroll(function() {
    if ($(this).scrollTop() > 200){  
        $('header').addClass("sticky-active");
      }
      else{
        $('header').removeClass("sticky-active");
      }
    });
