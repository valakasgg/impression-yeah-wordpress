// @codekit-prepend "./vendor/custom.modernizr.js";
// @codekit-prepend "./vendor/bootstrap.js";
// @codekit-prepend "./vendor/aos.js";
// @codekit-prepend "./vendor/swiper.js";
// @codekit-prepend "./vendor/anime.min.js";

(function() {
    $('document').ready(function() {
        console.log('doc ready');

        // AOS
        AOS.init({
            offset: 150
        });

        $('#menu-bar').click(function() {
            $('.handle').toggleClass('close');
            $(this).toggleClass('circle');
        });
        // const anime = require('animejs');

        // Hero Mobile
        anime({
            targets: '#curve-svg-mobile path',
            d: [
                {value: 'M 0 250 Q 0 300 400 150 L 400 400 L 0 400 Z'},
                {value: 'M 0 250 Q 50 300 400 150 L 400 400 L 0 400 Z'},
                {value: 'M 0 250 Q 100 300 400 150 L 400 400 L 0 400 Z'},
                {value: 'M 0 250 Q 150 300 400 150 L 400 400 L 0 400 Z'},
                {value: 'M 0 250 Q 200 300 400 150 L 400 400 L 0 400 Z'},
                {value: 'M 0 250 Q 250 300 400 150 L 400 400 L 0 400 Z'},
                {value: 'M 0 250 Q 300 300 400 150 L 400 400 L 0 400 Z'},
                {value: 'M 0 250 Q 350 300 400 150 L 400 400 L 0 400 Z'},
                {value: 'M 0 250 Q 400 300 400 150 L 400 400 L 0 400 Z'},
            ],
            easing: 'linear',
            duration: 4000,
            direction: 'alternate',
            loop: true
        });

        // Hero Desktop
        anime({
            targets: '#curve-svg-desktop path',
            d: [
                {value: 'M 0 0 Q 300 400 1400 0 L 1400 400 L 0 400 Z'},
                {value: 'M 0 0 Q 1150 400 1400 0 L 1400 400 L 0 400 Z'},
            ],
            easing: 'linear',
            duration: 4000,
            direction: 'alternate',
            loop: true
        });

        // $(window).scroll(function(){
        //     const scroll = document.documentElement.scrollTop;
        //     if (scroll >= 100) {
        //         document.querySelector('body').classList.add('scroll')
        //     } else {
        //         document.querySelector('body').classList.remove('scroll')
        //     }
        // });
    });
}());