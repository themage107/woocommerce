<?php
// runs in tandem with bundled products
if( !function_exists('show_specific_product_quantity') ) {

    function show_specific_product_quantity( $atts ) {

        // Shortcode Attributes
        $atts = shortcode_atts(
            array(
                'id' => '', // Product ID argument
				'div' => '', // Divisor Argument
            ),
            $atts,
            'product_qty'
        );

        if( empty($atts['id'])) return;

		$divAmt = 1;
		if(!empty($atts['div'])){
			$divAmt = $atts['div'];
		}
		
        $stock_quantity = 0;

        $product_obj = wc_get_product( intval( $atts['id'] ) );        
		$stock_quantity = $product_obj->get_stock_quantity();
		
		// divide the product by the bundle amount if needed, otherwise it will be divided by 1
		$stock_quantity = floor((int)$stock_quantity / (int)$divAmt);
		
		if($stock_quantity < 0){
			$stock_quantity = 0;
		}	
		
		return $stock_quantity;

    }

    add_shortcode( 'product_qty', 'show_specific_product_quantity' );

}
?>