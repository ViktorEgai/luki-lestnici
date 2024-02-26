<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

<?php if ( $has_orders ) : ?>
	
	<?php
	foreach ( $customer_orders->orders as $customer_order ) {
		$order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
		$item_count = $order->get_item_count() - $order->get_item_count_refunded();
		?>
		
		<div class="order-dropdown woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order">
			<div class="order-dropdown__top">
				<div class="order-info">
					<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
						
							<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>
		
							<?php elseif ( 'order-number' === $column_id ) : ?>
								<p class="order-number">
									<?php echo esc_html( _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number() ); ?>
								</p>
		
							<?php elseif ( 'order-date' === $column_id ) : ?>
								<time class="order-date" datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>
		
							<?php elseif ( 'order-status' === $column_id ) : ?>
								<div class="order-status">
									<?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
								</div>
		
							<?php elseif ( 'order-total' === $column_id ) : ?>
								<p class="order-price">
									<?php
									/* translators: 1: formatted order total 2: total order items */
									echo wp_kses_post( sprintf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ) );
									?>
			
								</p>
							
							<?php endif; ?>
						
					<?php endforeach; ?>
				</div>
				<div class="order-arrow">
					<svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M1 6.5H14M14 6.5L8.57534 1M14 6.5L8.57534 12"
							stroke="#F53B49"
							stroke-width="2"
							stroke-linecap="round"
							stroke-linejoin="round"
						/>
					</svg>
				</div>
				
			</div>
			<div class="order-dropdown__body">
				<div class="row">					
					<? 
          $order_items = $order->get_items();
          global $post;
          foreach( $order_items as $item_id => $item ){     
            
            $wc_product = $item->get_product(); 
           ?>
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="products-item">
                <? if ($wc_product -> is_on_sale()) {
                  echo apply_filters( 'woocommerce_sale_flash', '<span class="products-item__sale">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $post, $wc_product );
                } ?>
                <span class="products-item__favorite"
                  >
                 <?= $item -> get_quantity() . 'шт.' ?>
              </span>
                <a href="<?= $wc_product -> get_permalink(); ?>" class="products-item__thumb">                  
                  <?=  $wc_product -> get_image() ?>
                </a>
                <a href="<?= $wc_product -> get_permalink(); ?>" class="products-item__title"><?= $wc_product -> get_title(); ?></a>
                <div class="products-item__price"><?= $wc_product -> get_price_html(); ?></div>
								<a href="<? get_the_permalink( ) ?>" class="product-item__btn btn mt-3">Подробнее</a>
              </div>
            </div>
          <? } ?>        
				</div>
			</div>
		</div>
		<?php
	}
	?>
		

	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button<?php echo esc_attr( $wp_button_class ); ?>" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button<?php echo esc_attr( $wp_button_class ); ?>" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>

	<?php wc_print_notice( esc_html__( 'No order has been made yet.', 'woocommerce' ) . ' <a class="woocommerce-Button wc-forward  btn ' . esc_attr( $wp_button_class ) . '" href="' . esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ) . '">' . esc_html__( 'Browse products', 'woocommerce' ) . '</a>', 'notice' ); // phpcs:ignore WooCommerce.Commenting.CommentHooks.MissingHookComment ?>

<?php endif; ?>
<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
