<?php
//  подключение woocommerce
function mytheme_add_woocommerce_support()
{
  add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

// отключение стилей
// add_filter( 'woocommerce_enqueue_styles', '__return_false' );


// add_filter( 'woocommerce_cart_needs_shipping', 'filter_cart_needs_shipping' );
// function filter_cart_needs_shipping( $needs_shipping ) {
//     // if ( is_cart() ) {
//         $needs_shipping = false;
//     // }
//     return $needs_shipping;
// }


add_filter('woocommerce_add_to_cart_fragments', 'refresh_cart_count');
function refresh_cart_count($fragments)
{
  ob_start();
  $items_count = WC()->cart->get_cart_contents_count();
?>
  <span id="cart-count"><?php
                        $cart_count = WC()->cart->get_cart_contents_count();
                        echo sprintf(_n('%d', '%d', $cart_count), $cart_count);
                        ?></span>
  <?php
  $fragments['#cart-count'] = ob_get_clean();
  return $fragments;
}
// sale flash
add_filter('woocommerce_sale_flash', 'ask_percentage_sale', 11, 3);
function ask_percentage_sale($text, $post, $product)
{
  $discount = 0;
  if ($product->get_type() == 'variable') {
    $available_variations = $product->get_available_variations();
    $maximumper = 0;
    for ($i = 0; $i < count($available_variations); ++$i) {
      $variation_id = $available_variations[$i]['variation_id'];
      $variable_product1 = new WC_Product_Variation($variation_id);
      $regular_price = $variable_product1->get_regular_price();
      $sales_price = $variable_product1->get_sale_price();
      if ($sales_price) {
        $percentage = round((($regular_price - $sales_price) / $regular_price) * 100);
        if ($percentage > $maximumper) {
          $maximumper = $percentage;
        }
      }
    }
    $text = '<span class="products-item__sale"> -' . $maximumper  . '%</span>';
  } elseif ($product->get_type() == 'simple') {
    $percentage = round((($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100);
    $text = '<span class=" products-item__sale"> -' .  $percentage . '%</span>';
  }

  return $text;
}



// archive-product.php


remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);


remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

add_action('woocommerce_before_main_content', function () {

  if (function_exists('yoast_breadcrumb')) {
    yoast_breadcrumb('<div class="breadcrumbs" id="breadcrumbs"><div class="container">', '</div></div>');
  }
}, 20);
add_action('woocommerce_sidebar', function () {
  echo '<div class="col-lg-4 d-none d-lg-block">';
}, 5);
add_action('woocommerce_sidebar', function () {
  echo '</div>';
}, 15);

add_action('woocommerce_before_shop_loop', function () {

  if (is_tax()) {

    $current_term = get_queried_object();

    $current_term_id = $current_term->term_id;
    $child_args = [
      'taxonomy'      => ['product_cat'],
      'parent'        =>  $current_term->term_id,
      'hide_empty' => false,
      'order' => 'ASC'
    ];
    $child_categories = get_terms($child_args);
    echo '<div>';


    echo '<div class="catalog-cat-block">    <div class="row"> ';

    foreach ($child_categories as $term) {

      // $ter_child_args = [
      // 	'taxonomy'      => [ 'product_cat' ],  
      // 	'parent'        =>  $term -> term_id,

      // ];

      // $ter_child_categories = get_terms( $ter_child_args );


  ?>


      <!-- <h2 class="catalog-cat-block-title small-title"><?= $term->name ?></h2> -->


      <div class="col-sm-6 mb-3">
        <a href="<?= get_term_link($term) ?>" class="catalog-cat-item">
          <div class="row" style="height: 100%">
            <div class="col-6">
              <div class="catalog-cat-item__info">
                <div class="catalog-cat-item__title"><?= $term->name ?></div>
                <?
                $count =  count_products($term->slug);
                if ($count) : ?>
                  <div class="catalog-cat-item__count">
                    <?

                    echo declOfNum($count, array('товар', 'товара', 'товаров')); ?>
                  </div>
                <? endif ?>
              </div>
            </div>
            <div class="col-6">
              <div class="catalog-cat-item__image">
                <?
                $thumb_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                $term_img = wp_get_attachment_url($thumb_id);
                if ($term_img) {
                  echo '<img src="' . $term_img . '" alt="" />';
                } else {
                  echo wc_placeholder_img('full');
                  // echo '<img src="' . get_template_directory_uri() . '/img/thumb.png" alt="" />';
                }
                ?>

              </div>
            </div>
          </div>
        </a>
      </div>



    <? }

    echo ' </div>     </div> </div>';
  } else {
    $args = [
      'taxonomy'      => ['product_cat'],
      'parent'        =>  0,

    ];
    $categories = get_terms($args);

    echo '  <div class="row">';
    foreach ($categories as $term) { ?>
      <div class="col-sm-6 mb-3">
        <a href="<?= get_term_link($term) ?>" class="catalog-cat-item">
          <div class="row" style="height: 100%">
            <div class="col-6">
              <div class="catalog-cat-item__info">
                <div class="catalog-cat-item__title"><?= $term->name ?></div>
                <div class="catalog-cat-item__count">
                  <? $count =  count_products($term->slug);

                  echo declOfNum($count, array('товар', 'товара', 'товаров')); ?>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="catalog-cat-item__image">
                <?
                $thumb_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                $term_img = wp_get_attachment_url($thumb_id);
                if ($term_img) {
                  echo '<img src="' . $term_img . '" alt="" />';
                } else {
                  echo '<img src="' . get_template_directory_uri() . '/img/thumb.png" alt="" />';
                }
                ?>

              </div>
            </div>
          </div>
        </a>
      </div>

    <? }
    echo '</div>';
    ?>

  <? } ?>

  <div class="catalog-body">
  <? }, 40);
add_action('woocommerce_before_shop_loop', function () { ?>
    <div class="catalog-body-top d-flex align-items-center">

      <span class="sort-btn">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <line x1="5" y1="8" x2="19" y2="8" stroke="#FE0000" stroke-width="2" />
          <line x1="5" y1="12" x2="14" y2="12" stroke="#FE0000" stroke-width="2" />
          <line x1="5" y1="16" x2="9" y2="16" stroke="#FE0000" stroke-width="2" />
        </svg>

      </span>

      <div class="catalog-filter-list">
        <? woocommerce_catalog_ordering() ?>

      </div>
      <div class="ms-auto catalog-filter">
        <button class="catalog-filter-btn">
          <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M14.2222 2.77437C15.2579 3.13472 16 4.10706 16 5.25C16 6.39294 15.2579 7.36528 14.2222 7.72563V13.125C14.2222 13.6082 13.8243 14 13.3333 14C12.8424 14 12.4444 13.6082 12.4444 13.125V7.72563C11.4087 7.36528 10.6667 6.39294 10.6667 5.25C10.6667 4.10706 11.4087 3.13472 12.4444 2.77437V0.875C12.4444 0.391751 12.8424 0 13.3333 0C13.8243 0 14.2222 0.391751 14.2222 0.875V2.77437ZM10.6667 9.625C10.6667 10.7679 9.92462 11.7403 8.88889 12.1006V13.125C8.88889 13.6082 8.49092 14 8 14C7.50908 14 7.11111 13.6082 7.11111 13.125V12.1006C6.07538 11.7403 5.33333 10.7679 5.33333 9.625C5.33333 8.48206 6.07538 7.50972 7.11111 7.14937V0.875C7.11111 0.391751 7.50908 0 8 0C8.49092 0 8.88889 0.391751 8.88889 0.875V7.14937C9.92462 7.50972 10.6667 8.48206 10.6667 9.625ZM3.55556 2.77437C4.59128 3.13472 5.33333 4.10706 5.33333 5.25C5.33333 6.39294 4.59128 7.36528 3.55556 7.72563V13.125C3.55556 13.6082 3.15759 14 2.66667 14C2.17575 14 1.77778 13.6082 1.77778 13.125V7.72563C0.742051 7.36528 0 6.39294 0 5.25C0 4.10706 0.742051 3.13472 1.77778 2.77437V0.875C1.77778 0.391751 2.17575 0 2.66667 0C3.15759 0 3.55556 0.391751 3.55556 0.875V2.77437ZM2.66667 6.125C3.15759 6.125 3.55556 5.73325 3.55556 5.25C3.55556 4.76675 3.15759 4.375 2.66667 4.375C2.17575 4.375 1.77778 4.76675 1.77778 5.25C1.77778 5.73325 2.17575 6.125 2.66667 6.125ZM13.3333 6.125C13.8243 6.125 14.2222 5.73325 14.2222 5.25C14.2222 4.76675 13.8243 4.375 13.3333 4.375C12.8424 4.375 12.4444 4.76675 12.4444 5.25C12.4444 5.73325 12.8424 6.125 13.3333 6.125ZM8 10.5C8.49092 10.5 8.88889 10.1082 8.88889 9.625C8.88889 9.14175 8.49092 8.75 8 8.75C7.50908 8.75 7.11111 9.14175 7.11111 9.625C7.11111 10.1082 7.50908 10.5 8 10.5Z"
              fill="#FE0000" />
          </svg>
        </button>
        <div class="catalog-filter-wrapper" id="filter">
          <div class="catalog-filter-block">
            <div class="catalog-filter-block__title">Фильтры</div>
            <div class="catalog-filter-block__close">
              <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L8.5 8.5M16 16L8.5 8.5M8.5 8.5L16 1L1 16" stroke="black" stroke-width="2" />
              </svg>

            </div>
            <?= do_shortcode('[woof]') ?>
          </div>
        </div>
      </div>
    </div>
    <? }, 50);
  add_action('woocommerce_after_shop_loop', function () {
    echo '</div>';
  }, 20);

  // content-product

  remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
  remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

  remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
  add_action('woocommerce_before_shop_loop_item_title', function () {

    echo '<span class="products-item__favorite"
  >';
    echo do_shortcode('[yith_wcwl_add_to_wishlist]');
    echo '</span>';

    echo '<a href="' . get_the_permalink() . '" class="products-item__thumb">';
  }, 15);
  add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 20);
  add_action('woocommerce_before_shop_loop_item_title', function () {
    echo '</a>';
  }, 25);


  remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
  add_action('woocommerce_shop_loop_item_title', function () {
    echo '<p class="products-item__title">' . get_the_title() . '</p>';
  }, 10);
  add_action('woocommerce_after_shop_loop_item_title', function () {
    echo ' <a href="' . get_the_permalink() . '" class="product-item__btn btn mt-3">Подробнее</a>';
  }, 25);


  remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);


  remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);



  // content-single-product.php
  remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);



  add_action('woocommerce_single_product_summary', function () {
    echo '<div class="single-product-info__top">';
  }, 1);

  add_action('woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 2);
  add_action('woocommerce_single_product_summary', function () {
    global $product;
    if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>

      <div class="sku">
        <?php esc_html_e('SKU:', 'woocommerce'); ?> <span><?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span>
        <button class="copy">
          <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="0.5" y="0.5" width="7" height="7" rx="1.5" stroke="#D8D8D8" />
            <rect x="3.5" y="3.5" width="7" height="7" rx="1.5" fill="white" stroke="#D8D8D8" />
          </svg>
        </button>
      </div>

    <?php endif;
  }, 3);
  add_action('woocommerce_single_product_summary', function () {
    echo '<a href="#" class="delivery"
            >Доставка
            <svg width="7" height="16" viewBox="0 0 7 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M3.42551 6.91016C3.00293 6.91016 2.77258 7.16122 2.73446 7.66335L2.12296 7.54155C2.16605 7.17697 2.30194 6.89358 2.53063 6.69141C2.76098 6.48757 3.05927 6.38565 3.42551 6.38565C3.78678 6.38565 4.07762 6.47597 4.29803 6.65661C4.51844 6.83724 4.62864 7.07422 4.62864 7.36754C4.62864 7.49515 4.61124 7.61032 4.57644 7.71307C4.54329 7.81416 4.49855 7.89867 4.44221 7.96662C4.38752 8.03291 4.3262 8.09505 4.25826 8.15305C4.19197 8.21106 4.12485 8.26657 4.05691 8.3196C3.98896 8.37263 3.92599 8.42815 3.86799 8.48615C3.81164 8.54415 3.76441 8.61541 3.7263 8.69993C3.68818 8.78279 3.66664 8.87642 3.66167 8.98082H3.0601C3.06673 8.84162 3.0891 8.71733 3.12722 8.60795C3.16699 8.49692 3.21422 8.40578 3.26891 8.33452C3.32525 8.26326 3.38657 8.19863 3.45286 8.14063C3.51915 8.08097 3.58461 8.02711 3.64924 7.97905C3.71552 7.93099 3.77518 7.8821 3.82821 7.83239C3.88124 7.78101 3.92433 7.72053 3.95748 7.65092C3.99062 7.57966 4.00719 7.50095 4.00719 7.41477C4.00719 7.259 3.95582 7.13636 3.85307 7.04688C3.75198 6.95573 3.60946 6.91016 3.42551 6.91016ZM3.04519 10V9.36861H3.67161V10H3.04519Z"
                fill="#3A3A3A"
              />
              <circle cx="3.5" cy="8.59082" r="3.18182" stroke="#3A3A3A" stroke-width="0.636364" />
            </svg>
          </a>
        </div>';
  }, 4);

  remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
  remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
  add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 8);
  add_action('woocommerce_single_product_summary', function () {
    global $product;
    $attributes = $product->get_attributes();
    if (!empty($attributes)) :
      echo '<a href="#characteristic" class="single-product__red-link">Все характеристики</a>';
    endif;
  }, 9);



  // remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

  add_action('woocommerce_single_product_summary', function () {
    echo '<div class="single-product__bottom">';
  }, 28);
  // add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 31 );

  add_action('woocommerce_single_product_summary', function () {
    echo '</div>';
  }, 32);



  remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
  remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);


  add_action('woocommerce_after_single_product_summary', function () {
    global $product;
    $attributes = $product->get_attributes();

    if ($product->is_type('variable') && isset($attributes['pa_shirina-lyuka-mm']) && isset($attributes['pa_dlina-lyuka-mm'])) {


      function get_width_arr($attributes)
      {

        $width_attr_ids = $attributes['pa_shirina-lyuka-mm']['options'];

        $width_arr = [];

        foreach ($width_attr_ids as $attr_id) {
          $width_arr[] =  get_term($attr_id)->name;
        }
        sort($width_arr);
        return $width_arr;
      }

      function get_height_arr($attributes)
      {
        $length_attr_ids = $attributes['pa_dlina-lyuka-mm']['options'];


        $length_arr = [];
        foreach ($length_attr_ids as $attr_id) {

          $length_arr[] = get_term($attr_id)->name;
        }

        sort($length_arr);

        return $length_arr;
      }
      function width_row($attributes)
      {
        $data_index = 1;

        echo '<div data-index="0" class="sz empty"></div>';
        $all_widths = get_width_arr($attributes);
        foreach ($all_widths as $width) {

          $total_count_width  = count($all_widths);
          $last = $total_count_width == $data_index ? 'last' : '';

          echo '<div data-index="' . $data_index . '" class="sz ' . $last . '">' . $width . '</div>';
          $data_index++;
        }

        echo '<div data-index="' . $data_index . '" class="sz">0</div> ';
      }
      function get_rows($attributes)
      {
        global $product;

        $all_lengths = get_height_arr($attributes);
        $all_widths = get_width_arr($attributes);

        $variations = $product->get_available_variations();

        foreach ($all_lengths as $length) {
          echo '<div class="white-row clearfix">';
          echo '<div data-index="0" class="pr nav">' . $length . '</div>';
          $data_index = 1;
          $used_index = [];
          $all_index = [];

          foreach ($all_widths as $width) {

            foreach ($variations as $variation) {

              $variation_width = $variation['attributes']['attribute_pa_shirina-lyuka-mm'];
              $variation_length = $variation['attributes']['attribute_pa_dlina-lyuka-mm'];
              $variation_id = $variation['variation_id'];
              $variation_price_html = $variation['price_html'];

              if ($variation_width == $width && $variation_length == $length) {
                $used_index[] = $data_index;
                echo '<div data-index="' . $data_index . '"  data-id="' . $data_index . '" data-variation-id="' . $variation_id . '" title="Кликните на цену для заказа" class="pr standart"><span>' . $variation_price_html . '</span></div>';
              }
            }
            $all_index[] = $data_index;
            $data_index++;
          }
          foreach ($all_index as $index) {
            if (!in_array($index, $used_index)) {
              echo '<div data-index="' . $index . '" data-id="' . $index . '" class="pr "></div>';
            }
          }


          echo '<div data-index="33" class="pr nav">' . $length . '</div>';
          echo '</div>';
        }
      }
    ?>

      <section class="product-sizes" id="sizes">
        <div class="container">
          <h2 class="product-sizes__title small-title">Размеры и цены</h2>
          <div class="product-sizes__text">
            <p>
              Для заказа товара выберите в таблице ячейку на пересечении необходимой ширины и высоты вашего посадочного размера, кликните на ячейку
              для возможности заказа. Высота - это сторона, на которую будет открываться люк или дверь.
            </p>
            <strong> Внимание! Для запуска в работу товара со статусом "Под заказ" требуется его оплата. </strong>
          </div>

          <div class="product-sizes__table size-table" id="size_table">
            <div class="height-row"><span>Длина</span> </div>
            <div class="height-row right"><span>Длина</span> </div>
            <div class="width-row">Ширина</div>
            <div class="middle-row clearfix">
              <div class="size-main-row">
                <div class="grey-row first-line clearfix">

                  <? width_row($attributes) ?>

                </div>

                <? get_rows($attributes) ?>

                <div class="grey-row last-line clearfix">
                  <? width_row($attributes) ?>
                </div>
              </div>
            </div>
            <div class="width-row">Ширина</div>
          </div>
        </div>
      </section>

    <? }
  }, 12);


  //short code to get the woocommerce recently viewed products
  function custom_track_product_view()
  {
    if (! is_singular('product')) {
      return;
    }

    global $post;

    if (empty($_COOKIE['woocommerce_recently_viewed']))
      $viewed_products = array();
    else
      $viewed_products = (array) explode('|', $_COOKIE['woocommerce_recently_viewed']);

    if (! in_array($post->ID, $viewed_products)) {
      $viewed_products[] = $post->ID;
    }

    if (sizeof($viewed_products) > 15) {
      array_shift($viewed_products);
    }

    // Store for session only
    wc_setcookie('woocommerce_recently_viewed', implode('|', $viewed_products));
  }

  add_action('template_redirect', 'custom_track_product_view', 20);
  function rc_woocommerce_recently_viewed_products($atts, $content = null)
  {
    // Get shortcode parameters
    extract(shortcode_atts(array(
      "per_page" => '4'
    ), $atts));
    // Get WooCommerce Global
    global $woocommerce;
    // Get recently viewed product cookies data
    $viewed_products = ! empty($_COOKIE['woocommerce_recently_viewed']) ? (array) explode('|', $_COOKIE['woocommerce_recently_viewed']) : array();
    $viewed_products = array_filter(array_map('absint', $viewed_products));
    // If no data, quit
    if (empty($viewed_products))
      return '<p style="text-align:center">Вы еще не просмотрели ни одного товара!</p>';
    // Create the object
    ob_start();
    // Get products per page
    if (!isset($per_page) ? $number = 4 : $number = $per_page)
      // Create query arguments array
      $query_args = array(
        'posts_per_page' => $number,
        'no_found_rows'  => 1,
        'post_status'    => 'publish',
        'post_type'      => 'product',
        'post__in'       => $viewed_products,
        'orderby'        => 'rand'
      );
    // Add meta_query to query args
    $query_args['meta_query'] = array();
    // Check products stock status
    $query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
    // Create a new query
    $r = new WP_Query($query_args);
    if ($r->have_posts()) : ?>
      <h2 class="products__title section-title">Вы смотрели</h2>
      <div class="row">
        <?


        while ($r->have_posts()) :
          $r->the_post();     ?>

          <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <? wc_get_template_part('content', 'product'); ?>
          </div>
          <!-- end html loop  -->
        <?php endwhile; ?>

      </div>
    <? endif ?>
    <?php wp_reset_postdata();

    return '<section class="products"><div class="container">' . ob_get_clean() . '</div></section>';

    $content .= ob_get_clean();
    return $content;
  }
  // Register the shortcode
  add_shortcode("woocommerce_recently_viewed_products", "rc_woocommerce_recently_viewed_products");

  add_action('woocommerce_after_single_product_summary', function () {
    echo do_shortcode('[woocommerce_recently_viewed_products]');
  }, 25);




  // wishlist

  if (defined('YITH_WCWL') && ! function_exists('yith_wcwl_get_items_count')) {
    function yith_wcwl_get_items_count()
    {
      ob_start();
    ?>
      <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>" class="header-center-buttons__item header-center-notification">
        <svg width="27" height="23" viewBox="0 0 27 23" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M13.0007 3.07896L13.5 3.58359L13.9994 3.07896C15.2741 1.79062 17.003 1 18.9087 1C22.8252 1 26 4.34351 26 8.46793C26 12.1939 24.0689 15.1305 21.6323 17.3582C19.1952 19.5863 16.3276 21.0319 14.6514 21.758C13.9068 22.0807 13.0933 22.0807 12.3486 21.758C10.6725 21.0319 7.80485 19.5865 5.36773 17.3582C2.93118 15.1305 1 12.1939 1 8.46793C1 4.34351 4.17491 1 8.09136 1C9.99705 1 11.7259 1.79062 13.0007 3.07896ZM13.1671 4.65061L12.3349 3.80957C11.2318 2.69476 9.7389 2.0126 8.09136 2.0126C4.70596 2.0126 1.96155 4.90275 1.96155 8.46793C1.96155 11.7871 3.67401 14.4687 5.9981 16.5936C8.32254 18.7187 11.0818 20.1143 12.7144 20.8216C13.2247 21.0426 13.7753 21.0426 14.2856 20.8216C15.9182 20.1143 18.6775 18.7187 21.002 16.5936C23.3261 14.4687 25.0386 11.7871 25.0386 8.46793C25.0386 4.90275 22.2941 2.0126 18.9087 2.0126C17.2612 2.0126 15.7682 2.69476 14.6651 3.80957L13.8329 4.65061C13.6469 4.83861 13.3532 4.83861 13.1671 4.65061Z" fill="#FF0000" stroke="black" />
        </svg>


        <span><?php echo esc_html(yith_wcwl_count_all_products()); ?></span>
      </a>
    <?php
      return ob_get_clean();
    }

    add_shortcode('yith_wcwl_items_count', 'yith_wcwl_get_items_count');
  }

  if (defined('YITH_WCWL') && ! function_exists('yith_wcwl_ajax_update_count')) {
    function yith_wcwl_ajax_update_count()
    {
      wp_send_json(array(
        'count' => yith_wcwl_count_all_products()
      ));
    }

    add_action('wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count');
    add_action('wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count');
  }

  if (defined('YITH_WCWL') && ! function_exists('yith_wcwl_enqueue_custom_script')) {
    function yith_wcwl_enqueue_custom_script()
    {
      wp_add_inline_script(
        'jquery-yith-wcwl',
        "
        jQuery( function( $ ) {
          $( document ).on( 'added_to_wishlist removed_from_wishlist', function() {
            $.get( yith_wcwl_l10n.ajax_url, {
              action: 'yith_wcwl_update_wishlist_count'
            }, function( data ) {
              $('.yith-wcwl-items-count').children('i').html( data.count );
            } );
          } );
        } );
      "
      );
    }

    add_action('wp_enqueue_scripts', 'yith_wcwl_enqueue_custom_script', 20);
  }

  // my-account
  add_filter('woocommerce_account_menu_items', 'remove_my_account_links');
  function remove_my_account_links($menu_links)
  {
    unset($menu_links['downloads']);
    unset($menu_links['edit-address']);


    $menu_links['dashboard'] = 'Главная';

    $delivery = array('delivery' => 'Доставка');

    $menu_links = array_slice($menu_links, 0, 1, true)
      + $delivery
      + array_slice($menu_links, 1, NULL, true);

    $wishlist = array('wishlist' => 'Избранное');
    $menu_links = array_slice($menu_links, 0, 3, true)
      + $wishlist
      + array_slice($menu_links, 3, NULL, true);

    $promocode = array('promocode' => 'Скидки и промокоды');
    $menu_links = $menu_links + $promocode;

    return $menu_links;
  }


  add_filter('woocommerce_get_endpoint_url', 'hook_endpoint', 10, 4);
  function hook_endpoint($url, $endpoint, $value, $permalink)
  {
    if ($endpoint === 'wishlist') {
      // Here is the place for your custom URL, it could be external
      $url = esc_url(YITH_WCWL()->get_wishlist_url());
    }
    return $url;
  }

  add_action('init', 'add_endpoint');
  function add_endpoint()
  {

    add_rewrite_endpoint('delivery', EP_PAGES);
    add_rewrite_endpoint('promocode', EP_PAGES);
  }

  add_action('woocommerce_account_delivery_endpoint', 'delivery_my_account_endpoint_content');

  function delivery_my_account_endpoint_content()
  { ?>

    <?
    $customer = wp_get_current_user();
    $orderArg = array(
      'customer_id' => $customer->ID,
      'limit' => -1,
      'orderby' => 'date',
      'order' => 'DESC',
    );
    $orders = wc_get_orders($orderArg);
    ?>
    <?
    if ($orders) {

      $last_order_id =   $orders[0]->get_ID();

      $order = wc_get_order($last_order_id);
      $delivery_address = $order->get_meta('delivery_address');
      $delivery_time = $order->get_meta('delivery_time');
      $number  = $order->get_order_number();
      $status = $order->get_status();
    ?>

      <div class="col-lg-9">
        <div class="delivery">
          <div class="delivery__top">
            <div class="delivery__title">Доставка <?= $delivery_time ?>(№ <?= $number ?>)</div>
            <div class="delivery__status"><?= wc_get_order_status_name($status) ?></div>
          </div>
          <div class="row">
            <?
            $order_items = $order->get_items();
            global $post;
            foreach ($order_items as $item_id => $item) {

              $wc_product = $item->get_product();
            ?>
              <div class="col-md-4 col-sm-6 mb-4">
                <div class="products-item">
                  <? if ($wc_product->is_on_sale()) {
                    echo apply_filters('woocommerce_sale_flash', '<span class="products-item__sale">' . esc_html__('Sale!', 'woocommerce') . '</span>', $post, $wc_product);
                  } ?>
                  <span class="products-item__favorite">
                    <?= $item->get_quantity() . 'шт.' ?>
                  </span>
                  <a href="<?= $wc_product->get_permalink(); ?>" class="products-item__thumb">
                    <?= $wc_product->get_image() ?>
                  </a>
                  <a href="<?= $wc_product->get_permalink(); ?>" class="products-item__title"><?= $wc_product->get_title(); ?></a>
                  <div class="products-item__price"><?= $wc_product->get_price_html(); ?></div>
                  <a href="<?= get_the_permalink() ?>" class="product-item__btn btn mt-3">Подробнее</a>
                </div>
              </div>
            <? } ?>
          </div>
        </div>
      </div>
  <? } else {
      wc_print_notice('Информация о ближайщих доставках отсутствует', 'notice');
    }
  }
  add_action('woocommerce_account_promocode_endpoint', 'promocode_my_account_endpoint_content');
  function promocode_my_account_endpoint_content()
  {

    $coupon_posts = get_posts(array(
      'posts_per_page'   => -1,
      'orderby'          => 'name',
      'order'            => 'asc',
      'post_type'        => 'shop_coupon',
      'post_status'      => 'publish',
    ));

    $current_user = wp_get_current_user();
    $user_email = $current_user->user_email;

    global $woocommerce;
    $has_code = false;
    // Push to array
    foreach ($coupon_posts as $coupon_post) {

      $c = new WC_Coupon($coupon_post->ID);

      // print_r($c);

      $emails = $c->get_email_restrictions();
      $code = $c->get_code();
      $discount_type = $c->get_discount_type();
      $min_price = $c->get_minimum_amount();
      $percent = $c->get_amount();

      if (in_array($user_email, $emails)) {

        if ($discount_type == 'percent') {
          echo '<p class="lc-item__percent">' . $percent . '%</p>';
        }
        if ($min_price) {
          echo '<p class="lc-item__descr">При заказе от ' . $min_price . ' ₽</p>';
        }
        echo '<div class="lc-item__promocode">' . $code . '</div>';

        $has_code = true;
      }
    }
  }
