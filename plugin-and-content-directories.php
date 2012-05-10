<?php 
/* Determining Plugin and Content Directories
 Codex URL: 
 */

// You can use these directly _only_ if you're targeting WordPress 3.0+
WP_CONTENT_DIR  // no trailing slash, full paths only
WP_CONTENT_URL  // full url 
WP_PLUGIN_DIR  // full path, no trailing slash
WP_PLUGIN_URL  // full url, no trailing slash

// Backwards compatability WP <= 2.9
 if ( ! defined( 'WP_CONTENT_URL' ) )
       define( 'WP_CONTENT_URL', WP_SITEURL . '/wp-content' );
 if ( ! defined( 'WP_CONTENT_DIR' ) )
       define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
 if ( ! defined( 'WP_PLUGIN_URL' ) )
       define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
 if ( ! defined( 'WP_PLUGIN_DIR' ) )
       define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );
 if ( ! defined( 'WPMU_PLUGIN_URL' ) )
       define( 'WPMU_PLUGIN_URL', WP_CONTENT_URL. '/mu-plugins' );
 if ( ! defined( 'WPMU_PLUGIN_DIR' ) )
       define( 'WPMU_PLUGIN_DIR', WP_CONTENT_DIR . '/mu-plugins' );

// Related functions
	home_url()	 	// Home URL									http://www.example.com
	site_url()	 	// Site directory URL						http://www.example.com OR http://www.example.com/wordpress
	admin_url()	 	// Admin directory URL						http://www.example.com/wp-admin
	includes_url()	// Includes directory URL					http://www.example.com/wp-includes
	content_url()	// Content directory URL					http://www.example.com/wp-content
	plugins_url()	// Plugins directory URL					http://www.example.com/wp-content/plugins
	wp_upload_dir()	// Upload directory URL (returned array)	http://www.example.com/wp-content/uploads
 
 ?>