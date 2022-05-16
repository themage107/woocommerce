<?php

// setup for the profile form fields
add_action('woocommerce_save_account_details', 'save_wp_meta_custom', 12, 1);

function save_wp_meta_custom($user_id){
    
	// For user_registration_phone
    if(isset($_POST['field_name'])){
        update_user_meta( $user_id, 'field_name', sanitize_text_field( $_POST['field_name'] ) );
	}
	
}

?>