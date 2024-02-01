<?php 
//  подключение woocommerce
function mytheme_add_woocommerce_support() {
add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// отключение стилей
// add_filter( 'woocommerce_enqueue_styles', '__return_false' );


// add_filter( 'woocommerce_cart_needs_shipping', 'filter_cart_needs_shipping' );
// function filter_cart_needs_shipping( $needs_shipping ) {
//     // if ( is_cart() ) {
//         $needs_shipping = false;
//     // }
//     return $needs_shipping;
// }


add_filter( 'woocommerce_add_to_cart_fragments', 'refresh_cart_count');
function refresh_cart_count($fragments){
  ob_start();
  $items_count = WC()->cart->get_cart_contents_count();
  ?>
   <span class="counter" id="cart-count"><?php
    $cart_count = WC()->cart->get_cart_contents_count();
    echo sprintf ( _n( '%d', '%d', $cart_count ), $cart_count );
    ?></span>
  <?php
      $fragments['#cart-count'] = ob_get_clean();
  return $fragments;
}

// archive-product.php

	
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

add_action( 'woocommerce_before_main_content', function() { ?>
  <div class="page-top ">
      <div class="container">
          <div class="page-top-wrapper">
          <?php
          if ( function_exists('yoast_breadcrumb') ) {
              yoast_breadcrumb( '<p class="breadcrumbs" id="breadcrumbs">','</p>' );
          }
          ?>
          
          <?
          $schedule = get_field('schedule', 'options');

          if ($schedule) : ?>
          <div class="page-top-schedule d-none d-lg-block">
          <?= $schedule ?>
          </div>
          <? endif ?>
          </div>
      </div>
  </div>   
<? }, 20 );

add_action( 'woocommerce_before_shop_loop', function() {
  
  $args = [
    'taxonomy'      => [ 'product_cat' ], 
    'hide_empty'    => false,
    'parent'         => 0,
    'hierarchical'  => true,
  ];

  $terms = get_terms( $args );

  ?>
  <button class="filter-btn d-block d-lg-none">
      <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect width="33" height="33" fill="#EB954A" />
          <path
              d="M24.9511 11.9122H22.5939C22.3065 10.6163 21.1567 9.65854 19.7769 9.65854C18.3971 9.65854 17.2472 10.6163 16.9598 11.9122H8.85352V13.039H16.9598C17.2472 14.3349 18.3971 15.2927 19.7769 15.2927C21.1567 15.2927 22.3065 14.3349 22.5939 13.039H24.9511V11.9122ZM19.7769 14.1659C18.7995 14.1659 18.0521 13.4334 18.0521 12.4756C18.0521 11.5178 18.7995 10.7854 19.7769 10.7854C20.7542 10.7854 21.5016 11.5178 21.5016 12.4756C21.5016 13.4334 20.7542 14.1659 19.7769 14.1659Z"
              fill="#F1F1F1"
          />
          <path
              d="M8.85352 21.0878H11.2107C11.4981 22.3837 12.6479 23.3415 14.0277 23.3415C15.4075 23.3415 16.5573 22.3837 16.8448 21.0878H24.9511V19.961H16.8448C16.5573 18.6651 15.4075 17.7073 14.0277 17.7073C12.6479 17.7073 11.4981 18.6651 11.2107 19.961H8.85352V21.0878ZM14.0277 18.8342C15.0051 18.8342 15.7525 19.5666 15.7525 20.5244C15.7525 21.4822 15.0051 22.2146 14.0277 22.2146C13.0504 22.2146 12.303 21.4822 12.303 20.5244C12.303 19.5666 13.0504 18.8342 14.0277 18.8342Z"
              fill="#F1F1F1"
          />
      </svg>
  </button>
  <div class="catalog-nav">
      <div class="categories-nav">
          <a href="#" class="categories-nav__item active">Все </a>
          
          <? foreach ( $terms as $term) :
					?>
				<a href="<?= get_term_link($term); ?>" class="categories-nav__item"><?= $term -> name ?></a>
				<? endforeach ?>
      </div>
      <? woocommerce_pagination(); ?>
      <!-- <div class="pagination">
          <a href="#" class="prev"
              ><svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="0.5" y="0.5" width="33" height="33" stroke="#212E37" />
                  <path d="M21.5332 7.93339L12.4665 17.0001L21.5332 26.0667" stroke="#212E37" />
              </svg>
          </a>
          <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> ... <a href="#">15</a>
          <a href="#" class="next"
              ><svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="0.5" y="0.5" width="33" height="33" stroke="#212E37" />
                  <path d="M12.4668 26.0666L21.5335 16.9999L12.4668 7.93328" stroke="#212E37" />
              </svg>
          </a>
      </div> -->
  </div>
<? }, 40 );


// content-product.php

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

add_action('woocommerce_before_shop_loop_item_title', function() {
?>  
  <div class="catalog-card-top">
    <div class="catalog-card-label">
      <? if (get_field('new_product')) :  ?>
      <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_534_7028)">
          <path
            d="M30.1803 13.6356C29.6877 13.2725 29.0672 12.8189 28.9921 12.5226C29.0237 11.9489 29.1875 11.3904 29.4707 10.8906C29.9048 9.89448 30.3527 8.8622 29.8547 8.00378C29.3567 7.14536 28.2241 7.00626 27.1348 6.89077C26.5702 6.88698 26.0139 6.75421 25.5084 6.50261C25.2564 5.99537 25.1241 5.43707 25.1216 4.87068C24.9992 3.78134 24.8726 2.65443 24.0086 2.15078C23.1446 1.64712 22.1109 2.08817 21.1148 2.52778C20.6145 2.81088 20.0556 2.97463 19.4815 3.00639C19.181 2.92572 18.7289 2.31075 18.3685 1.81825C17.7369 0.966806 17.026 0.00130463 15.9992 0.00130463C14.9725 0.00130463 14.2616 0.966806 13.6341 1.81825C13.2696 2.31212 12.8174 2.93126 12.5211 3.00776C11.9476 2.9732 11.3892 2.80964 10.8878 2.52915C9.88607 2.08811 8.85379 1.64849 7.99817 2.1438C7.14256 2.6391 6.99928 3.77436 6.87681 4.87062C6.87283 5.43505 6.74058 5.9912 6.49002 6.497C5.98552 6.74501 5.43139 6.87531 4.86924 6.87818C3.77853 7.00059 2.65019 7.12723 2.14797 7.9912C1.64575 8.85516 2.08687 9.88757 2.52648 10.8851C2.81062 11.3865 2.97444 11.947 3.00509 12.5226C2.92442 12.8231 2.30944 13.2766 1.81694 13.6356C0.965501 14.2616 0 14.974 0 16.0007C0 17.0275 0.965501 17.7398 1.81838 18.3659C2.31088 18.729 2.93139 19.1825 3.00652 19.4789C2.97496 20.0525 2.81114 20.611 2.52791 21.1108C2.09384 22.107 1.64588 23.1392 2.14393 23.9977C2.64197 24.8561 3.77449 24.9952 4.86383 25.1107C5.42846 25.1145 5.98474 25.2472 6.49022 25.4988C6.74221 26.0061 6.87453 26.5644 6.87701 27.1308C6.99941 28.2201 7.12606 29.347 7.99002 29.8507C8.85398 30.3543 9.87935 29.9007 10.8769 29.4667C11.3822 29.1867 11.9444 29.025 12.5213 28.9937C12.8218 29.0743 13.274 29.6893 13.6343 30.1818C14.2618 31.0333 14.9727 31.9988 15.9995 31.9988C17.0262 31.9988 17.7371 31.0333 18.3646 30.1818C18.7291 29.688 19.1813 29.0688 19.4776 28.9923C20.0515 29.0248 20.6103 29.1885 21.1109 29.4709C22.1071 29.905 23.1394 30.3502 23.9963 29.8563C24.8533 29.3624 24.9952 28.2257 25.1177 27.135C25.1217 26.5706 25.2539 26.0144 25.5045 25.5086C26.0099 25.2586 26.5656 25.1268 27.1294 25.1233C28.2202 25.0008 29.3485 24.8742 29.8507 24.0102C30.3529 23.1463 29.8994 22.1209 29.4667 21.1234C29.1835 20.6194 29.0216 20.0563 28.9937 19.4789C29.0744 19.1784 29.6894 18.7249 30.1819 18.3659C31.0333 17.7385 32.0003 17.0262 32.0003 16.0008C32.0003 14.9754 31.0331 14.2616 30.1803 13.6356Z"
            fill="#EB954A"
          />
          <path
            d="M11.8254 19.4788C11.6065 19.4788 11.4003 19.3757 11.269 19.2005L8.34734 15.3051V18.7832C8.34734 19.1673 8.03588 19.4788 7.6517 19.4788C7.26752 19.4788 6.95605 19.1673 6.95605 18.7832V13.2182C6.95605 12.834 7.26752 12.5226 7.6517 12.5226C7.87062 12.5226 8.07683 12.6257 8.20817 12.8008L11.1298 16.6963V13.2182C11.1298 12.834 11.4413 12.5226 11.8254 12.5226C12.2096 12.5226 12.5211 12.834 12.5211 13.2182V18.7832C12.5209 19.0824 12.3292 19.348 12.0453 19.4426C11.9744 19.4666 11.9002 19.4788 11.8254 19.4788Z"
            fill="#FAFAFA"
          />
          <path
            d="M17.3903 19.4788H14.6078C14.2236 19.4788 13.9121 19.1673 13.9121 18.7832V13.2182C13.9121 12.834 14.2236 12.5226 14.6078 12.5226H17.3903C17.7744 12.5226 18.0859 12.834 18.0859 13.2182C18.0859 13.6024 17.7744 13.9138 17.3903 13.9138H15.3034V18.0876H17.3903C17.7744 18.0876 18.0859 18.399 18.0859 18.7832C18.0859 19.1674 17.7744 19.4788 17.3903 19.4788Z"
            fill="#FAFAFA"
          />
          <path
            d="M17.3903 16.6963H14.6078C14.2236 16.6963 13.9121 16.3848 13.9121 16.0007C13.9121 15.6165 14.2236 15.305 14.6078 15.305H17.3903C17.7744 15.305 18.0859 15.6165 18.0859 16.0007C18.0859 16.3848 17.7744 16.6963 17.3903 16.6963Z"
            fill="#FAFAFA"
          />
          <path
            d="M24.3468 19.4788C24.047 19.4792 23.7807 19.2875 23.686 19.003L22.9556 16.809L22.2252 19.003C22.1363 19.3032 21.8501 19.5008 21.5379 19.4774C21.2289 19.4657 20.9648 19.2515 20.8896 18.9515L19.4984 13.3866C19.4054 13.0136 19.6325 12.6358 20.0055 12.5428C20.3785 12.4498 20.7563 12.6769 20.8493 13.0499L21.6604 16.297L22.2961 14.3897C22.4615 14.025 22.891 13.8635 23.2556 14.0288C23.4157 14.1014 23.5439 14.2296 23.6165 14.3897L24.2523 16.297L25.0633 13.0499C25.1563 12.6769 25.534 12.4498 25.9071 12.5428C26.2802 12.6358 26.5072 13.0135 26.4142 13.3866L25.023 18.9515C24.9478 19.2515 24.6836 19.4657 24.3747 19.4774L24.3468 19.4788Z"
            fill="#FAFAFA"
          />
        </g>
        <defs>
          <clipPath id="clip0_534_7028">
            <rect width="32" height="32" fill="white" />
          </clipPath>
        </defs>
      </svg>
      <? endif ?>
      <?php 
      global $post, $product;
      if ( $product->is_on_sale() ) : ?>
     
        <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>
      
        <?php
      endif; ?>
    </div>
    <? if (have_rows('info_list'))  :
    echo ' <div class="catalog-card-icons">';

    while (have_rows('info_list')) : the_row();
      $icon = get_sub_field('icon');
      $text = get_sub_field('text');
      echo  ' <div class="catalog-card-icons__item" title="'. $text .'" >
        <img class="svg" src="'. $icon['url'] .'" alt="'. $icon['alt'] .'" /></div>';
    endwhile;

    echo '</div>';
  endif; ?>

    
    <div class="catalog-card__thumb">
      <?= woocommerce_get_product_thumbnail( 'medium_large'); ?>
    </div>

  <?
}, 5);
add_action('woocommerce_before_shop_loop_item_title', function() {
  echo '</div>';
}, 15);

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', function() {
  echo '<a class="catalog-card__title" href="'. get_permalink() .'">'.get_the_title() .'</a>';
}, 10 );



remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

remove_action( 'woocommerce_template_loop_rating', 'woocommerce_template_loop_rating', 5 );

add_action( 'woocommerce_after_shop_loop_item', function() {
  echo '<div class="catalog-card-bottom">
													<a href="'. get_permalink() .'" class="catalog-card__btn btn">Подробнее</a>';
}, 5 );

add_action( 'woocommerce_after_shop_loop_item', function() {
  echo '</div>';
}, 15);


// content-single-product.php

add_action( 'woocommerce_before_single_product_summary', function() {
  echo '<div class="row">
  <div class="col-lg-5 mb-5 order-1">
								<div class="single-product-left d-flex flex-column flex-lg-row">     ';
} , 5 );

add_action('woocommerce_before_single_product_summary', function() {
  echo  '</div></div>';
}, 25);
add_action( 'woocommerce_after_single_product_summary', function() {
  echo '</div >';

} , 25 );



remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
add_action('woocommerce_after_single_product_summary', function() {
  ?>
  <div class="col-lg-5 order-4 order-lg-3">
    <div class="single-product-descr">
      <h2 class="single-product-block-title page-title">Описание</h2>
      <? the_content() ?>
    </div>
  </div>
  <div class="col-lg-7 order-3 order-lg-4 mb-5 mb-lg-0">
    <div class="single-product-characheristics">
      <h2 class="single-product-block-title page-title">Характеристики</h2>
      <? global $product;
        do_action( 'woocommerce_product_additional_information', $product ); ?> 
     
    </div>
  </div>
  <?
}, 2);

