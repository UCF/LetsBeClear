<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

  <meta charset="utf-8">

  <!-- Page Title -->
  <title><?php wp_title('|', true, 'right'); ?></title>

  <!-- Support for Responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Compatibility with Latest IE Versions -->
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" />

  <!-- RSS Feed -->
  <?php if (wp_count_posts()->publish > 0) : ?>
    <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
  <?php endif; ?>

  <!-- Favicon -->
  <link href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png" rel="shortcut icon" />

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/modernizr.custom.60983.js"></script>

  <?php wp_head(); ?>

  <!--[if IE 9]>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/ie-dropdownfix.js"></script>
  <![endif]-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

      <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/ie-dropdownfix.js"></script>
    <![endif]-->

  <?php $frontpage_id = get_option( 'page_on_front' ); ?>

</head>
