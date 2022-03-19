<?php global $options;?>
<footer>
    <div class="contain">
        <div class="footer-menu row">
            <nav class="col-lg-1 col-md-2 d-none d-md-block">
                <div class="footer-menu__logo">
                    <a href="#">
                        <img src="<?php echo isset($options['general']['logo'])? $options['general']['logo'] :
                            get_template_directory_uri().'/assets/img/download.png'; ?>" width="75px" height="75px" class="lazy">
                    </a>
                </div>
            </nav>
            <nav class="footer-menu__items col-lg-2 col-md-2 col-sm-3 d-none d-sm-block">
                <h5><?php echo wp_get_nav_menu_name('footer-menu-one');?></h5>
                <?php if ( has_nav_menu('footer-menu-one') ): ?>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'footer-menu-one'
                    )) ?>
                <?php endif; ?>
            </nav>
            <nav class="footer-menu__items col-lg-2 col-md-2 col-sm-3 d-none d-sm-block">
                <h5><?php echo wp_get_nav_menu_name('footer-menu-two');?></h5>
                <?php if ( has_nav_menu('footer-menu-two') ): ?>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'footer-menu-two'
                    )) ?>
                <?php endif; ?>
            </nav>
            <nav class="footer-menu__items col-lg-2 col-md-2 col-sm-3 d-none d-sm-block">
                <h5><?php echo wp_get_nav_menu_name('footer-menu-three');?></h5>
                <?php if ( has_nav_menu('footer-menu-three') ): ?>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'footer-menu-three'
                    )) ?>
                <?php endif; ?>
            </nav>
            <nav class="footer-menu__items col-lg-2 col-md-3 col-sm-3 d-none d-sm-block">
                <h5><?php echo wp_get_nav_menu_name('footer-menu-four');?></h5>
                <?php if ( has_nav_menu('footer-menu-four') ): ?>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'footer-menu-four'
                    )) ?>
                <?php endif; ?>
            </nav>
            <nav class="footer-menu__icons col-lg-3 col-md-12 col-sm-12">
                <div class="footer-menu__logo-title logo-title">
                    <div><span><i class="fa fa-university" aria-hidden="true"></i></span></div>
                    <h5>ما را در شبکه های اجتماعی دنبال کنید</h5>
                </div>
                <ul>
                    <?php if (isset($options['setting']['instagram']) && !empty($options['setting']['instagram'])){ ?>
                        <li>
                            <a href="<?php echo isset($options['setting']['instagram'])? $options['setting']['instagram'] :''; ?>">
                                <i class="fab fa-instagram"></i></a></li>
                    <?php }?>
                    <?php if (isset($options['setting']['telegram']) && !empty($options['setting']['telegram'])){ ?>
                        <li>
                            <a href="<?php echo isset($options['setting']['telegram'])? $options['setting']['telegram'] :''; ?>">
                                <i class="fab fa-telegram"></i></a></li>
                    <?php }?>
                    <?php if (isset($options['setting']['whatsapp']) && !empty($options['setting']['whatsapp'])){ ?>
                        <li>
                            <a href="<?php echo isset($options['setting']['whatsapp'])? $options['setting']['whatsapp'] :''; ?>">
                                <i class="fab fa-whatsapp"></i></a></li>
                    <?php }?>
                </ul>
            </nav>
            <nav class="footer-menu__small d-sm-none col-sm-12">
                <ul>
                    <li>
                        <span><?php echo wp_get_nav_menu_name('footer-menu-one');?></span>
                        <div class="footer-menu__dropdown">
                            <?php if ( has_nav_menu('footer-menu-one') ): ?>
                                <?php wp_nav_menu(array(
                                    'theme_location' => 'footer-menu-one'
                                )) ?>
                            <?php endif; ?>
                        </div>
                    </li>
                    <li>
                        <span><?php echo wp_get_nav_menu_name('footer-menu-two');?></span>
                        <div class="footer-menu__dropdown">
                            <?php if ( has_nav_menu('footer-menu-two') ): ?>
                                <?php wp_nav_menu(array(
                                    'theme_location' => 'footer-menu-two'
                                )) ?>
                            <?php endif; ?>
                        </div>
                    </li>
                    <li>
                        <span><?php echo wp_get_nav_menu_name('footer-menu-three');?></span>
                        <div class="footer-menu__dropdown">
                            <?php if ( has_nav_menu('footer-menu-three') ): ?>
                                <?php wp_nav_menu(array(
                                    'theme_location' => 'footer-menu-three'
                                )) ?>
                            <?php endif; ?>
                        </div>
                    </li>
                    <li>
                        <span class="footer-menu__small-last"><?php echo wp_get_nav_menu_name('footer-menu-four');?></span>
                        <div class="footer-menu__dropdown">
                            <?php if ( has_nav_menu('footer-menu-four') ): ?>
                                <?php wp_nav_menu(array(
                                    'theme_location' => 'footer-menu-four'
                                )) ?>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="footer-line"></div>
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
    <div class="footer-sm-menu d-md-none">
        <?php if ( has_nav_menu('footer-menu-sm') ): ?>
            <?php wp_nav_menu(array(
                'theme_location' => 'footer-menu-sm'
            )) ?>
        <?php endif; ?>
    </div>
</footer>
<div class="go-up">
    <a href="#"><i class="fal fa-angle-up" aria-hidden="true"></i></a>
</div>