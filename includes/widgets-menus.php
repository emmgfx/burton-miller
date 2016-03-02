<?php

function bm_menus() {
    register_nav_menus(
        array(
            'header' => 'Header Menu',
            'footer' => 'Footer Menu',
        )
    );
}

function bm_widgets() {

	// register_sidebar( array(
	// 	'name'          => 'Footer widget zone',
	// 	'id'            => 'footer',
	// 	'before_widget' => '<div class="col-md-4 col-sm-4 col-xs-12"><div class="widget">',
	// 	'after_widget'  => '</div></div>',
	// 	'before_title'  => '<h3>',
	// 	'after_title'   => '</h3>',
	// ) );

}

add_action( 'init', 'bm_menus' );
add_action( 'widgets_init', 'bm_widgets' );

?>
