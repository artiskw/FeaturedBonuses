<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?>
        | <?php echo get_the_title() !== '' ? get_the_title() : single_cat_title(); ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<header>
    <div class="left-side"></div>
    <div class="header-container">
        <div class="logo-container">
            <div class="logo">
                <a href="<?php echo get_site_url(); ?>">
                    <?php $custom_logo_id = get_theme_mod('custom_logo'); ?>
                    <?php $image = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>
                    <img src="<?php echo $image[0]; ?>">
                </a>
            </div>
        </div>
        <div class="menu-container">
            <div class="menu-top-outside">
                <div class="menu-top">
                    <?php echo wp_nav_menu(array('menu' => 'Main menu')); ?>
                </div>
            </div>
            <div class="menu-bottom-outside">
                <div class="menu-bottom">
                    <?php echo wp_nav_menu(array('menu' => 'Main menu down')); ?>
                </div>
            </div>
        </div>
        <div class="menu-large">
            <?php echo wp_nav_menu(array('menu' => 'Main respensive')); ?>
        </div>
        <button class="hamburger hamburger--spring" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
    </div>
    <div class="right-side">
        <div class="top-block"></div>
        <div class="bottom-block"></div>
    </div>
</header>



