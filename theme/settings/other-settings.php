<?php 

// Удаление  меню из админки
add_action( 'admin_menu', 'remove_menus' );

add_action( 'after_setup_theme', function() {
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-thumbnails' );

});
function remove_menus(){
	// remove_menu_page( 'edit.php' );                   // Записи
	remove_menu_page( 'edit-comments.php' );
}

// Преобразование номера телефона
function get_phone_href($phone) {
  return preg_replace('/[\s+()-]/i', '', $phone);
}

// Настройки темы acf
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Настройки темы',
		'menu_title'	=> 'Настройки темы',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Общие блоки',
		'menu_title'	=> 'Общие блоки',
		'menu_slug' 	=> 'theme-global-blocks',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

// Удаление <p> <br> contact form 7 
add_filter('wpcf7_autop_or_not', '__return_false');


// add_filter("wpseo_breadcrumb_links", "custom_breadcrumbs");

// function custom_breadcrumbs($links)
// {
//     $post_type = get_post_type();

//     if ($post_type === 'service') {
//         $breadcrumb[] = array(
//             'url' => '/services',
//             'text' => 'Услуги'
//         );
//         array_splice($links, 1, -3, $breadcrumb);
//     }
//     if ($post_type === 'post') {
//         $breadcrumb[] = array(
//             'url' => '/news',
//             'text' => 'Статьи'
//         );
//         array_splice($links, 1, -3, $breadcrumb);
//     }
//     return $links;
// }
add_post_type_support( 'post', array(
     'excerpt',
) );

function declOfNum($num, $titles) {
    $cases = array(2, 0, 1, 1, 1, 2);

    return $num . " " . $titles[($num % 100 > 4 && $num % 100 < 20) ? 2 : $cases[min($num % 10, 5)]];
}



function count_products ($slug) {

    //return $count;
    $args = array(
      'post_type'     => 'product', //post type, I used 'product'
      'post_status'   => 'publish', // just tried to find all published post
      'posts_per_page' => -1,  //show all
      'tax_query' => array(
        'relation' => 'AND',
        array(
          'taxonomy' => 'product_cat',  //taxonomy name  here, I used 'product_cat'
          'field' => 'slug',
          'terms' => array( $slug )
        )
      )
    );

    $query = new WP_Query( $args);

    

    return (int)$query->post_count;

}