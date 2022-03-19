<?php global $options;?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php wp_title() ?></title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo isset($options['general']['favicon'])? $options['general']['favicon'] :
        get_template_directory_uri().'/assets/img/download.png'; ?>">
</head>
<?php wp_head(); ?>
<body>