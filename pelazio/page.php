<?php if (!is_checkout()):?>
    <?php
    get_header();
    get_template_part('partials/top-menu');
    ?>
    <main class="post-page pages">
        <?php get_template_part('partials/filter-menu'); ?>
        <div class="contain">
            <div class="post-page__content">
                <h1><?php the_title() ?></h1>
                <div>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
        <?php get_template_part('partials/contact-us'); ?>
    </main>
    <?php
    get_template_part('partials/footer-menu');
    get_footer();
endif; ?>
<?php if (is_checkout()): ?>
    <?php
    get_header();
    ?>
    <header>
        <div class="header-buy">
            <a href="<?php echo home_url();?>">
                <img src="<?php echo isset($options['general']['logo'])? $options['general']['logo'] :
                    get_template_directory_uri().'/assets/img/download.png'; ?>">
            </a>
        </div>
    </header>
    <main class="post-page">
        <div class="contain">
            <div class="checkout-page">
                <?php the_content(); ?>
            </div>
        </div>
        <?php get_template_part('partials/contact-us'); ?>
    </main>
    <footer class="checkout-page__footer">
        <div class="contain">
            <div class="row">
                <div class="col-lg-6 col-sm-12 footer-copyright">
                    <span><i class="fa fa-shopping-bag" aria-hidden="true"></i></span>
                    <h6><?php echo isset($options['setting']['copy_right'])? $options['setting']['copy_right'] :''; ?></h6>
                </div>
                <div class="footer-assign col-lg-6 col-sm-12">
                    <div class="footer-assign__item">
                        <?php echo isset($options['setting']['trust_assign'])? $options['setting']['trust_assign'] :''; ?>
                        <?php echo isset($options['setting']['saramad_assign'])? $options['setting']['saramad_assign'] :''; ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php
    get_footer();
endif; ?>
