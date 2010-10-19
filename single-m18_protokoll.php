<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); 

$cat_Architektur = get_cat_ID('Architektur');
$cat_Bauingenieurwesen = get_cat_ID('Bauingenieurwesen');
$cat_Gestaltung = get_cat_ID('Gestaltung');
$cat_Medien = get_cat_ID('Medien');
$cat_StuKo = get_cat_ID('StuKo');
$cat_Initiativen = get_cat_ID('Initiativen');
$cat_Referate = get_cat_ID('Referate');
			
?>

		<div id="container">
			<div id="content" role="main">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
			<?php
			$category = get_the_category(); 
			$category_description = $category[0]->category_description;
			if ( ! empty( $category_description ) )
				echo '<h1 class="page-title"><span>' . $category_description . '<span></h1>';
			?>

				<div id="nav-above" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' , $in_same_cat = TRUE ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' , $in_same_cat = TRUE ); ?></div>
				</div><!-- #nav-above -->

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-meta">
						<?php twentyten_posted_on(); ?>
					</div><!-- .entry-meta -->

					<div class="entry-content">
						<?php if ( function_exists('the_DifferentTypeFacts') ) the_DifferentTypeFacts($post->ID, 'listdata'); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php printf( esc_attr__( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyten' ), get_the_author() ); ?>
								</a>
							</div><!-- #author-link	-->
						</div><!-- #author-description -->
					</div><!-- #entry-author-info -->
<?php endif; ?>

					<div class="entry-utility">
						<?php twentyten_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->
				</div><!-- #post-## -->
				
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' , $in_same_cat = TRUE ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' , $in_same_cat = TRUE ); ?></div>
				</div><!-- #nav-below -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #container -->
		
		<div id="primary" class="widget-area" role="complementary">
			<ul class="xoxo">
			
			<?php
			if ( in_category($cat_Architektur) ) {
				dynamic_sidebar( 'fachschaft-a-widget-area' );
				
			} elseif ( in_category($cat_Bauingenieurwesen) ) {
				dynamic_sidebar( 'fachschaft-b-widget-area' );
				
			} elseif ( in_category($cat_Gestaltung) ) {
				dynamic_sidebar( 'fachschaft-g-widget-area' );
				
			} elseif ( in_category($cat_Medien) ) {
				dynamic_sidebar( 'fachschaft-m-widget-area' );
					
			} elseif ( in_category($cat_StuKo) ) {
				dynamic_sidebar( 'stuko-widget-area' );
				
			} elseif ( in_category($cat_Initiativen) ) {
				dynamic_sidebar( 'initiativen-widget-area' );
				
			} elseif ( in_category($cat_Referate) ) {
				dynamic_sidebar( 'referate-widget-area' );

			} else {
	
				/* (FROM TWENTYTEN) When we call the dynamic_sidebar() function, it'll spit out
				 * the widgets for that widget area. If it instead returns false,
				 * then the sidebar simply doesn't exist, so we'll hard-code in
				 * some default sidebar stuff just in case.
				 */
				 
				if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
				
						<li id="search" class="widget-container widget_search">
							<?php get_search_form(); ?>
						</li>
			
						<li id="archives" class="widget-container">
							<h3 class="widget-title"><?php _e( 'Archives', 'twentyten' ); ?></h3>
							<ul>
								<?php wp_get_archives( 'type=monthly' ); ?>
							</ul>
						</li>
			
						<li id="meta" class="widget-container">
							<h3 class="widget-title"><?php _e( 'Meta', 'twentyten' ); ?></h3>
							<ul>
								<?php wp_register(); ?>
								<li><?php wp_loginout(); ?></li>
								<?php wp_meta(); ?>
							</ul>
						</li>
			
					<?php endif; // end primary widget area ?>
						</ul>
					</div><!-- #primary .widget-area -->
				
				<?php
					// A second sidebar for widgets, just because.
					if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>
				
						<div id="secondary" class="widget-area" role="complementary">
							<ul class="xoxo">
								<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
							</ul>
						</div><!-- #secondary .widget-area -->
				
				<?php endif; ?>
			<?php } ?>

			</ul>
		</div><!-- #primary .widget-area -->

<?php get_footer(); ?>
