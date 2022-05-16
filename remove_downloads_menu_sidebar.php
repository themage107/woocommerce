<?php

// remove the downloads from menu items in my-account sidebar
add_filter ( 'woocommerce_account_menu_items', 'remove_downloads' );
function remove_downloads( $menu_links ){ 
	unset( $menu_links['downloads'] );
	return $menu_links; 
}

?>