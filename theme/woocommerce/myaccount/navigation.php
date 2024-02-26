<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>
<? 

$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (preg_match('/my-account/', $actual_link, $matches) && !preg_match('/my-account\/orders/', $actual_link, $matches ) && !preg_match('/my-account\/view-order/', $actual_link, $matches) && !preg_match('/my-account\/delivery/', $actual_link, $matches) && !preg_match('/my-account\/promocode/', $actual_link, $matches) && !preg_match('/my-account\/edit-account/', $actual_link, $matches)) {

?>

	
	<nav class="row">
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : 
			if (esc_html( $label ) !== 'Главная' && esc_html( $label ) !== 'Выйти' && esc_html( $label ) !== 'Анкета'): ?>
			<div class=" col-lg-4 col-sm-6 mb-4 <?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<div class="lc-item">
					<div class="lc-item__title"><?php echo esc_html( $label ); ?></div>
					<? 
					$customer = wp_get_current_user();
					$orderArg = array(
							'customer_id' => $customer -> ID,
							'limit' => -1,
							'orderby' => 'date',
							'order' => 'DESC',
							);
					$orders = wc_get_orders($orderArg);
					?>
					<? if ($endpoint == 'delivery') :?>

						<div class="lc-item__text">
							<? 
							if($orders){
								
								$last_order_id = 	$orders[0]-> get_ID();
								
								$order=wc_get_order($last_order_id);

								$delivery_address = $order->get_meta('delivery_address');
								$delivery_time = $order->get_meta('delivery_time');

								if ($delivery_address && $delivery_time) {
									echo '<strong>'.$delivery_address.'</strong>
								<p>'. $delivery_time .'</p>';
								} else {
									echo '<p>Нет информации</p>';
								}
								
							}?>
							
							
						</div>
						
						<? 
						if ($delivery_address && $delivery_time) { ?>
							<a  class="lc-item__more" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>">Подробнее</a>
						<? } ?>
						
					<? elseif ($endpoint == 'orders') : ?>
						<div class="lc-item__text">
							<? 
							if($orders){
								
								$last_order_id = 	$orders[0]-> get_ID();
								
								$order=wc_get_order($last_order_id);

								$created_date = $order->get_date_created();
								$status = $order->get_status();
								$total  = $order->get_formatted_order_total();
								$number  = $order->get_order_number();

								if ($order){
									echo '<p class="lc-item__num">№'.$number.' от '.$created_date -> date('d.m.Y').'</p>';
									echo '<p class="lc-item__status">'.wc_get_order_status_name($status).'</p>';
									echo '<p class="lc-item__price">'. $total .'</p>';
								} else { 
									echo '<p class="lc-item__num">У вас еще нет заказов </p>';
									echo '<a href="'. get_permalink( wc_get_page_id( 'shop' ) ).'">В каталог</a>';
								}
								
							}?>
							
						</div>

						<? if ($order) { ?>
							<a  class="lc-item__more" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>">Все заказы</a>
						<? } ?>

					<? elseif ($endpoint == 'promocode') : ?>

						<div class="lc-item__text">
							<? 
							
							$coupon_posts = get_posts( array(
								'posts_per_page'   => -1,
								'orderby'          => 'name',
								'order'            => 'asc',
								'post_type'        => 'shop_coupon',
								'post_status'      => 'publish',
							) );

							$current_user = wp_get_current_user();	
							$user_email = $current_user -> user_email;

							global $woocommerce;
							$has_code = false;
							// Push to array
							foreach ( $coupon_posts as $coupon_post ) {
								
								$c = new WC_Coupon($coupon_post -> ID);					
								
								// print_r($c);
								
								$emails =$c -> get_email_restrictions();
								$code = $c -> get_code();
								$discount_type = $c ->get_discount_type();
								$min_price = $c ->get_minimum_amount();
								$percent = $c ->get_amount();

								if (in_array( $user_email, $emails ) ) {
									
									if ($discount_type == 'percent') {
										echo '<p class="lc-item__percent">'.$percent.'%</p>';
									}
									if ($min_price) { 
									echo '<p class="lc-item__descr">При заказе от '.$min_price.' ₽</p>';
									}
									echo '<div class="lc-item__promocode">'. $code .'</div>';

									$has_code = true;
								} 

								
							
							}
							if (!$has_code) {
									echo '<p class="lc-item__descr">Нет информации </p>';
								}
						?>
						
						</div>

						<? //if ($has_code) { ?>
							<!-- <a  class="lc-item__more" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>">Подробнее</a> -->
						<? //} ?>
					<? elseif ($endpoint == 'wishlist') : ?>
						<div class="lc-item__text">
							<p class="lc-item__num">
								<?= declOfNum(yith_wcwl_count_all_products(), array('товар', 'товара', 'товаров')) ?>
							</p>
						</div>
						<? if ( yith_wcwl_count_all_products() !== 0 ) : ?>
						<a  class="lc-item__more" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>">Перейти в избранное</a>
						<? endif ?>
					<? endif ?>
					
				</div>
			</div>
		<?php endif;
		endforeach; ?>
	
</nav>


<? } else { ?>
<nav class="lc-nav">

	
	<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : 
		$active = $actual_link == esc_url( wc_get_account_endpoint_url( $endpoint ) ) ? 'active' : '';
		if ( esc_html( $label ) !== 'Выйти' && esc_html( $label ) !== 'Анкета'): ?>
		<a class="lc-nav__item <?= $active ?>" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
		<? endif; ?>
	<?php endforeach; ?>

	
</nav>
<? } ?>
<?php do_action( 'woocommerce_after_account_navigation' ); ?>
