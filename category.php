<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<?php get_header(); ?>

		<div id="container">
			<div id="content" role="main">

			<?php 
			$category_description = category_description();
			if ( ! empty( $category_description ) )
				echo '<h1 class="page-title"><span>' . $category_description . '</span></h1>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

			</div><!-- #content -->
		</div><!-- #container -->

		<div id="primary" class="widget-area" role="complementary">
			<ul class="xoxo">
			
			<?php
			$cat_Architektur = get_cat_ID('Architektur');
			$cat_Bauingenieurwesen = get_cat_ID('Bauingenieurwesen');
			$cat_Gestaltung = get_cat_ID('Gestaltung');
			$cat_Medien = get_cat_ID('Medien');
			$cat_StuKo = get_cat_ID('StuKo');
			$cat_Initiativen = get_cat_ID('Initiativen');
			$cat_Referate = get_cat_ID('Referate');
			$cat_Fachschaft = get_cat_ID('Fachschaft');
			
			if ( in_category($cat_Fachschaft) ) {
				dynamic_sidebar( 'fachschaft-widget-area' );

			} elseif ( in_category($cat_Architektur) ) {
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
				
			} elseif ( in_category($cat_Fachschaft) ) {
				dynamic_sidebar( 'fachschaft-widget-area' );

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
