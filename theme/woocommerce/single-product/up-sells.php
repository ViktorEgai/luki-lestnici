<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// <!-- <section class="related-products">
// 	<div class="container">
// 		<h2 class="related-products__title small-title">Аналогичные товары</h2>
// 		<div class="related-products-slider">
// 			<div class="products-item">
// 				<div class="products-item__sale">-49%</div>
// 				<a href="#" class="products-item__favorite"
// 					><svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
// 						<path
// 							fill-rule="evenodd"
// 							clip-rule="evenodd"
// 							d="M9.74367 3.26422C9.42123 3.57365 8.91211 3.57365 8.58967 3.26422L8.01267 2.7105C7.33731 2.06239 6.42495 1.66667 5.41667 1.66667C3.3456 1.66667 1.66667 3.3456 1.66667 5.41667C1.66667 7.40219 2.74149 9.04171 4.29313 10.3888C5.8461 11.737 7.70283 12.6312 8.8122 13.0876C9.04416 13.183 9.28917 13.183 9.52113 13.0876C10.6305 12.6312 12.4872 11.737 14.0402 10.3888C15.5918 9.04171 16.6667 7.40218 16.6667 5.41667C16.6667 3.3456 14.9877 1.66667 12.9167 1.66667C11.9084 1.66667 10.996 2.06239 10.3207 2.7105L9.74367 3.26422ZM9.16667 1.50798C8.19342 0.574004 6.87208 0 5.41667 0C2.42512 0 0 2.42512 0 5.41667C0 10.7235 5.80862 13.6542 8.17816 14.6289C8.8163 14.8914 9.51703 14.8914 10.1552 14.6289C12.5247 13.6542 18.3333 10.7235 18.3333 5.41667C18.3333 2.42512 15.9082 0 12.9167 0C11.4613 0 10.1399 0.574004 9.16667 1.50798Z"
// 							fill="#6C7275"
// 						/>
// 					</svg>
// 				</a>
// 				<div class="products-item__thumb">
// 					<img src="img/thumb.png" alt="" />
// 				</div>
// 				<a href="#" class="products-item__title">Lorem ipsum dolor sit amet, consectetuer adipiscing dolor elit.</a>
// 				<div class="products-item__price">20 145 ₽ <span>38 990 ₽</span></div>
// 			</div>
// 			<div class="products-item">
// 				<div class="products-item__sale">-49%</div>
// 				<a href="#" class="products-item__favorite"
// 					><svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
// 						<path
// 							fill-rule="evenodd"
// 							clip-rule="evenodd"
// 							d="M9.74367 3.26422C9.42123 3.57365 8.91211 3.57365 8.58967 3.26422L8.01267 2.7105C7.33731 2.06239 6.42495 1.66667 5.41667 1.66667C3.3456 1.66667 1.66667 3.3456 1.66667 5.41667C1.66667 7.40219 2.74149 9.04171 4.29313 10.3888C5.8461 11.737 7.70283 12.6312 8.8122 13.0876C9.04416 13.183 9.28917 13.183 9.52113 13.0876C10.6305 12.6312 12.4872 11.737 14.0402 10.3888C15.5918 9.04171 16.6667 7.40218 16.6667 5.41667C16.6667 3.3456 14.9877 1.66667 12.9167 1.66667C11.9084 1.66667 10.996 2.06239 10.3207 2.7105L9.74367 3.26422ZM9.16667 1.50798C8.19342 0.574004 6.87208 0 5.41667 0C2.42512 0 0 2.42512 0 5.41667C0 10.7235 5.80862 13.6542 8.17816 14.6289C8.8163 14.8914 9.51703 14.8914 10.1552 14.6289C12.5247 13.6542 18.3333 10.7235 18.3333 5.41667C18.3333 2.42512 15.9082 0 12.9167 0C11.4613 0 10.1399 0.574004 9.16667 1.50798Z"
// 							fill="#6C7275"
// 						/>
// 					</svg>
// 				</a>
// 				<div class="products-item__thumb">
// 					<img src="img/thumb.png" alt="" />
// 				</div>
// 				<a href="#" class="products-item__title">Lorem ipsum dolor sit amet, consectetuer adipiscing dolor elit.</a>
// 				<div class="products-item__price">20 145 ₽ <span>38 990 ₽</span></div>
// 			</div>
// 			<div class="products-item">
// 				<div class="products-item__sale">-49%</div>
// 				<a href="#" class="products-item__favorite"
// 					><svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
// 						<path
// 							fill-rule="evenodd"
// 							clip-rule="evenodd"
// 							d="M9.74367 3.26422C9.42123 3.57365 8.91211 3.57365 8.58967 3.26422L8.01267 2.7105C7.33731 2.06239 6.42495 1.66667 5.41667 1.66667C3.3456 1.66667 1.66667 3.3456 1.66667 5.41667C1.66667 7.40219 2.74149 9.04171 4.29313 10.3888C5.8461 11.737 7.70283 12.6312 8.8122 13.0876C9.04416 13.183 9.28917 13.183 9.52113 13.0876C10.6305 12.6312 12.4872 11.737 14.0402 10.3888C15.5918 9.04171 16.6667 7.40218 16.6667 5.41667C16.6667 3.3456 14.9877 1.66667 12.9167 1.66667C11.9084 1.66667 10.996 2.06239 10.3207 2.7105L9.74367 3.26422ZM9.16667 1.50798C8.19342 0.574004 6.87208 0 5.41667 0C2.42512 0 0 2.42512 0 5.41667C0 10.7235 5.80862 13.6542 8.17816 14.6289C8.8163 14.8914 9.51703 14.8914 10.1552 14.6289C12.5247 13.6542 18.3333 10.7235 18.3333 5.41667C18.3333 2.42512 15.9082 0 12.9167 0C11.4613 0 10.1399 0.574004 9.16667 1.50798Z"
// 							fill="#6C7275"
// 						/>
// 					</svg>
// 				</a>
// 				<div class="products-item__thumb">
// 					<img src="img/thumb.png" alt="" />
// 				</div>
// 				<a href="#" class="products-item__title">Lorem ipsum dolor sit amet, consectetuer adipiscing dolor elit.</a>
// 				<div class="products-item__price">20 145 ₽ <span>38 990 ₽</span></div>
// 			</div>
// 			<div class="products-item">
// 				<div class="products-item__sale">-49%</div>
// 				<a href="#" class="products-item__favorite"
// 					><svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
// 						<path
// 							fill-rule="evenodd"
// 							clip-rule="evenodd"
// 							d="M9.74367 3.26422C9.42123 3.57365 8.91211 3.57365 8.58967 3.26422L8.01267 2.7105C7.33731 2.06239 6.42495 1.66667 5.41667 1.66667C3.3456 1.66667 1.66667 3.3456 1.66667 5.41667C1.66667 7.40219 2.74149 9.04171 4.29313 10.3888C5.8461 11.737 7.70283 12.6312 8.8122 13.0876C9.04416 13.183 9.28917 13.183 9.52113 13.0876C10.6305 12.6312 12.4872 11.737 14.0402 10.3888C15.5918 9.04171 16.6667 7.40218 16.6667 5.41667C16.6667 3.3456 14.9877 1.66667 12.9167 1.66667C11.9084 1.66667 10.996 2.06239 10.3207 2.7105L9.74367 3.26422ZM9.16667 1.50798C8.19342 0.574004 6.87208 0 5.41667 0C2.42512 0 0 2.42512 0 5.41667C0 10.7235 5.80862 13.6542 8.17816 14.6289C8.8163 14.8914 9.51703 14.8914 10.1552 14.6289C12.5247 13.6542 18.3333 10.7235 18.3333 5.41667C18.3333 2.42512 15.9082 0 12.9167 0C11.4613 0 10.1399 0.574004 9.16667 1.50798Z"
// 							fill="#6C7275"
// 						/>
// 					</svg>
// 				</a>
// 				<div class="products-item__thumb">
// 					<img src="img/thumb.png" alt="" />
// 				</div>
// 				<a href="#" class="products-item__title">Lorem ipsum dolor sit amet, consectetuer adipiscing dolor elit.</a>
// 				<div class="products-item__price">20 145 ₽ <span>38 990 ₽</span></div>
// 			</div>
// 			<div class="products-item">
// 				<div class="products-item__sale">-49%</div>
// 				<a href="#" class="products-item__favorite"
// 					><svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
// 						<path
// 							fill-rule="evenodd"
// 							clip-rule="evenodd"
// 							d="M9.74367 3.26422C9.42123 3.57365 8.91211 3.57365 8.58967 3.26422L8.01267 2.7105C7.33731 2.06239 6.42495 1.66667 5.41667 1.66667C3.3456 1.66667 1.66667 3.3456 1.66667 5.41667C1.66667 7.40219 2.74149 9.04171 4.29313 10.3888C5.8461 11.737 7.70283 12.6312 8.8122 13.0876C9.04416 13.183 9.28917 13.183 9.52113 13.0876C10.6305 12.6312 12.4872 11.737 14.0402 10.3888C15.5918 9.04171 16.6667 7.40218 16.6667 5.41667C16.6667 3.3456 14.9877 1.66667 12.9167 1.66667C11.9084 1.66667 10.996 2.06239 10.3207 2.7105L9.74367 3.26422ZM9.16667 1.50798C8.19342 0.574004 6.87208 0 5.41667 0C2.42512 0 0 2.42512 0 5.41667C0 10.7235 5.80862 13.6542 8.17816 14.6289C8.8163 14.8914 9.51703 14.8914 10.1552 14.6289C12.5247 13.6542 18.3333 10.7235 18.3333 5.41667C18.3333 2.42512 15.9082 0 12.9167 0C11.4613 0 10.1399 0.574004 9.16667 1.50798Z"
// 							fill="#6C7275"
// 						/>
// 					</svg>
// 				</a>
// 				<div class="products-item__thumb">
// 					<img src="img/thumb.png" alt="" />
// 				</div>
// 				<a href="#" class="products-item__title">Lorem ipsum dolor sit amet, consectetuer adipiscing dolor elit.</a>
// 				<div class="products-item__price">20 145 ₽ <span>38 990 ₽</span></div>
// 			</div>
// 			<div class="products-item">
// 				<div class="products-item__sale">-49%</div>
// 				<a href="#" class="products-item__favorite"
// 					><svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
// 						<path
// 							fill-rule="evenodd"
// 							clip-rule="evenodd"
// 							d="M9.74367 3.26422C9.42123 3.57365 8.91211 3.57365 8.58967 3.26422L8.01267 2.7105C7.33731 2.06239 6.42495 1.66667 5.41667 1.66667C3.3456 1.66667 1.66667 3.3456 1.66667 5.41667C1.66667 7.40219 2.74149 9.04171 4.29313 10.3888C5.8461 11.737 7.70283 12.6312 8.8122 13.0876C9.04416 13.183 9.28917 13.183 9.52113 13.0876C10.6305 12.6312 12.4872 11.737 14.0402 10.3888C15.5918 9.04171 16.6667 7.40218 16.6667 5.41667C16.6667 3.3456 14.9877 1.66667 12.9167 1.66667C11.9084 1.66667 10.996 2.06239 10.3207 2.7105L9.74367 3.26422ZM9.16667 1.50798C8.19342 0.574004 6.87208 0 5.41667 0C2.42512 0 0 2.42512 0 5.41667C0 10.7235 5.80862 13.6542 8.17816 14.6289C8.8163 14.8914 9.51703 14.8914 10.1552 14.6289C12.5247 13.6542 18.3333 10.7235 18.3333 5.41667C18.3333 2.42512 15.9082 0 12.9167 0C11.4613 0 10.1399 0.574004 9.16667 1.50798Z"
// 							fill="#6C7275"
// 						/>
// 					</svg>
// 				</a>
// 				<div class="products-item__thumb">
// 					<img src="img/thumb.png" alt="" />
// 				</div>
// 				<a href="#" class="products-item__title">Lorem ipsum dolor sit amet, consectetuer adipiscing dolor elit.</a>
// 				<div class="products-item__price">20 145 ₽ <span>38 990 ₽</span></div>
// 			</div>
// 		</div>
// 	</div>
// </section> -->
if ( $upsells ) : ?>

	<section class="related-products">
		<div class="container">
		
			<h2 class="related-products__title small-title">Аналогичные товары</h2>
		

			<div class="related-products-slider">

			<?php foreach ( $upsells as $upsell ) : ?>

				<?php
				$post_object = get_post( $upsell->get_id() );

				setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

				wc_get_template_part( 'content', 'product' );
				?>

			<?php endforeach; ?>
				</div>
		

		</div>
	</section>

	<?php
endif;

wp_reset_postdata();
