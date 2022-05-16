<?
// show quantity of product for simple products
add_filter( 'woocommerce_before_variations_form', 'show_quantities', 30 );
function show_quantities(){
	global $product;

	if(get_class($product) == 'WC_Product_Simple'){
		
		// this is a WC_Product_Simple
		echo '<div class="product-quantity">Product Quantity: ' . $product->get_stock_quantity() . '</div>';
	
	} 
}
?>