<?php get_header(); ?>

<section class="container grid section-musiques ">
	<h2 class="d-flex justify-content-center">Les extraits musicaux</h2>
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
			<article class="boite-noire ">
				<figure class="container col-md-6" >
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>

					<figcaption ><?php //the_excerpt(); ?></figcaption>
				</figure>
				<h2 class="d-flex justify-content-end">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h2>
			<p>	<?php echo mb_strimwidth(get_the_content(), 0, 150, '...'); ?></p>
			  <button id="lire"><a href="<?php the_permalink(); ?>">Lire la suite</a></button>
			</article>
		<?php endwhile; ?>
	<?php endif; ?>

</section>

<?php get_footer(); ?>
