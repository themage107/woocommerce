<?php

// change the upsell text on the products
add_filter( 'gettext', 'change_upsell', 20, 3 );
function change_upsell( $translated_text, $text, $domain ) { 
	if($translated_text == 'You may also like&hellip;') {
		$translated_text = 'Products that go with this'; // new title
	}
	return $translated_text;
}

?>