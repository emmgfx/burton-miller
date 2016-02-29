<!DOCTYPE html>
<html>
<head>
	<title>Burton &amp; Miller</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="main.min.css" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<!-- .header div can have .without-image class, that turns the lead text vertically centered -->

	<div class="header <?=(isset($_GET['image']) ? 'with-image' : 'without-image')?> <?=(isset($_GET['dark']) ? 'white-text' : '')?>" data-parallax="scroll" data-image-src="bg-header<?=(isset($_GET['dark']) ? '2' : '')?>.jpg">

		<div class="navigation">
			<h1 class="pull-left hidden-xs">Burton &amp; Miller</h1>
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
			<ul class="menu list-unstyled list-inline pull-right hidden-xs">
				<li><a href="#about">About</a></li>
				<li><a href="#work">Work</a></li>
				<li><a href="#contact">Contact</a></li>
			</ul>
		</div>

		<div class="lead-text">
			<div class="container">
				<div class="lead">
					<p>Fully free responsive portfolio theme for WordPress</p>
				</div>
			</div>
		</div>

		<!-- div.header-image is an optional element, if it doesn't exists, the parent .header element must have the .without-image class -->
		<?if(isset($_GET['image'])):?>
		<div class="container header-image">
			<img src="img-header.png" class="center-block img-responsive" />
		</div>
		<?endif;?>
	</div>

	<!-- Portfolio -->

	<div class="content-wrapper portfolio">
		<div class="container">
			<div class="row wide-gutter">
				<?php for($i=1; $i<=6; $i++): ?>
					<div class="col-md-4 col-sm-6">
						<div class="item">
							<img src="http://lorempixel.com/500/500/animals/9/" title="title" class="center-block img-responsive img-rounded" />
							<div class="name">Icon Utopia is Live!</div>
							<div class="subtitle">iOS, Android</div>
						</div>
					</div>
				<?php endfor; ?>
			</div>

			<div align="center">
				<div class="spacer-70"></div>
				<a href="#" class="btn btn-burton">View more</a>
			</div>

		</div>
	</div>

	<!-- Social -->

	<div class="content-wrapper">
		<div class="social">
			<p class="social-title">Connect with us</p>
			<ul class="list-unstyled list-inline">
				<li><a href="#" class="btn btn-burton btn-burton-social"><i class="fa fa-fw fa-twitter"></i></a></li>
				<li><a href="#" class="btn btn-burton btn-burton-social"><i class="fa fa-fw fa-facebook"></i></a></li>
				<li><a href="#" class="btn btn-burton btn-burton-social"><i class="fa fa-fw fa-google-plus"></i></a></li>
				<li><a href="#" class="btn btn-burton btn-burton-social"><i class="fa fa-fw fa-tumblr"></i></a></li>
				<li><a href="#" class="btn btn-burton btn-burton-social"><i class="fa fa-fw fa-pinterest-p"></i></a></li>
			</ul>
		</div>
	</div>

	<!-- Footer -->

	<div class="content-wrapper small-padding only-bottom">
		<div class="footer">
			<ul class="list-unstyled list-inline hidden-xs">
				<li><a href="#">About</a></li>
				<li><a href="#">Work</a></li>
				<li><a href="#">Follow us</a></li>
				<li><a href="#">Contact us</a></li>
			</ul>
			<p class="copy">&copy; <?php echo date('Y'); ?> Burton &amp; Miller free template for Wordpress - Made with love in Barcelona</p>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="parallax.min.js"></script>
	<script>
	$(function() {

		var navigation = $(".navigation");
		var menu = $(".navigation .menu");
		var hamburger = $("#hamburger");

		$(window).scroll(function(){
			var scrollTop = $(document).scrollTop();

			if(scrollTop > 100)
				navigation.addClass("scrolled");
			else
				navigation.removeClass("scrolled");
		});

		$(window).resize(function(){
			navigation.removeClass("opened");
			hamburger.removeClass("opened");
		});


		$(".mobile-menu-toggler").click(function(){
			navigation.toggleClass("opened");
			hamburger.toggleClass("opened");
			return false;
		});

	});
	</script>

</body>
</html>
