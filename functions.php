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

// The height and width of our header images
add_filter('twentyten_header_image_height','m18_header_height');
add_filter('twentyten_header_image_width','m18_header_width');
function m18_header_height($size){
   return 150;
}
function m18_header_width($size){
   return 940;
}
   
// Remove default twentyten header images
// source: http://aaron.jorb.in/blog/2010/07/remove-all-default-header-images-in-a-twenty-ten-child-theme/
function m18_remove_twenty_ten_headers(){ 
	unregister_default_headers( array(
		'berries',
		'cherryblossom',
		'concave',
		'fern',
		'forestfloor',
		'inkwell',
		'path' ,
		'sunset')
	);
}
add_action( 'after_setup_theme', 'm18_remove_twenty_ten_headers', 11 );

// adding our header images
function m18_add_headers(){ 

//	$dir = '%s/../twentyten-m18/images/headers/';
	
	/* get content of directory */
	$dircontent = scandir($dir);

	/* filter content (crop thumbnails) */
//	$headers = array();

//	foreach($dircontent as $value){
//		if( (strcmp($value,'.') == 0) || (strcmp($value,'..') == 0) ) {
//		} // directory links


//		elseif( stristr($value,'-thumbnail.jpg') === TRUE  ){
//		} // thumbnails


//		else {
//			array_push($headers,$value);
//		} // all other images

//	}

	/* build register_default_headers */
//	foreach($headers 


	register_default_headers( array (
		'20001122-22.19-BauIng-Bank-im-Flur.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20001122-22.19-BauIng-Bank-im-Flur.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20001122-22.19-BauIng-Bank-im-Flur-thumbnail.jpg',
			'description' => __( 'Bau-Ing-Bank im Flur', 'twentyten' )
		),

		'20091227-23.31-Max-im-Maschinenraum.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20091227-23.31-Max-im-Maschinenraum.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20091227-23.31-Max-im-Maschinenraum-thumbnail.jpg',
			'description' => __( 'Max im Maschinenraum', 'twentyten' )
		),
		
		'20100000-00.00-Der-Aschenbecher-am-Hintereingang.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20100000-00.00-Der-Aschenbecher-am-Hintereingang.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20100000-00.00-Der-Aschenbecher-am-Hintereingang-thumbnail.jpg',
			'description' => __( 'Der Aschenbecher am Hintereingang', 'twentyten' )
		),
		
		'20100000-00.00-Karaoke-im-S140.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20100000-00.00-Karaoke-im-S140.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20100000-00.00-Karaoke-im-S140-thumbnail.jpg',
			'description' => __( 'Karaoke im S140', 'twentyten' )
		),
		
		'20100000-00.00-Max-beim-gaertnern.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20100000-00.00-Max-beim-gaertnern.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20100000-00.00-Max-beim-gaertnern-thumbnail.jpg',
			'description' => __( 'Max beim gaertnern', 'twentyten' )
		),
		
		'20100000-00.00-Micha-im-Garten.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20100000-00.00-Micha-im-Garten.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20100000-00.00-Micha-im-Garten-thumbnail.jpg',
			'description' => __( 'Micha im Garten', 'twentyten' )
		),
		
		'20100000-00.00-Michi-und-Eick-im-Garten.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20100000-00.00-Michi-und-Eick-im-Garten.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20100000-00.00-Michi-und-Eick-im-Garten-thumbnail.jpg',
			'description' => __( 'Michi und Eick im Garten', 'twentyten' )
		),
		
		'20100000-03.41-Martin-im-Maschinenraum.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20100000-03.41-Martin-im-Maschinenraum.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20100000-03.41-Martin-im-Maschinenraum-thumbnail.jpg',
			'description' => __( 'Martin im Maschinenraum', 'twentyten' )
		),
		
		'20100400-00.00-Der-Kickerraum-waehrend-der-Renovierung.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20100400-00.00-Der-Kickerraum-waehrend-der-Renovierung.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20100400-00.00-Der-Kickerraum-waehrend-der-Renovierung-thumbnail.jpg',
			'description' => __( 'Der Kickerraum waehrend der Renovierung', 'twentyten' )
		),
		
		'20100400-00.00-Martin-und-Martin-beim-Renovieren-des-S140.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20100400-00.00-Martin-und-Martin-beim-Renovieren-des-S140.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20100400-00.00-Martin-und-Martin-beim-Renovieren-des-S140-thumbnail.jpg',
			'description' => __( 'Martin und Martin beim Renovieren des S140', 'twentyten' )
		),
		
		'20101119-18.45-Kochen-auf-StuKo-Klausurtagung.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20101119-18.45-Kochen-auf-StuKo-Klausurtagung.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20101119-18.45-Kochen-auf-StuKo-Klausurtagung-thumbnail.jpg',
			'description' => __( 'Kochen auf StuKo Klausurtagung', 'twentyten' )
		),
		
		'20101119-20.28-Abendessen-auf-StuKo-Klausurtagung.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20101119-20.28-Abendessen-auf-StuKo-Klausurtagung.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20101119-20.28-Abendessen-auf-StuKo-Klausurtagung-thumbnail.jpg',
			'description' => __( 'Abendessen auf StuKo Klausurtagung', 'twentyten' )
		),
		
		'20101120-11.09-StuKo-Klausurtagung-in-Friedrichroda.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20101120-11.09-StuKo-Klausurtagung-in-Friedrichroda.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20101120-11.09-StuKo-Klausurtagung-in-Friedrichroda-thumbnail.jpg',
			'description' => __( 'StuKo Klausurtagung in Friedrichroda', 'twentyten' )
		),
		
		'20101120-15.23-Max-auf-Klausurtagung.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20101120-15.23-Max-auf-Klausurtagung.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20101120-15.23-Max-auf-Klausurtagung-thumbnail.jpg',
			'description' => __( 'Max auf Klausurtagung', 'twentyten' )
		),
		
		'20101120-17.44-StuKo-Klausurtagung-in-Friedrichroda.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20101120-17.44-StuKo-Klausurtagung-in-Friedrichroda.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20101120-17.44-StuKo-Klausurtagung-in-Friedrichroda-thumbnail.jpg',
			'description' => __( 'StuKo Klausurtagung in Friedrichroda', 'twentyten' )
		),
		
		'20101122-21.05-Kicker.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20101122-21.05-Kicker.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20101122-21.05-Kicker-thumbnail.jpg',
			'description' => __( 'Kicker', 'twentyten' )
		),
		
		'20101122-21.13-StuKo-Buero.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20101122-21.13-StuKo-Buero.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20101122-21.13-StuKo-Buero-thumbnail.jpg',
			'description' => __( 'StuKo Buero', 'twentyten' )
		),
		
		'20101122-21.14-StuKo-Buero.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20101122-21.14-StuKo-Buero.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20101122-21.14-StuKo-Buero-thumbnail.jpg',
			'description' => __( 'StuKo Buero', 'twentyten' )
		),
		
		'20101122-21.19-Till-und-Martin-im-Eingang.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20101122-21.19-Till-und-Martin-im-Eingang.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20101122-21.19-Till-und-Martin-im-Eingang-thumbnail.jpg',
			'description' => __( 'Till und Martin im Eingang', 'twentyten' )
		),
		
		'20101122-21.20-StuKo-Sitzung.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20101122-21.20-StuKo-Sitzung.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20101122-21.20-StuKo-Sitzung-thumbnail.jpg',
			'description' => __( 'StuKo Sitzung', 'twentyten' )
		),
		
		'20101122-21.50-Das-Treppenhaus-und-Christian.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20101122-21.50-Das-Treppenhaus-und-Christian.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20101122-21.50-Das-Treppenhaus-und-Christian-thumbnail.jpg',
			'description' => __( 'Das Treppenhaus und Christian', 'twentyten' )
		),
		
		'20101122-21.52-Tisch-nach-der-StuKo-Sitzung.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20101122-21.52-Tisch-nach-der-StuKo-Sitzung.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20101122-21.52-Tisch-nach-der-StuKo-Sitzung-thumbnail.jpg',
			'description' => __( 'Tisch nach der StuKo Sitzung', 'twentyten' )
		),
		
		'20101122-22.09-Abends-im-S140.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20101122-22.09-Abends-im-S140.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20101122-22.09-Abends-im-S140-thumbnail.jpg',
			'description' => __( 'Abends im S140', 'twentyten' )
		),
		
		'20101122-22.28-Maschinenraum.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20101122-22.28-Maschinenraum.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20101122-22.28-Maschinenraum-thumbnail.jpg',
			'description' => __( 'Maschinenraum', 'twentyten' )
		),
		
		'20101122-22.52-KTW.jpg' => array (
			'url' => '%s/../twentyten-m18/images/headers/20101122-22.52-KTW.jpg',
			'thumbnail_url' => '%s/../twentyten-m18/images/headers/20101122-22.52-KTW-thumbnail.jpg',
			'description' => __( 'KTW', 'twentyten' )
		)
		
	) );
}
add_action( 'after_setup_theme', 'm18_add_headers', 12 );


