<?php get_header(); ?>
	<main>
		<div class=" bloc-colorLight py-4">
			<div class="container">
				<div class="row">
					<?php
						$args = array(
							'posts_per_page' => 1,
							'category_name' => 'citation',
							'orderby' => 'rand'
						);
						$query_cit = new WP_query($args);
					 ?>
				 	<?php if($query_cit->have_posts()) : ?>
					<?php while($query_cit->have_posts()) : $query_cit->the_post(); ?>
						<div class="col-12 txt-center">
							<h3><?php the_title(); ?></h3>
							<?php the_content();?>
						</div>
					<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-12">
					<h3 class="txt-center txt-lg">Catégorie : <?php single_cat_title(); ?></h3>
				</div>
			</div>
			<div class="row">
				<?php
// 					print_r($wp_query);
// 					var_dump($wp_query->query_vars);
					$actualCatID = get_query_var('cat');
					$args = array(
						'cat' => $actualCatID,
						'posts_per_page' => -1,
						'orderby' => 'title',
						'order' => 'ASC'
					);
					query_posts($args);
				?>
				<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
					<div class="col-6">
						<div class="poster border-colorHot txt-center">
							<figure>
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('large'); ?>
								</a>
							</figure>
							<div class="poster-content">
								<h4>
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h4>
								<p><?php the_category(' | '); ?></p>
								<p><?php the_tags('', ' | '); ?></p>
								<hr />
								<p><?php echo mb_strimwidth(get_the_excerpt(), 0, 149, '...'); ?></p>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<div class="row">
				<div class="col-12">
					<?php echo paginate_links(); ?>
				</div>
			</div>
		</div>
	</main>

<?php get_footer(); ?>








		
