<?php

// hiding prices and cart options, 
// if user is logged in or is the unverified role, don't show price or the add to cart button
add_action( 'init', 'wp_hide_cart_info' );

function wp_hide_cart_info() {
	
	$unverified = false;
	
	$user = wp_get_current_user();
	if ( in_array( 'unverified', (array) $user->roles ) || in_array( 'rejected', (array) $user->roles )) {
    	$unverified = true;
	}
	
    if ( !is_user_logged_in() || $unverified) {
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );


		add_action('woocommerce_single_product_summary', 'show_login', 12, 1);
		
		// wp object not created yet, so we have to add this as a queue
		add_action( 'wp', 'check_front_page_queue' );
		function check_front_page_queue() {
  			if( is_front_page() ) {
    			add_action('woocommerce_after_shop_loop_item_title', 'show_login_home', 13, 1 );
  			}
		}
					
    }
}


function show_login(){
	// single product page
?>
	<a class="button alt" id="showLogin" href="/my-account/">login or create wholesale account to see pricing</a>
<?php
}
function show_login_home(){
	// home page widget
?>
	<a class="link" href="/my-account/">login or create wholesale account to see pricing</a>
<?php	
}

?>