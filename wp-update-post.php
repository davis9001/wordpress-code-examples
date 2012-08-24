<?php 
/* Using the wp_update_post() function.
 Codex URL: http://codex.wordpress.org/Function_Reference/wp_update_post
*/

// Update post 37
  $my_post = array();
  $my_post['ID'] = 37;
  $my_post['post_content'] = 'This is the updated content.';

// Update the post into the database
  wp_update_post( $my_post );

