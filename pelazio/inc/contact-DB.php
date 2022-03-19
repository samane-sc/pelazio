<?php
global $sld_db_version;
$sld_db_version = '3.0';
function create_contact_table()
{
    global $wpdb;
    global $sld_db_version;

    $table_name = $wpdb->prefix . 'contactus';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		topic text NOT NULL,
		name text NOT NULL,
		email text NOT NULL, 
		description text NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    update_option('sld_db_version', $sld_db_version);
}

function insert_to_contact_table($topic, $name, $email, $content)
{
    global $wpdb;
    global $sld_db_version;
    $installed_ver = get_option('sld_db_version');
    if ($installed_ver != $sld_db_version) {
        create_contact_table();
    }
    $table_name = $wpdb->prefix . 'contactus';
    $wpdb->insert(
        $table_name,
        array(
            'topic' => $topic,
            'name' => $name,
            'email' => $email,
            'description' => $content,
        )
    );
}

// ajax action
add_action('wp_ajax_contact_ajax', 'contact_ajax');
add_action('wp_ajax_noprive_contact_ajax', 'contact_ajax');
function contact_ajax()
{
    $has_error = false;
    $msg = '';

    $topic = sanitize_text_field($_POST['topic']);
    $name = sanitize_text_field($_POST['name']);
    $content = sanitize_textarea_field($_POST['content']);
    $email = sanitize_text_field($_POST['email']);
    if (!empty($topic) && !empty($name) && !empty($content) && !empty($email)) {
        $has_error = false;
        $msg = "اطلاعات با موفقیت ثبت شد";
        insert_to_contact_table($topic, $name, $content, $email);
    } else {
        $has_error = true;
        $msg = "لطفا تمامی فیلدها را پر کنید";
    }

    wp_send_json(array(
        'error' => $has_error,
        'msg' => $msg,
    ));
}