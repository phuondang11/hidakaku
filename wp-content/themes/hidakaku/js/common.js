window.WebFontConfig = { google: { families: [ 'Noto+Serif+JP:400,500,600,700', 'BM+Plex+Sans+JP:400,500,600,700', ] } }; (function () { var wf = document.createElement('script'); wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js'; wf.type = 'text/javascript'; wf.async = 'true'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wf, s); })();
// Varial GLOBAL
var windowWidth = window.innerWidth ? window.innerWidth : $(window).width();
var minWidthWrapper = $('#wrapper').css('min-width') ? $('#wrapper').css('min-width').slice(0, -2) : 1260;

var h_pc = 150;
var h_sp = 100;

$(window).bind('load resize',function(){
    windowWidth = $(window).width();
    if(windowWidth > 750){
        if(!$('.hamburger').hasClass('is_active')){
            $('nav').css('display','');
        }
    }
    $("nav ul li a[href]:not(.sweetlink)").click(function() {
        if(windowWidth <= 750){
            $('.hamburger').removeClass('is_active');
            $('nav').css('display', 'none');
        }
    });
    // swap Image for PC & SP
    var $setElem = $('.swap'),
    pcName = '_pc',
    spName = '_sp';
    $setElem.each(function(){
        var $this = $(this);
        if (windowWidth > 750) {
            $this.attr('src', $this.attr('src').replace(spName, pcName)).css({ visibility: 'visible' });
        } else{
            $this.attr('src', $this.attr('src').replace(pcName, spName)).css({ visibility: 'visible' });
        }
    });
});
$(window).bind('load scroll',function(){
    $('.h_box').css('left', (windowWidth > 750 && windowWidth < minWidthWrapper) ? `-${$(this).scrollLeft()}px` : 'unset');
    if($('.under').length > 0){
        $('body').toggleClass('is_scroll', $(this).scrollTop() >= 0);
    }else{
        $('body').toggleClass('is_scroll', $(this).scrollTop() >= 1);
    }
    $('.to_top,.sp_contact').toggleClass('show', $(this).scrollTop() >= 500);
})
window.onpageshow = function (event) {
    if (performance.navigation.type != 2 ) {
        $('body').removeClass('is_nav');
    }
};
$(window).bind('load',function () {

    // check mac
    if (("standalone" in window.navigator) && window.navigator.standalone) { $("body").addClass("mac");}
    var userAgent = navigator.userAgent || navigator.vendor || window.opera;
    if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) { $('body').addClass('mac'); }

    function scroll_anchor(p) {
        if (windowWidth > 750) {
            $('html,body').animate({ scrollTop: p.top - h_pc }, 300);
        }else{
            $('html,body').animate({ scrollTop: p.top - h_sp }, 300);
        }
    }
    // anchor in page
    $('a[href^="#"]:not(.sweetlink)').click(function() {
        $('body').removeClass('is_nav');
        if($(this).attr('href').length > 1){
            if ($($(this).attr('href')).length) {
                var p = $($(this).attr('href')).offset();
                scroll_anchor(p);
            }
        }
        return false;
    });
    // anchor top to page #
    var hash = location.hash;
    if (hash) {
        var p = $(hash).offset();
        scroll_anchor(p);
    }
});

$(document).ready(function(){
    // setting menu
    $(".hamburger").click(function() {
        $(this).toggleClass("is_active");
        $('nav').fadeToggle(100);
        $('body').toggleClass('is_nav');
    });
    // nav
    // $("nav .hook").click(function() {
    //     if (windowWidth <= 750) {
    //         $(this).toggleClass("open");
    //         $(this).next().stop(1, 0).slideToggle(400);
    //     } else {
    //         $(this).removeClass("open");
    //         $(this).next().removeAttr("style");
    //     }
    // });
    // totop
    $('.to_top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 600);
    });
    // click item bind a href
    $('.find_a').on('click', function (e) {
        e.preventDefault();
        var href = $(this).find('a').attr('href');
        location.href = href;
    });
    $('.find_out').on('click', function (e) {
        e.preventDefault();
        var href = $(this).find('a').attr('href');
        window.open(href);
    });
    $('.find_a,.find_out').on('mouseenter', function () {
        $(this).find('a').addClass('hv');
    }).on('mouseleave', function () {
        $(this).find('a').removeClass('hv');
    });
    // Custom editor ovn or wp

    var $gallery = $('.product_detail_gallery');

    if ($gallery.length > 0) {
        var count = parseInt($gallery.data('count'));
        var navOptions = {
            asNavFor: '.slider-for',
            dots: false,
            focusOnSelect: true,
            slidesPerRow: 1,
            slidesToScroll: 1,
        };

        if (count >= 5) {
            navOptions.rows = 2;
            navOptions.slidesToShow = 5;
        } else {
            navOptions.rows = 1;
            navOptions.slidesToShow = count;
        }

        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            asNavFor: '.slider-nav'
        });

        $('.slider-nav').slick(navOptions);
    }

    if ($('.product_other').length > 0) {
        const itemCount = $('.product_other_list .product_other_col').length;
        const enableLoop = itemCount > 4;
        const enableAutoplay = itemCount > 4;
        $('.product_other_list').slick({
            slidesToShow: 4,
            slidesToScroll: 4,
            infinite: enableLoop,
            autoplay: enableAutoplay,
            autoplaySpeed: 3500,
            speed: 1000,
            dots: true,
            arrows: true,
            variableWidth: true,
            responsive: [
                {
                    breakpoint: 751,
                    settings: {
                        centerMode: true,
                        infinite: true,
                        autoplay: true,
                        autoplaySpeed: 2500,
                        speed: 1000,
                    }
                }
            ]
        });
    }

    if ($(window).width() < 751) {
        $('.store_row:first-child .store_ttl_big').addClass('active');
        $('.store_ttl_big').on('click', function () {
            $(this).toggleClass('active');
            $(this).parents('.store_row').find('.store_content').slideToggle();
        });
        $('.product_sidebar_ttl').click(function(){
            $(this).toggleClass('active');
            $(this).parents('.product_sidebar_col').find('.product_sidebar_item').slideToggle();
        })
    }

    $('.end_checkbox.re01 dd .wpcf7-list-item').each(function () {
        const item = $(this);
        const label = item.find('.wpcf7-list-item-label');
        if (label.text().trim() === 'に同意する。') {
            label.before(
                '<a class="link" href="../privacy-policy/">個人情報の取扱い（プライバシーポリシー）</a> '
            );
        }
    });

})
// SAVE FIELD CONTACT
document.addEventListener("DOMContentLoaded", function () {
    const url = new URL(window.location.href);

    const job01 = url.searchParams.get("job01");
    const job02 = url.searchParams.get("job02");

    if (job01) {
        const input1 = document.querySelector('input[name="your_job01"]');
        if (input1) input1.value = job01;
    }

    if (job02) {
        const input2 = document.querySelector('input[name="your_job02"]');
        if (input2) input2.value = job02;
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const p = document.querySelector('.for_text p');
    if (p) {
      p.textContent = '※アップロード可能なファイル形式は「PDF（.pdf）」のみ、サイズは10MB以下、ファイル名は半角英数小文字のみで32文字以内となります。';
    }
  });