<?php

require_once 'includes/widgets-menus.php';

add_filter( 'wp_title', 'hack_wp_title_for_home' );

function hack_wp_title_for_home( $title ){
	if( empty( $title ) && ( is_home() || is_front_page() ) ):
		return get_bloginfo( 'name' ) . ' | ' . get_bloginfo( 'description' );
	else:
		return get_bloginfo( 'name' ) . ' | ' . $title;
	endif;
	return $title;
}

?>
