<?php 
add_action( 'init', 'register_post_types' );
function register_post_types(){

// 	register_taxonomy( 'tag', [ 'works' ], [
// 		'label'                 => '', // определяется параметром $labels->name
// 		'labels'                => [
// 			'name'              => 'Теги',
// 			'singular_name'     => 'Тег',
// 			'search_items'      => 'Искать тег',
// 			'all_items'         => 'Все теги',
// 			'view_item '        => 'Смотреть тег',
// 			'parent_item'       => 'Родительский тег',
// 			'parent_item_colon' => 'Родительский тег:',
// 			'edit_item'         => 'Редактировать тег',
// 			'update_item'       => 'Обновить тег',
// 			'add_new_item'      => 'Добавить новый тег',
// 			'new_item_name'     => 'Имя нового тега',
// 			'menu_name'         => 'Теги',
// 			'back_to_items'     => '← Вернуться к тегам',
// 		],
// 		'description'           => '', // описание таксономии
// 		'public'                => false,
// 		// 'publicly_queryable'    => null, // равен аргументу public
// 		'show_in_nav_menus'     => true, // равен аргументу public
// 		'show_ui'               => true, // равен аргументу public
// 		'show_in_menu'          => true, // равен аргументу show_ui
// 		'show_tagcloud'         => true, // равен аргументу show_ui
// 		'show_in_quick_edit'    => null, // равен аргументу show_ui
// 		'hierarchical'          => false,

// 		'rewrite'               => true,
// 		//'query_var'             => $taxonomy, // название параметра запроса
// 		'capabilities'          => array(),
// 		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
// 		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
// 		'show_in_rest'          => null, // добавить в REST API
// 		'rest_base'             => null, // $taxonomy
// 		// '_builtin'              => false,
// 		//'update_count_callback' => '_update_post_term_count',
// 	] );
// 	register_taxonomy( 'service_cat', [ 'service' ], [
// 		'label'                 => '', // определяется параметром $labels->name
// 		'labels'                => [
// 			'name'              => 'Категории',
// 			'singular_name'     => 'Категория',
// 			'search_items'      => 'Искать Категорию',
// 			'all_items'         => 'Все Категории',
// 			'view_item '        => 'Смотреть Категорию',
// 			'parent_item'       => 'Родительская Категория',
// 			'parent_item_colon' => 'Родительская Категория:',
// 			'edit_item'         => 'Редактировать Категорию',
// 			'update_item'       => 'Обновить Категорию',
// 			'add_new_item'      => 'Добавить Категорию',
// 			'new_item_name'     => 'Имя новой Категории',
// 			'menu_name'         => 'Категории',
// 			'back_to_items'     => '← Вернуться к Категориям',
// 		],
// 		'description'           => '', // описание таксономии
// 		'public'                => true,
// 		// 'publicly_queryable'    => null, // равен аргументу public
// 		'show_in_nav_menus'     => true, // равен аргументу public
// 		'show_ui'               => true, // равен аргументу public
// 		'show_in_menu'          => true, // равен аргументу show_ui
// 		'show_tagcloud'         => true, // равен аргументу show_ui
// 		'show_in_quick_edit'    => null, // равен аргументу show_ui
// 		'hierarchical'          => true,

// 		'rewrite'               => true,
// 		//'query_var'             => $taxonomy, // название параметра запроса
// 		'capabilities'          => array(),
// 		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
// 		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
// 		'show_in_rest'          => null, // добавить в REST API
// 		'rest_base'             => null, // $taxonomy
// 		// '_builtin'              => false,
// 		//'update_count_callback' => '_update_post_term_count',
// 	] );
	register_post_type( 'review', [
		'label'  => null,
		'labels' => [
			'name'               => 'Отзывы', // основное название для типа записи
			'singular_name'      => 'Отзыв', // название для одной записи этого типа
			'add_new'            => 'Добавить Отзыв', // для добавления новой записи
			'add_new_item'       => 'Добавление Отзыва', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Отзыва', // для редактирования типа записи
			'new_item'           => 'Новый Отзыв', // текст новой записи
			'view_item'          => 'Смотреть Отзыв', // для просмотра записи этого типа.
			'search_items'       => 'Искать Отзыв', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Отзывы', // название меню
		],
		'description'         => '',
		'public'              => false,
		'publicly_queryable'  => null, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-welcome-write-blog',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'thumbnail','editor' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [''],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
// 	register_post_type( 'doctors', [
// 		'label'  => null,
// 		'labels' => [
// 			'name'               => 'Врачи ', // основное название для типа записи
// 			'singular_name'      => 'Врач', // название для одной записи этого типа
// 			'add_new'            => 'Добавить Врача', // для добавления новой записи
// 			'add_new_item'       => 'Добавление Врача', // заголовка у вновь создаваемой записи в админ-панели.
// 			'edit_item'          => 'Редактирование Врача', // для редактирования типа записи
// 			'new_item'           => 'Новый Врач', // текст новой записи
// 			'view_item'          => 'Смотреть Врача', // для просмотра записи этого типа.
// 			'search_items'       => 'Искать Врача', // для поиска по этим типам записи
// 			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
// 			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
// 			'parent_item_colon'  => '', // для родителей (у древовидных типов)
// 			'menu_name'          => 'Врачи', // название меню
// 		],
// 		'description'         => '',
// 		'public'              => false,
// 		'publicly_queryable'  => null, // зависит от public
// 		'exclude_from_search' => true, // зависит от public
// 		'show_ui'             => true, // зависит от public
// 		'show_in_nav_menus'   => true, // зависит от public
// 		'show_in_menu'        => true, // показывать ли в меню адмнки
// 		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
// 		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
// 		'rest_base'           => null, // $post_type. C WP 4.7
// 		'menu_position'       => null,
// 		'menu_icon'           => 'dashicons-admin-users',
// 		//'capability_type'   => 'post',
// 		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
// 		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
// 		'hierarchical'        => false,
// 		'supports'            => [ 'title', 'thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
// 		'taxonomies'          => [''],
// 		'has_archive'         => false,
// 		'rewrite'             => true,
// 		'query_var'           => true,
// 	] );

// 	register_post_type( 'service', [
// 		'label'  => null,
// 		'labels' => [
// 			'name'               => 'Услуги ', // основное название для типа записи
// 			'singular_name'      => 'Услуга', // название для одной записи этого типа
// 			'add_new'            => 'Добавить Услугу', // для добавления новой записи
// 			'add_new_item'       => 'Добавление Услуги', // заголовка у вновь создаваемой записи в админ-панели.
// 			'edit_item'          => 'Редактирование Услуги', // для редактирования типа записи
// 			'new_item'           => 'Новая Услуга', // текст новой записи
// 			'view_item'          => 'Смотреть Услуги', // для просмотра записи этого типа.
// 			'search_items'       => 'Искать Услугу', // для поиска по этим типам записи
// 			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
// 			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
// 			'parent_item_colon'  => '', // для родителей (у древовидных типов)
// 			'menu_name'          => 'Услуги', // название меню
// 		],
// 		'description'         => '',
// 		'public'              => true ,
// 		'publicly_queryable'  => null, // зависит от public
// 		'exclude_from_search' => true, // зависит от public
// 		'show_ui'             => true, // зависит от public
// 		'show_in_nav_menus'   => true, // зависит от public
// 		'show_in_menu'        => true, // показывать ли в меню адмнки
// 		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
// 		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
// 		'rest_base'           => null, // $post_type. C WP 4.7
// 		'menu_position'       => null,
// 		'menu_icon'           => 'dashicons-format-aside',
// 		//'capability_type'   => 'post',
// 		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
// 		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
// 		'hierarchical'        => false,
// 		'supports'            => [ 'title', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
// 		'taxonomies'          => ['service_cat'],
// 		'has_archive'         => false,
// 		'rewrite'             => true,
// 		'query_var'           => true,
// 	] );
}

?>