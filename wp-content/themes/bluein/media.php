<?php
/*
Template Name: Media

*/
?>

<?php get_header(); ?>

<section class="media">
<h2 class=" d-flex justify-content-center row">  <?php // the_title(); ?></h2>
<aside  id="sidebar" >



	<ul>

	<?php dynamic_sidebar('media'); ?>

	</ul>


</aside>

</section>
<section id="sectionPrincipale">
<section id="derniers_albums" class="boite-couleur-2">
		<a href="<?php echo get_post_type_archive_link( 'musiques' ); ?>"><h2 class="d-flex justify-content-center">Dernier album</h2></a>
	<?php
		$args = array(
			'post_type' => 'musiques',


			'orderby' => 'date',
			'order' => 'DESC',
		);
		$queryMusiques = new WP_query($args);
	?>
	<?php if($queryMusiques->have_posts()) : ?>
		<?php while($queryMusiques->have_posts()) : $queryMusiques->the_post(); ?>


	<article>

	<figure class="container col-md-6">
		<?php the_post_thumbnail(); ?>
		<figcaption class="titre d-flex justify-content-center"><?php echo get_post_meta($post->ID, 'album', true); ?></figcaption>
	</figure>
<div class="container row d-flex justify-content-center">


	<!-- Récupération du fichier client stocké sur le serveur -->
	<audio controls class="col-xs-6">
		<source src="http://localhost/bluein/wp-content/uploads/2019/06/<?php echo get_post_meta($post->ID, 'fichier_musique', true); ?>" type="audio/mp3">

	Your browser does not support the audio element.
	</audio>
		<h3 class="col-xs-6"><?php echo get_post_meta($post->ID, 'album', true); ?> -  <?php echo get_post_meta($post->ID, 'nom_extraits', true); ?> </h3>
</div>
<div class="container row d-flex justify-content-center">


		<!-- Récupération du fichier client stocké sur le serveur -->
		<audio controls class="col-xs-6">
			<source src="http://localhost/bluein/wp-content/uploads/2019/06/<?php echo get_post_meta($post->ID, 'fichier_musique', true); ?>" type="audio/mp3">

		Your browser does not support the audio element.
		</audio>
			<h3 class="col-xs-6"><?php echo get_post_meta($post->ID, 'album', true); ?> -  <?php echo get_post_meta($post->ID, 'nom_extraits', true); ?> </h3>
	</div>
	<div class="container row d-flex justify-content-center">


			<!-- Récupération du fichier client stocké sur le serveur -->
			<audio controls class="col-xs-6">
				<source src="http://localhost/bluein/wp-content/uploads/2019/06/<?php echo get_post_meta($post->ID, 'fichier_musique', true); ?>" type="audio/mp3">

			Your browser does not support the audio element.
			</audio>
				<h3 class="col-xs-6"><?php echo get_post_meta($post->ID, 'album', true); ?> -  <?php echo get_post_meta($post->ID, 'nom_extraits', true); ?> </h3>
		</div>
		<div class="container row d-flex justify-content-center">


				<!-- Récupération du fichier client stocké sur le serveur -->
				<audio controls class="col-xs-6">
					<source src="http://localhost/bluein/wp-content/uploads/2019/06/<?php echo get_post_meta($post->ID, 'fichier_musique', true); ?>" type="audio/mp3">

				Your browser does not support the audio element.
				</audio>
					<h3 class="col-xs-6"><?php echo get_post_meta($post->ID, 'album', true); ?> -  <?php echo get_post_meta($post->ID, 'nom_extraits', true); ?> </h3>
			</div>
			<div class="container row d-flex justify-content-center">


					<!-- Récupération du fichier client stocké sur le serveur -->
					<audio controls class="col-xs-6">
						<source src="http://localhost/bluein/wp-content/uploads/2019/06/<?php echo get_post_meta($post->ID, 'fichier_musique', true); ?>" type="audio/mp3">

					Your browser does not support the audio element.
					</audio>
						<h3 class="col-xs-6"><?php echo get_post_meta($post->ID, 'album', true); ?> -  <?php echo get_post_meta($post->ID, 'nom_extraits', true); ?> </h3>
				</div>
				<div class="container row d-flex justify-content-center">


						<!-- Récupération du fichier client stocké sur le serveur -->
						<audio controls class="col-xs-6">
							<source src="http://localhost/bluein/wp-content/uploads/2019/06/<?php echo get_post_meta($post->ID, 'fichier_musique', true); ?>" type="audio/mp3">

						Your browser does not support the audio element.
						</audio>
							<h3 class="col-xs-6"><?php echo get_post_meta($post->ID, 'album', true); ?> -  <?php echo get_post_meta($post->ID, 'nom_extraits', true); ?> </h3>
					</div>


	</article>


		<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
</section>
</section>
<?php get_footer(); ?>
