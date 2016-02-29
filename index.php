<?php get_header(); ?>

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

<?php get_footer(); ?>
