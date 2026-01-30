<!doctype html>
<html  <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title(); ?></title>


<!--    <link rel="icon" type="image/png" href="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/favicon/favicon-96x96.png" sizes="96x96" />-->
<!--    <link rel="icon" type="image/svg+xml" href="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/favicon/favicon.svg" />-->
<!--    <link rel="shortcut icon" href="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/favicon/favicon.ico" />-->
<!--    <link rel="apple-touch-icon" sizes="180x180" href="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/favicon/apple-touch-icon.png" />-->
<!--    <meta name="apple-mobile-web-app-title" content="ZoriShop" />-->
<!--    <link rel="manifest" href="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/favicon/site.webmanifest" />-->

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="body">
    <div class="wrap-header">
        <header class="d-flex align-items-center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-auto d-flex d-xl-none align-items-center">
                        <button class="icons style-1 size-50 icon-burger"></button>
                    </div>
                    <div class="col col-xl-auto d-flex align-items-center justify-content-center justify-content-sm-start">
                        <div class="wrap-logo">
                            <a href="/">
<!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/image/svg/logo.svg" alt="">-->
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/image/svg/logo-min.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl d-none d-xl-flex align-items-center">
                        <div class="wrap-menu">
                            <ul class="menu menu-1 d-flex align-items-center">
                                <?php
                                wp_nav_menu( [
                                        'theme_location'  => 'header-menu-1',
                                        'menu'            => '',
                                        'container'       => '',
                                        'container_class' => '',
                                        'container_id'    => '',
                                        'menu_class'      => 'menu',
                                        'menu_id'         => '',
                                        'echo'            => true,
                                        'fallback_cb'     => 'wp_page_menu',
                                        'before'          => '',
                                        'after'           => '',
                                        'link_before'     => '',
                                        'link_after'      => '',
                                        'items_wrap'      => '%3$s',
                                        'depth'           => 0,
                                        'walker'          => '',
                                ] );
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex align-items-center wrap-header-icons h100">
                            <a class="link-google align-items-center d-none d-md-flex" href="/">
                                <span class="icons size-32 icon-google"></span>
                                <span class="ts-12">4.8</span>
                                <span class="icons size-14 icon-star"></span>
                            </a>

                            <a class="link-icon-text lh-1 ml-0 d-none d-sm-flex" href="/">
                                <span class="icons size-50 icon-phone"></span>
                                <span class="lh-1 d-none d-md-flex">+385 1 6530 724</span>
                            </a>
                            <a href="/" class="icons style-1 size-50 icon-user d-none d-sm-flex">
                                <span class="count"></span>
                            </a>
                            <a href="/" class="icons style-2 size-50 icon-heart d-none d-sm-flex">
                                <span class="count" count="0">0</span>
                            </a>
                            <a href="/" class="icons style-3 size-50 icon-basket">
                                <span class="count" count="26">26</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>