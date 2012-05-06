<?php
add_action('admin_menu', 'add_soccer_menu_now');
function add_soccer_menu_now() {
	add_menu_page('Home', 'Soccer Manager' , 
										'administrator', 
										'wp_soccermanager', 
										'custom_admin_page_home_contents', '', 6);
	add_submenu_page('wp_soccermanager', 
										'Home', 'Home', 
										'administrator', 
										'wp_soccermanager', 
										'custom_admin_page_home_contents');
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

?>