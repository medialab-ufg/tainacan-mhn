<?php get_header(); ?>


<!-- Get the banner to display -->
<?php get_template_part( 'template-parts/bannerheader' ); ?>
<!-- Get the menu if is create in panel admin -->
<?php get_template_part( 'template-parts/menubellowbanner' ); ?>

<div class="container-fluid margin-top-95 max-large">
	<div class="row">

		<div class="col margin-one-column px-0">
			<div id="content" role="main">
				<div class="highlights-list margin-bottom-25">
					<div class="margin-two-column">
						<div class="highlights-list__title-box">
							<h3 class="highlights-list__title">Exposições</h3>
							<span class="highlights-list__sub">A partir das coleções digitalizadas, o MHN propõe um recorte curatorial e oferece ao público exposições inéditas – confira!</span>
						</div>
					</div>

					<ul>
						<li>
							<a href="<?php echo get_term_link($expo_martino_term_id, $expo_taxonomy); ?>#/?perpage=96">
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/demartin.jpg'; ?>" alt="Coleção">
								<strong>Marinhas - De Martino</strong>
							</a>
						</li>
						<li>
							<a href="<?php echo get_term_link($expo_retratos_term_id, $expo_taxonomy); ?>#/?perpage=96">
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/retratos.jpg'; ?>" alt="Coleção">
								<strong>Retratos do Império</strong>
							</a>
						</li>
						<li>
							<a href="<?php echo get_term_link($expo_paisagens_term_id, $expo_taxonomy); ?>#/?perpage=96">
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/paisagens.jpg'; ?>" alt="Coleção">
								<strong>Paisagens cariocas</strong>
							</a>
						</li>
					</ul>
				</div>
				<?php 
				global $MHNViewCounter;
				$popularItems = $MHNViewCounter->get_items(3);
				?>

				<?php if ($popularItems->have_posts()) : ?>

					<div class="highlights-list margin-bottom-25 margin-top-95">
						<div class="margin-two-column">
							<div class="highlights-list__title-box">
								<h3 class="highlights-list__title">Itens mais acessados</h3>
								<span class="highlights-list__sub">Conheça as peças de nosso acervo mais populares entre nossos visitantes.</span>
							</div>
						</div>

						<div class="wrapper-highlights-squares">
							<ul class="highlights-squares">
								
								<?php while ($popularItems->have_posts()): $popularItems->the_post(); ?>
								
									<li>
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail('tainacan-medium'); ?>
											<strong><?php the_title(); ?></strong>
										</a>
									</li>

								<?php endwhile; ?>

							</ul>
						</div>
					</div>

				<?php endif; ?>

				<?php //get_template_part('template-parts/loop', 'singular'); ?>
			</div><!-- /#content -->
		</div>
	</div><!-- /.row -->
</div>


<?php get_footer(); ?>
