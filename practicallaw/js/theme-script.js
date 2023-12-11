/*!
Theme Name: practicallawlite
Theme URI: http://easetemplate.com/
Author: Underscores.me
Author URI: http://jituchauhan.com/
Description: Description
Version: 0.0.1
License: GNU General Public License v2 or later
License URI: LICENSE
Text Domain: practicallawlite
Tags: theme, elementor, redux-framework, theme-options, basic theme
*/
(function($) {

  "use strict";

    /* Blog - Gallery Images Class */
    $("ul.wp-block-gallery").addClass("owl-carousel owl-theme");

    /* Post Pagination Class */
    $("nav.navigation .nav-links").addClass('st-pagination');
    $("nav.navigation ul.page-numbers").addClass("pagination");
    $("nav.navigation ul li span").addClass("active");
    $(".widget ul").addClass("list-unstyled");

    /* Post Pagination Class */
    $(".widget_recent_entries ul li a").addClass('recent-title title');
    $(".widget_tag_cloud a").addClass("btn btn-default btn-xs");
    $("post-block post-quote").parent().addClass("post-quote");

    /* Footer Class */
    $(".widget-area ul").addClass("list-unstyled");
    $(".widget ul").addClass("list-unstyled");

    $(".comment-reply-link").addClass("btn btn-primary btn-xs");
   
    // $(".search-submit").addClass("btn btn-primary");
    // $(".search-field").addClass("form-control");
    

    if( $('.owl-carousel').length ){
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:true,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });
    }

    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');

        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass("show");
        });

        return false;
    });


})(jQuery);