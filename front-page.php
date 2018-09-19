<?php get_header(); ?>


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
					
					<?php $expoUrl = 'reserva-tecnica/#/?fetch_only%5B0%5D=thumbnail&fetch_only%5B1%5D=creation_date&fetch_only%5B2%5D=author_name&fetch_only%5B3%5D=title&fetch_only%5B4%5D=description&fetch_only%5Bmeta%5D%5B0%5D=0&view_mode=masonry&perpage=48&paged=1&order=DESC&orderby=date&taxquery%5B0%5D%5Btaxonomy%5D=tnc_tax_85161&taxquery%5B0%5D%5Bterms%5D={{TERM_ID}}&taxquery%5B0%5D%5Bcompare%5D=IN'; ?>
					
					<ul>
						<li>
							<a href="<?php echo site_url( str_replace('{{TERM_ID}}', 21291, $expoUrl) ); ?>">
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/demartin.jpg'; ?>" alt="Coleção">
								<strong>De Martino</strong>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url( str_replace('{{TERM_ID}}', 21486, $expoUrl) ); ?>">
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/retratos.jpg'; ?>" alt="Coleção">
								<strong>Retratos do Império</strong>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url( str_replace('{{TERM_ID}}', 21361, $expoUrl) ); ?>">
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
				
					<div class="highlights-list margin-bottom-25">
						<div class="margin-two-column">
							<div class="highlights-list__title-box">
								<h3 class="highlights-list__title">Itens mais visitados</h3>
								<span class="highlights-list__sub">Subtítulo, se necessário for.</span>
							</div>
						</div>

						<div class="wrapper-highlights-squares">
							<ul class="highlights-squares">
								
								<?php while ($popularItems->have_posts()): $popularItems->the_post(); ?>
								
									<li>
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail('tainacan-medium-full'); ?>
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