<?php global $options; ?>
<?php $current_user = wp_get_current_user(); ?>
<header>
    <div class="dark-background"></div>
    <div class="login-box">
        <i class="fal fa-times"></i>
        <h5>ورود</h5>
        <h6>به پلازیو خوش آمدید</h6>
        <?php
        echo isset($_GET['notice']) && $_GET['notice'] == 'failed' ? '<p class="alert">نام کاربری یا رمز شما نامعتبر است.</p>' : null;
        echo isset($_GET['notice']) && $_GET['notice'] == 'empty' ? '<p class="alert">نام کاربری و رمز عبور خود را وارد کنید.</p>' : null;
        if (!is_user_logged_in()) {
            echo wp_login_form(
                array(
                    'echo' => false,
                    'redirect' => home_url(),
                    'label_username' => __('نام کاربری '),
                    'label_password' => __('رمز عبور'),
                    'label_remember' => __('Remember Me'),
                )
            );
        }
        ?>
        <div class="login-box__reset">
            <span class="login-to-btn">ثبت نام</span>
            <span class="reset-pass">فراموشی رمز عبور</span>
        </div>
    </div>
    <div class="signup-box">
        <i class="fal fa-times"></i>
        <h5>ثبت‌ نام</h5>
        <h6>به پلازیو خوش آمدید</h6>
        <div class="signup-box-phone">
            <span>ایمیل شما</span>
            <span></span>
        </div>
        <?php if (!is_user_logged_in()): ?>
            <form action="" method="post" name="user_registeration">
                <div class="signup-box__form">
                    <label for="name">نام</label>
                    <input type="text" class="form-control" id="name" name="username" placeholder="نام خود را وارد کنید"
                           required>
                </div>
                <div class="signup-box__form">
                    <label for="email">ایمیل</label>
                    <input type="email" class="form-control" id="email" name="user_email"
                           placeholder="ایمیل خود را وارد کنید" required>
                </div>
                <div class="signup-box__form">
                    <label for="pass">رمز عبور</label>
                    <input type="password" class="form-control" id="pass" name="password"
                           placeholder="رمز عبور خود را وارد کنید" required>
                </div>
                <input type="submit" class="register-btn" name="user_registeration" value="ایجاد حساب کاربری"/>
                <span class="create_account">
                حساب کاربری دارید؟
            </span>
                <?php if (isset($signUpError)) {
                    echo '<div>' . $signUpError . '</div>';
                } ?>
            </form>
        <?php endif; ?>
    </div>
    <div class="signup-box reset-pass-box">
        <i class="fal fa-times"></i>
        <h5>بازیابی رمز عبور</h5>
        <h6>به پلازیو خوش آمدید</h6>
        <form action="" method="post" name="user_reset">
            <div class="signup-box__form">
                <label for="email">ایمیل</label>
                <input type="email" class="form-control" id="resetemail" name="email"
                       placeholder="ایمیل خود را وارد کنید" required>
            </div>
            <input type="submit" class="reset-pass-btn" name="user_registeration" value="بازیابی پسوورد"/>
        </form>
    </div>
    <nav class="top-menu">
        <div class="contain">
            <div class="row stick-top-menu">
                <div class="top-menu__lg col-lg-1 col-md-1 col-sm-1 d-none d-sm-block d-lg-none"></div>
                <div class="top-menu__logo col-lg-2 col-md-2 col-sm-3 col-4">
                    <h1 <?php home_url(); ?>>
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo isset($options['general']['logo']) ? $options['general']['logo'] :
                            get_template_directory_uri() . '/assets/img/download.png'; ?>" height="50px" width="50px" class="lazy"
                        alt="<?php echo isset($options['general']['alt_logo']) ? $options['general']['alt_logo'] : ''; ?>">
                    </a>
                    </h1>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-6 col-8">
                    <form class="top-menu__search" action="<?php echo home_url() ?>"
                          method="get">
                        <input type="text" autocomplete="off" name="s" id="search" placeholder="جستجو کنید ... ">
                        <input type="hidden" name="post_type" value="product">
                        <button type="submit"><i class="fal fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <ul class="top-menu__all col-lg-6 col-md-4 d-none d-md-block">
                    <li class="top-menu__all__icon-Bag">
                        <a href="<?php echo wc_get_page_permalink('cart') ?>">
                            <button type="submit"><i class="fa fa-shopping-bag" aria-hidden="true"></i></button>
                        </a>
                        <span class="top-menu__all__icon-Bag-num">
                            <?php
                            global $woocommerce;
                            echo $woocommerce->cart->cart_contents_count;
                            ?>
                        </span>
                    </li>
                    <li class="top-menu__all__account <?php echo(is_user_logged_in() ? 'login-account' : ''); ?>">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <?php if (!is_user_logged_in()): ?>
                            <div class="top-menu__all__account-xl">
                                <span class="login">وورد</span>
                                <span>/</span>
                                <span class="signup">ثبت نام</span>
                            </div>
                        <?php else: ?>
                            <div class="top-menu__all__account-xl">
                                <span class="login"><?php echo $current_user->display_name ?></span>
                            </div>
                            <i class="fas fa-angle-down"></i>
                            <div class="top-menu__all__account-dropdown">
                                <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">ویرایش
                                    حساب</a>
                                <a href="<?php echo wp_logout_url(home_url()); ?>">خروج</a>
                            </div>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="top-menu__lg-fixed">
        <a href="<?php echo home_url(); ?>">
            <img src="<?php echo isset($options['general']['logo']) ? $options['general']['logo'] :
                get_template_directory_uri() . '/assets/img/download.png'; ?>" width="100px" height="80px" class="lazy">
        </a>
        <div class="top-menu-sm">
            <?php if (has_nav_menu('top-menu-one')): ?>
                <?php wp_nav_menu(array(
                    'theme_location' => 'top-menu-one'
                )) ?>
            <?php endif; ?>
        </div>
    </div>
</header>