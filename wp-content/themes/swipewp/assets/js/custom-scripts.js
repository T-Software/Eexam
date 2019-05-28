jQuery(document).ready(function($){
    
    'use strict';

     /**
     * SwipeWP Preloader
     */
    if($('#preloader-background').length > 0) {
        setTimeout(function(){$('#preloader-background').hide();}, 600);
    }

    /**
     * responsive menu toggle
     */
    $('.menu-toggle').click(function(event) {
        $( '#site-navigation' ).addClass('active-nav'); 
    });
    
    $('.menu-toggle-off').click(function(event) {
        $( '#site-navigation' ).removeClass('active-nav'); 
    });

    /**
     * header sticky
     */
    var stickyOption = swipewpObject.sticky_option;
    if( stickyOption === 'on' ) {
        var wWidth = jQuery( window ).width();
        if( wWidth <= '767' ) {
            return false;
        }
        var wpAdminBar = jQuery('#wpadminbar');
        if (wpAdminBar.length) {
            jQuery("#masthead").sticky({topSpacing:wpAdminBar.height()});
        } else {
            jQuery("#masthead").sticky({topSpacing:0});
        }
    }
    

    /**
     * Header Side Menu Toggle script
     */
    $('.side-menu-toggle').click(function(event) {
        $( '.sidebar-wrapper' ).addClass('show'); 
    });
    
    $('.sidebar-wrapper').click(function(event) { 
        if ( $(event.target).parents().hasClass('show') ){
            $( '.sidebar-wrapper' ).addClass('show');
        }else{
            $( '.sidebar-wrapper' ).removeClass('show');    
        }            
    });

    /**
     * responsive sub menu toggle
     */
    $('#site-navigation .menu-item-has-children, #site-navigation .page_item_has_children').append('<span class="sub-toggle"> <i class="fa fa-angle-right"></i> </span>');

    $('#site-navigation .sub-toggle').click(function() {
        $(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('2000');
        $(this).parent('.page_item_has_children').children('ul.children').first().slideToggle('2000');
        $(this).children('.fa').toggleClass('fa-angle-right').toggleClass('fa-angle-down');
    });

	/**
     * Header Search script
     */
    $('.search-icon i').click(function(e) {
        $('.search-form-wrapper').addClass('search-activate');
    });
    $('.search-form-wrapper').click(function(e) {
        if ( $(e.target).parents().hasClass('search-activate') ){
            $('.search-form-wrapper').addClass('search-activate');
        }else{
            $('.search-form-wrapper').removeClass('search-activate');
        }
    });

    /**
     * Scroll to top button scripts
     * 
    */
    var btn = $('.mt-scroll-to-top-wrapper');
    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
    });

    /**
     * Settings about WOW animation
     */
	var wowOption = swipewpObject.wow_effect;
    if( wowOption === 'on' ) {
        new WOW().init();
    }

    /**
     * banner image show
     */
    $('#section-banner').imagesLoaded(function(){
        $('.banner-item').fadeIn();
    });
    
});

