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

add_filter('loop_shop_columns', 'custom_loop_columns', 999);
function custom_loop_columns() {
    return 5; // Set number of columns to 4
}

// Set number of products per row in WooCommerce product grids
add_filter('woocommerce_output_related_products_args', 'custom_related_products_args', 1111);
function custom_related_products_args($args) {
    $args['columns'] = 4; // Set columns to 4
    $args['posts_per_page'] = 4; // Show 4 related products
    return $args;
}

// Set number of cross-sells products per row
add_filter('woocommerce_cross_sells_columns', 'custom_cross_sells_columns');
function custom_cross_sells_columns($columns) {
    return 4;
}


// // Optional: Adjust products per page to be divisible by 4
// add_filter('loop_shop_per_page', 'custom_products_per_page', 999);
// function custom_products_per_page() {
//     return 12; // Show 12 products per page (divisible by 4)
// }




// 
// 
// 
// 
// ============================================================================================
// ============================================================================================
// ============================================================================================
// ============================================================================================
// 
// 
// 




// Enable product gallery features

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );


// // Replaces product price with "consulte" text
// if ( ! function_exists( 'twentytwentyfive_replace_price_with_text' ) ) :
// 	/**
// 	 * Replaces the WooCommerce price with "consulte" text.
// 	 *
// 	 * @since Twenty Twenty-Five 1.0
// 	 *
// 	 * @param string $price The product price HTML.
// 	 * @return string Modified price HTML with "consulte" text.
// 	 */
// 	function twentytwentyfive_replace_price_with_text( $price ) {
// 		return '<span class="price">' . esc_html__( 'consulte', 'twentytwentyfive' ) . '</span>';
// 	}
// endif;
// add_filter( 'woocommerce_get_price_html', 'twentytwentyfive_replace_price_with_text' );






// Add "De" before and "por" after regular price when product is on sale
if ( ! function_exists( 'beethoven_modify_regular_price' ) ) :
	/**
	 * Modifies the regular price display when product is on sale.
	 *
	 * @since Beethoven 1.0
	 *
	 * @param string $price Regular price HTML.
	 * @param object $product WC_Product object.
	 * @return string Modified regular price HTML.
	 */
	function beethoven_modify_regular_price( $price, $product ) {
		if ( $product->is_on_sale() ) {
			return 'De ' . $price . ' por ';
		}
		return $price;
	}
endif;
add_filter( 'woocommerce_get_price_html', 'beethoven_modify_regular_price', 10, 2 );






// Replace dash with "por" in price range
if ( ! function_exists( 'beethoven_replace_price_range_separator' ) ) :
	/**
	 * Replaces the dash separator with "por" in price range display.
	 *
	 * @since Beethoven 1.0
	 *
	 * @param string $price_range Price range HTML.
	 * @return string Modified price range HTML.
	 */
	function beethoven_replace_price_range_separator( $price_range ) {
		return str_replace( '&ndash;', ' por ', $price_range );
	}
endif;
add_filter( 'woocommerce_format_price_range', 'beethoven_replace_price_range_separator' );






// Show only lowest price in price range
if ( ! function_exists( 'beethoven_show_lowest_price' ) ) :
	/**
	 * Modifies price range to show only the lowest price.
	 *
	 * @since Beethoven 1.0
	 *
	 * @param string $price_range Price range HTML.
	 * @param WC_Product $product Product object.
	 * @return string Modified price HTML showing only lowest price.
	 */
	function beethoven_show_lowest_price( $price_range, $product ) {
		if ( $product->is_type( 'variable' ) ) {
			$prices = $product->get_variation_prices();
			$lowest_price = current( $prices['price'] );
			return wc_price( $lowest_price );
		}
		return "a partir de " . $price_range;
	}
endif;
add_filter( 'woocommerce_get_price_html', 'beethoven_show_lowest_price', 10, 2 );



// Remove price from category loop templates
if ( ! function_exists( 'beethoven_remove_loop_price' ) ) :
	/**
	 * Removes the price display from category/archive loop templates.
	 *
	 * @since Beethoven 1.0
	 *
	 * @return void
	 */
	function beethoven_remove_loop_price() {
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	}
endif;
add_action( 'init', 'beethoven_remove_loop_price' );




