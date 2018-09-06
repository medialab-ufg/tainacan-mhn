<?php get_header(); ?>

<!-- Get the menu if is create in panel admin -->
<?php get_template_part( 'template-parts/menuAboveBanner' ); ?>
<!-- Get the banner to display -->
<?php get_template_part( 'template-parts/bannerHeader' ); ?>
<!-- Get the menu if is create in panel admin -->
<?php get_template_part( 'template-parts/menuBellowBanner' ); ?>

<div class="container-fluid margin-top-95 max-large">
	<div class="row">

		<div class="col-sm margin-one-column">
			<div id="content" role="main">
				<div class="highlights-list margin-bottom-25">
					<div class="highlights-list__title-box">
						<h3 class="highlights-list__title">Exposições em destaque</h3>
						<span class="highlights-list__sub">Subtítulo, se necessário for.</span>
					</div>

					<ul>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/fke/colecao_001.jpg'; ?>" alt="Coleção">
								<strong>Aspectos do Brasil republicano</strong>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/fke/colecao_001.jpg'; ?>" alt="Coleção">
								<strong>Retratos do Império</strong>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/fke/colecao_001.jpg'; ?>" alt="Coleção">
								<strong>Paisagens cariocas</strong>
							</a>
						</li>
					</ul>
				</div>
				<?php //get_template_part('template-parts/loop', 'singular'); ?>
			</div><!-- /#content -->
		</div>
	</div><!-- /.row -->
</div>


<?php get_footer(); ?>