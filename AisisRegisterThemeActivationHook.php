<?php

	 /**
	  * We want to run this when the theme is activated.
	  * eseentially we state that: if theme is activated,
	  * that is theme_name is activated then we call the 
	  * function you passed in and then update the
	  * aisis_option_key to a value of 1
	  *
	  * @param theme_name of type theme name
	  * @parama function of type function
	  *
	  */
	 function aisis_register_theme_activation_hook($theme_name, $function){
		 $aisis_option_key = "theme_is_activate_".$theme_name;
		 if(get_option($aisis_option_key)){
			 call_user_fun($function);
			 update_option($aisis_option_key, 1);
		 }
	 }
	 
?>