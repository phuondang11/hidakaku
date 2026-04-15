<?php
/*======================/Create post type - Start /=============================*/
function prefix_register_all() {
    /* recruitment POST TYPE */
	register_post_type(
		'recruitment',
		array(
			'labels' => array(
				'name' => __( '採用情報', 'text_domain' ),
				'singular_name' => __( '採用情報', 'text_domain' ),
				'menu_name' => __( '採用情報', 'text_domain' ),
				'name_admin_bar' => __( '採用情報', 'text_domain' ),
				'all_items' => __( '記事一覧', 'text_domain' ),
				'add_new' => _x( '新規追加', 'recruitment', 'text_domain' ),
				'add_new_item' => __( 'Add New Item', 'text_domain' ),
				'edit_item' => __( 'Edit Item', 'text_domain' ),
				'new_item' => __( 'New Item', 'text_domain' ),
				'view_item' => __( 'View Item', 'text_domain' ),
				'search_items' => __( 'Search Items', 'text_domain' ),
				'not_found' => __( 'No items found.', 'text_domain' ),
				'not_found_in_trash' => __( 'No items found in Trash.', 'text_domain' ),
				'parent_item_colon' => __( 'Parent Items:', 'text_domain' ),
			),
			'public' => true,
			'menu_position' => 5,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
                'excerpt',
				'custom-fields',
			),
            'taxonomies' => array(
			'recruitment-category',
			),
			'has_archive' => true,
			'menu_icon' => 'dashicons-format-aside',
			'rewrite' => array(
				'slug' => 'recruitment',
			)

		)
	);
    /* recruitment POST TYPE  -- END */

    /* recruitment taxonomy */
    register_taxonomy(
		'recruitment-cat',
		array(
			'recruitment',
		),
		array(
			'labels'            => array(
				'name'              => _x('症例カテゴリ追加', 'recruitment', 'text_domain'),
				'singular_name'     => _x('Category recruitment', 'recruitment', 'text_domain'),
				'menu_name'         => __('症例カテゴリ追加', 'text_domain'),
				'all_items'         => __('All 症例カテゴリ追加', 'text_domain'),
				'edit_item'         => __('Edit Category recruitment', 'text_domain'),
				'view_item'         => __('View Category recruitment', 'text_domain'),
				'update_item'       => __('Update Category recruitment', 'text_domain'),
				'add_new_item'      => __('Add New Category recruitment', 'text_domain'),
				'new_item_name'     => __('New Category Name recruitment', 'text_domain'),
				'parent_item'       => __('Parent Category recruitment', 'text_domain'),
				'parent_item_colon' => __('Parent Category recruitment:', 'text_domain'),
				'search_items'      => __('Search 症例カテゴリ追加', 'text_domain'),
			),

			'show_admin_recruitment' => true,
			'hierarchical'      => true,
			'rewrite'           => array(
				'slug' => 'recruitment',
			),
		)
	);
    /* recruitment POST TYPE  -- END */

	// =========== end 

	/* store POST TYPE */
	register_post_type(
		'store',
		array(
			'labels' => array(
				'name' => __( '店舗一覧', 'text_domain' ),
				'singular_name' => __( '店舗一覧', 'text_domain' ),
				'menu_name' => __( '店舗一覧', 'text_domain' ),
				'name_admin_bar' => __( '店舗一覧', 'text_domain' ),
				'all_items' => __( '記事一覧', 'text_domain' ),
				'add_new' => _x( '新規追加', 'store', 'text_domain' ),
				'add_new_item' => __( 'Add New Item', 'text_domain' ),
				'edit_item' => __( 'Edit Item', 'text_domain' ),
				'new_item' => __( 'New Item', 'text_domain' ),
				'view_item' => __( 'View Item', 'text_domain' ),
				'search_items' => __( 'Search Items', 'text_domain' ),
				'not_found' => __( 'No items found.', 'text_domain' ),
				'not_found_in_trash' => __( 'No items found in Trash.', 'text_domain' ),
				'parent_item_colon' => __( 'Parent Items:', 'text_domain' ),
			),
			'public' => true,
			'menu_position' => 5,
			'supports' => array(
				'title',
				// 'editor',
				'thumbnail',
				'excerpt',
				'custom-fields',
			),
			'taxonomies' => array(
			'store-category',
			),
			'has_archive' => true,
			'menu_icon' => 'dashicons-format-aside',
			'rewrite' => array(
				'slug' => 'store',
			)

		)
	);
	/* store POST TYPE  -- END */

	/* store taxonomy */
	register_taxonomy(
		'store-cat',
		array(
			'store',
		),
		array(
			'labels'            => array(
				'name'              => _x('症例カテゴリ追加', 'store', 'text_domain'),
				'singular_name'     => _x('Category store', 'store', 'text_domain'),
				'menu_name'         => __('症例カテゴリ追加', 'text_domain'),
				'all_items'         => __('All 症例カテゴリ追加', 'text_domain'),
				'edit_item'         => __('Edit Category store', 'text_domain'),
				'view_item'         => __('View Category store', 'text_domain'),
				'update_item'       => __('Update Category store', 'text_domain'),
				'add_new_item'      => __('Add New Category store', 'text_domain'),
				'new_item_name'     => __('New Category Name store', 'text_domain'),
				'parent_item'       => __('Parent Category store', 'text_domain'),
				'parent_item_colon' => __('Parent Category store:', 'text_domain'),
				'search_items'      => __('Search 症例カテゴリ追加', 'text_domain'),
			),

			'show_admin_store' => true,
			'hierarchical'      => true,
			'rewrite'           => array(
				'slug' => 'store-cat',
			),
		)
	);
	/* store POST TYPE  -- END */

	// ============== end 

	/* product POST TYPE */
	register_post_type(
		'product',
		array(
			'labels' => array(
				'name' => __( '製品一覧', 'text_domain' ),
				'singular_name' => __( '製品一覧', 'text_domain' ),
				'menu_name' => __( '製品一覧', 'text_domain' ),
				'name_admin_bar' => __( '製品一覧', 'text_domain' ),
				'all_items' => __( '記事一覧', 'text_domain' ),
				'add_new' => _x( '新規追加', 'product', 'text_domain' ),
				'add_new_item' => __( 'Add New Item', 'text_domain' ),
				'edit_item' => __( 'Edit Item', 'text_domain' ),
				'new_item' => __( 'New Item', 'text_domain' ),
				'view_item' => __( 'View Item', 'text_domain' ),
				'search_items' => __( 'Search Items', 'text_domain' ),
				'not_found' => __( 'No items found.', 'text_domain' ),
				'not_found_in_trash' => __( 'No items found in Trash.', 'text_domain' ),
				'parent_item_colon' => __( 'Parent Items:', 'text_domain' ),
			),
			'public' => true,
			'menu_position' => 5,
			'supports' => array(
				'title',
				// 'editor',
				'thumbnail',
                // 'excerpt',
				'custom-fields',
			),
            'taxonomies' => array(
			'product-cat',
			),
			'has_archive' => true,
			'menu_icon' => 'dashicons-format-aside',
			'rewrite' => array(
				'slug' => 'product',
			)

		)
	);
    /* product POST TYPE  -- END */

    /* product taxonomy */
    register_taxonomy(
		'product-cat',
		array(
			'product',
		),
		array(
			'labels'            => array(
				'name'              => _x('症例カテゴリ追加', 'product', 'text_domain'),
				'singular_name'     => _x('Category product', 'product', 'text_domain'),
				'menu_name'         => __('症例カテゴリ追加', 'text_domain'),
				'all_items'         => __('All 症例カテゴリ追加', 'text_domain'),
				'edit_item'         => __('Edit Category product', 'text_domain'),
				'view_item'         => __('View Category product', 'text_domain'),
				'update_item'       => __('Update Category product', 'text_domain'),
				'add_new_item'      => __('Add New Category product', 'text_domain'),
				'new_item_name'     => __('New Category Name product', 'text_domain'),
				'parent_item'       => __('Parent Category product', 'text_domain'),
				'parent_item_colon' => __('Parent Category product:', 'text_domain'),
				'search_items'      => __('Search 症例カテゴリ追加', 'text_domain'),
			),

			'show_admin_product' => true,
			'hierarchical'      => true,
			'rewrite'           => array(
				'slug' => 'product-cat',
			),
		)
	);
    /* product POST TYPE  -- END */
}

add_action( 'init', 'prefix_register_all', 0 );
function prefix_flush_rewrite_rules() {
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'prefix_flush_rewrite_rules' );
/*======================/Create post type - end /=============================*/


/* change color for icon menu admin */
function replace_admin_menu_icons_css() {
  ?>
  <style>
    #adminmenu .menu-icon-info div.wp-menu-image:before,
    #adminmenu .menu-icon-voice div.wp-menu-image:before,
    #adminmenu .menu-icon-event div.wp-menu-image:before,
    #adminmenu .menu-icon-works div.wp-menu-image:before{

      color: #F08D39;
    }
	/* .hidden_field{display: none !important;} */
  </style>
  <?php
}
add_action( 'admin_head', 'replace_admin_menu_icons_css' );
?>