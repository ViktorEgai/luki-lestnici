<? 
add_action( 'wp_ajax_get_variation', 'get_variation' );
add_action( 'wp_ajax_nopriv_get_variation', 'get_variation' );

function get_variation () { 
  $variation_id = $_POST['id'];
  $variation = wc_get_product($variation_id);
  $image = $variation -> get_image();

 
  ?>

  <div class="row">
    <div class="col-lg-6  mb-4 mb-lg-0">
      <div class="single-product-left d-flex justify-content-center">
        
          <div class="single-product-slider__item">
            <?=   $image;?>
          </div>
          
       
        
      </div>
    </div>
    <div class="col-lg-6">
        <div class="single-product-info">
          <div class="single-product-info__top">
            <?php if ( $variation->is_on_sale() ) : ?>
      
              <?php echo apply_filters( 'woocommerce_sale_flash', '<div class="label">' . esc_html__( 'Sale!', 'woocommerce' ) . '</div>', $post, $variation ); ?>
      
              <?php
            endif;?> 
            <? if (  $variation->get_sku() ) : ?>
      
                <div class="sku">
                  <?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span><?php echo ( $sku = $variation->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span>
                  <button class="copy">
                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="7" height="7" rx="1.5" stroke="#D8D8D8" />
                      <rect x="3.5" y="3.5" width="7" height="7" rx="1.5" fill="white" stroke="#D8D8D8" />
                    </svg>
                  </button>
                </div>
              
            <?php endif; ?>
          
            <a href="#" class="delivery"
              >Доставка
              <svg width="7" height="16" viewBox="0 0 7 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M3.42551 6.91016C3.00293 6.91016 2.77258 7.16122 2.73446 7.66335L2.12296 7.54155C2.16605 7.17697 2.30194 6.89358 2.53063 6.69141C2.76098 6.48757 3.05927 6.38565 3.42551 6.38565C3.78678 6.38565 4.07762 6.47597 4.29803 6.65661C4.51844 6.83724 4.62864 7.07422 4.62864 7.36754C4.62864 7.49515 4.61124 7.61032 4.57644 7.71307C4.54329 7.81416 4.49855 7.89867 4.44221 7.96662C4.38752 8.03291 4.3262 8.09505 4.25826 8.15305C4.19197 8.21106 4.12485 8.26657 4.05691 8.3196C3.98896 8.37263 3.92599 8.42815 3.86799 8.48615C3.81164 8.54415 3.76441 8.61541 3.7263 8.69993C3.68818 8.78279 3.66664 8.87642 3.66167 8.98082H3.0601C3.06673 8.84162 3.0891 8.71733 3.12722 8.60795C3.16699 8.49692 3.21422 8.40578 3.26891 8.33452C3.32525 8.26326 3.38657 8.19863 3.45286 8.14063C3.51915 8.08097 3.58461 8.02711 3.64924 7.97905C3.71552 7.93099 3.77518 7.8821 3.82821 7.83239C3.88124 7.78101 3.92433 7.72053 3.95748 7.65092C3.99062 7.57966 4.00719 7.50095 4.00719 7.41477C4.00719 7.259 3.95582 7.13636 3.85307 7.04688C3.75198 6.95573 3.60946 6.91016 3.42551 6.91016ZM3.04519 10V9.36861H3.67161V10H3.04519Z"
                  fill="#3A3A3A"
                />
                <circle cx="3.5" cy="8.59082" r="3.18182" stroke="#3A3A3A" stroke-width="0.636364" />
              </svg>
            </a>
          </div>
          <h2 class="single-product__title small-title"><?= $variation->get_title(); ?></h2>
            <? 
            $attributes = $variation -> get_attributes();
            if( $attributes ) {
              echo '<ul class="single-product-list">';
              
              foreach( $attributes as $attribute => $value ) {
                if ($attribute == 'pa_shirina-lyuka-mm') {
                  echo '<li class="single-product-list__item"> Ширина люка (мм) - <span>' . $value . '</span></li>';
                } else {
                  echo '<li class="single-product-list__item"> Длина люка (мм) - <span>' . $value . '</span></li>';
                }
                
                
              }
              echo '</ul>';
            } ?> 
          
          
          <div class="single-product__bottom mt-5">
            <a href="<?= $variation -> add_to_cart_url()?>" class="single-product__btn btn">В корзину</a>
            
            <!-- <div class="single-product__price">20 145 ₽</div> -->
            <?= $variation -> get_price_html() ?>
          </div>
        </div>
    </div>
  </div>
  <? wp_die();
}

add_action( 'wp_ajax_get_cart_count', 'get_cart_count' );
add_action( 'wp_ajax_nopriv_get_cart_count', 'get_cart_count' );

function get_cart_count () {
  echo WC()->cart->get_cart_contents_count();
  wp_die();
}

