<?php

//WordPressの機能を有効にする

/**
 * <title>タグを有効にする
 */
add_theme_support("title-tag");
/**
 * <titleの区切り文字を変更する>
 */
function fs_document_title_separator($separator)
{
    //区切った文字を｜にした
    $separator = "|";
    return $separator;
}
add_filter(
    "document_title_separator",         //呼び出すタイミング
    "fs_document_title_separator"       //呼び出す関数
);



function gsap_script()
{
    // GSAP本体
    wp_enqueue_script('gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js', array(), false, true);
    // プラグインを使う場合（今回はScrollTriggerを使用）
    wp_enqueue_script('gsap-scrolltrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js', array('gsap-js'), false, true);
    // 自作のアニメーションファイル
    wp_enqueue_script('common-js', get_template_directory_uri() . '/js/common.js', array('gsap-js', 'jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'gsap_script');

/**
 * アイキャッチ画像を使用可能にする
 */
add_theme_support("post-thumbnails");




function mytheme_enqueue_styles()
{

    // reset.css（全ページ）
    wp_enqueue_style(
        'reset-style',
        get_template_directory_uri() . '/css/destyle.css',
        array(),
        '1.0'
    );

    // common.css（全ページ）
    wp_enqueue_style(
        'common-style',
        get_template_directory_uri() . '/css/common.css',
        array('reset-style'),
        '1.0'
    );
    //topページじゃないとき投稿一覧ページ
    if (is_front_page()) {
        wp_enqueue_style(
            'about-style',
            get_template_directory_uri() . '/css/top.css',
            array('common-style'),
            '1.0'
        );
    } elseif (is_home()) {
        wp_enqueue_style(
            'archive-style',
            get_template_directory_uri() . '/css/works.css',
            array('common-style'),
            '1.0'
        );
    }


    //投稿ページだけ
    if (is_single()) {
        wp_enqueue_style(
            'about-style',
            get_template_directory_uri() . '/css/works-common.css',
            array('common-style'),
            '1.0'
        );
    }

    // aboutページだけ
    if (is_page()) {
        wp_enqueue_style(
            'about-style',
            get_template_directory_uri() . '/css/about.css',
            array('common-style'),
            '1.0'
        );
    }
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');


function theme_scripts()
{

    // aboutページだけ Swiper を読み込む
    if (is_page()) {

        wp_enqueue_style(
            'swiper-style',
            'https://unpkg.com/swiper@7/swiper-bundle.min.css',
            array(),
            '7.0'
        );

        wp_enqueue_script(
            'swiper-js',
            'https://unpkg.com/swiper@7/swiper-bundle.min.js',
            array(),
            '7.0',
            true
        );

        wp_enqueue_script(
            'about-js',
            get_template_directory_uri() . '/js/about.js',
            array('swiper-js'),
            '1.0',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'theme_scripts');
