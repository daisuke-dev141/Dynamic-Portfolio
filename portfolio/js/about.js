"use strict"

// メニュー開閉の制御
// ryoma.online参照gsap
const trigger = document.querySelector('.menu-trigger');
const menu = document.querySelector('.circle-menu');
const menuItems = document.querySelectorAll('.circle-menu a');
let isOpen = false;

trigger.addEventListener('click', function () {
    isOpen = !isOpen;

    if (isOpen) {
        trigger.classList.add('active');
        menu.classList.add('active');

        // clip-pathアニメーション（必ず0から始める）
        gsap.fromTo(menu,
            { clipPath: "circle(0px at calc(100% - 50px) 50px)" },
            { duration: 0.6, clipPath: "circle(150% at calc(100% - 50px) 50px)", ease: "power2.inOut" }
        );

        // メニュー項目をフェードイン
        gsap.to(menuItems, {
            duration: 0.5,
            opacity: 1,
            y: 0,
            stagger: 0.1,
            delay: 0.3
        });

    } else {
        trigger.classList.remove('active');

        // メニュー項目をフェードアウト
        gsap.to(menuItems, {
            duration: 0.3,
            opacity: 0,
            y: 20
        });

        // clip-pathアニメーション
        gsap.to(menu, {
            duration: 0.6,
            clipPath: "circle(0px at calc(100% - 50px) 50px)",
            ease: "power2.inOut",
            delay: 0.2,
            onComplete: function () {
                menu.classList.remove('active');
            }
        });
    }
});


// jqueryのエフェクト

jQuery(function () {

    jQuery(window).on("scroll", function () {
        let header = jQuery("header");
        if (jQuery(this).scrollTop() > 0) {
            header.addClass("scrolled");
        } else {
            header.removeClass("scrolled");
        }
    });

});


jQuery(function () {
    // .js-accordion_titleをクリックすると
    jQuery('.js-accordion_title').click(function () {
        // クリックした次の要素を展開
        jQuery(this).next('.js-accordion_inner').slideToggle();
        // 展開するときjs-accordion_titleクラスにopenクラスを追加してアイコンを回転
        jQuery(this).toggleClass("open");
    });
});



function initSwiper() {
    // Swiperの初期化前にスライド数を取得
    const slideLength = document.querySelectorAll('.infinite-swiper .swiper-slide').length;

    const mySwiper = new Swiper('.infinite-swiper', {
        spaceBetween: 16,
        slidesPerView: 2,
        loop: true,
        loopedSlides: slideLength, // 実際のスライド数を指定
        speed: 100,
        autoplay: {
            delay: 0,
            disableOnInteraction: false, // ユーザー操作後も自動再生を継続
            pauseOnMouseEnter: false, // マウスホバーでも停止しない
        },
        freeMode: {
            enabled: true,
            momentum: false,
            sticky: false, // スティッキーを無効化
        },
        grabCursor: true,
        allowTouchMove: true, // タッチ操作を許可
        breakpoints: {
            425: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
            1025: {
                slidesPerView: 5,
                spaceBetween: 32,
            }
        },
        // touchEndイベントを削除（これが原因で止まる）
        // on: {
        //     touchEnd: (swiper) => {
        //         swiper.slideTo(swiper.activeIndex + 1);
        //     }
        // },
    });

    // ユーザー操作後に自動再生を確実に再開
    mySwiper.el.addEventListener('mouseenter', () => {
        // 必要に応じてホバー時の処理
    });

    mySwiper.el.addEventListener('mouseleave', () => {
        if (!mySwiper.autoplay.running) {
            mySwiper.autoplay.start();
        }
    });
}

// DOMが完全に読み込まれた後に実行
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initSwiper);
} else {
    initSwiper();
}
