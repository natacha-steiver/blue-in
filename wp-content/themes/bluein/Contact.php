<?php
/*
Template Name: Contact

*/
?>
<?php get_header(); ?>

<main id="sectionPrincipale">
  <section id="section_contact" class="boite-noire" >

    <?php
      $args = array(
        'post_type' => 'articles',
        'p' => 74
      );
      $query_contact = new WP_query($args);
     ?>
    <?php if($query_contact->have_posts()) : ?>
    <?php while($query_contact->have_posts()) : $query_contact->the_post(); ?>
<h2 class=" d-flex justify-content-center">  <?php the_title(); ?></h2>
      <article>
          <figure>  <?php the_post_thumbnail(); ?></figure>
<h2 class="d-flex justify-content-end">Jean-Marie</h2>
<p class="d-flex justify-content-end">Blues</p>
<h2>Envie de nous contacter ?</h2>
<p>Envoies-moi un email</p>

<div>
  <p >jeanMarie@gmail.com</p>
  <a href="https://mail.google.com"><img id="icone"  src="http://localhost/bluein/wp-content/themes/bluein/images/gmail.png" alt=""></a>
</div>





      </article>

    <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </section>
</main>


<?php get_footer(); ?>
