<?php global $options; ?>
<section class="first-banner-section">
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="owl-carousel slider-top">
                <?php if (!wp_is_mobile()):?>
                    <?php if (is_active_sidebar('slider_lg')): ?>
                        <?php dynamic_sidebar('slider_lg') ?>
                    <?php endif; ?>
                <?php endif;?>
                <?php if (wp_is_mobile()):?>
                    <?php if (is_active_sidebar('slider_sm')): ?>
                        <?php dynamic_sidebar('slider_sm') ?>
                    <?php endif; ?>
                <?php endif;?>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 d-none d-lg-block">
            <a href="<?php echo isset($options['banner']['link_img']) ? $options['banner']['link_img'] : ''; ?>">
                <img class="slider-top__img lazy" alt="<?php echo isset($options['banner']['alt_img']) ? $options['banner']['alt_img'] : ''; ?>"
                     src="<?php echo isset($options['banner']['img']) ? $options['banner']['img'] : ''; ?>" width="390px" height="277px">
            </a>
        </div>
    </div>
</section>