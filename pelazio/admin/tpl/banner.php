<div class="wrapper">
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>انتخاب عکس بنر</h3>
        </div>
        <div class="format-setting">
            <div class="description"></div>
            <div class="format-setting-inner">
                <div class="row">
                    <!--                    <input class="input-setting" type="text" name="favicon" id="favicon" value="--><?php //echo isset($options['general']['favicon'])? $options['general']['favicon'] :   get_template_directory_uri().'/assets/img/download.png'; ?><!--">-->
                    <button data-target-type="image" data-target="img" class="button-primary select-uploader" title="add media">
                        <span class="icon dashicons dashicons-plus-alt"></span>
                    </button>
                </div>
                <div class="row">
                    <img id="img" class="img-setting" src="<?php echo isset($options['banner']['img'])? $options['banner']['img'] :   get_template_directory_uri().'/assets/img/download.png'; ?>" alt="logo image">
                    <input type="hidden" name="img" id="img_input"
                           value="<?php echo isset($options['banner']['img'])? $options['banner']['img'] :   get_template_directory_uri().'/assets/images/download.png'; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>لینک بنر</h3>
        </div>
        <div class="format-setting">
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="link_img" id="link_img" value="<?php echo isset($options['banner']['link_img']) && !empty($options['banner']['link_img']) ? $options['banner']['link_img'] : ''; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>عنوان بنر</h3>
        </div>
        <div class="format-setting">
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="alt_img" id="alt_img" value="<?php echo isset($options['banner']['alt_img']) && !empty($options['banner']['alt_img']) ? $options['banner']['alt_img'] : ''; ?>">
                </div>
            </div>
        </div>
    </div>
</div>
