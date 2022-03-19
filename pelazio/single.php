<?php
get_header();
get_template_part('partials/top-menu');
the_post();
?>
<?php set_post_view(get_the_ID()); ?>
    <main class="post-page">
        <div class="product-page__menu"><?php get_template_part('partials/filter-menu'); ?></div>
        <div class="contain product-page_contain blog-post">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-12">
                    <?php
                    if (function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb-nav">', '</p>');
                    }
                    ?>
                    <?php
                    global $options;
                    $imglogo = isset($options['general']['logo']) && !empty($options['general']['logo']) ? $options['general']['logo'] : get_template_directory_uri() . '/assets/img/logo.png';
                    $img = $imglogo;
                    if (has_post_thumbnail()) {
                        $img = get_the_post_thumbnail_url();
                    }
                    ?>
                    <script type="application/ld+json">
                                {
                                    "@context": "http://schema.org",
                                    "@type": "CreativeWorkSeason",
                                    "aggregateRating": {
                                        "@type": "AggregateRating",
                                        "bestRating": "5",
                                        "ratingCount": "<?php echo get_the_ID() ?>",
                                        "ratingValue": "5"
                                    },
                                    "image": "<?php echo $img; ?>",
                                    "name": "<?php echo get_the_title() ?>",
                                    "description": <?php echo wp_json_encode(get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true)); ?>
                                }
                       </script>
                    <figure>
                        <div class="blog-post-image">
                            <?php the_post_thumbnail(); ?>
                            <div class="blog-post-img"></div>
                        </div>
                        <figcaption>
                            <h1 class="blog-post-title"><?php the_title(); ?></h1>
                            <p><?php the_content(); ?></p>
                        </figcaption>
                    </figure>
                    <section class="blog-post-comment">
                        <?php comments_template('', true) ?>
                    </section>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
        <?php get_template_part('partials/contact-us'); ?>
    </main>
<?php
get_template_part('partials/footer-menu');
get_footer();