// Add bold to stock information
if ( ! function_exists( 'beethoven_remove_stock_information_text' ) ) :
	/**
	 * Adds bold formatting to stock information text.
	 *
	 * @since Beethoven 1.0
	 * 
	 * @param string $html Stock HTML.
	 * @return string
	 */
	function beethoven_remove_stock_information_text( $html ) {
		// return '<strong>' . $html . '</strong>';
		return;
	}
endif;
add_filter( 'woocommerce_get_stock_html', 'beethoven_remove_stock_information_text', 10, 1 );
add_filter( 'woocommerce_stock_html', 'beethoven_remove_stock_information_text', 10, 1 );









if ( ! function_exists( 'beethoven_add_prices' ) ) :
	/**
	 * Displays sample text instead of price.
	 *
	 * @since Beethoven 1.0
	 *
	 * @return void
	 */
	function beethoven_add_prices() {
		global $product;
		$product_id = $product->get_id();
		$product_name = $product->get_name();
		$product_description = $product->get_description();
		$product_image = $product->get_image();
		$product_price = $product->get_price();
		$product_sale_price = $product->get_sale_price();
		$product_regular_price = $product->get_regular_price();
		$product_stock_quantity = $product->get_stock_quantity();
		$product_stock_status = $product->get_stock_status();
		// $product_categories = $product->get_categories();
		// $product_tags = $product->get_tags();
		$product_attributes = $product->get_attributes();
		$product_dimensions = $product->get_dimensions();
		$product_weight = $product->get_weight();
		$product_dimensions = $product->get_dimensions();
		$product_weight = $product->get_weight();


		echo '<div class="no-price" style="font-size: 1rem; color: #000;">' . $product_price . '</div>';
		echo '<div class="no-price" style="font-size: 1rem; color: #000;">' . $product_sale_price . '</div>';
		echo '<div class="no-price" style="font-size: 1rem; color: #000;">' . $product_regular_price . '</div>';
		echo '<div class="no-price" style="font-size: 1rem; color: #000;">' . $product_stock_quantity . '</div>';
		echo '<div class="no-price" style="font-size: 1rem; color: #000;">' . $product_stock_status . '</div>';	
		// echo '<div class="no-price" style="font-size: 1rem; color: #000;">' . $product_description . '</div>';

	}
endif;


// woocommerce_simple_add_to_cart


// Removes price and adds sample text
if ( ! function_exists( 'beethoven_remove_price_add_text' ) ) :
	/**
	 * Removes the WooCommerce price and replaces with sample text.
	 *
	 * @since Beethoven 1.0
	 *
	 * @return void
	 */
	function beethoven_remove_price_add_text() {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
		
		add_action( 'woocommerce_simple_add_to_cart', 'beethoven_add_prices', 10 );
		add_action( 'woocommerce_after_shop_loop_item_title', 'beethoven_add_prices', 10 );
	}
endif;
add_action( 'init', 'beethoven_remove_price_add_text' );












// 
// 
// 
// 
// ============================================================================================
// ============================================================================================
// ============================================================================================
// ============================================================================================
// 
// 
// 


// remove_actions



