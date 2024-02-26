<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit; ?>

<div class="row">
	<div  class="col-lg-9 order-2 order-lg-1">
		<? /**
		 * My Account navigation.
		 *
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_navigation' ); ?>
		
		<div class="woocommerce-MyAccount-content">
			<?php
				/**
				 * My Account content.
				 *
				 * @since 2.6.0
				 */
				do_action( 'woocommerce_account_content' );
			?>
		</div>
	
	</div>

	<div class="col-lg-3 order-1 order-lg-2 mb-4">
			<div class="lc-user">
				<? 
				$current_user = wp_get_current_user();
				$user_id = $current_user -> ID;
				$display_name = $current_user -> display_name;
				$user_email = $current_user -> user_email;
				$billing_phone = get_user_meta($user_id,'billing_phone',true);
				// print_r($current_user )
				?>
				<div class="lc-user__photo">
					<img src="<?= get_template_directory_uri() ?>/img/user-thumb.svg" alt="" />
				</div>
				<div class="lc-user__info">
					<div class="lc-user__name"><?= $display_name ?></div>
					<div class="lc-user__contacts">
						<p><?= $user_email ?></p>
						<p><?= $billing_phone ?></p>
					</div>
					<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
						<? if ( esc_html( $label ) == "Анкета") :  ?>
							<a class="lc-user__link" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>">Редактировать профиль</a>
						<? elseif  ( esc_html( $label ) == "Выйти") : ?>
							<a class="lc-user__link" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
						<? endif ?>
					<?php endforeach; ?>
					
				</div>
			</div>
		</div>
</div>
<? 

 ?>
 <!-- <div class="row">
		<div class="col-lg-9 order-2 order-lg-1">
			<div class="row">
				<div class="col-lg-4 col-sm-6 mb-4">
					<div class="lc-item">
						<div class="lc-item__title">Ближайшая доставка</div>
						<div class="lc-item__text">
							<strong>До адреса</strong>
							<p>14 июля с 10:00-12:00</p>
						</div>
						<a href="#" class="lc-item__more">Подробнее</a>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 mb-4">
					<div class="lc-item">
						<div class="lc-item__title">Заказы</div>
						<div class="lc-item__text">
							<p class="lc-item__num">№ 1521751218 от 26.03.2021</p>
							<p class="lc-item__status">Оплачен. Заказ выполнен</p>
							<p class="lc-item__price">50 000 ₽</p>
						</div>
						<a href="#" class="lc-item__more">Все заказы</a>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 mb-4">
					<div class="lc-item">
						<div class="lc-item__title">Избранное</div>
						<div class="lc-item__text">
							<p class="lc-item__num">12 товаров</p>
						</div>
						<a href="#" class="lc-item__more">Перейти в избранное</a>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 mb-4">
					<div class="lc-item">
						<div class="lc-item__title">Скидки и промокоды</div>
						<div class="lc-item__text">
							<p class="lc-item__percent">15%</p>
							<p class="lc-item__descr">При заказе от 5000 ₽</p>
							<div class="lc-item__promocode">GHjdhdhsj2023</div>
						</div>
						<a href="#" class="lc-item__more">Подробнее</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 order-1 order-lg-2 mb-4">
			<div class="lc-user">
				<div class="lc-user__photo">
					<img src="img/user-thumb.svg" alt="" />
				</div>
				<div class="lc-user__info">
					<div class="lc-user__name">Герман Константинопольский</div>
					<div class="lc-user__contacts">
						<a href="#"> mail@website.ru</a>
						<a href="#">+7 (900) 000-00-00</a>
					</div>
					<a href="#" class="lc-user__link">Редактировать профиль</a>
					<a href="#" class="lc-user__link">Выйти</a>
				</div>
			</div>
		</div>
	</div> -->