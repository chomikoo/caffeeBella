<?php
/**
*   @package Blank
*   
*/
	// Custom Post Type
	
    add_action('init', 'chomikoo_init_posttypes');
    
    function chomikoo_init_posttypes(){
        
        
        /*
         * Register Recipes Post Type
         */
        $product_args = array(
            'labels' => array(
                'name'              => __( 'Produkty'),
                'singular_name'     => __( 'Produkty'),
                'all_items'         => __( 'Wszystkie Produkty'),
                'add_new'           => __( 'Dodaj nowy produkt'),
                'add_new_item'      => __( 'Dodaj nowy produkt'),
                'edit_item'         => __( 'Edytuj produkt'),
                'new_item'          => __( 'Nowy produkt'),
                'view_item'         => __( 'Zobacz produkt'),
                'search_items'      => __( 'Szukaj w produktach'),
                'not_found'         =>  __( 'Nie znaleziono żadnych produktów'),
                'not_found_in_trash' => __( 'Nie znaleziono żadnych produktów w koszu'),
                'parent_item_colon' => __( '' ),
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true, 
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => 5,
            'supports' => array(
                'title', 'editor','thumbnail','excerpt',
            ),
            'has_archive' => true,           
            'menu_icon'   => 'dashicons-products',

            // 'taxonomies'    => array( 'category' ),
        );
        
        register_post_type('products', $product_args);
}

add_action( 'init', 'chomikoo_init_taxonomy' );

function chomikoo_init_taxonomy() {
    register_taxonomy(
        'product_type',
        'products',
        array(
            'hierarhical' => true,
            'labels' => array(
                'name' => _( 'Kategorie Produktów' ),
                'singular_name' => _( 'Produkt' ),
                'search_items' =>  _( 'Wyszukaj typy produktów' ),
                'popular_items' => _( 'Najpopularniejsze typy' ),
                'all_items' => _( 'Wszystkie typy prodktów' ),
                'most_used_items' => null,
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => _( 'Edytuj typ' ) ,
                'update_item' => _( 'Aktualizuj typ' ),
                'add_new_item' => _( 'Dodaj nowy typ' ),
                'new_item_name' => _( 'Nazwa nowego typu' ),
                'separate_items_with_commas' => _( 'Oddziel typy przecinkiem' ),
                'add_or_remove_items' => _( 'Dodaj lub usuń typy' ),
                'choose_from_most_used' => _( 'Wybierz spośród najczęścież używanych tpyów' ),
                'menu_name' => _( 'Typy produktów' ),
            ),
            'show_ui' => true,
            'show_admin_column' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'rewrite' => array('slug' => 'ingredient' )
        )
    );
}
 





// Show Taxonommy column in CPT

// add_action('restrict_manage_posts','chomikoo_restrict_manage_posts');

// function chomikoo_restrict_manage_posts() {
//     global $typenow;

//     if ($typenow=='products'){
//                  $args = array(
//                      'show_option_all' => "Show All Categories",
//                      'taxonomy'        => 'your_custom_taxonomy',
//                      'name'               => 'your_custom_taxonomy'

//                  );
//         wp_dropdown_categories($args);
//                 }
// }

// add_action( 'request', 'my_request' );

// function my_request($request) {
//     if (is_admin() && $GLOBALS['PHP_SELF'] == '/wp-admin/edit.php' && isset($request['post_type']) && $request['post_type']=='products') {
//         $request['term'] = get_term($request['product_type'],'product_type')->name;

//     }
//     return $request;
// }