<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!--
    Burton & Miller is a free Wordpress Theme designed by Jordi Manuel
	(@jordimanuel) and developed by Josep Viciana (@emmgfx).

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
        'home-header-bg-attachment' => get_option('home-header-bg-attachment'),
        'home-header-img-attachment' => get_option('home-header-img-attachment'),
        'home-header-white-text' => intval(get_option('home-header-white-text', 0)) == 1,
    );

    $haveHeaderImage = !empty($option['home-header-img-attachment']);
    $haveHeaderBG = !empty($option['home-header-bg-attachment']);

    if($haveHeaderImage)
        $headerImage = wp_get_attachment_url($option['home-header-img-attachment']);

    if($haveHeaderBG)
        $headerBG = wp_get_attachment_url($option['home-header-bg-attachment']);

    function showMenu(){
        echo '<ul id="header" class="menu list-unstyled list-inline pull-right hidden-xs">';
            echo '<li class="visible-xs"><a href="'.get_home_url().'">Home</a></li>';
            foreach (wp_get_nav_menu_items('header') as $key => $value) {
                echo '<li><a href="'.$value->url.'">'.$value->title.'</a></li>';
            }
        echo '</ul>';
    }

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

    	<div class="header <?php echo ($haveHeaderImage ? 'with-image' : 'without-image'); ?> <?php echo ($option['home-header-white-text'] ? 'white-text' : ''); ?>" data-parallax="scroll" data-image-src="<?php echo $headerBG; ?>">

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
                <?php showMenu(); ?>
    		</div>

    		<div class="lead-text">
    			<div class="container">
    				<div class="lead">
    					<p><?php bloginfo('description'); ?></p>
    				</div>
    			</div>
    		</div>

            <?php if($haveHeaderImage): ?>
    		<div class="container header-image">
    			<img src="<?php echo $headerImage; ?>" class="center-block img-responsive" />
    		</div>
            <?php endif; ?>
    	</div>
    <?php elseif(is_tax()): ?>
        <?php if(has_post_thumbnail()): ?>
        <div class="header single white-text" data-parallax="scroll" data-image-src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() );?>">
        <?php else: ?>
        <div class="header single white-text">
        <?php endif; ?>
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
                <?php showMenu(); ?>
    		</div> <!-- /.navigation -->
            <div class="container title">
                <h2><?php echo get_queried_object()->name ?></h2>
            </div>
    	</div>
    <?php else: ?>
        <?php if(has_post_thumbnail()): ?>
        <div class="header single white-text" data-parallax="scroll" data-image-src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() );?>">
        <?php else: ?>
        <div class="header single white-text">
        <?php endif; ?>
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
                <?php showMenu(); ?>
    		</div> <!-- /.navigation -->

            <?php if(get_post_type() == 'emm_portfolio'): ?>
            <div class="container title">
                <?php $categories = get_the_terms($post->ID, 'project_categories'); ?>
                <h2><?php the_title(); ?></h2>
                <?php if($categories != false): ?>
                <h3>
                    <?php foreach ($categories as $index => $taxonomy ): ?>
                        <a href="<?php echo get_term_link($taxonomy); ?>"><?php echo $taxonomy->name; ?></a><?php if($index < count($categories) - 1){ echo ', '; } ?>
                    <?php endforeach;?>
                </h3>
                <?php endif; ?>
            </div>
            <?php else: ?>
                <div class="container title">
                    <h2><?php the_title(); ?></h2>
                </div>
            <?php endif; ?>

    	</div>
    <?php endif; ?>
