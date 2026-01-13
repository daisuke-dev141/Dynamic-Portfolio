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


const slideLength = document.querySelectorAll('.swiper-slide').length;

function initSwiper() {
    const mySwiper = new Swiper('.swiper', {
        spaceBetween: 16,
        slidesPerView: 2,
        loop: true,
        loopedSlides: slideLength,
        speed: 8000,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        freeMode: {
            enabled: true,
            momentum: false,
        },
        grabCursor: true,
        breakpoints: {

            //425px以上のとき
            425: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            //768px以上のとき
            768: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
            //1025px以上のとき
            1025: {
                slidesPerView: 5,
                spaceBetween: 32,
            }
        },
        on: {
            touchEnd: (swiper) => {
                swiper.slideTo(swiper.activeIndex + 1);
            }
        },

    });
};

window.addEventListener('load', function () {
    initSwiper();
});
