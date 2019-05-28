<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package SwipeWP
 */

$front_page_sections = swipewp_get_front_page_sections();

if ( 'posts' == get_option( 'show_on_front' ) ) {
	//Show Static Blog Page
    include( get_home_template() );
}elseif( $front_page_sections ){ 
    get_header();
    //If any one section are enabled then show custom home page.
    foreach( $front_page_sections as $get_section ){
        get_template_part( 'template-parts/front/section', esc_attr( $get_section ) );
    }
    get_footer();
}else {
    //If all section are disabled then show respective page template.
    include( get_page_template() );
}