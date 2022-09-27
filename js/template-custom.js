(function(window, document, $) {

    "use strict";

    // site preloader
    jQuery(window).load(function () {
        "use strict";
        jQuery('#preloader2').fadeOut('slow', function () {
            jQuery(this).remove();
        });
        jQuery('#preloader').fadeOut('slow', function () {
            jQuery(this).remove();
        });
    });

    jQuery(document).ready(function () {

        var win = $(window);
        /* Navbar Menu */

        win.on("scroll", function () {
            var bodyScroll = win.scrollTop();

            if ( bodyScroll > 100 ) {
                $("body").addClass("scroll-start");
            } else {
                $("body").removeClass("scroll-start");
            }
        });

        /* ==============================================
        hide mobile collapse menu
        =============================================== */

        //animated scroll menu
        jQuery(window).scroll(function () {
            var scroll = jQuery(window).scrollTop();
            if (scroll > 0) {
                jQuery('.navbar-transparent').addClass('shrink');
            }
            if (scroll <= 0) {
                jQuery('.navbar-transparent').removeClass('shrink');
            }
        });

        
        //smooth scroll
        jQuery(function () {
            jQuery('.scroll-to a[href*="#"]:not([href="#"])').click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = jQuery(this.hash);
                    target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        jQuery('html, body').animate({
                            scrollTop: Math.max(target.offset().top - jQuery("nav.navbar.navbar-default.navbar-fixed-top").height(), 0)
                        }, 1000);
                        return false;
                    }
                }
            });
        });

        var count1 =  jQuery("ul.services-list li").size() - 1;
        jQuery("ul.services-list li:nth-child("+count1+")").css({'border-bottom-color' : 'transparent'});

        var count2 =  jQuery("ul.services-list li").size();
        jQuery("ul.services-list li:nth-child("+count2+")").css({'border-bottom-color' : 'transparent'});

        //sticky header
        jQuery(window).resize(function () {
            jQuery(".navbar-collapse").css({maxHeight: jQuery(window).height() - jQuery(".navbar-header").height() + "px"});
        });

        //sticky header on scroll
        jQuery(window).load(function () {
            jQuery(".sticky-header").sticky({topSpacing: 0});
        });

        //Auto Close Responsive Navbar on Click
        function close_toggle() {

            jQuery('.nav a:not(".dropdown-toggle")').on('click', function () {
                jQuery('.navbar-collapse').collapse('hide');
            });

        }
        close_toggle();
        jQuery(window).resize(close_toggle);
        //back to top
        //Check to see if the window is top if not then display button
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 300) {
                jQuery('.scrollToTop').fadeIn();
            } else {
                jQuery('.scrollToTop').fadeOut();
            }
        });

        //Click event to scroll to top
        jQuery('.scrollToTop').click(function () {
            jQuery('html, body').animate({scrollTop: 0}, 800);
            return false;
        });
    });
})(window, document, jQuery);
