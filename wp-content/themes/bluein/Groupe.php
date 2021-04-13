<?php
/*
Template Name: Groupe

*/
?>
<?php get_header(); ?>

<main id="sectionPrincipale">
  <section id="historique" class="boite-couleur-1">

        <a href="<?php echo get_post_type_archive_link( 'articles' ); ?>">    <h2 class="d-flex justify-content-center">Dernier Article   <!--Faut récupérer la catégorie idéalement... --></h2></a>

    <!--idéalement faire un custom posts articles -->
      <?php
        $args = array(
          'post_type' => 'articles',
          'p' => 79,

        );
        $query_article = new WP_query($args);
       ?>
      <?php if($query_article->have_posts()) : ?>
      <?php while($query_article->have_posts()) : $query_article->the_post(); ?>

              <article>

                  <figure>  <?php the_post_thumbnail(); ?></figure>

                    <h2 class="d-flex justify-content-end"><?php the_title(); ?></h2>

                <div class="contenu">	<?php the_excerpt(); ?></div>
                  <button id="lire"><a href="<?php echo get_the_permalink(); ?> ">Lire la suite</a></button>


              </article>

      <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>



  </section>
  <section id="membres" class="">



    <!--idéalement faire un custom posts articles -->
      <?php
        $args = array(
          'post_type' => 'articles',
          'p' => 80,

        );
        $query_membre = new WP_query($args);
       ?>
      <?php if($query_membre->have_posts()) : ?>
      <?php while($query_membre->have_posts()) : $query_membre->the_post(); ?>
  <h2 class="d-flex justify-content-center"><?php the_title(); ?></h2>
              <article>

                  <figure>  <?php the_post_thumbnail(); ?></figure>


            <ul id="liste" class="d-flex justify-content-center">

                 <?php
                 $test= get_post_meta($post->ID, 'groupe', true);
                 $groupes = explode(",",$test);
                 foreach($groupes as $groupe) {
                             echo '<li><img class="perso" src="http://localhost/bluein/wp-content/themes/bluein/images/membre.png" alt="" />' . $groupe .'</li>';
                         }
                 ?>
            </ul>






              </article>

      <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>



  </section>


  <section id="presse" class="boite-couleur-1">

        <a href="<?php echo get_post_type_archive_link( 'articles' ); ?>">    <h2 class="d-flex justify-content-center">Dernier Article   <!--Faut récupérer la catégorie idéalement... --></h2></a>

    <!--idéalement faire un custom posts articles -->
      <?php
        $args = array(
          'post_type' => 'articles',
          'p' => 81,

        );
        $query_article = new WP_query($args);
       ?>
      <?php if($query_article->have_posts()) : ?>
      <?php while($query_article->have_posts()) : $query_article->the_post(); ?>

              <article>

                  <figure>  <?php the_post_thumbnail(); ?></figure>

                    <h2 class="d-flex justify-content-end"><?php the_title(); ?></h2>

                <div class="contenu">	<?php the_excerpt(); ?></div>

                  <button id="lire"><a href="http://localhost/bluein/wp-content/uploads/2019/06/<?php echo get_post_meta($post->ID, 'fichier', true); ?>" >Télécharge notre pdf</a></button>


              </article>

      <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>



  </section>


</main>
<?php get_footer(); ?>
