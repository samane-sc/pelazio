<?php
/* Template Name: وبلاگ*/
get_header();
get_template_part('partials/top-menu');
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
                    <div class="post-page__content blog-page">
                        <h1><?php the_title(); ?></h1>
                        <div class="row">
                            <?php
                            if (get_query_var('paged')) {
                                $paged = get_query_var('paged');
                            } elseif (get_query_var('page')) {
                                $paged = get_query_var('page');
                            } else {
                                $paged = 1;
                            }
                            $args = array(
                                'post_status' => 'publish',
                                'post_type' => 'post',
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'posts_per_page' => 3,
                                'paged' => $paged,
                            );
                            $hello = new WP_Query($args);
                            if ($hello->have_posts()) : while ($hello->have_posts()) : $hello->the_post(); ?>
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
                            <?php endwhile;
                                wp_reset_postdata(); ?>
                            <?php endif; ?>
                            <div class="pagination pager justify-content-center">
                                <?php
                                $big = 999999999; // need an unlikely integer

                                echo paginate_links(array(
                                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                    'format' => '?paged=%#%',
                                    'current' => max(1, get_query_var('paged')),
                                    'total' => $hello->max_num_pages,
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