/*
Plugin Name: Twenty Ten Header Rotator
Plugin URI: http://hungrycoder.xenexbd.com/scripts/header-image-rotator-for-twenty-ten-theme-of-wordpress-3-0.html
Description: Rotate header images for Twenty Ten theme
Author: The HungryCoder
Version: 1.2
Author URI: http://hungrycoder.xenexbd.com
*/

if(!is_admin()){
	add_filter('theme_mod_header_image','hr_rotate');
}


function hr_rotate(){
	require (ABSPATH.'/wp-admin/custom-header.php');
	$hr = new Custom_Image_Header(null);
	$hr->process_default_headers();
	$all_headers=array();
	$i=0;
	foreach (array_keys($hr->default_headers) as $header){
		$all_headers[$i]['url']= sprintf( $hr->default_headers[$header]['url'], get_template_directory_uri(), get_stylesheet_directory_uri() );
		//$all_headers[$i]['thumbnail']= sprintf( $hr->default_headers[$header]['thumbnail_url'], get_template_directory_uri(), get_stylesheet_directory_uri() );
		//$all_headers[$i]['description']= $hr->default_headers[$header]['description'];
		$i++;
	}

	//add any custom header
	$custom = get_option('mods_Twenty Ten');
	if(is_array($custom)){
		if(!empty($custom['header_image']))	$all_headers[]['url']= $custom['header_image'];
	}

	$cur_header = $all_headers[rand(0,count($all_headers)-1)];

	return $cur_header['url'];
}
   
/**
 * Plugin Name: Twenty Ten IE6 Menus
 * Author: Sara Cannon
 * Author URI: http://sara-cannon.com
 * Description: Make the menu drop down in IE6 in Twentyten (if you care about that sort of thing)
 * Version: 1.0
 * License: GPL2
 */
function sara_twentyten_ie6_menus_enqueue() {
    wp_enqueue_script( 'jquery' );
}
add_action( 'after_setup_theme', 'sara_twentyten_ie6_menus_enqueue' );

function sara_twentyten_ie6_menus_script() {
?>
<!--[if lte IE 6]>
<script type="text/javascript">
jQuery(document).ready( function($) {
    $('#access li').mouseover( function() {
        $(this).find('ul').show();
    });
    $('#access li').mouseleave( function() {
        $(this).find('ul').hide();
    });
    $('#access li ul').mouseleave( function() {
        $(this).hide();
    });
});
</script>
<![endif]-->
<?php
}
add_action( 'wp_footer', 'sara_twentyten_ie6_menus_script' );