/**
 * Remove a aba de comentários da página do produto.
 */

 add_filter( 'woocommerce_product_tabs', 'remover_aba_comentarios', 98 );
 function remover_aba_comentarios( $tabs ) {
   unset( $tabs['reviews'] );
   return $tabs;
 }
 
 add_filter( 'woocommerce_product_tabs', 'remover_aba_informacoes_adicionais', 98 );
 function remover_aba_informacoes_adicionais( $tabs ) {
   unset( $tabs['additional_information'] ); // To remove the additional information tab, que só mostra as variacoes
   return $tabs;
 }
 
 
 /**
  * Remove WooCommerce Downloads Page
  */
 
 function remove_downloads_endpoint($endpoints) {
   unset($endpoints['downloads']);
   return $endpoints;
 }
 add_filter('woocommerce_account_menu_items', 'remove_downloads_endpoint');
 
 function remove_downloads_content() {
   remove_action('woocommerce_account_downloads_endpoint', 'woocommerce_account_downloads');
 }
 add_action('init', 'remove_downloads_content');
 
 function remove_downloads_rewrite_endpoint() {
   add_rewrite_endpoint('downloads', EP_PAGES);
   flush_rewrite_rules();
 }
 register_activation_hook(__FILE__, 'remove_downloads_rewrite_endpoint');
 
 function remove_downloads_rewrite_endpoint_deactivation() {
   flush_rewrite_rules();
 }
 register_deactivation_hook(__FILE__, 'remove_downloads_rewrite_endpoint_deactivation');
 
 
 
 /*
 * Remove o bloco que exibe o número de resultados de produtos na loja. 
 */
 
 function hide_woocommerce_product_results_count_block() {
   ?>
   <style type="text/css">
       .woocommerce-result-count {
           display: none !important;
       }
   </style>
   <?php
 }
 add_action('wp_head', 'hide_woocommerce_product_results_count_block');
 
 //Alternative way to hide using a filter, if the block is created via a template
 function custom_remove_result_count( $template ) {
   if ( is_shop() || is_product_category() || is_product_tag() ) {
       remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
   }
   return $template;
 }
 add_filter( 'template_include', 'custom_remove_result_count', 99 );
 
 
 
 /*
 * Remove o bloco com o dropdown de ordenação de produtos na loja.
 */
 
 function hide_woocommerce_catalog_sorting() {
   ?>
   <style type="text/css">
       .woocommerce-ordering {
           display: none !important;
       }
   </style>
   <?php
 }
 add_action('wp_head', 'hide_woocommerce_catalog_sorting');
 
 //Alternative way to hide using a filter, if the sorting block is created via a template
 function custom_remove_catalog_sorting( $template ) {
   if ( is_shop() || is_product_category() || is_product_tag() ) {
       remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
   }
   return $template;
 }
 add_filter( 'template_include', 'custom_remove_catalog_sorting', 99 );
 
   
 /**
  * Remove the Sort by dropdown completely
  */  
 
  function remove_sort_by_dropdown() {
   remove_action('woocommerce_catalog_ordering', 'woocommerce_catalog_ordering');
   remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
   remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
 }
 add_action( 'init', 'remove_sort_by_dropdown',1 );
 
 /**
  * Remove product tags display from single product pages
  */  

function remove_tags() {
  $priority = has_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta');
  remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', $priority);
  // add_action('woocommerce_single_product_summary','show_precos',10);
}
add_action('init', 'remove_tags');

 
 
  /**
   * Disable comments on posts and pages
   */
 
   function disable_comments_on_posts_and_pages() {
     // Remove support for comments and trackbacks from post types
     remove_post_type_support('post', 'comments');
     remove_post_type_support('post', 'trackbacks');
     remove_post_type_support('page', 'comments');
     remove_post_type_support('page', 'trackbacks');
   
     // Close comments on the front-end
     add_filter('comments_open', '__return_false', 20, 2);
     add_filter('pings_open', '__return_false', 20, 2);
   
     // Hide existing comments
     add_filter('comments_array', '__return_empty_array', 10, 2);
   
     // Remove comments page in menu
     add_action('admin_menu', function () {
         remove_menu_page('edit-comments.php');
     });
   
     // Remove comments links from admin bar
     add_action('init', function () {
         if (is_admin_bar_showing()) {
             remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
         }
     });
   
     // Disable comment-reply.min.js
     add_action('wp_enqueue_scripts', function () {
         wp_dequeue_script('comment-reply');
     });
   
     // Remove comments metabox from dashboard
     add_action('admin_init', function () {
         remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
     });
   
     // Disable support for comments and trackbacks in post types
     add_action('admin_init', function () {
         $post_types = get_post_types();
         foreach ($post_types as $post_type) {
             if (post_type_supports($post_type, 'comments')) {
                 remove_post_type_support($post_type, 'comments');
                 remove_post_type_support($post_type, 'trackbacks');
             }
         }
     });
   }
   
   add_action('init', 'disable_comments_on_posts_and_pages');
 
   

  /**
   * Remove product title from breadcrumb on single product pages
   */
  add_filter( 'woocommerce_get_breadcrumb', 'remove_product_from_breadcrumb', 20, 2 );
  function remove_product_from_breadcrumb( $crumbs, $breadcrumb ) {  
     if ( is_product() ) {
        global $product;
        $index = count( $crumbs ) - 1; // product name is always last item
        $value = $crumbs[$index];
        $crumbs[$index][0] = null;
     }
     return $crumbs;
  }



 

