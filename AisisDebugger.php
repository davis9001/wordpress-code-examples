<?php
	/**
	 *
	 * ==================== [Aisis Core Debugger] ======================
	 *
	 *		Esssentially we are wrapping var_dump in a function that
	 *		if the user selects echo as true then they get a pretty
	 *		well formed error message. also return the out put.
	 *
	 *		Based off of: Zend->Debug (Zend 2.0 beta 3)
	 *
	 *		@author: Adam Balan
	 *		@since: 1.0
	 *
	 *
	 * =================================================================
	 */
	 
	 /**
	  * Takes in what you want dumped out and 
	  * dumps it or returns it.
	  *
	  * @param $to_dump - method, variable...
	  * @param $echo boolean - true/false - default false.
	  * @return $clean_out_put.
	  */
	 function aisis_var_dump($to_dump, $echo=false){
		   
		  ob_start();
		  var_dump($to_dump);
		  $clean_out_put = ob_get_clean();
		  
		  $clean_out_put = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $clean_out_put);
		  
		  if($echo){
			  //style this part how ever you want. Note that this is an example.
			  echo '<div class="err"><strong>The Resualts of your var_dump:</strong><br /><pre>' . $clean_out_put . '</pre></div>';
		  }
		  
		  return $clean_out_put;
	 }
?>