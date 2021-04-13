<?php get_header(); ?>





<section class="boite-couleur-1 container">


	<h2 class="d-flex justify-content-center"><?php single_term_title(); ?></h2>

	<?php
	//Taxonomie fonctionnelle
	// 	print_r($wp_query);
	// 	var_dump($wp_query->query_vars);
		$term = get_query_var('musiquesstyles');
		$args = array(
					'post_type' => 'musiques',
					'orderby' => 'title',
					'tax_query' => array(
						array(
						'taxonomy' => 'musiquesstyles',
						'field' => 'slug',
						'terms' => $term
						)
					)
				);
		$query_musique = new WP_query($args);
	?>



	<?php if($query_musique->have_posts()) : ?>
		<?php while($query_musique->have_posts()) : $query_musique->the_post(); ?>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<figure class="container col-md-6">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('medium'); ?>
				</a>
			</figure>

			<p><?php the_terms($post->ID,'musiquesstyles', 'Thèmes : '); ?></p>
			<p><?php the_excerpt(); ?></p>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>

</section>
<?php get_footer(); ?>
