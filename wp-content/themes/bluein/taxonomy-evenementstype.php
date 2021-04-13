<?php get_header(); ?>





<section class="boite-couleur-1 container">


	<h2 class="d-flex justify-content-center"><?php single_term_title(); ?></h2>

	<?php
	//Taxonomie fonctionnelle
	// 	print_r($wp_query);
	// 	var_dump($wp_query->query_vars);
		$term = get_query_var('evenementstype');
		$args = array(
					'post_type' => 'evenements',
					'orderby' => 'title',
					'tax_query' => array(
						array(
						'taxonomy' => 'evenementstype',
						'field' => 'slug',
						'terms' => $term
						)
					)
				);
		$query_evenement = new WP_query($args);
	?>



	<?php if($query_evenement->have_posts()) : ?>
		<?php while($query_evenement->have_posts()) : $query_evenement->the_post(); ?>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<figure>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('medium'); ?>
				</a>
			</figure>

			<p><?php the_terms($post->ID,'evenementstype', 'Evènements : '); ?></p>
			<p><?php the_excerpt(); ?></p>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>



	<?php
	//Taxonomie fonctionnelle
	// 	print_r($wp_query);
	// 	var_dump($wp_query->query_vars);
		$term = get_query_var('evenementstype');
		$args = array(
					'post_type' => 'articles',
					'orderby' => 'title',
					'tax_query' => array(
						array(
						'taxonomy' => 'evenementstype',
						'field' => 'slug',
						'terms' => $term
						)
					)
				);
		$query_evenements = new WP_query($args);
	?>



	<?php if($query_evenements->have_posts()) : ?>
		<?php while($query_evenements->have_posts()) : $query_evenements->the_post(); ?>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<figure>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('medium'); ?>
				</a>
			</figure>

			<p><?php the_terms($post->ID,'evenementstype', 'Evènements : '); ?></p>
			<p><?php the_excerpt(); ?></p>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
</section>
<?php get_footer(); ?>
