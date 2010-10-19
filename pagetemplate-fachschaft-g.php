<?php
/**
 * Template Name: FS G Posts + Sidebar
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
?>

<?php get_header(); ?>

		<div id="container">
			<div id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->

<?php endwhile; ?>

<!-- List post from category same as page -->
<h1 class="page-title"><span>Alle Nachrichten der Fachschaft Gestaltung</span></h1>

<?php 
$catID = get_cat_ID('Gestaltung');
$args=array(
  'cat' => $catID,
  'post_status' => 'publish',
  'paged' => $paged,
  'posts_per_page' => 10,
  'caller_get_posts'=> 1
);
$temp = $wp_query;  // assign orginal query to temp variable for later use   
$wp_query = null;
$wp_query = new WP_Query($args); 
?>

<?php

 get_template_part( 'loop', 'index' );?>
			</div><!-- #content -->
		</div><!-- #container -->

		<div id="primary" class="widget-area" role="complementary">
			<ul class="xoxo">

			<?php dynamic_sidebar('fachschaft-g-widget-area'); ?>
			<?php get_footer(); ?>
			</ul>
		</div><!-- #primary .widget-area -->