/**
 * Oculta categoria sem slug
 */
function ocultar_product_meta_sem_categoria_slug() {
  // Declara a variável global $post para acessar o objeto do post atual.
  global $post;

  // Verifica se a página atual é uma página de produto do WooCommerce.
  if (is_product()) {
      // Obtém todas as categorias do produto atual e armazena em $categorias.
      $categorias = get_the_terms($post->ID, 'product_cat');

      // Verifica se o produto possui categorias e se não houve erros ao obtê-las.
      if ($categorias && !is_wp_error($categorias)) {
          // Itera sobre cada categoria do produto.
          foreach ($categorias as $categoria) {
              // Verifica se o slug da categoria atual é "sem-categoria".
              if ($categoria->slug === 'sem-categoria') {
                  // Se a categoria "sem-categoria" for encontrada, remove a ação que exibe as informações meta do produto.
                  // 'woocommerce_template_single_meta' é a função que exibe os metadados do produto (SKU, categorias, tags).
                  // 'woocommerce_single_product_summary' é o hook onde essa função é adicionada.
                  // 40 é a prioridade da ação.
                  remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
                  // Sai do loop após encontrar a categoria "sem-categoria", pois não é necessário verificar as outras categorias.
                  break;
              }
          }
      }
  }
}
// Adiciona a função 'ocultar_product_meta_sem_categoria_slug' ao hook 'woocommerce_before_single_product'.
// Isso garante que a função seja executada antes da exibição do conteúdo do produto.
add_action('woocommerce_before_single_product', 'ocultar_product_meta_sem_categoria_slug');




/**
 * Remove product description heading from single product page
 */
add_filter('woocommerce_product_description_heading', '__return_false');


// remove dashicons in frontend to non-admin 
function wpdocs_dequeue_dashicon() {
  if (current_user_can( 'update_core' )) {
      return;
  }
  wp_deregister_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );
 

	
// 
// 
// 
// 
// ============================================================================================
// ============================================================================================
// ============================================================================================
// ============================================================================================
// 
// 
// 

// loop 


// columns

// NAO SEI SE É NECESSARIO
// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
// add_filter('loop_shop_columns', 'loop_columns');
//  if(!function_exists('loop_columns')) { function loop_columns() { return 5; }}
//  if ( empty( $woocommerce_loop['columns'] ) ) { $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );}

// remove price from loop
// add_filter( 'woocommerce_after_shop_loop_item_title', 'remove_woocommerce_loop_price', 2 );
// function remove_woocommerce_loop_price() {
//     remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
//     add_action('woocommerce_after_shop_loop_item_title', 'show_prices_loop', 10);
// }

// NAO SEI SE É NECESSARIO
// function remove_show_prices_loop() {
//   return;
// }
// add_action('woocommerce_after_shop_loop_item_title', 'remove_show_prices_loop', 10);


function show_prices_loop() {
    if (!is_product()) { // Only run on catalog/loop pages
        global $product;
        
        if ($product->is_type('variable')) {
            $prices = $product->get_variation_prices();
            $min_price = current($prices['price']);
            $max_price = end($prices['price']);
            
            if ($min_price !== $max_price) {
                echo '<span class="price">A partir de R$ ' . number_format($min_price, 2, ',', '.') . '</span>';
            } else {
                echo '<span class="price">R$ ' . number_format($min_price, 2, ',', '.') . '</span>';
            }
        } else {
            $regular_price = $product->get_regular_price();
            $sale_price = $product->get_sale_price();
            
            if ($sale_price) {
                echo '<span class="price"><del>R$ ' . number_format($regular_price, 2, ',', '.') . '</del>';
                echo ' oi ';
                echo '<ins>R$ ' . number_format($sale_price, 2, ',', '.') . '</ins></span>';
            } else {
                echo '<span class="price">R$ ' . number_format($regular_price, 2, ',', '.') . '</span>';
            }


            echo '<span class="price">À vista no Pix/TED: R$xxxx.00</span>';
        }
    }
}

