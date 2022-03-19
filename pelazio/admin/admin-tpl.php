<div class="wrapper">
    <div class="container">
        <form action="" method="post">
            <div class="title-setting">
                <h2>تنظیمات قالب</h2>
            </div>

            <div class="panel-wrapper">
                <ul class="panel-tabs">
                    <li class="<?php echo isset( $default_tab ) && ( $default_tab == 'general') ? 'active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab', 'general'); ?>">تنظیمات کلی</a>
                    </li>
                    <li class="<?php echo isset( $default_tab ) && ( $default_tab == 'banner') ? 'active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab','banner'); ?>">بنر تبلیفاتی</a>
                    </li>
                    <li class="<?php echo isset( $default_tab ) && ( $default_tab == 'footer') ? 'active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab','footer'); ?>">تنظیمات پاصفحه</a>
                    </li>
                    <li class="<?php echo isset( $default_tab ) && ( $default_tab == 'products') ? 'active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab','products'); ?>">اسلایدر محصولات</a>
                    </li>
                    <li class="<?php echo isset( $default_tab ) && ( $default_tab == 'productsoption') ? 'active' : ''; ?>">
                        <a href="<?php echo add_query_arg('tab','productsoption'); ?>">تنظیمات محصولات</a>
                    </li>
                </ul>
                <div class="panel-content">
                    <div id="general" style="display: <?php echo isset( $default_tab ) && ( $default_tab == 'general') ? 'block' : 'none'; ?>">
                        <?php include get_template_directory() . '/admin/tpl/general.php'; ?>
                    </div>
                    <div id="banner" style="display: <?php echo isset( $default_tab ) && ( $default_tab == 'banner') ? 'block' : 'none'; ?>">
                        <?php include get_template_directory() . '/admin/tpl/banner.php'; ?>
                    </div>
                    <div id="footer" style="display: <?php echo isset( $default_tab ) && ( $default_tab == 'footer') ? 'block' : 'none'; ?>">
                        <?php include get_template_directory() . '/admin/tpl/footer.php'; ?>
                    </div>
                    <div id="productsoption" style="display: <?php echo isset( $default_tab ) && ( $default_tab == 'productsoption') ? 'block' : 'none'; ?>">
                        <?php include get_template_directory() . '/admin/tpl/productsoption.php'; ?>
                    </div>
                    <div id="products" style="display: <?php echo isset( $default_tab ) && ( $default_tab == 'products') ? 'block' : 'none'; ?>">
                        <?php include get_template_directory() . '/admin/tpl/products.php'; ?>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="option-tree-ui-buttons">
                <button type="submit" name="admin_submit" class="button-primary">ذخیره تنظیمات</button>
            </div>
        </form>
    </div>
</div>
