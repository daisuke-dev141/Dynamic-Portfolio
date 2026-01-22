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



// function gsap_script()
// {
//     // GSAP本体
//     wp_enqueue_script('gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js', array(), false, true);
//     // プラグインを使う場合（今回はScrollTriggerを使用）
//     wp_enqueue_script('gsap-scrolltrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js', array('gsap-js'), false, true);
//     // 自作のアニメーションファイル
//     wp_enqueue_script('common-js', get_template_directory_uri() . '/js/common.js', array('gsap-js', 'jquery'), false, true);
// }
// add_action('wp_enqueue_scripts', 'gsap_script');

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
    }

    if (is_archive()) {
        wp_enqueue_style(
            'works-css',
            get_template_directory_uri() . '/css/works.css'
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


// function theme_scripts()
// {

// aboutページだけ Swiper を読み込む
//     if (is_page()) {

//         wp_enqueue_style(
//             'swiper-style',
//             'https://unpkg.com/swiper@7/swiper-bundle.min.css',
//             array(),
//             '7.0'
//         );

//         wp_enqueue_script(
//             'swiper-js',
//             'https://unpkg.com/swiper@7/swiper-bundle.min.js',
//             array(),
//             '7.0',
//             true
//         );

//         wp_enqueue_script(
//             'about-js',
//             get_template_directory_uri() . '/js/about.js',
//             array('swiper-js'),
//             '1.0',
//             true
//         );
//     }
// }
// add_action('wp_enqueue_scripts', 'theme_scripts');

function gsap_script()
{
    // jQuery（WP同梱）
    wp_enqueue_script('jquery');

    /* =====================
     * GSAP（共通）
     * ===================== */
    wp_enqueue_script(
        'gsap-js',
        'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js',
        array(),
        null,
        true
    );

    wp_enqueue_script(
        'gsap-scrolltrigger',
        'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js',
        array('gsap-js'),
        null,
        true
    );

    /* =====================
     * front-page
     * ===================== */
    if (is_front_page()) {
        wp_enqueue_script(
            'common-js',
            get_template_directory_uri() . '/js/common.js',
            array('gsap-js', 'jquery'),
            null,
            true
        );
    }

    /* =====================
     * about（固定ページ）
     * ===================== */
    if (is_page('about')) {

        // Swiper CSS（← 必須）
        wp_enqueue_style(
            'swiper-css',
            'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
            array(),
            null
        );

        // Swiper JS
        wp_enqueue_script(
            'swiper-js',
            'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
            array(),
            null,
            true
        );

        // about.js（gsap / jquery / swiper に依存）
        wp_enqueue_script(
            'about-js',
            get_template_directory_uri() . '/js/about.js',
            array('gsap-js', 'jquery', 'swiper-js'),
            null,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'gsap_script');

// Works カスタム投稿タイプ
// function create_works_post_type()
// {
//     register_post_type('works', array(
//         'labels' => array(
//             'name' => 'Works',
//             'singular_name' => 'Work',
//         ),
//         'public' => true,
//         'show_in_menu' => true,
//         'has_archive' => true,
//         'rewrite' => array('slug' => 'works'),
//         'supports' => array(
//             'title',
//             'editor',
//             'thumbnail'
//         ),
//     ));
// }
// add_action('init', 'create_works_post_type');

function split_by_newline($text)
{
    if (!$text) {
        return [];
    }

    return array_map(
        'trim',
        preg_split("/\r\n|\n|\r/", $text, -1, PREG_SPLIT_NO_EMPTY)
    );
}

// ツールバーを非表示にしてくれる
add_filter('show_admin_bar', '__return_false');
