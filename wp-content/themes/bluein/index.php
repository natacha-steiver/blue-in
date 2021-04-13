<?php
/*
Template Name: Accueil

*/
?>
<!--Intégration du header-->
<?php get_header(); ?>
<!--Description du groupe : article de base -->
<main id="sectionPrincipale">
  <section id="description" class="boite-couleur-3">
    <?php
      $args = array(
        'p' => 54
      );
      $query_description = new WP_query($args);
     ?>
    <?php if($query_description->have_posts()) : ?>
    <?php while($query_description->have_posts()) : $query_description->the_post(); ?>

            <article>
              <h2 class=" d-flex justify-content-center">  <?php the_title(); ?></h2>
              <figure>  <?php the_post_thumbnail(); ?></figure>

                <?php the_content(); ?>



            </article>

    <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </section>


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



  <section id="derniers_albums" class="boite-couleur-2">
      <a href="<?php echo get_post_type_archive_link( 'musiques' ); ?>"><h2 class="d-flex justify-content-center">Dernier album</h2></a>
    <?php
      $args = array(
        'post_type' => 'musiques',
        'posts_per_page' => 1,

        'orderby' => 'date',
        'order' => 'DESC',
      );
      $queryMusiques = new WP_query($args);
    ?>
    <?php if($queryMusiques->have_posts()) : ?>
      <?php while($queryMusiques->have_posts()) : $queryMusiques->the_post(); ?>


    <article>

    <figure>
      <?php the_post_thumbnail(); ?>
      <figcaption class="titre d-flex justify-content-center"><?php echo get_post_meta($post->ID, 'album', true); ?></figcaption>
    </figure>
<div class="container row ">


    <!-- Récupération du fichier client stocké sur le serveur -->
    <audio controls class="col-xs-6">
      <source src="http://localhost/bluein/wp-content/uploads/2019/06/<?php echo get_post_meta($post->ID, 'fichier_musique', true); ?>" type="audio/mp3">

    Your browser does not support the audio element.
    </audio>
      <h3 class="col-xs-6"><?php echo get_post_meta($post->ID, 'album', true); ?> -  <?php echo get_post_meta($post->ID, 'nom_extraits', true); ?> </h3>
  </div>
  <div class="container row ">


      <!-- Récupération du fichier client stocké sur le serveur -->
      <audio controls class="col-xs-6">
        <source src="http://localhost/bluein/wp-content/uploads/2019/06/<?php echo get_post_meta($post->ID, 'fichier_musique', true); ?>" type="audio/mp3">

      Your browser does not support the audio element.
      </audio>
        <h3 class="col-xs-6"><?php echo get_post_meta($post->ID, 'album', true); ?> -  <?php echo get_post_meta($post->ID, 'nom_extraits', true); ?> </h3>
    </div>
    <div class="container row ">


        <!-- Récupération du fichier client stocké sur le serveur -->
        <audio controls class="col-xs-6">
          <source src="http://localhost/bluein/wp-content/uploads/2019/06/<?php echo get_post_meta($post->ID, 'fichier_musique', true); ?>" type="audio/mp3">

        Your browser does not support the audio element.
        </audio>
          <h3 class="col-xs-6"><?php echo get_post_meta($post->ID, 'album', true); ?> -  <?php echo get_post_meta($post->ID, 'nom_extraits', true); ?> </h3>
      </div>
      <div class="container row ">


          <!-- Récupération du fichier client stocké sur le serveur -->
          <audio controls class="col-xs-6">
            <source src="http://localhost/bluein/wp-content/uploads/2019/06/<?php echo get_post_meta($post->ID, 'fichier_musique', true); ?>" type="audio/mp3">

          Your browser does not support the audio element.
          </audio>
            <h3 class="col-xs-6"><?php echo get_post_meta($post->ID, 'album', true); ?> -  <?php echo get_post_meta($post->ID, 'nom_extraits', true); ?> </h3>
        </div>
        <div class="container row ">


            <!-- Récupération du fichier client stocké sur le serveur -->
            <audio controls class="col-xs-6">
              <source src="http://localhost/bluein/wp-content/uploads/2019/06/<?php echo get_post_meta($post->ID, 'fichier_musique', true); ?>" type="audio/mp3">

            Your browser does not support the audio element.
            </audio>
              <h3 class="col-xs-6"><?php echo get_post_meta($post->ID, 'album', true); ?> -  <?php echo get_post_meta($post->ID, 'nom_extraits', true); ?> </h3>
          </div>
          <div class="container row ">


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


  <section id="derniers_articles" class="boite-couleur-1">
      <a href="<?php echo get_post_type_archive_link( 'articles' ); ?>">    <h2 class="d-flex justify-content-center">Dernier Article   <!--Faut récupérer la catégorie idéalement... --></h2></a>

  <!--idéalement faire un custom posts articles -->
    <?php
  		$args = array(
        'post_type' => 'articles',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
  		);
  		$query_article = new WP_query($args);
  	 ?>
  	<?php if($query_article->have_posts()) : ?>
  	<?php while($query_article->have_posts()) : $query_article->the_post(); ?>

  					<article>

                <figure>  <?php the_post_thumbnail(); ?></figure>
                <h2 class="d-flex justify-content-end">
                    <?php   echo  $nom_evenement = get_post_meta($post->ID, 'nom_evenement', true); ?>
                </h2>
                <p class="d-flex justify-content-end">

                  <?php echo $date_evenement = get_post_meta($post->ID, 'date_evenement', true);?>
                </p>

                  <h2 ><?php the_title(); ?></h2>

  						<div class="contenu">	<?php the_excerpt(); ?></div>
                <button id="lire"><a href="<?php echo get_the_permalink(); ?> ">Lire la suite</a></button>


  					</article>

  	<?php endwhile; ?>
  	<?php endif; ?>
  	<?php wp_reset_postdata(); ?>

  </section>



</main>
<?php get_footer(); ?>
