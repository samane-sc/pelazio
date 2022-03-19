<div class="wrapper">
    <div class="setting-wrapper">
        <div class="setting-wrapper bottom-line">
            <div class="format-setting-label">
                <h3>تنظیمات اسلایدر محصولات</h3>
            </div>
            <p class="format-setting bottom-line"></p>
            <p class="format-setting-title">اولین اسلایدر محصولات(محصولات دارای تخفیف)</p>
            <div class="n-product-list">
                <div class="setting-wrapper bottom-line">
                    <div class="setting-wrapper bottom-line">
                        <div class="format-setting-label">
                            <h3> عنوان</h3>
                        </div>
                        <div class="format-setting">
                            <div class="format-setting-inner">
                                <div class="row">
                                    <input class="input-setting" type="text" name="link5_img" id="link5_img" value="<?php echo isset($options['product']['link5_img']) && !empty($options['product']['link5_img']) ? $options['product']['link5_img'] : ''; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="format-setting-label">
                        <input type="checkbox" id="exist1" name="exist1" <?php checked(1, $options['product']['exist1'])?>>
                        <label for="exist1"> نمایش در سایت</label><br>
                    </div>
                    <div class="setting-wrapper bottom-line">
                        <div class="format-setting-label">
                            <h3>نامک محصولات تخفیف خورده در قسمت دسته بندی</h3>
                        </div>
                        <div class="format-setting">
                            <div class="format-setting-inner">
                                <div class="row">
                                    <input class="input-setting" type="text" name="onsale_url" id="onsale_url" value="<?php echo isset($options['product']['onsale_url']) && !empty($options['product']['onsale_url']) ? $options['product']['onsale_url'] : ''; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="format-setting-label">
                        <h3>انتخاب عکس </h3>
                    </div>
                    <div class="format-setting">
                        <div class="description"></div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="img5" id="img5" value="<?php echo isset($options['general']['img5'])? $options['general']['img5'] :   get_template_directory_uri().'/assets/img/download.png'; ?>">
                                <button data-target-type="image" data-target="img5" class="button-primary select-uploader" title="add media">
                                    <span class="icon dashicons dashicons-plus-alt"></span>
                                </button>
                            </div>
                            <div class="row">
                                <img id="img5" class="img-setting" src="<?php echo isset($options['product']['img5'])? $options['product']['img5'] :   get_template_directory_uri().'/assets/img/download.png'; ?>" alt="logo image">
                                <input type="hidden" name="img5" id="img5_input"
                                       value="<?php echo isset($options['product']['img5'])? $options['product']['img5'] :   get_template_directory_uri().'/assets/images/download.png'; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="format-setting bottom-line"></p>
            <p class="format-setting-title">دومین اسلایدر محصولات</p>
            <div class="n-product-list">
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3> عنوان</h3>
                    </div>
                    <div class="format-setting">
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="link3_img" id="link3_img" value="<?php echo isset($options['product']['link3_img']) && !empty($options['product']['link3_img']) ? $options['product']['link3_img'] : ''; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="format-setting-label">
                    <input type="checkbox" id="exist2" name="exist2" <?php checked(1, $options['product']['exist2'])?>>
                    <label for="exist2"> نمایش در سایت</label><br>
                </div>
                <div class="row">
                    <?php
                    $speed_sending_products = $options['product']['ws_select2_speed_sending_products'];
                    $html = '';
                    if( $speed_sending_products ) {
                        foreach( $speed_sending_products as $post_id ) {
                            $title = get_the_title( $post_id );
                            // if the post title is too long, truncate it and add "..." at the end
                            $title = ( mb_strlen( $title ) > 50 ) ? mb_substr( $title, 0, 49 ) . '...' : $title;
                            $html .=  '<option value="' . $post_id . '" selected="selected">' . $title . '</option>';
                        }
                    }?>
                    <select id="ws_select2_speed_sending_products" name="ws_select2_speed_sending_products[]" multiple="multiple" style="width:99%;max-width:25em;">
                        <?php echo $html; ?>
                    </select>
                </div>
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3>انتخاب عکس </h3>
                    </div>
                    <div class="format-setting">
                        <div class="description"></div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="img3" id="img3" value="<?php echo isset($options['general']['img3'])? $options['general']['img3'] :   get_template_directory_uri().'/assets/img/download.png'; ?>">
                                <button data-target-type="image" data-target="img3" class="button-primary select-uploader" title="add media">
                                    <span class="icon dashicons dashicons-plus-alt"></span>
                                </button>
                            </div>
                            <div class="row">
                                <img id="img3" class="img-setting" src="<?php echo isset($options['product']['img3'])? $options['product']['img3'] :   get_template_directory_uri().'/assets/img/download.png'; ?>" alt="logo image">
                                <input type="hidden" name="img3" id="img3_input"
                                       value="<?php echo isset($options['product']['img3'])? $options['product']['img3'] :   get_template_directory_uri().'/assets/images/download.png'; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="format-setting bottom-line"></p>
            <p class="format-setting-title">سومین اسلایدر محصولات</p>
            <div class="n-product-list">
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3> عنوان</h3>
                    </div>
                    <div class="format-setting">
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="link1_img" id="link1_img" value="<?php echo isset($options['product']['link1_img']) && !empty($options['product']['link1_img']) ? $options['product']['link1_img'] : ''; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="format-setting-label">
                    <input type="checkbox" id="exist3" name="exist3" <?php checked(1, $options['product']['exist3'])?>>
                    <label for="exist3"> نمایش در سایت</label><br>
                </div>
                <div class="row">
                    <?php
                    $popular_products = $options['product']['ws_select2_most_popular_products'];
                    $html = '';
                    if( $popular_products ) {
                        foreach( $popular_products as $post_id ) {
                            $title = get_the_title( $post_id );
                            // if the post title is too long, truncate it and add "..." at the end
                            $title = ( mb_strlen( $title ) > 50 ) ? mb_substr( $title, 0, 49 ) . '...' : $title;
                            $html .=  '<option value="' . $post_id . '" selected="selected">' . $title . '</option>';
                        }
                    }?>
                    <select id="ws_select2_most_popular_products" name="ws_select2_most_popular_products[]" multiple="multiple" style="width:99%;max-width:25em;">
                        <?php echo $html; ?>
                    </select>
                </div>
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3>انتخاب عکس </h3>
                    </div>
                    <div class="format-setting">
                        <div class="description"></div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="img1" id="img1" value="<?php echo isset($options['general']['img1'])? $options['general']['img1'] :   get_template_directory_uri().'/assets/img/download.png'; ?>">
                                <button data-target-type="image" data-target="img1" class="button-primary select-uploader" title="add media">
                                    <span class="icon dashicons dashicons-plus-alt"></span>
                                </button>
                            </div>
                            <div class="row">
                                <img id="img1" class="img-setting" src="<?php echo isset($options['product']['img1'])? $options['product']['img1'] :   get_template_directory_uri().'/assets/img/download.png'; ?>" alt="logo image">
                                <input type="hidden" name="img1" id="img1_input"
                                       value="<?php echo isset($options['product']['img1'])? $options['product']['img1'] :   get_template_directory_uri().'/assets/images/download.png'; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="format-setting bottom-line"></p>
            <p class="format-setting-title">چهارمین اسلایدر محصولات(پرفروش ترین محصولات)</p>
            <div class="n-product-list">
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3> عنوان</h3>
                    </div>
                    <div class="format-setting">
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="link7_img" id="link7_img" value="<?php echo isset($options['product']['link7_img']) && !empty($options['product']['link7_img']) ? $options['product']['link7_img'] : ''; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <input type="checkbox" id="exist4" name="exist4" <?php checked(1, $options['product']['exist4'])?>>
                        <label for="exist4"> نمایش در سایت</label><br>
                    </div>
                    <div class="format-setting-label">
                        <h3>انتخاب عکس </h3>
                    </div>
                    <div class="format-setting">
                        <div class="description"></div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="img7" id="img7" value="<?php echo isset($options['general']['img7'])? $options['general']['img7'] :   get_template_directory_uri().'/assets/img/download.png'; ?>">
                                <button data-target-type="image" data-target="img7" class="button-primary select-uploader" title="add media">
                                    <span class="icon dashicons dashicons-plus-alt"></span>
                                </button>
                            </div>
                            <div class="row">
                                <img id="img7" class="img-setting" src="<?php echo isset($options['product']['img7'])? $options['product']['img7'] :   get_template_directory_uri().'/assets/img/download.png'; ?>" alt="logo image">
                                <input type="hidden" name="img7" id="img7_input"
                                       value="<?php echo isset($options['product']['img7'])? $options['product']['img7'] :   get_template_directory_uri().'/assets/images/download.png'; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="format-setting bottom-line"></p>
            <p class="format-setting-title">پنجمین اسلایدر محصولات</p>
            <div class="n-product-list">
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3> عنوان</h3>
                    </div>
                    <div class="format-setting">
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="link6_img" id="link6_img" value="<?php echo isset($options['product']['link6_img']) && !empty($options['product']['link6_img']) ? $options['product']['link6_img'] : ''; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="format-setting-label">
                    <input type="checkbox" id="exist5" name="exist5" <?php checked(1, $options['product']['exist5'])?>>
                    <label for="exist5"> نمایش در سایت</label><br>
                </div>
                <div class="row">
                    <?php
                    $just_us = $options['product']['ws_select2_just_our_products'];
                    $html = '';
                    if( $just_us ) {
                        foreach( $just_us as $post_id ) {
                            $title = get_the_title( $post_id );
                            // if the post title is too long, truncate it and add "..." at the end
                            $title = ( mb_strlen( $title ) > 50 ) ? mb_substr( $title, 0, 49 ) . '...' : $title;
                            $html .=  '<option value="' . $post_id . '" selected="selected">' . $title . '</option>';
                        }
                    }?>
                    <select id="ws_select2_just_our_products" name="ws_select2_just_our_products[]" multiple="multiple" style="width:99%;max-width:25em;">
                        <?php echo $html; ?>
                    </select>
                </div>
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3>انتخاب عکس </h3>
                    </div>
                    <div class="format-setting">
                        <div class="description"></div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="img6" id="img6" value="<?php echo isset($options['general']['img6'])? $options['general']['img6'] :   get_template_directory_uri().'/assets/img/download.png'; ?>">
                                <button data-target-type="image" data-target="img6" class="button-primary select-uploader" title="add media">
                                    <span class="icon dashicons dashicons-plus-alt"></span>
                                </button>
                            </div>
                            <div class="row">
                                <img id="img6" class="img-setting" src="<?php echo isset($options['product']['img6'])? $options['product']['img6'] :   get_template_directory_uri().'/assets/img/download.png'; ?>" alt="logo image">
                                <input type="hidden" name="img6" id="img6_input"
                                       value="<?php echo isset($options['product']['img6'])? $options['product']['img6'] :   get_template_directory_uri().'/assets/images/download.png'; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="format-setting bottom-line"></p>
            <p class="format-setting-title">ششمین اسلایدر محصولات</p>
            <div class="n-product-list">
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3> عنوان</h3>
                    </div>
                    <div class="format-setting">
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="link2_img" id="link2_img" value="<?php echo isset($options['product']['link2_img']) && !empty($options['product']['link2_img']) ? $options['product']['link2_img'] : ''; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="format-setting-label">
                    <input type="checkbox" id="exist6" name="exist6" <?php checked(1, $options['product']['exist6'])?>>
                    <label for="exist6"> نمایش در سایت</label><br>
                </div>
                <div class="row">
                    <?php
                    $best_products = $options['product']['ws_select2_best_products'];
                    $html = '';
                    if( $best_products ) {
                        foreach( $best_products as $post_id ) {
                            $title = get_the_title( $post_id );
                            // if the post title is too long, truncate it and add "..." at the end
                            $title = ( mb_strlen( $title ) > 50 ) ? mb_substr( $title, 0, 49 ) . '...' : $title;
                            $html .=  '<option value="' . $post_id . '" selected="selected">' . $title . '</option>';
                        }
                    }?>
                    <select id="ws_select2_best_products" name="ws_select2_best_products[]" multiple="multiple" style="width:99%;max-width:25em;">
                        <?php echo $html; ?>
                    </select>
                </div>
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3>انتخاب عکس </h3>
                    </div>
                    <div class="format-setting">
                        <div class="description"></div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="img2" id="img2" value="<?php echo isset($options['general']['img2'])? $options['general']['img2'] :   get_template_directory_uri().'/assets/img/download.png'; ?>">
                                <button data-target-type="image" data-target="img2" class="button-primary select-uploader" title="add media">
                                    <span class="icon dashicons dashicons-plus-alt"></span>
                                </button>
                            </div>
                            <div class="row">
                                <img id="img2" class="img-setting" src="<?php echo isset($options['product']['img2'])? $options['product']['img2'] :   get_template_directory_uri().'/assets/img/download.png'; ?>" alt="logo image">
                                <input type="hidden" name="img2" id="img2_input"
                                       value="<?php echo isset($options['product']['img2'])? $options['product']['img2'] :   get_template_directory_uri().'/assets/images/download.png'; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="format-setting bottom-line"></p>
            <p class="format-setting-title">هفتمین اسلایدر(جدیدترین محصولات)</p>
            <div class="n-product-list">
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <h3> عنوان</h3>
                    </div>
                    <div class="format-setting">
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="link4_img" id="link4_img" value="<?php echo isset($options['product']['link4_img']) && !empty($options['product']['link4_img']) ? $options['product']['link4_img'] : ''; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting-label">
                        <input type="checkbox" id="exist7" name="exist7" <?php checked(1, $options['product']['exist7'])?>>
                        <label for="exist7"> نمایش در سایت</label><br>
                    </div>
                    <div class="format-setting-label">
                        <h3>انتخاب عکس </h3>
                    </div>
                    <div class="format-setting">
                        <div class="description"></div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="img4" id="img4" value="<?php echo isset($options['general']['img4'])? $options['general']['img4'] :   get_template_directory_uri().'/assets/img/download.png'; ?>">
                                <button data-target-type="image" data-target="img4" class="button-primary select-uploader" title="add media">
                                    <span class="icon dashicons dashicons-plus-alt"></span>
                                </button>
                            </div>
                            <div class="row">
                                <img id="img4" class="img-setting" src="<?php echo isset($options['product']['img4'])? $options['product']['img4'] :   get_template_directory_uri().'/assets/img/download.png'; ?>" alt="logo image">
                                <input type="hidden" name="img4" id="img4_input"
                                       value="<?php echo isset($options['product']['img4'])? $options['product']['img4'] :   get_template_directory_uri().'/assets/images/download.png'; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="format-setting bottom-line"></p>
            <p class="format-setting-title">اسلایدر محصولات مرتبط(صفحه ی محصول)</p>
            <div class="n-product-list">
                <div class="setting-wrapper bottom-line">
                    <div class="format-setting">
                        <div class="description"></div>
                        <div class="format-setting-inner">
                            <div class="row">
                                <input class="input-setting" type="text" name="img8" id="img8" value="<?php echo isset($options['general']['img8'])? $options['general']['img8'] :   get_template_directory_uri().'/assets/img/download.png'; ?>">
                                <button data-target-type="image" data-target="img8" class="button-primary select-uploader" title="add media">
                                    <span class="icon dashicons dashicons-plus-alt"></span>
                                </button>
                            </div>
                            <div class="row">
                                <img id="img8" class="img-setting" src="<?php echo isset($options['product']['img8'])? $options['product']['img8'] :   get_template_directory_uri().'/assets/img/download.png'; ?>" alt="logo image">
                                <input type="hidden" name="img8" id="img8_input"
                                       value="<?php echo isset($options['product']['img8'])? $options['product']['img8'] :   get_template_directory_uri().'/assets/images/download.png'; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="format-setting-label">
                        <h3>انتخاب عکس </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
