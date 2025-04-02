<?php
/**
 * Allegro functions and definitions
 *
 * @package Allegro
 * @since 1.0.0
 */



if ( ! function_exists( 'allegro_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function allegro_setup() {
		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );
	}
}
add_action( 'after_setup_theme', 'allegro_setup' );

/**
 * Register block patterns.
 */
function custom_blocks_demo_register_block_patterns() {
	// Register block pattern categories.
	if ( function_exists( 'register_block_pattern_category' ) ) {
		register_block_pattern_category(
			'custom-sections',
			array( 'label' => __( 'Custom Sections', 'allegro-blocks' ) )
		);
		
		register_block_pattern_category(
			'custom-layouts',
			array( 'label' => __( 'Custom Layouts', 'allegro-blocks' ) )
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
			'label' => __( 'Outline Primary', 'allegro-blocks' ),
		)
	);
	
	register_block_style(
		'core/button',
		array(
			'name'  => 'outline-secondary',
			'label' => __( 'Outline Secondary', 'allegro-blocks' ),
		)
	);
	
	// Register custom group styles
	register_block_style(
		'core/group',
		array(
			'name'  => 'card',
			'label' => __( 'Card', 'allegro-blocks' ),
		)
	);
	
	register_block_style(
		'core/group',
		array(
			'name'  => 'card-shadow',
			'label' => __( 'Card with Shadow', 'allegro-blocks' ),
		)
	);
	
	// Register custom paragraph styles
	register_block_style(
		'core/paragraph',
		array(
			'name'  => 'highlight',
			'label' => __( 'Highlight', 'allegro-blocks' ),
		)
	);
}
add_action( 'init', 'custom_blocks_demo_register_block_styles' );



function themeslug_register_patterns() {
	register_block_pattern( 'allegro/hero', array(
		'title'      => __( 'Hero', 'themeslug' ),
		'categories' => array( 'featured' ),
		'source'     => 'theme',
		'content'    => '<!-- Block pattern goes here. -->'
	) );
}
add_action( 'init', 'themeslug_register_patterns' );



/**
 * Enqueue theme CSS files.
 */
function custom_blocks_demo_enqueue_styles() {
	// Enqueue main stylesheet
	wp_enqueue_style(
		'allegro-blocks-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
	
	// Enqueue custom block styles
	wp_enqueue_style(
		'allegro-blocks-block-styles',
		get_theme_file_uri( 'assets/css/blocks.css' ),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'custom_blocks_demo_enqueue_styles' );
add_action( 'enqueue_block_editor_assets', 'custom_blocks_demo_enqueue_styles' );

/**
 * Enqueue Font Awesome CSS from CDN.
 */
function enqueue_font_awesome() {
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css',
        array(),
        '6.0.0-beta3'
    );
}
add_action('wp_enqueue_scripts', 'enqueue_font_awesome');


// Declare WooCommerce support.
add_theme_support( 'woocommerce' );
// add_theme_support( 'wc-product-gallery-zoom' );
// add_theme_support( 'wc-product-gallery-lightbox' );
// add_theme_support( 'wc-product-gallery-slider' );


