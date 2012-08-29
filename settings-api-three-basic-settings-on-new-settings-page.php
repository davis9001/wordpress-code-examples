<?
/*	This example shows how to add a new settings page under Settings, 
 *		and also add some settings to that page, making complete use of 
 *		the WordPress Settings API
 *
 *	By using the Settings API we can keep our settings page code much 
 *		cleaner than the alternative, and we also need less code to handle 
 *		saving our settings. This will also help us handle validation.
 *
 *	This example uses many variables to make it easier to manage changes.
 */
 
// Set up a bunch of our values to make it easier to use this example,
//	or make changes to our settings later:
// After updating these values you'll need to update function names below too.
define('prefix', 'myprefix_');
define('settingsPageTitle', 'Settings Page Title');
define('settingsPageSlug', 'settings-page-slug');
define('settingsMenuTitle', 'Settings API Sample');
define('settingsMenuCapability', 'edit_plugins');

define('settingsSectionOneTitle', 'Settings Section One Title');
define('settingsSectionOneSlug', prefix.'settings_section');

define('settingOneTitle', 'Setting One Title');
define('settingOneSlug', prefix.'setting_one_slug');
define('settingTwoTitle', 'Setting Two Title');
define('settingTwoSlug', prefix.'setting_two_slug');
define('settingThreeTitle', 'Setting Three Title');
define('settingThreeSlug', prefix.'setting_three_slug');

define('settingsSectionOneCallbackFunction', settingsSectionOneSlug.'_content');

define('settingOneCallbackFunction', settingOneSlug.'_input');
define('settingOneValidationFunction', settingOneSlug.'_validate');
define('settingTwoCallbackFunction', settingTwoSlug.'_input');
define('settingTwoValidationFunction', settingTwoSlug.'_validate');
define('settingThreeCallbackFunction', settingThreeSlug.'_input');
define('settingThreeValidationFunction', settingThreeSlug.'_validate');

define('settingsPageID', __FILE__);

define('initSettingsFunction', prefix.'init_settings');
define('addSettingsPageFunction', prefix.'add_settings_page');
define('settingsManagerFunction', prefix.'settings_manager');

// Create a function for initializing our new settings:
function myprefix_init_settings() {	
	
	// Settings section:
	// Multiple settings can go into this section after we set it up.
	// We are going to add three settings into this one section.
		add_settings_section(settingsSectionOneSlug, settingsSectionOneTitle, 
			settingsSectionOneCallbackFunction, settingsPageID);
	
	// Settings field:
	// We add settings fields to our settings section:
		add_settings_field(settingOneSlug, settingOneTitle, settingOneCallbackFunction, 
			settingsPageID, settingsSectionOneSlug, array( 'label_for' => settingOneSlug ));
		add_settings_field(settingTwoSlug, settingTwoTitle, settingTwoCallbackFunction, 
			settingsPageID, settingsSectionOneSlug, array( 'label_for' => settingTwoSlug ));
		add_settings_field(settingThreeSlug, settingThreeTitle, settingThreeCallbackFunction, 
			settingsPageID, settingsSectionOneSlug, array( 'label_for' => settingThreeSlug ));
	
	// Setting:
	// Now we register our settings:
		register_setting(settingsPageID, settingOneSlug, settingOneValidationFunction);
		register_setting(settingsPageID, settingTwoSlug, settingTwoValidationFunction);
		register_setting(settingsPageID, settingThreeSlug, settingThreeValidationFunction);
}
// Now call this function in the admin_init action hook:
// This makes sure our settigns are added to WordPress early enough in the loading process:
add_action('admin_init', initSettingsFunction);



// Description of field for settings section one:
function myprefix_settings_section_content() {
	echo '<p>';
	_e('Settings section description.');
	echo '</p>';
}


// == Field functions:
// Callback for setting one input:
function myprefix_setting_one_slug_input() {
  
  // Input field (text)
	echo '<input type="text" id="'.settingOneSlug.'" name="'.settingOneSlug .'" value="' . get_option(settingOneSlug) . '" />';
}
function myprefix_setting_two_slug_input() {
  
  // Input field (checkbox)
	echo '<input type="checkbox" id="'.settingTwoSlug.'" name="'.settingTwoSlug .'" ';
	checked(true , get_option(settingTwoSlug));
	echo ' value="1" />';
}
function myprefix_setting_three_slug_input() {
  
  // Input field (select/option)
  $possibleValues = array('Option 1', 'Option 2', 'Option 3');
  echo '<select id="' . settingThreeSlug . '" name="' . settingThreeSlug .'">';
  foreach ($possibleValues as $value) {
  	echo '<option value="' . $value . '" ';
  	selected($value, get_option(settingThreeSlug));
  	echo '>' . $value . '</option>';
  }
  echo '</select>';
}


// These functions are referenced in the above settings section, field, and registration:
// Validating field input for saving setting one:
function myprefix_setting_one_slug_validate($input) {
	return $input;
}
function myprefix_setting_two_slug_validate($input) {
	return $input;
}
function myprefix_setting_three_slug_validate($input) {
	return $input;
}




// Displaying the setting page
function myprefix_settings_manager() {
	
	echo "<h1>";
	_e(settingsPageTitle);
	echo "</h1>";
	
	// Setting up the action URI for our form, we need to send our 
	//	settings to the options.php page then redirect back to our 
	//	settings page.
	$optionsPageURI = "/wp-admin/options.php";
	$settingsPageURI = "/wp-admin/options-general.php?page=settingsPageSlug";
	$actionURI  = $optionsPageURI . '?redirect_to=' . $settingsPageURI;
	
	?>
		<form action="<?php echo $actionURI; ?>" method="post">
			<?php settings_fields(settingsPageID); ?>
			<?php do_settings_sections(settingsPageID); ?>
			<div class="submit">
				<input name="Submit" class="primary-button" type="submit" value="<?php esc_attr_e('Save Changes');?>" />
			</div>
		</form>
		
<?php
}

function myprefix_add_settings_page() {
	
	add_options_page(settingsPageTitle, settingsMenuTitle,
		settingsMenuCapability, settingsPageSlug,
		settingsManagerFunction);
	
	// If you wanted to add an additional link to this settings page,
	//	 in the menu for a custom post type you could use something like this:
	/*
	add_submenu_page('edit.php?post_type=post-type', 
		"Settings", "Settings", 
		settingsMenuCapability, settingsPageSlug, settingsManagerFunction);
	*/
}
add_action('admin_menu', addSettingsPageFunction);