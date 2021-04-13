<?php
/*
Template Name: Accueil

*/
?>
<!--Intégration du header-->
<?php get_header(); ?>
<!--Description du groupe : article de base -->
<main id="sectionPrincipale">



  <!-- Dernier évènement :custom post-->
  <section id="derniers_evenements" class="boite-couleur-1">
    <a href="<?php echo get_post_type_archive_link( 'evenements' ); ?>"><h2 class="d-flex justify-content-center">Dernier évènement</h2></a>
    <?php
      $args = array(
        'post_type' => 'evenements',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
      );
      $queryEvenements = new WP_query($args);
    ?>
    <?php if($queryEvenements->have_posts()) : ?>
      <?php while($queryEvenements->have_posts()) : $queryEvenements->the_post(); ?>


    <article>

    <figure>  <?php the_post_thumbnail(); ?></figure>
    <h2 class="d-flex justify-content-end">  <?php the_title(); ?></h2>
    <p class="d-flex justify-content-end" >Du <?php echo get_post_meta($post->ID, 'date_debut', true); ?> au <?php echo get_post_meta($post->ID, 'date_fin', true); ?> </p>
    <p  class="d-flex justify-content-end">De <?php echo get_post_meta($post->ID, 'heure_debut', true); ?> à <?php echo get_post_meta($post->ID, 'heure_fin', true); ?> </p>
  <div class="contenu">
          <h2>Artistes: </h2>
    <ul >

         <?php
         $test= get_post_meta($post->ID, 'participants', true);
         $participants = explode(",",$test);
         foreach($participants as $participant) {
                     echo '<li>' . $participant . '</li>';
                 }
         ?>
    </ul>

  </div>
    <p><?php echo get_post_meta($post->ID, 'description', true); ?></p>
    </article>


      <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </section>



</main>
<?php get_footer(); ?>
