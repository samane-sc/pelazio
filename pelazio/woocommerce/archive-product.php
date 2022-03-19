<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;
get_header();
get_template_part('partials/top-menu');
?>
    <main class="post-page">
        <?php get_template_part('partials/filter-menu'); ?>
        <div class="contain product-page_contain">
            <div class="row">
                <?php if (is_active_sidebar('sidebar-shop')): ?>
                    <aside class="col-xl-3 d-none d-xl-block product-page_contain-aside">
                        <?php dynamic_sidebar('sidebar-shop'); ?>
                    </aside>
                    <div class="d-xl-none product-sidebar-sm" style="display: none;">
                        <span class="product-sidebar-sm__close"></span>
                        <div class="product-sidebar-sm__content">
                            <?php dynamic_sidebar('sidebar-shop'); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php
                if (woocommerce_product_loop()) {
                    woocommerce_product_loop_start();
                    ?>
                    <div class="products">
                        <div class="row">
                            <?php
                            if (wc_get_loop_prop('total')) {
                                while (have_posts()) {
                                    the_post();
                                    /**
                                     * Hook: woocommerce_shop_loop.
                                     */
                                    do_action('woocommerce_shop_loop');

                                    wc_get_template_part('content', 'product');
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    woocommerce_product_loop_end();
                    ?>
                    <div class="col-xl-3 col-lg-12"></div>
                    <div class="col-xl-9 col-lg-12  products-pagination">
                        <?php
                        /**
                         * Hook: woocommerce_after_shop_loop.
                         *
                         * @hooked woocommerce_pagination - 10
                         */
                        do_action('woocommerce_after_shop_loop');
                        ?>
                    </div>
                    <?php
                } else {
                    /**
                     * Hook: woocommerce_no_products_found.
                     *
                     * @hooked wc_no_products_found - 10
                     */
                    do_action('woocommerce_no_products_found');
                }
                /**
                 * Hook: woocommerce_after_main_content.
                 *
                 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                 */
                do_action('woocommerce_after_main_content');
                ?>
                <?php get_template_part('partials/contact-us'); ?>
            </div>
        </div>
        <?php
        if(is_product_category()){
        global $options;
        $img = isset($options['general']['logo']) && !empty($options['general']['logo']) ? $options['general']['logo'] : get_template_directory_uri() . '/assets/img/logo.png';
        $category = get_queried_object();
        $cat_ID = $category->term_id;
        $thumbnail_id = get_term_meta($cat_ID, 'thumbnail_id', true);
        if ($thumbnail_id)
            $img = wp_get_attachment_url($thumbnail_id);
        ?>
        <script type="application/ld+json">
                            {
                                "@context": "http://schema.org",
                                "@type": "CreativeWorkSeries",
                                "aggregateRating": {
                                    "@type": "AggregateRating",
                                    "bestRating": "5",
                                    "ratingCount": "<?php echo get_the_ID() ?>",
                                    "ratingValue": "5"
                                },
                                "image": "<?php echo $img; ?>",
                                "name": "<?php echo woocommerce_page_title(false) ?>",
                                "description": <?php echo wp_json_encode(get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true)); ?>
                            }
            </script>
            <?php } ?>
    </main>

<?php
get_template_part('partials/footer-menu');
get_footer();
