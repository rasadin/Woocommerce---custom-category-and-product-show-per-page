
 /**
 * Receive and replace per row product number value
 **/
add_filter('loop_shop_columns', 'loop_columns');
if(!function_exists('loop_columns')){
    function loop_columns(){
       if ( is_product_category()) {
       $cat_row = get_option('wc_per_row_product_show_id') ? get_option('wc_per_row_product_show_id') : 4;
       return $cat_row; // per row products
       }
        else { // for other archive pages and shop page
        $pro_row = get_option('wc_per_row_category_show_id') ? get_option('wc_per_row_category_show_id') : 4;
        return $pro_row;
      }
    }
}
// /**
// * Receive and replace per page product number value
// **/
add_filter('loop_shop_per_page', 'number_of_products_per_page',20,1);
   function number_of_products_per_page($cat_col){
    if ( is_product_category()) {
      $cat_col = get_option('wc_per_page_product_show_id') ? get_option('wc_per_page_product_show_id') : 12;
      return $cat_col; // per row products
    }

    else { // for other archive pages and shop page
        $product_col = get_option('wc_per_page_category_show_id') ? get_option('wc_per_page_category_show_id') : 12;
        return $product_col;
    }
   }



// /**
//  * Create the section beneath the products tab
//  **/
add_filter( 'woocommerce_get_sections_products', 'wc_product_per_page_section',10,1 );
function wc_product_per_page_section( $sections ) {
	$sections['wc_per_page_product'] = __( 'WC Product Per Page', 'webalive-addons-elementor' );
	return $sections;	
}
//  /**
//  * Add settings to the specific section we created before
//  */
add_filter( 'woocommerce_get_settings_products', 'wc_product_per_page_all_settings', 10, 2 );
function wc_product_per_page_all_settings( $settings, $current_section ) {
// 	 /**
// 	 * Check the current section is what we want
// 	 **/
	if ( $current_section == 'wc_per_page_product' ) {
		$settings_wc_per_page_product = array();
		// Add Title to the Settings
		$settings_wc_per_page_product[] = array( 'name' => __( 'WC Product Per Page Settings', 'webalive-addons-elementor' ), 'type' => 'title', 'desc' => __( 'The following options are used to configure per page and per row products number......', 'webalive-addons-elementor' ), 'id' => 'wc_per_page_product' );
        
        // Add first option
		$settings_wc_per_page_product[] = array(
			'name'     => __( 'Products Per Row', 'webalive-addons-elementor' ),
			'desc_tip' => __( 'This is the per row Products number', 'webalive-addons-elementor' ),
			'id'       => 'wc_per_row_product_show_id',
			'type'     => 'text',
			'css'      => 'min-width:300px;',
			'desc'     => __( 'Enter per row products number.', 'webalive-addons-elementor' ),
		);
		// Add second option
		$settings_wc_per_page_product[] = array(
            'name'     => __( 'Products Per Page', 'webalive-addons-elementor' ),
			'desc_tip' => __( 'This is the per page Products number', 'webalive-addons-elementor' ),
			'id'       => 'wc_per_page_product_show_id',
			'type'     => 'text',
			'css'      => 'min-width:300px;',
			'desc'     => __( 'Enter per page products number.', 'webalive-addons-elementor' ),
        );
        
        // Add 3rd option
		$settings_wc_per_page_product[] = array(
			'name'     => __( 'Category Per Row', 'webalive-addons-elementor' ),
			'desc_tip' => __( 'This is the per row category number', 'webalive-addons-elementor' ),
			'id'       => 'wc_per_row_category_show_id',
			'type'     => 'text',
			'css'      => 'min-width:300px;',
			'desc'     => __( 'Enter per row category number.', 'webalive-addons-elementor' ),
		);
		// Add 4th  option
		$settings_wc_per_page_product[] = array(
            'name'     => __( 'Category Per Page', 'webalive-addons-elementor' ),
			'desc_tip' => __( 'This is the per page category number', 'webalive-addons-elementor' ),
			'id'       => 'wc_per_page_category_show_id',
			'type'     => 'text',
			'css'      => 'min-width:300px;',
			'desc'     => __( 'Enter per page category number.', 'webalive-addons-elementor' ),
		);
		$settings_wc_per_page_product[] = array( 'type' => 'sectionend', 'id' => 'wc_per_page_product' );
		return $settings_wc_per_page_product;
	 /**
	 * If not, return the standard settings
	 **/
	} else {
		return $settings;
	}
}


