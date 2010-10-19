<?php
/** 
 * Removes "private:" and "protected:" from post title: 
 */ 
function cyTB_removePrivate($title) {
    return(preg_replace( '=^(Privat|Private)\:[\ +]=','', $title));
}

// Filter anmelden
add_filter('the_title','cyTB_removePrivate');

$subRole = get_role( 'subscriber' );  
$subRole->add_cap( 'read_private_pages' ); 

$subRole = get_role( 'subscriber' );  
$subRole->add_cap( 'read_private_posts' );

$subRole = get_role( 'contributor' );  
$subRole->add_cap( 'read_private_pages' ); 

$subRole = get_role( 'contributor' );  
$subRole->add_cap( 'read_private_posts' );