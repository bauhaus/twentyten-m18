<?php
/**
 * Template Name: FS B Posts + Sidebar
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
<h1 style="clear: none; float: left;" class="page-title"><span>Alle Nachrichten der Fachschaft B</span></h1>

<?php 

if ( current_user_can('edit_post') ) { ?>

	<h2 style="
		clear: none;
		float: right;
		line-height: 1.9em;
	"><a style="text-decoration: none;" href="
		javascript:var d=document,w=window,e=w.getSelection,k=d.getSelection,x=d.selection,s=(e?e():(k)?k():(x?x.createRange().text:0)),f='',l=d.location,e=encodeURIComponent,u='http://m18.bau-ha.us/wp-admin/press-this.php?u=&t=&s=&v=4';a=function(){if(!w.open(u,'t','toolbar=0,resizable=1,scrollbars=1,status=1,width=810,height=570'))l.href=u;};if (/Firefox/.test(navigator.userAgent)) setTimeout(a, 0); else a();void(0)
	" title="M18 - Neuer Beitrag">&#8853; Neuer Beitrag</a></h2>
	<h3 style="float: right;width: 23%;"><small>(Nicht vergessen: Richtige Kategorie anklicken. Sorry!)</small></h3>
	
<?php
}

$catID = get_cat_ID('Bauingenieurwesen');
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

			<?php dynamic_sidebar('fachschaft-b-widget-area'); ?>
			<?php get_footer(); ?>
			</ul>
		</div><!-- #primary .widget-area -->