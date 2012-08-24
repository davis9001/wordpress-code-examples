<?php
add_action('admin_menu', 'add_soccer_menu_now');
function add_soccer_menu_now() {
	add_menu_page('Home', 								// Page Title
		'Soccer Manager', 									// Menu Title
		'administrator',  									// Capability
		'wp_soccermanager',							 		// Menu Slug
		'custom_admin_page_home_contents', 	// Function
		'', 																// Icon URL
		6 																	// Position
		);
	add_submenu_page('wp_soccermanager', 	// Parent Slug
		'Home', 														// Page Title
		'Home', 														// Menu Title
		'administrator', 										// Capability
		'wp_soccermanager', 								// Menu Slug
		'custom_admin_page_home_contents'		// Function
		);
	add_submenu_page('wp_soccermanager',
		'Second Page', 'Second Page', 
		'administrator', 
		'wp_soccermanager_bingo', 
		'custom_admin_page_bingo_contents');
}
function custom_admin_page_home_contents() {
	echo '<p>Home</p>';
}
function custom_admin_page_bingo_contents() {
	echo '<p>Bingo!</p>';
}

