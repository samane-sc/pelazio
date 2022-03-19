<section class="filter-menu d-none d-lg-block">
    <?php if (is_home()):?><div class="top-menu-lg"><?php endif;?>
    <?php if (!is_home()):?><div class="contain top-menu-lg"><?php endif;?>
        <?php if (has_nav_menu('top-menu-one')): ?>
            <?php wp_nav_menu(array(
                'theme_location' => 'top-menu-one'
            )) ?>
        <?php endif; ?>
    </div>
</section>
<div class="menu-space d-lg-none"></div>
