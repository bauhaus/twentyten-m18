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

add_action('init', 'm18_register_post_types');
function m18_register_post_types() 
{
  $m18_protokoll_labels = array(
    'name' => _x('Protokolle', 'post type general name'),
    'singular_name' => _x('Protokoll', 'post type singular name'),
    'add_new' => _x('Neues', 'm18_protokoll'),
    'add_new_item' => __('Neues Protokoll hinzufŸgen'),
    'edit_item' => __('Protokoll bearbeiten'),
    'new_item' => __('Neues Protokoll'),
    'view_item' => __('Protokoll ansehen'),
    'search_items' => __('Protokolle suchen'),
    'not_found' =>  __('Keine Protokoll gefunden'),
    'not_found_in_trash' => __('Keine Protokoll im Trash gefunden'), 
    'parent_item_colon' => ''
  );
  $m18_protokoll_args = array(
  	'description' => ( 'Protokolle der M18' ),
    'labels' => $m18_protokoll_labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'protokoll' ),
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','author', 'revisions' ),
    'menu_position' => ( '6' )
  ); 
  $m18_termin_labels = array(
    'name' => _x('Termine', 'post type general name'),
    'singular_name' => _x('Termin', 'post type singular name'),
    'add_new' => _x('Neuer', 'm18_termin'),
    'add_new_item' => __('Neuen Termin hinzufŸgen'),
    'edit_item' => __('Termin bearbeiten'),
    'new_item' => __('Neuer Termin'),
    'view_item' => __('Termin ansehen'),
    'search_items' => __('Termine suchen'),
    'not_found' =>  __('Keine Termine gefunden'),
    'not_found_in_trash' => __('Keine Termine im Trash gefunden'), 
    'parent_item_colon' => ''
  );
  $m18_termin_args = array(
  	'description' => ( 'Termine der M18' ),
    'labels' => $m18_termin_labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'termin' ),
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','author', 'revisions' ),
    'menu_position' => ( '5' )
  ); 
  register_post_type('m18_protokoll',$m18_protokoll_args);
  register_post_type('m18_termin',$m18_termin_args);
}

include 'different-type/different-type.php';
