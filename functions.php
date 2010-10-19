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
    'supports' => array('title','editor','author', 'revisions' ),
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

/* 
Adding meta_box
*/

/* Define the custom box */
add_action('add_meta_boxes', 'm18_add_custom_box');

/* Do something with the data entered */
add_action('save_post', 'm18_save_postdata');

/* Adds a box to the main column on the Post and Page edit screens */
function m18_add_custom_box() {
    add_meta_box( 'm18_sectionid', __( 'Protokolltext', 'm18_textdomain' ), 
                'm18_inner_custom_box', 'm18_protokoll' );
}

/* Prints the box content */
function m18_inner_custom_box() {

  // Use nonce for verification
  wp_nonce_field( plugin_basename(__FILE__), 'm18_noncename' );

  // The actual fields for data entry
  echo '<label for="m18_new_field">' . __("Description for this field", 'm18_textdomain' ) . '</label> ';
  echo '<input type="text" id= "m18_new_field" name="m18_new_field" value="whatever" size="25" />';
}

/* When the post is saved, saves our custom data */
function m18_save_postdata( $post_id ) {

  // verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times

  if ( !wp_verify_nonce( $_POST['m18_noncename'], plugin_basename(__FILE__) )) {
    return $post_id;
  }

  // verify if this is an auto save routine. If it is our form has not been submitted, so we dont want
  // to do anything
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;

  
  // Check permissions
  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
      return $post_id;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
      return $post_id;
  }

  // OK, we're authenticated: we need to find and save the data

  $m18_data = $_POST['m18_new_field'];

  // Do something with $m18_data 
  // probably using add_post_meta(), update_post_meta(), or 
  // a custom table (see Further Reading section below)

   return $m18_data;
}

include 'different-type/different-type.php';