<?php 
/**
 * Enqueue and/or register scripts correctly, and depending on page currently being viewed.
 * This could easily be modified to work only on front_page or otherwise.
 */

add_action('wp_register_scripts', 'enqueue_and_register_on_named_page');

function enqueue_and_register_on_named_page() {
	$pageNeedingScript = '1' // This can be a page name or page ID.

	// Deregister any conflicting scripts, register our script, then enqeue our script, 
	//	if the user is on our specified page:
	if (is_page($pageNeedingScript)) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js');
		wp_enqueue_script('jquery');
	}
}