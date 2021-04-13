<?php
/*
Template Name: Accueil

*/
?>
<!--Intégration du header-->
<?php get_header(); ?>
<!--Description du groupe : article de base -->
<main id="sectionPrincipale">





  <section id="derniers_albums" class="boite-couleur-2">
    <h2 class="d-flex justify-content-center">Dernier album</h2>

    <?php if(have_posts()) : ?>
      <?php while(have_posts()) : the_post(); ?>


    <article>

    <figure class="container col-md-6">
      <?php the_post_thumbnail(); ?>
      <figcaption class="titre d-flex justify-content-center"><?php echo get_post_meta($post->ID, 'album', true); ?></figcaption>
    </figure>
<div class="container row  d-flex justify-content-center">


    <!-- Récupération du fichier client stocké sur le serveur -->
    <audio controls class="col-xs-6">
      <source src="http://localhost/bluein/wp-content/uploads/2019/06/<?php echo get_post_meta($post->ID, 'fichier_musique', true); ?>" type="audio/mp3">

    Your browser does not support the audio element.
    </audio>
      <h3 class="col-xs-6"><?php echo get_post_meta($post->ID, 'album', true); ?> -  <?php echo get_post_meta($post->ID, 'nom_extraits', true); ?> </h3>
  </div>
  <div class="container row  d-flex justify-content-center">


      <!-- Récupération du fichier client stocké sur le serveur -->
      <audio controls class="col-xs-6">
        <source src="http://localhost/bluein/wp-content/uploads/2019/06/<?php echo get_post_meta($post->ID, 'fichier_musique', true); ?>" type="audio/mp3">

      Your browser does not support the audio element.
      </audio>
        <h3 class="col-xs-6"><?php echo get_post_meta($post->ID, 'album', true); ?> -  <?php echo get_post_meta($post->ID, 'nom_extraits', true); ?> </h3>
    </div>
    <div class="container row  d-flex justify-content-center">


        <!-- Récupération du fichier client stocké sur le serveur -->
        <audio controls class="col-xs-6">
          <source src="http://localhost/bluein/wp-content/uploads/2019/06/<?php echo get_post_meta($post->ID, 'fichier_musique', true); ?>" type="audio/mp3">

        Your browser does not support the audio element.
        </audio>
          <h3 class="col-xs-6"><?php echo get_post_meta($post->ID, 'album', true); ?> -  <?php echo get_post_meta($post->ID, 'nom_extraits', true); ?> </h3>
      </div>
      <div class="container row  d-flex justify-content-center">


          <!-- Récupération du fichier client stocké sur le serveur -->
          <audio controls class="col-xs-6">
            <source src="http://localhost/bluein/wp-content/uploads/2019/06/<?php echo get_post_meta($post->ID, 'fichier_musique', true); ?>" type="audio/mp3">

          Your browser does not support the audio element.
          </audio>
            <h3 class="col-xs-6"><?php echo get_post_meta($post->ID, 'album', true); ?> -  <?php echo get_post_meta($post->ID, 'nom_extraits', true); ?> </h3>
        </div>
        <div class="container row  d-flex justify-content-center">


            <!-- Récupération du fichier client stocké sur le serveur -->
            <audio controls class="col-xs-6">
              <source src="http://localhost/bluein/wp-content/uploads/2019/06/<?php echo get_post_meta($post->ID, 'fichier_musique', true); ?>" type="audio/mp3">

            Your browser does not support the audio element.
            </audio>
              <h3 class="col-xs-6"><?php echo get_post_meta($post->ID, 'album', true); ?> -  <?php echo get_post_meta($post->ID, 'nom_extraits', true); ?> </h3>
          </div>
          <div class="container row  d-flex justify-content-center">


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





</main>
<?php get_footer(); ?>
