<?php
/*
Template Name: Agenda

*/
?>
<?php get_header(); ?>
<main id="sectionPrincipale">
  <section id="description" class="boite-couleur-3">
    <?php
      $args = array(
        'p' => 103
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













      <!-- Dernier évènement :custom post-->



      <section id="derniers_articles" class="boite-couleur-1">


      <!--idéalement faire un custom posts articles -->
      <?php
        $args = array(
          'category_name'=>'evenements'
        );
        $query_description = new WP_query($args);
       ?>
      <?php if($query_description->have_posts()) : ?>
      <?php while($query_description->have_posts()) : $query_description->the_post(); ?>
  <h2 class=" d-flex justify-content-center">  <?php the_title(); ?></h2>
              <article>

                <figure>  <?php the_post_thumbnail(); ?></figure>

                  <?php the_content(); ?>



              </article>

      <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>





      </section>



    <aside id="sidebar" class="col-md-3 ">



    	<ul>

    	<?php dynamic_sidebar('calendrier'); ?>

    	</ul>


    </aside>
  </section>
</main>
<?php get_footer(); ?>
