<?php
/*
 * TwentyTen M18 functions
*/

/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'twentyten_m18_setup' );

if ( ! function_exists( 'twentyten_m18_setup' ) ):
function twentyten_m18_setup() {
	/* Register new widgetized area, M18 Sidebars  */
	function twentyten_m18_widgets_init() {
	// Widget Area for Page Stuko.
	register_sidebar( array(
		'name' => __( 'StuKo Sidebar', 'twentyten' ),
		'id' => 'stuko-widget-area',
		'description' => __( 'The Sidebar for the "StuKo" Page', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Widget Area for Page Struktur.
	register_sidebar( array(
		'name' => __( 'Struktur Sidebar', 'twentyten' ),
		'id' => 'struktur-widget-area',
		'description' => __( 'The Sidebar for the "Struktur" Page', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Widget Area for Page Referate.
	register_sidebar( array(
		'name' => __( 'Referate Sidebar', 'twentyten' ),
		'id' => 'referate-widget-area',
		'description' => __( 'The Sidebar for the "Referate" Page', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Widget Area for Page Fachschaften.
	register_sidebar( array(
		'name' => __( 'Fachschaften Sidebar', 'twentyten' ),
		'id' => 'fachschaft-widget-area',
		'description' => __( 'The Sidebar for the "Fachschaften" Page', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Widget Area for Page Fachschaft A.
	register_sidebar( array(
		'name' => __( 'Fachschaft A Sidebar', 'twentyten' ),
		'id' => 'fachschaft-a-widget-area',
		'description' => __( 'The Sidebar for the "Fachschaft A" Page', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Widget Area for Page Fachschaft B.
	register_sidebar( array(
		'name' => __( 'Fachschaft B Sidebar', 'twentyten' ),
		'id' => 'fachschaft-b-widget-area',
		'description' => __( 'The Sidebar for the "Fachschaft B" Page', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Widget Area for Page Fachschaft G.
	register_sidebar( array(
		'name' => __( 'Fachschaft G Sidebar', 'twentyten' ),
		'id' => 'fachschaft-g-widget-area',
		'description' => __( 'The Sidebar for the "Fachschaft G" Page', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Widget Area for Page Fachschaft M.
	register_sidebar( array(
		'name' => __( 'Fachschaft M Sidebar', 'twentyten' ),
		'id' => 'fachschaft-m-widget-area',
		'description' => __( 'The Sidebar for the "Fachschaft M" Page', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Widget Area for Page Initiativen.
	register_sidebar( array(
		'name' => __( 'Initiativen Sidebar', 'twentyten' ),
		'id' => 'initiativen-widget-area',
		'description' => __( 'The Sidebar for the "Initiativen" Page', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	}
	/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
	add_action( 'widgets_init', 'twentyten_m18_widgets_init' );
}
endif;

include 'different-type/different-type.php';