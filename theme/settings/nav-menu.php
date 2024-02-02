<?php 
add_action( 'after_setup_theme', 'menu');

function menu() {
  register_nav_menu('header-menu', 'Меню шапки');
  register_nav_menu('footer-menu', 'Меню подвала');
  register_nav_menu('footer-links', 'Доп меню подвала');
}

// Изменяет основные параметры меню
add_filter( 'wp_nav_menu_args', 'filter_wp_menu_args' );
function filter_wp_menu_args ($args) {
  if ( $args['theme_location'] === 'header-menu') {
    $args['container'] = false;
    $args['item_wrap'] = '<ul class="%2$s ">%3$s </ul>';
    $args['menu_class'] = 'header-menu';
  }
  
  if ( $args['theme_location'] === 'footer-menu') {
    $args['container'] = false;
    $args['item_wrap'] = '<ul class="%2$s ">%3$s </ul>';
    $args['menu_class'] = 'footer-menu';
  }
  if ( $args['theme_location'] === 'footer-links') {
    $args['container'] = false;
    $args['item_wrap'] = '<ul class="%2$s ">%3$s </ul>';
    $args['menu_class'] = 'footer-links';
  }
  return $args;
} 


// Изменяем атрибут class у тега li 
add_filter( 'nav_menu_css_class', 'filter_menu_css_classes', 10, 4 );
function filter_menu_css_classes( $classes, $item, $args, $depth ) {
  
  if ($args -> theme_location === 'header-menu' ) {
    $classes = [
      // классы для li, например nav_item $depth глубина вложенности равна 0
			'header-menu__item'
    ];    
  }
 
  if ( $args -> theme_location === 'footer-menu') {
    $classes = [
      // классы для li, например nav_item $depth глубина вложенности равна 0
			'footer-menu__item'
    ];    
  }
  return $classes;
}
// Изменяем класс у подменю ul
add_filter( 'nav_menu_submenu_css_class', 'filter_nav_menu_submenu_css_class', 10, 3 );
function filter_nav_menu_submenu_css_class( $classes, $args, $depth) {
  if ($args -> theme_location === 'header-menu' ) {
    $classes = [
      'header-submenu'
      // классы для ul sub-menu
    ];
  }
  if ($args -> theme_location === 'footer-menu' ) {
    $classes = [
      'footer-submenu'
      // классы для ul sub-menu
    ];
  }
  
  return $classes;
}
add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4 );
function filter_nav_menu_link_attributes( $attr, $item, $args, $depth) {
  
   // класс для ссылки

    if ( $item->current ) {
      $class = 'active';
      $attr['class'] = isset( $attr['class'] ) ? "{$attr['class']} $class" : $class;
    }
    


  

  return $attr;
} 