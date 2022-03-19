<?php
get_header();
get_template_part('partials/top-menu');
?>
<main class="post-page pages">
    <?php get_template_part('partials/filter-menu'); ?>
    <div class="contain">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb-nav">', '</p>');
        }
        ?>
        <div class="post-page__content">
            <h1>خطای 404</h1>
            <p>نتیجه جستجو شما وجود ندارد، لطفا مجددا از بخش جستجو استفاده کنید.</p>
            <div class="row search-post justify-content-center">
                <img height="500" width="500" src="<?php echo ROOT_URI.'/assets/img/404.png'; ?>"/>
            </div>
        </div>
    </div>
    <?php get_template_part('partials/contact-us'); ?>
</main>
<?php
get_template_part('partials/footer-menu');
get_footer();