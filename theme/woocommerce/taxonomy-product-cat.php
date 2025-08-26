<?php

/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
if (get_queried_object_id() == 792 ||  get_queried_object_id() == 793) {

	get_header();

?>
	<main class="main">
		<? get_template_part('template-parts/breadcrumbs') ?>

		<? get_template_part('template-parts/blocks/content', 'page-tax') ?>
	</main>

<?php

	get_footer();
} else {
	wc_get_template('archive-product.php');
}
