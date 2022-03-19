<?php
get_header();
get_template_part('partials/top-menu');
$category = get_queried_object();
$cat_ID = $category->term_id;
?>
    <main class="post-page pages">
        <?php get_template_part('partials/filter-menu'); ?>
        <div class="contain">
            <div class="row category-content">
                <div class="col-xl-9 col-lg-9 col-md-12">
                    <?php
                    if (function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb-nav">', '</p>');
                    }
                    ?>
                    <div class="post-page__content">
                        <h1><?php echo single_cat_title(); ?></h1>
                        <div class="row search-post">
                            <?php
                            global $options;
                            $imglogo = isset($options['general']['logo']) && !empty($options['general']['logo']) ? $options['general']['logo'] : get_template_directory_uri() . '/assets/img/logo.png';
                            $img = $imglogo;
                            $image_id = get_term_meta($cat_ID, 'category-image-id', true);
                            if ($image_id)
                                $img = wp_get_attachment_image_url($image_id);
                            $meta = get_option('wpseo_taxonomy_meta');
                            if ($meta['category']) {
                                $meta_ = $meta['category'][$cat_ID]['wpseo_desc'];
                            }
                            ?>
                            <script type="application/ld+json">
                                    {
                "@context": "http://schema.org",
                "@type": "CreativeWorkSeries",
                "aggregateRating": {
                    "@type": "AggregateRating",
                    "bestRating": "5",
                    "ratingCount": "<?php echo $cat_ID ?>",
                    "ratingValue": "5"
                },
                "image": "<?php echo $img; ?>",
                "name": "<?php echo single_cat_title() ?>",
                "description": "<?php echo wp_filter_nohtml_kses($meta_); ?>"
            }

                            </script>
                            <?php
                            if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <figure>
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="blog-post-image">
                                                <?php the_post_thumbnail(); ?>
                                                <div class="blog-post-img"></div>
                                            </div>
                                        </a>
                                        <figcaption>
                                            <a href="<?php the_permalink(); ?>">
                                                <h2><?php the_title(); ?></h2>
                                            </a>
                                            <p>
                                                <?php the_excerpt(); ?>
                                            </p>
                                        </figcaption>
                                    </figure>
                                </div>
                            <?php endwhile; ?>
                            <?php else: ?>
                                <div><?php echo 'نتیجه ای برای شما یافت نشد' ?></div>
                            <?php endif;
                            wp_reset_postdata(); ?>
                            <div class="pagination pager justify-content-center">
                                <?php
                                $big = 999999999;
                                global $wp_query;
                                echo paginate_links(array(
                                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                    'format' => '?paged=%#%',
                                    'current' => max(1, get_query_var('paged')),
                                    'total' => $wp_query->max_num_pages,
                                    'prev_text' => '«',
                                    'next_text' => '»'
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
        <?php get_template_part('partials/contact-us'); ?>
    </main>
<?php
get_template_part('partials/footer-menu');
get_footer();
