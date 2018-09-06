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
				<?php get_template_part('template-parts/loop', 'singular'); ?>
			</div><!-- /#content -->
		</div>
		
	</div><!-- /.row -->
	
	<?php $noticias = new WP_Query('post_type=post'); ?>
	
	<?php if ($noticias->have_posts()): ?>
	
		<div class="row">
			<div class="col-sm margin-one-column">
				<div class="box-noticias">
					<div class="tainacan-title">
						<div class="border-bottom mb-5 border-jelly-bean tainacan-title-page" style="border-width: 2px !important;">
							<ul class="list-inline mb-1">
								<li class="list-inline-item text-midnight-blue font-weight-bold title-page">
									Notícias
								</li>
								<li class="list-inline-item float-right title-back"><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Ver mais</a></li>
							</ul>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-lg-9">
							<ul class="box-noticias__lista">
								
								<?php while ($noticias->have_posts()): $noticias->the_post(); ?>
								
									<li>
										<h3 class="box-noticias__titulo"><?php the_title(); ?></h3>
										<p><?php the_excerpt(); ?></p>
										<div class="box-noticias__mais">
											<a href="<?php the_permalink(); ?>">Leia mais...</a>
										</div>
									</li>
								
								<?php endwhile; ?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
	
</div>


<?php get_footer(); ?>