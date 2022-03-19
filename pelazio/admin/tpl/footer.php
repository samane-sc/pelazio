<div class="wrapper">
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>نام سایت برای نمایش در فوتر</h3>
        </div>
        <div class="format-setting">
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="title" id="title" value="<?php echo isset($options['setting']['title']) && !empty($options['setting']['title']) ? $options['setting']['title'] : ''; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>شعار سایت برای نمایش در فوتر</h3>
        </div>
        <div class="format-setting">
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="title1" id="title1" value="<?php echo isset($options['setting']['title1']) && !empty($options['setting']['title1']) ? $options['setting']['title1'] : ''; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>متن درباره سایت</h3>
        </div>
        <div class="format-setting">
            <div class="">
                <div class="row">
                    <?php
                    $content = isset($options['setting']['content']) && !empty($options['setting']['content']) ? $options['setting']['content'] : '';
                    wp_editor( $content, 'content' );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>اطلاعات تماس</h3>
        </div>
        <div class="input_fields_wrap_faq">
            <a class="add_field_faq_button button-secondary">ادرس جدید</a>
        </div>
        <?php
        $lists = $options['setting']['contacts'];
        if ($lists) {
            foreach ($lists as $list) { ?>
                <fieldset class="faq_field">
                    <div class="format-setting">
                        <div class="description">
                            <label class="label_Button_title" for="name[]">عنوان ادرس : </label>
                        </div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input type="text" id="name[]" name="name[]" class="input-setting"
                                       value="<?php echo (isset($list['name'])) && (!empty($list['name']))? $list['name']: '' ;?>">
                            </div>
                        </div>
                    </div>
                    <div class="format-setting">
                        <div class="description">
                            <label for="address[]">ادرس : </label>
                        </div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input type="text" id="address[]" name="address[]" class="input-setting"
                                       value="<?php echo (isset($list['address'])) && (!empty($list['address']))? $list['address']: 'شماره' ;?>">
                            </div>
                        </div>
                    </div>
                    <div class="format-setting">
                        <div class="description">
                            <label for="icon[]">ایکون : </label>
                        </div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input type="text" id="icon[]" name="icon[]" class="input-setting"
                                       value="<?php echo (isset($list['icon'])) && (!empty($list['icon']))? $list['icon']: 'fab fa-whatsapp';?>">
                            </div>
                        </div>
                    </div>
                    <a href="#" class="remove_field_faq">حذف ادرس</a>
                </fieldset>
            <?php }
        }
        ?>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>متن کپی رایت</h3>
        </div>
        <div class="format-setting">
            <div class="format-setting-inner">
                <div class="row">
                    <input class="input-setting" type="text" name="copy_right" id="copy_right" value="<?php echo isset($options['setting']['copy_right']) && !empty($options['setting']['copy_right']) ? $options['setting']['copy_right'] : 'حقوق سایت محفوظ است.'; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>نماد اعتماد</h3>
        </div>
        <div class="format-setting">
            <div class="">
                <div class="row">
                    <?php
                    $content = isset($options['setting']['trust_assign']) && !empty($options['setting']['trust_assign']) ? $options['setting']['trust_assign'] : '';
                    wp_editor( $content, 'trust_assign');
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper bottom-line">
        <div class="format-setting-label">
            <h3>نماد سرآمد</h3>
        </div>
        <div class="format-setting">
            <div class="">
                <div class="row">
                    <?php
                    $content = isset($options['setting']['saramad_assign']) && !empty($options['setting']['saramad_assign']) ? $options['setting']['saramad_assign'] : '';
                    wp_editor( $content, 'saramad_assign' );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="setting-wrapper">
        <div class="format-setting-label">
            <h3>شبکه های اجتماعی</h3>
        </div>
        <div class="format-setting">
            <div class="description">
                <label class="label_Button_link" for="whatsapp">ای دی whatsapp</label>
            </div>
            <div class="format-setting-inner">
                <div class="row">
                    <input type="text" id="whatsapp" name="whatsapp" class="input-setting input_rtl"
                           value="<?php echo isset($options['setting']['whatsapp']) && !empty($options['setting']['whatsapp'])? $options['setting']['whatsapp'] :''; ?>">
                </div>
            </div>
        </div>
        <div class="format-setting">
            <div class="description">
                <label class="label_Button_link" for="telegram">ای دی telegram</label>
            </div>
            <div class="format-setting-inner">
                <div class="row">
                    <input type="text" id="telegram" name="telegram" class="input-setting input_rtl"
                           value="<?php echo isset($options['setting']['telegram'])? $options['setting']['telegram'] :''; ?>">
                </div>
            </div>
        </div>
        <div class="format-setting">
            <div class="description">
                <label class="label_Button_link" for="instagram">ای دی instagram</label>
            </div>
            <div class="format-setting-inner">
                <div class="row">
                    <input type="text" id="instagram" name="instagram" class="input-setting input_rtl"
                           value="<?php echo isset($options['setting']['instagram'])? $options['setting']['instagram'] :''; ?>">
                </div>
            </div>
        </div>
    </div>
</div>
