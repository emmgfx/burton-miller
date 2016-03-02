<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!--
    Burton & Miller is a free Wordpress Theme designed by Jordi Manuel
	(@jordimanuel)and developed by Josep Viciana (@emmgfx).

    All the code is open source and you can improve it in his repository, and I
    hope you make it, but anyway, you should respect the license terms indicated
    on the LICENSE file, placed in the root and available in the repository.

    The MIT License (MIT)

    Copyright (c) 2015 Josep Viciana

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in all
    copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
    SOFTWARE.
    -->

    <?php
    $option = array(
    	// 'procastinate_fonts' => intval(get_option('procastinate-fonts', 1)) == 1,
        // 'sidebar_active' => intval(get_option('sidebar-active')) == 1,
    );
    ?>
    <title><?php wp_title(''); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
	<link href="<?PHP echo get_template_directory_uri(); ?>/assets/img/icons/favicon.ico" rel="shortcut icon">
	<link href="<?PHP echo get_template_directory_uri(); ?>/assets/img/icons/touch.png" rel="apple-touch-icon-precomposed">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="expires" content="<?php echo gmdate ("D, d M Y H:i:s", time() + 60*60*24*7); ?>">
    <meta http-equiv="Cache-control" content="public">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <?php if(is_home()): ?>
    	<div class="header without-image white-text" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-header2.jpg">

    		<div class="navigation">
    			<h1 class="pull-left hidden-xs"><a href="<?php echo get_site_url(); ?>"><?php bloginfo('title'); ?></a></h1>
    			<div align="center" class="visible-xs">
    				<a href="#" class="mobile-menu-toggler">
    					<div id="hamburger">
    					  <span></span>
    					  <span></span>
    					  <span></span>
    					  <span></span>
    					</div>
    				</a>
    			</div>

                <?PHP
                wp_nav_menu(array(
                    'theme_location'  => 'header',
                    'menu'            => 'header',
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'menu list-unstyled list-inline pull-right hidden-xs',
                    'menu_id'         => 'header',
                    'echo'            => true,
                    'fallback_cb'     => '',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => -1,
                    'walker'          => ''
                ));
                ?>

    		</div>

    		<div class="lead-text">
    			<div class="container">
    				<div class="lead">
    					<p><?php bloginfo('description'); ?></p>
    				</div>
    			</div>
    		</div>

        		<!-- <div class="container header-image">
        			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-header.png" class="center-block img-responsive" />
        		</div> -->
    	</div>
    <?php else: ?>
        <div class="header single">

    		<div class="navigation">
    			<h1 class="pull-left hidden-xs"><a href="<?php echo get_site_url(); ?>"><?php bloginfo('title'); ?></a></h1>
    			<div align="center" class="visible-xs">
    				<a href="#" class="mobile-menu-toggler">
    					<div id="hamburger">
    					  <span></span>
    					  <span></span>
    					  <span></span>
    					  <span></span>
    					</div>
    				</a>
    			</div>

                <?PHP
                wp_nav_menu(array(
                    'theme_location'  => 'header',
                    'menu'            => 'header',
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'menu list-unstyled list-inline pull-right hidden-xs',
                    'menu_id'         => 'header',
                    'echo'            => true,
                    'fallback_cb'     => '',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => -1,
                    'walker'          => ''
                ));
                ?>

    		</div>
    	</div>
    <?php endif; ?>
