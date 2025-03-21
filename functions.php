<?php
/**
 * Custom Blocks Demo functions and definitions
 *
 * @package Custom_Blocks_Demo
 * @since 1.0.0
 */

 remove_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title', 10 );

if ( ! function_exists( 'custom_blocks_demo_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function custom_blocks_demo_setup() {
		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );
	}
}
add_action( 'after_setup_theme', 'custom_blocks_demo_setup' );

/**
 * Register block patterns.
 */
function custom_blocks_demo_register_block_patterns() {
	// Register block pattern categories.
	if ( function_exists( 'register_block_pattern_category' ) ) {
		register_block_pattern_category(
			'custom-sections',
			array( 'label' => __( 'Custom Sections', 'custom-blocks-demo' ) )
		);
		
		register_block_pattern_category(
			'custom-layouts',
			array( 'label' => __( 'Custom Layouts', 'custom-blocks-demo' ) )
		);
	}
}
add_action( 'init', 'custom_blocks_demo_register_block_patterns' );

/**
 * Register block styles.
 */
function custom_blocks_demo_register_block_styles() {
	// Register custom button styles
	register_block_style(
		'core/button',
		array(
			'name'  => 'outline-primary',
			'label' => __( 'Outline Primary', 'custom-blocks-demo' ),
		)
	);
	
	register_block_style(
		'core/button',
		array(
			'name'  => 'outline-secondary',
			'label' => __( 'Outline Secondary', 'custom-blocks-demo' ),
		)
	);
	
	// Register custom group styles
	register_block_style(
		'core/group',
		array(
			'name'  => 'card',
			'label' => __( 'Card', 'custom-blocks-demo' ),
		)
	);
	
	register_block_style(
		'core/group',
		array(
			'name'  => 'card-shadow',
			'label' => __( 'Card with Shadow', 'custom-blocks-demo' ),
		)
	);
	
	// Register custom paragraph styles
	register_block_style(
		'core/paragraph',
		array(
			'name'  => 'highlight',
			'label' => __( 'Highlight', 'custom-blocks-demo' ),
		)
	);
}
add_action( 'init', 'custom_blocks_demo_register_block_styles' );

/**
 * Enqueue theme CSS files.
 */
function custom_blocks_demo_enqueue_styles() {
	// Enqueue main stylesheet
	wp_enqueue_style(
		'custom-blocks-demo-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
	
	// Enqueue custom block styles
	wp_enqueue_style(
		'custom-blocks-demo-block-styles',
		get_theme_file_uri( 'assets/css/blocks.css' ),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'custom_blocks_demo_enqueue_styles' );
add_action( 'enqueue_block_editor_assets', 'custom_blocks_demo_enqueue_styles' );

// Declare WooCommerce support.
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );



// add_action('woocommerce_shop_loop_item_title', 'abChangeProductsTitle', 10 );
// function abChangeProductsTitle() {
//     echo '<h2 class="woocommerce-loop-product_title">xoopoop<a href="'.get_the_permalink().'">' . get_the_title() . '</a></h2>';
// }


// remove_action( 'woocommerce_template_single_title','woocommerce_template_loop_product_title', 10 );
// add_action('woocommerce_template_single_title', 'chagnesingletiotle', 10 );
// function chagnesingletiotle() {
//     echo '<h2 class="woocommerce-loop-product_title">xoopoop<a href="'.get_the_permalink().'">' . get_the_title() . '</a></h2>';
// }



// add_filter('the_title', 'your_shop_custom_title', 20, 2);

// function your_shop_custom_title($the_title, $id)
// {

//   if (is_shop() && get_post_type($id) == 'product') : // runs only on the shop page

//     $the_title = 'xiixii<a href="' . get_the_permalink() . '">' . $the_title . '</a>';

//   endif;

//   return $the_title;
// }



// nao funciona se tem template html 
add_action('wp_head', 'shop_title_override', 9999999999999);

function shop_title_override() {
   remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
   remove_action( 'woocommerce_shop_loop_item_title', 'x_woocommerce_template_loop_product_title', 10 );
}