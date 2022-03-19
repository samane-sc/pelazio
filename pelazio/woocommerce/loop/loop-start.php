<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="col-xl-9 col-lg-12 all-products__contain">
    <h1 class="all-products__contain-title"><?php woocommerce_page_title(); ?></h1>
    <div class="all-products columns-<?php echo esc_attr(wc_get_loop_prop('columns')); ?>">
        <div class="all-products__top-menu">
            <?php
            /**
             * Hook: woocommerce_before_shop_loop.
             *
             * @hooked woocommerce_output_all_notices - 10
             * @hooked woocommerce_result_count - 20
             * @hooked woocommerce_catalog_ordering - 30
             */
            do_action('woocommerce_before_shop_loop'); ?>
            <div class="d-xl-none all-products__sidebar-sm">
                <button>جستجوی پیشرفته</button>
            </div>
        </div>
