<?php

add_action('acf/init', 'my_acf_init');
add_filter('wpcf7_autop_or_not', '__return_false');
function my_acf_init()
{
	if (function_exists('acf_register_block_type')) {
		acf_register_block_type(array(
			'name'              => 'statistic-block',
			'title'             => 'Static Tederic',
			'render_template'   => 'inc/template/statistics.php',
			'category'          => 'formatting',
			'icon'              => 'chart-bar',
			'keywords'          => array('stats', 'numbers'),
		));
	}
	//acf_update_setting('google_api_key', 'AIzaSyA9PpVxRojraJHg9eIxTxKkKpzv4HJjP24');
	// News
	//    register_sidebar( array(
	//        'name'          => 'News Header Widget Area',
	//        'id'            => 'custom-header-widget',
	//        'before_widget' => '<div class="chw-widget">',
	//        'after_widget'  => '</div>',
	//        'before_title'  => '<h2 class="chw-title">',
	//        'after_title'   => '</h2>',
	//    ) );
	//
	//    register_sidebar( array(
	//        'name'          => 'News Left Widget Area',
	//        'id'            => 'custom-left-widget',
	//        'before_widget' => '<div class="chw-widget">',
	//        'after_widget'  => '</div>',
	//        'before_title'  => '<h2 class="chw-title">',
	//        'after_title'   => '</h2>',
	//    ) );
	//
	//    register_sidebar( array(
	//        'name'          => 'News Footer Widget Area',
	//        'id'            => 'custom-footer-widget',
	//        'before_widget' => '<div class="chw-widget">',
	//        'after_widget'  => '</div>',
	//        'before_title'  => '<h2 class="chw-title">',
	//        'after_title'   => '</h2>',
	//    ) );

	//    // New page
	//    register_sidebar( array(
	//        'name'          => 'New page Header Widget Area',
	//        'id'            => 'new-page-header-widget',
	//        'before_widget' => '<div class="chw-widget">',
	//        'after_widget'  => '</div>',
	//        'before_title'  => '<h2 class="chw-title">',
	//        'after_title'   => '</h2>',
	//    ) );

	//    register_sidebar( array(
	//        'name'          => 'New page Left Widget Area',
	//        'id'            => 'new-page-left-widget',
	//        'before_widget' => '<div class="chw-widget">',
	//        'after_widget'  => '</div>',
	//        'before_title'  => '<h2 class="chw-title">',
	//        'after_title'   => '</h2>',
	//    ) );

	//    register_sidebar( array(
	//        'name'          => 'New page Footer Widget Area',
	//        'id'            => 'custom-footer-widget',
	//        'before_widget' => '<div class="chw-widget">',
	//        'after_widget'  => '</div>',
	//        'before_title'  => '<h2 class="chw-title">',
	//        'after_title'   => '</h2>',
	//    ) );

	if (function_exists('acf_add_options_page')) {
		acf_add_options_page(array(
			'page_title'    => 'Geoplast Thema',
			'menu_title'    => 'Geoplast Thema',
			'menu_slug'     => 'theme-general-settings',
			'capability'    => 'edit_posts',
			'redirect'      => false
		));
	}

	//    if( function_exists('acf_register_block') ) {
	//
	//        // register blocks
	//
	//        // section
	//        acf_register_block(array(
	//            'name'              => 'light-banner',
	//            'title'             => __('Light Banner'),
	//            'description'       => __('Light Banner'),
	//            'render_callback'   => 'custom_block_render_callback',
	//            'category'          => 'section',
	//            'icon'              => 'editor-contract',
	//            'keywords'          => array( 'light-banner' ),
	//        ));
	//
	//    }
}
/********************/

//function custom_block_render_callback( $block ) {
//    $slug = str_replace( 'acf/', '', $block['name'] );
//
//    if( file_exists( STYLESHEETPATH . "/inc/blocks/{$slug}.php" ) ) {
//        $GLOBALS["block_number"]++;
//        include( STYLESHEETPATH . "/inc/blocks/{$slug}.php" );
//    }
//}

//function custom_block_categories( $categories, $post ) {
//
//    return array_merge(
//        array(
//            array(
//                'slug' => 'section',
//                'title' => __( 'section' ),
//                'icon'  => 'wordpress',
//            ),
//            array(
//                'slug' => 'content',
//                'title' => __( 'content' ),
//                'icon'  => 'wordpress',
//            ),
//            array(
//                'slug' => 'widgets',
//                'title' => __( 'widgets' ),
//                'icon'  => 'wordpress',
//            ),
//        ),
//        $categories
//    );
//}
//add_filter( 'block_categories', 'custom_block_categories', 3, 2 );


add_action('after_setup_theme', 'gutenberg_css');

function gutenberg_css()
{
	add_theme_support('editor-styles'); // if you don't add this line, your stylesheet won't be added
	//    add_editor_style('css/style-editor.css'); // tries to include style-editor.css directly from your theme folder
}

add_action('admin_head', function () {
	echo "<style> 
//        #acf-field-group-fields .postbox-header {
//            display: flex !important; 
//        }
//        #acf-field-group-fields #slugdiv {
//            display: block !important; 
//        }
//        #edittag {
//            max-width: 100%;
//        }
//        #menu-to-edit .acf-menu-item-fields {
//        display: none; 
//        }
//        #menu-to-edit .menu-item-depth-1 .acf-menu-item-fields {
//            display: block;
//        } 
  </style>";
});



function my_mce4_options($init)
{
	$default_colours = '
                      "F5CE6F", "style 1",
                      "4B4B4B", "style 2", 
                      "F0F0F0", "style 3"
                      ';

	$custom_colours =  '';

	// build colour grid default+custom colors
	$init['textcolor_map'] = '[' . $default_colours . ',' . $custom_colours . ']';

	// enable 6th row for custom colours in grid
	$init['textcolor_rows'] = 6;

	return $init;
}


add_filter('tiny_mce_before_init', 'my_mce4_options');
