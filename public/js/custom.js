var ww = document.body.clientWidth;
$(document).ready(function () {
    'use strict';
    // Header
    $(".header__nav a:not(:only-child)").each(function () {
        $(this).addClass("parent");
    });

    $(".nav-toggle").on('click', function () {
        $(this).toggleClass("active");
        $(".header__menu").slideToggle(200);
        return false;
    });
    adjustMenu();
});

function adjustMenu() {
    if (ww < 992) {
        $(".header__nav li").unbind('mouseenter mouseleave');
        $("a.parent").unbind('click').bind('click', function () {
            $(this).parent('li').toggleClass('hover');
            $(this).toggleClass('active');
            return false;
        });
    } else if (ww >= 992) {
        $(".header__nav li").removeClass('hover');
        $(".header__nav li a").unbind('click');
        $("a.parent").removeClass('active').on('click', function () {
            return false;
        });
        $('.header__nav li').unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function () {
            $(this).toggleClass("hover");
        });
    }
}

$(window).on('resize orientationchange', function () {
    ww = document.body.clientWidth;
    adjustMenu();
});
