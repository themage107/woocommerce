<?php

// checkout page pay at pickup option
// unhide this filter to set pay in person only available if local pickup plus is selected
add_filter( 'woocommerce_available_payment_gateways', 'local_pickup_payment' );
  
function local_pickup_payment( $available_gateways ) {
             
	if ( is_page( 'cart' ) || is_cart() || is_page( 'checkout' ) || is_checkout() ) {   
		$chosen_methods = WC()->session->get( 'chosen_shipping_methods' );    
	
		if(isset($chosen_methods[0])){
			$chosen_shipping = $chosen_methods[0];
        
			// they didn't choose local_pickup_plus
			if ( isset( $available_gateways['cod'] ) && 0 !== strpos( $chosen_shipping, 'local_pickup_plus' ) ) {
				// uncomment lines to change pay at pickup to pay with COD
				unset( $available_gateways['cod'] );
				// $available_gateways['cod'];
				// $available_gateways['cod']->title = "Pay over Phone";
				// $available_gateways['cod']->description = "Please place your order and call 907-929-5838 to make payment and complete your order.";
			}
	
			// they chose local_pickup_plus
			if ( isset( $available_gateways['cod'] ) && 0 == strpos( $chosen_shipping, 'local_pickup_plus' ) ) {
				$available_gateways['cod'];
			}
	
			return $available_gateways;
		}
	}
}

?>