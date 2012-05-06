<?
$prefix = "myprefix_";

// Setting up the field
// First the reusable names
	$setting_title = 'Full Setting Name';
	$setting_slug = 'setting_slug';

// Field setting 
	register_setting(
		$prefix.'settings', 
		$prefix.'setting_'.$setting_slug, 
		$setting_slug.'_validate');

// Field section
	add_settings_section(
		$prefix.$setting_slug.'_settings_section', 
		$cruser['name_full'].' '.$setting_title, 
		$setting_slug.'_settings_section_content', 
		__FILE__);

// Field key 
	add_settings_field(
		$prefix.'setting_'.$setting_slug, 
		$setting_title, 
		'setting_'. $setting_slug .'_content', 
		__FILE__, 
		$prefix.$setting_slug.'_settings_section');




// Field functions

// Validating field input for saving
	function setting_slug_validate($input) {
		return $input;
	}

// Description of field
	function setting_slug_settings_section_content() {
		echo '<p>Enter a list of taxonomy terms to fill the taxonomy with.</p>';
	}
// Actual form field display
	function setting_setting_slug_content() {
			global $prefix;
			$setting_slug = 'setting_slug';
			$setting_title = 'Full Setting Name';
	        // Input field
		echo '
		<div>
			<label for="'. $prefix.'setting_'. $setting_slug .'">'.$setting_title.'</label>
			<input type="text" name="'.$prefix.'setting_'. $setting_slug .'" value="' . get_option($prefix.'setting_'.$setting_slug) . '" />
		</div>
		';
	}



// Displaying the setting page


	function plugin_settings_page_content() {
		global $prefix;
		$settings_page_title = "Settings Page Title";
		$settings_page_slug = "settings_page_slug";
		
		
		echo "<h1>$settings_page_title</h1>";
		
		$options_page_uri = 'options.php';
		$settings_page_uri = "/wp-admin/settings.php?page=$settings_page_slug";
		$action_uri  = $options_page_uri . '?redirect_to=' . $settings_page_uri;
		
		?>
			<form action="<?php echo $action_uri; ?>" method="post">
				<?php settings_fields($prefix.'settings'); ?>
				<?php do_settings_sections(__FILE__); ?>
				<div class="submit"><input name="Submit" class="primary-button" type="submit" value="<?php esc_attr_e('Save Changes');?>" /></div>
			</form>
	
<?php
	}
?>