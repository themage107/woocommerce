<?php

// Remove the weight and shipping info
add_filter( 'wc_product_enable_dimensions_display', '__return_false' );

?>