<?php
add_filter( 'wpcf7_recaptcha_threshold',
 
  function( $threshold ) {
    $threshold = 0.8; // decrease threshold to 0.8
 
    return $threshold;
  },
 
  10, 1
);
?>