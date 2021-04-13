<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<title><?php the_title(); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<?php wp_head(); ?>
</head>
<body class="">


	<?php
		$args = array(
			'p' => 69
		);
		$query_header = new WP_query($args);
	 ?>
	<?php if($query_header->have_posts()) : ?>
	<?php while($query_header->have_posts()) : $query_header->the_post(); ?>

					<header>

<nav role="navigation">
  <div id="menuToggle">
    <!--
    A fake / hidden checkbox is used as click reciever,
    so you can use the :checked selector on it.
    -->
    <input type="checkbox" />

    <!--
    Some spans to act as a hamburger.

    They are acting like a real hamburger,
    not that McDonalds stuff.
    -->
    <span></span>
    <span></span>
    <span></span>

    <!--
    Too bad the menu has to be inside of the button
    but hey, it's pure CSS magic.
    -->
    <ul id="menu" class="navigation-principale navbar">
	<?php wp_nav_menu('menu'); ?>
			<img class=" d-flex align-items-end" id="logo" src="http://localhost/bluein/wp-content/themes/bluein/images/logo.png" alt="">
    </ul>
  </div>
</nav>

							<?php the_content(); ?>

					</header>

	<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
