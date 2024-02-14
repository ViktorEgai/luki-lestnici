<?php
/**
 * Additional Information tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/additional-information.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;

global $product; ?>

<h3 class="about-product-block__title" id="characteristic">Характеристики:</h3>


<div class="about-product-block__text">
	<?php do_action( 'woocommerce_product_additional_information', $product ); ?>
	
</div>
<a href="#" class="about-product-block__btn">Развернуть характеристики </a>