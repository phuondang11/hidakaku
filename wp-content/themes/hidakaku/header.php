<!doctype html>
<html lang="ja">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=-100%, user-scalable=yes" >
<!-- SPEED -->
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta http-equiv="cache-control" max-age=86400 content="private, no-cache">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="keywords" content="<?php if(isset($GLOBALS['keywords'])){echo $GLOBALS['keywords'];} ?>" >
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/ogp.jpg">
<meta name="thumbnail" content="<?php echo get_template_directory_uri(); ?>/images/thumbnail.jpg">
<?php if ( is_front_page() || is_home() ) { ?>
<link rel="preload" href="<?php echo get_theme_file_uri("css/slick.css"); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="<?php echo get_theme_file_uri("css/aos.css"); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<?php } ?>

<?php wp_head(); ?>
<!-- FAVICON -->
<link rel="icon" href="<?php echo get_theme_file_uri('') ?>/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_theme_file_uri('') ?>/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_theme_file_uri('') ?>/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_theme_file_uri('') ?>/favicon/favicon-16x16.png">
<link rel="manifest" crossorigin="use-credentials" href="<?php echo get_theme_file_uri('') ?>/favicon/site.webmanifest">


</head>


<body id="<?php if(isset($GLOBALS['pageID'])){echo $GLOBALS['pageID']; } ?>" class="<?php if(isset($GLOBALS['pageClass'])){echo $GLOBALS['pageClass'];} ?>">

<!-- load GA -->

<div id="wrapper">
    <header>
        <div class="h_box">
            <div class="h_inner">
                <div class="h_left">
                    <div class="h_logo">
                        <h1>
                            <a href="<?php bloginfo('url') ?>/">
                                <img width="150" height="23" src="<?php bloginfo('template_url') ?>/images/logo.svg" alt="HIDAKAGU">
                            </a>
                        </h1>
                    </div>
                </div>
                <div class="h_center">
                    <div class="h_menu">
                        <!-- Nav Menu -->
                        <nav>
                            <div class="nav_inner">
                                <div class="sp">
                                    <ul class="nav_list">
                                        <li class="parent">
                                            <span class="hook">会社概要</span>
                                            <div class="sub">
                                                <ul>
                                                    <li><a href="#">HIDAKAGU について</a></li>
                                                    <li><a href="#">沿　革</a></li>
                                                    <li><a href="#">代表挨拶</a></li>
                                                    <li><a href="#">SDGsの取り組み</a></li>
                                                    <li><a href="#">企業概要</a></li>
                                                    <li><a href="#">直営店「COREO」</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="parent">
                                            <span class="hook">製品一覧</span>
                                            <div class="sub">
                                                <ul>
                                                    <li><a href="#">高山Wood Studio</a></li>
                                                    <li><a href="#">SUPER WAL</a></li>
                                                    <li><a href="#">Gracious</a></li>
                                                    <li><a href="#">RECRO</a></li>
                                                    <li><a href="#">Premo</a></li>
                                                    <li><a href="#">Latree</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li><a href="<?php bloginfo('url') ?>/store/">店舗一覧</a></li>
                                        <li><a href="<?php bloginfo('url') ?>/recruitment/">採用情報</a></li>
                                    </ul>
                                </div>
                                <div class="pc">
                                    <ul class="nav_list">
                                        <li class="<?php if ( is_page('about') ) echo 'active'; ?>"><a href="<?php bloginfo('url') ?>/about/">会社概要</a></li>
                                        <li class="<?php if ( is_post_type_archive('product') ) echo 'active'; ?>">
                                            <a href="<?php echo home_url('/product/'); ?>">製品一覧</a>
                                        </li>
                                        <li class="<?php if ( is_post_type_archive('store') ) echo 'active'; ?>">
                                            <a href="<?php echo home_url('/store/'); ?>">店舗一覧</a>
                                        </li>
                                        <li class="<?php if ( is_post_type_archive('recruitment') ) echo 'active'; ?>">
                                            <a href="<?php echo home_url('/recruitment/'); ?>">採用情報</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sp">
                                <div class="nav_info">
                                    <div class="nav_info_contact">
                                        <p><a href="<?php bloginfo('url') ?>/contact/">お問い合わせ</a></p>
                                    </div>
                                    <div class="nav_info_policy">
                                        <p><a href="#">プライバシーポリシー</a></p>
                                    </div>
                                    <div class="nav_info_copy">
                                        <p>&copy; 2025 HIDAKAGU. All rights reserved</p>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="h_right">
                    <div class="h_contact">
                        <p><a href="<?php bloginfo('url') ?>/contact/">お問い合わせ</a></p>
                    </div>
                    <!-- Hamburger Menu -->
                    <div class="hamburger hamburger--3dxy">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end #header-->