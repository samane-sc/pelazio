<div class="wrapper">
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>لوگو</h3>
        </div>
        <div class="format-setting">
            <div class="description">سایز استاندارد لوگو 170 پیکسل در 62 پیکسل باشد.</div>
            <div class="format-setting-inner">
                <div class="row">
<!--                    <input class="input-setting" type="text" name="logo" id="logo" value="--><?php //echo isset($options['general']['logo'])? $options['general']['logo'] :   get_template_directory_uri().'/assets/img/download.png'; ?><!--">-->
                    <button data-target-type="image" data-target="logo" class="button-primary select-uploader" title="add media">
                        <span class="icon dashicons dashicons-plus-alt"></span>
                    </button>
                </div>
                <div class="row">
                    <img id="logo" class="img-setting" src="<?php echo isset($options['general']['logo'])? $options['general']['logo'] :   get_template_directory_uri().'/assets/img/download.png'; ?>" alt="logo image">
                    <input type="hidden" name="logo" id="logo_input"
                           value="<?php echo isset($options['general']['logo'])? $options['general']['logo'] :   get_template_directory_uri().'/assets/images/download.png'; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>عنوان لوگو</h3>
        </div>
        <div class="format-setting">
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="alt_logo" id="alt_logo" value="<?php echo isset($options['general']['alt_logo']) && !empty($options['general']['alt_logo']) ? $options['general']['alt_logo'] : ''; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper ">
        <div class="format-setting-label">
            <h3>favicon</h3>
        </div>
        <div class="format-setting">
            <div class="description">پیشنهاد می‌شود اندازه‌ی فاویکون 32px × 32px باشد.</div>
            <div class="format-setting-inner">
                <div class="row">
<!--                    <input class="input-setting" type="text" name="favicon" id="favicon" value="--><?php //echo isset($options['general']['favicon'])? $options['general']['favicon'] :   get_template_directory_uri().'/assets/img/download.png'; ?><!--">-->
                    <button data-target-type="image" data-target="favicon" class="button-primary select-uploader" title="add media">
                        <span class="icon dashicons dashicons-plus-alt"></span>
                    </button>
                </div>
                <div class="row">
                    <img id="favicon" class="img-setting" src="<?php echo isset($options['general']['favicon'])? $options['general']['favicon'] :   get_template_directory_uri().'/assets/img/download.png'; ?>" alt="logo image">
                    <input type="hidden" name="favicon" id="favicon_input"
                           value="<?php echo isset($options['general']['favicon'])? $options['general']['favicon'] :   get_template_directory_uri().'/assets/images/download.png'; ?>">
                </div>
            </div>
        </div>
    </div>
</div>
