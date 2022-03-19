<?php
get_header();
get_template_part('partials/top-menu');
?>
    <main>
        <div class="contain">
            <?php
            get_template_part('partials/filter-menu');
            get_template_part('partials/first-slider');
            if (isset($options['product']['exist1']) && intval($options['product']['exist1'])) {
                get_template_part('loop/on-sale-products');
            }
            if (isset($options['product']['exist2']) && intval($options['product']['exist2'])) {
                get_template_part('loop/speed-sending-products');
            }
            ?>
            <section class="banner-section">
                <div class="row">
                    <?php if (is_active_sidebar('first_banner')): ?>
                        <?php dynamic_sidebar('first_banner') ?>
                    <?php endif; ?>
                </div>
            </section>
            <?php
            if (isset($options['product']['exist3']) && intval($options['product']['exist3'])) {
                get_template_part('loop/most-popular-products');
            }
            if (isset($options['product']['exist4']) && intval($options['product']['exist4'])) {
                get_template_part('loop/best-selling');
            }
            ?>
            <section class="banner-section">
                <div class="row">
                    <?php if (is_active_sidebar('second_banner')): ?>
                        <?php dynamic_sidebar('second_banner') ?>
                    <?php endif; ?>
                </div>
            </section>
            <?php
            if (isset($options['product']['exist5']) && intval($options['product']['exist5'])) {
                get_template_part('loop/just-our-products');
            }
            ?>
            <section class="banner-section">
                <div class="d-none d-sm-block">
                    <div class="row">
                        <?php if (is_active_sidebar('third_banner')): ?>
                            <?php dynamic_sidebar('third_banner') ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="d-sm-none">
                    <div class="row">
                        <div class="owl-carousel slider-banner">
                            <?php if (is_active_sidebar('third_banner')): ?>
                                <?php dynamic_sidebar('third_banner') ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            if (isset($options['product']['exist6']) && intval($options['product']['exist6'])) {
                get_template_part('loop/best-products');
            }
            if (isset($options['product']['exist7']) && intval($options['product']['exist7'])) {
                get_template_part('loop/newest-products');
            }
            ?>
            <section class="brand-slider">
                <div class="logo-title">
                    <div><span><i class="fa fa-university" aria-hidden="true"></i></span></div>
                    <h5>برندهای برتر</h5>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="owl-carousel slider-logo">
                            <?php if (is_active_sidebar('brand_slider')): ?>
                                <?php dynamic_sidebar('brand_slider') ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <section class="description-section">
                <div class="description-section__title">
                    <h3><?php echo isset($options['setting']['title']) && !empty($options['setting']['title']) ? $options['setting']['title'] : ''; ?></h3>
                    <div class="description-section__logo">
                        <a href="#">
                            <img src="<?php echo isset($options['general']['logo']) && !empty($options['general']['logo']) ? $options['general']['logo'] :
                                get_template_directory_uri() . '/assets/img/download.png'; ?>" width="50px" height="50px" class="lazy">
                        </a>
                    </div>
                    <h6><?php echo isset($options['setting']['title1']) && !empty($options['setting']['title1']) ? $options['setting']['title1'] : ''; ?></h6>
                </div>
                <div class="description-section__content">
                    <?php echo isset($options['setting']['content']) && !empty($options['setting']['content']) ? $options['setting']['content'] : ''; ?>
                </div>
            </section>
        </div>
        <?php get_template_part('partials/contact-us'); ?>
    </main>
<?php
get_template_part('partials/footer-menu');
get_footer();