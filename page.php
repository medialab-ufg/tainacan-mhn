<?php get_header(); ?>

<div class="container-fluid mt-5 max-large">
	<div class="row">

		<div class="col-sm margin-one-column">
			<div id="content" role="main">
				<?php get_template_part( 'template-parts/loop', 'singular' ); ?>
			</div><!-- /#content -->
		</div>
	</div><!-- /.row -->
</div>
<?php get_footer(); ?>
