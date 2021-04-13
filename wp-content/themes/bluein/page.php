
<?php get_header(); ?>
  <section id="derniers_articles" class="boite-couleur-1 row">
    <h2  id="categorie" class="col-md-9 d-flex justify-content-center"><?php the_terms($post->ID,'evenements', ' '); ?></h2>
  <!--idéalement faire un custom posts articles -->
    <?php


  	 ?>
  	<?php if(have_posts()) : ?>
  	<?php while(have_posts()) : the_post(); ?>

  					<article class="col-md-9">

                <figure>  <?php the_post_thumbnail(); ?></figure>
                <h2 class="d-flex justify-content-end">
                    <?php   echo  $nom_evenement = get_post_meta($post->ID, 'nom_evenement', true); ?>
                </h2>
                <p class="d-flex justify-content-end">

                  <?php echo $date_evenement = get_post_meta($post->ID, 'date_evenement', true);?>
                </p>

                  <h2 ><?php the_title(); ?></h2>

  						<div class="contenu">	<?php the_content(); ?></div>





  					</article>

  	<?php endwhile; ?>
  	<?php endif; ?>
  	<?php wp_reset_postdata(); ?>







	<!-- !!! pas de get_sidebar-->
<aside id="sidebar" class="col-md-3 ">

<h3 class="d-flex justify-content-center">Sidebar</h3>

	<ul>
<script>
$(document).ready(function() {

var code= '<a href="<?php echo get_post_type_archive_link( 'articles' ); ?>">Retrouvez tous nos articles</a>'
	$(".widget_search").append("<hr>"+code);
});
</script>
	<?php dynamic_sidebar('before-front-page'); ?>

	</ul>


</aside>
</section>
<?php get_footer(); ?>
