jQuery(document).ready(function () {
    var custom_uploader;
    jQuery(document).on('click', '.select-uploader', function (e) {
        e.preventDefault();
        var $this = jQuery(this);
        var $target = $this.data('target');
        var $target_type = $this.data('target-type');

        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'انتخاب تصویر',
            button: {text: 'انتخاب تصویر'},
            multiple: false
        });
        custom_uploader.on('select', function () {
            attachment = custom_uploader.state().get('selection').first().toJSON();

            switch (true) {
                case $target_type === 'image':
                    jQuery('#' + $target).attr('src', attachment.url);
                    jQuery('#' + $target + '_input').val(attachment.url);
                    break;
            }
        });
        custom_uploader.open();
    })
});
jQuery(document).ready(function () {
    //address
    var wrapper_faq = jQuery(".input_fields_wrap_faq"); //Fields wrapper
    var add_button_faq = jQuery(".add_field_faq_button"); //Add button ID

    var x = 1; //initlal text box count
    jQuery(add_button_faq).click(function (e) { //on add input button click
        e.preventDefault();

        x++; //text box increment
        if (x<=3){
            jQuery(wrapper_faq).append('<br>' + '' +
                '                <fieldset class="faq_field">\n' +
                '                    <div class="format-setting">\n' +
                '                        <div class="description">\n' +
                '                            <label class="label_Button_title" for="name[]">عنوان ادرس : </label>\n' +
                '                        </div>\n' +
                '                        <div class="format-setting-inner">\n' +
                '                            <div class="row">\n' +
                '                                <input type="text" id="name[]" name="name[]" class="input-setting"\n' +
                '                                       value="واتسپ">\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                    </div>\n' +
                '                    <div class="format-setting">\n' +
                '                        <div class="description">\n' +
                '                            <label for="address[]">ادرس : </label>\n' +
                '                        </div>\n' +
                '                        <div class="format-setting-inner">\n' +
                '                            <div class="row">\n' +
                '                                <input type="text" id="address[]" name="address[]" class="input-setting"\n' +
                '                                       value="0912548741">\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                    </div>\n' +
                '                    <div class="format-setting">\n' +
                '                        <div class="description">\n' +
                '                            <label for="icon[]">ایکون : </label>\n' +
                '                        </div>\n' +
                '                        <div class="format-setting-inner">\n' +
                '                            <div class="row">\n' +
                '                                <input type="text" id="icon[]" name="icon[]" class="input-setting"\n' +
                '                                       value="fab fa-whatsapp-square">\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                    </div>\n' +
                '                    <a href="#" class="remove_field_faq">حذف ادرس</a>\n' +
                '                </fieldset>'
            ); //add input box
        }

    });
    jQuery(wrapper_faq).on("click", ".remove_field_faq", function (e) { //user click on remove text
        e.preventDefault();
        jQuery(this).parent('fieldset').remove();
        x--;
    });
})
jQuery(function ($) {

    // multiple select with AJAX search
    $('#ws_select2_most_popular_products').select2({
        ajax: {
            url: ajaxurl, // AJAX URL is predefined in WordPress admin
            dataType: 'json',
            delay: 250, // delay in ms while typing when to perform a AJAX search
            data: function (params) {
                return {
                    q: params.term, // search query
                    action: 'mishagetposts' // AJAX action for admin-ajax.php
                };
            },
            processResults: function (data) {
                var options = [];
                if (data) {

                    // data is the array of arrays, and each of them contains ID and the Label of the option
                    $.each(data, function (index, text) { // do not forget that "index" is just auto incremented value
                        options.push({id: text[0], text: text[1]});
                    });

                }
                return {
                    results: options
                };
            },
            cache: true
        },
        minimumInputLength: 3 // the minimum of symbols to input before perform a search
    });
});
jQuery(function ($) {

    // multiple select with AJAX search
    $('#ws_select2_best_products').select2({
        ajax: {
            url: ajaxurl, // AJAX URL is predefined in WordPress admin
            dataType: 'json',
            delay: 250, // delay in ms while typing when to perform a AJAX search
            data: function (params) {
                return {
                    q: params.term, // search query
                    action: 'mishagetposts' // AJAX action for admin-ajax.php
                };
            },
            processResults: function (data) {
                var options = [];
                if (data) {

                    // data is the array of arrays, and each of them contains ID and the Label of the option
                    $.each(data, function (index, text) { // do not forget that "index" is just auto incremented value
                        options.push({id: text[0], text: text[1]});
                    });

                }
                return {
                    results: options
                };
            },
            cache: true
        },
        minimumInputLength: 3 // the minimum of symbols to input before perform a search
    });
});
jQuery(function ($) {

    // multiple select with AJAX search
    $('#ws_select2_speed_sending_products').select2({
        ajax: {
            url: ajaxurl, // AJAX URL is predefined in WordPress admin
            dataType: 'json',
            delay: 250, // delay in ms while typing when to perform a AJAX search
            data: function (params) {
                return {
                    q: params.term, // search query
                    action: 'mishagetposts' // AJAX action for admin-ajax.php
                };
            },
            processResults: function (data) {
                var options = [];
                if (data) {

                    // data is the array of arrays, and each of them contains ID and the Label of the option
                    $.each(data, function (index, text) { // do not forget that "index" is just auto incremented value
                        options.push({id: text[0], text: text[1]});
                    });

                }
                return {
                    results: options
                };
            },
            cache: true
        },
        minimumInputLength: 3 // the minimum of symbols to input before perform a search
    });
});
jQuery(function ($) {

    // multiple select with AJAX search
    $('#ws_select2_just_our_products').select2({
        ajax: {
            url: ajaxurl, // AJAX URL is predefined in WordPress admin
            dataType: 'json',
            delay: 250, // delay in ms while typing when to perform a AJAX search
            data: function (params) {
                return {
                    q: params.term, // search query
                    action: 'mishagetposts' // AJAX action for admin-ajax.php
                };
            },
            processResults: function (data) {
                var options = [];
                if (data) {

                    // data is the array of arrays, and each of them contains ID and the Label of the option
                    $.each(data, function (index, text) { // do not forget that "index" is just auto incremented value
                        options.push({id: text[0], text: text[1]});
                    });

                }
                return {
                    results: options
                };
            },
            cache: true
        },
        minimumInputLength: 3 // the minimum of symbols to input before perform a search
    });
});