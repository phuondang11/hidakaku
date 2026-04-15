$(window).bind('load', function() {
    "use strict";
    AOS.init({
        once: "true",
        duration: 1200,
        disable : "mobile"
    });
    // main visual
    $('.s1_bg_list').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3500,
        infinite: true,
        speed: 1000,
        fade: true,
        cssEase: 'linear',
        dots: true,
        arrows: false,
        pauseOnFocus: false,
    });
    $('.s2_slide_list').slick({
        centerMode: true,
        variableWidth: true,
        dots: true,
        autoplay: true,
        autoplaySpeed: 3500,
        responsive: [
          {
            breakpoint: 751,
            settings: {
                arrows: true,
                centerMode: true,
                slidesToShow: 1,
                arrows: true,
            }
          },
          {
            breakpoint: 480,
            settings: {
                centerMode: true,
                slidesToShow: 1
            }
          }
        ]
      });
});

// load Iframe
if($('iframe').length){
    var vidDefer_h = $('iframe').offset().top;
    var window_h = $(window).outerHeight();

    function iframe_defer() {
        var vidDefer = document.getElementsByTagName('iframe');
        for (var i=0; i<vidDefer.length; i++) {
            if(vidDefer[i].getAttribute('data-src')) {
                vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-src'));
            }
        }
        $(vidDefer).removeAttr('data-src');
    }

    $(window).bind('scroll load',function () {
        if ($(this).scrollTop() > vidDefer_h - window_h / 2) {
            iframe_defer();
        }
    });
}