add_filter( 'woocommerce_sale_flash', 'ask_percentage_sale', 11, 3 );
function ask_percentage_sale( $text, $post, $product ) {
    $discount = 0;
    if ( $product->get_type() == 'variable' ) {
        $available_variations = $product->get_available_variations();								
        $maximumper = 0;
        for ($i = 0; $i < count($available_variations); ++$i) {
            $variation_id=$available_variations[$i]['variation_id'];
            $variable_product1= new WC_Product_Variation( $variation_id );
            $regular_price = $variable_product1->get_regular_price();
            $sales_price = $variable_product1->get_sale_price();
            if( $sales_price ) {
                $percentage= round( ( ( $regular_price - $sales_price ) / $regular_price ) * 100 ) ;
                if ($percentage > $maximumper) {
                    $maximumper = $percentage;
                }
            }        
        }
        $text = '<span class="onsale">' . $maximumper  . '%</span>';
    } elseif ( $product->get_type() == 'simple' ) {
        $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
        $text = '<span class="onsale">' . $percentage . '%</span>';
    }   

    return $text;
}


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );


add_action('woocommerce_single_product_summary', function() {
  echo '<div class="col-lg-7 mb-5 order-2">';
}, 2);
add_action('woocommerce_single_product_summary', function() {
  echo '<div class="single-product-info__top">
        <div class="single-product-price">
          <div class="single-product-price__title">Розничная цена</div>';
}, 5);
add_action('woocommerce_single_product_summary', function() {
  echo '</div>';
  if (have_rows('info_list'))  :
    echo '<ul class="single-product-info-list">';

    while (have_rows('info_list')) : the_row();
      $icon = get_sub_field('icon');
      $text = get_sub_field('text');
      echo  '<li class="single-product-info-list__item">
        <img src="'. $icon['url'] .'" alt="'. $icon['alt'] .'" class="single-product-info-list__icon" />
        <span>'. $text .'</span>
      </li>';
    endwhile;

    echo '</ul>';
  endif;
  echo '</div>';
},15);

add_action('woocommerce_single_product_summary', function() {
  echo '</div>';
}, 70);

// cart

remove_action('woocommerce_cart_collaterals','woocommerce_cross_sell_display' );




