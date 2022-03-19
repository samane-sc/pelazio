<div class="wrapper">
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>عنوان </h3>
        </div>
        <div class="format-setting">
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="title1" id="title1" value="<?php echo isset($options['productsetting']['title1']) && !empty($options['productsetting']['title1']) ? $options['productsetting']['title1'] : ''; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>متن اول درباره گارانتی</h3>
        </div>
        <div class="format-setting">
            <div class="">
                <div class="row">
                    <?php
                    $content = isset($options['productsetting']['content1']) && !empty($options['productsetting']['content1']) ? $options['productsetting']['content1'] : '';
                    wp_editor( $content, 'content1' );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>عنوان</h3>
        </div>
        <div class="format-setting">
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="title2" id="title2" value="<?php echo isset($options['productsetting']['title2']) && !empty($options['productsetting']['title2']) ? $options['productsetting']['title2'] : ''; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>متن دوم درباره گارانتی</h3>
        </div>
        <div class="format-setting">
            <div class="">
                <div class="row">
                    <?php
                    $content = isset($options['productsetting']['content2']) && !empty($options['productsetting']['content2']) ? $options['productsetting']['content2'] : '';
                    wp_editor( $content, 'content2' );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>عنوان</h3>
        </div>
        <div class="format-setting">
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="title3" id="title3" value="<?php echo isset($options['productsetting']['title3']) && !empty($options['productsetting']['title3']) ? $options['productsetting']['title3'] : ''; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>متن سوم درباره گارانتی</h3>
        </div>
        <div class="format-setting">
            <div class="">
                <div class="row">
                    <?php
                    $content = isset($options['productsetting']['content3']) && !empty($options['productsetting']['content3']) ? $options['productsetting']['content3'] : '';
                    wp_editor( $content, 'content3' );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
