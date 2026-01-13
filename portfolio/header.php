<!DOCTYPE html>
<html lang="<?php bloginfo("language"); ?>">

<head>
    <!-- 正しく設定しないと文字化けする -->
    <meta charset="<?php bloginfo("charset"); ?>">
    <!-- レスポンシブ対応させるため -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 検索結果に表示される説明 -->
    <meta name="description" content="エンジニアを目指す武富大輔のポートフォリオサイトです。">

    <!-- ブラウザのタブに表示される名前 -->
    <!-- <title>Taketomi Daisuke Portfolio</title> -->


    <!-- ファビコンの設定 -->
    <link rel="icon" href="img/logo5.svg">

    <!-- リセットCSSの読み込み -->
    <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/destyle.css"> -->

    <!-- Googleフォントの読み込み -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->

    <!-- Noto Serif JPの読み込み -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet"> -->
    <!-- もっと軽くするようにフォントを読み込む -->

    <!-- 共通CSSの読み込み -->
    <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/common.css"> -->

    <!-- 個別CSSの読み込み -->
    <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/top.css"> -->

    <?php

    // googleフォント
    wp_enqueue_style(
        "googlepis",
        "https://fonts.googleapis.com"
    );
    wp_enqueue_style(
        "gstatic",
        "https://fonts.gstatic.com"
    );
    wp_enqueue_style(
        "google-noto-serif",
        "https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&display=swap"
    );

    // jquery読み込み
    // wp_enqueue_script("jquery");

    wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <div class="logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo5.svg" alt="自分のロゴ">
            </a>
        </div>

        <div class="menu-container">
            <div class="menu-trigger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <!--ここからメニュー-->
            <nav class="circle-menu">
                <ul>
                    <li>
                        <a href="works.html">Works</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
