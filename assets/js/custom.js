jQuery(document).ready(function ($) {

    // Testimonial Slider
    $('.testimonial-slider').slick({
        slidesToShow: 1,
        arrows: true,
        prevArrow: $('.prev-arrow'),
        nextArrow: $('.next-arrow'),
        dots: false,
    });

    // $('.remove-flex').css('display', 'block');

    // Custom Video Popup
    const $popup = $('.custom-video-popup');
    const $iframe = $('#popup-youtube-video');

    $('.open-video-popup').on('click', function (e) {
        e.preventDefault();
        const videoId = $(this).data('video-id');
        const videoURL = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';

        $iframe.attr('src', videoURL);
        $popup.fadeIn().attr('aria-hidden', 'false');
        $('body').addClass('popup-open');
    });

    $('.popup-close, .popup-overlay').on('click', function () {
        $popup.fadeOut().attr('aria-hidden', 'true');
        $iframe.attr('src', '');
        $('body').removeClass('popup-open');
    });

    // header js

    if (jQuery(window).width() <= 1199) {

        $('.close-button').click(function () {
            $('.navigation-block').removeClass("show");
            $('body').removeClass("overflow-hidden overlay-show");
        });

        $('.navbar-toggler').click(function () {
            $('.navigation-block').addClass("show");
            $('body').addClass("overflow-hidden overlay-show");
        });

    }
}); 