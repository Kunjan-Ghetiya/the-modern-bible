jQuery(document).ready(function ($) {

  // Testimonial Slider
  $('.testimonial-slider').slick({
    slidesToShow: 1,
    arrows: true,
    prevArrow: $('.prev-arrow'),
    nextArrow: $('.next-arrow'),
    dots: false,
  });

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
  var header = $(".header");
  var sticky = header.offset().top; 

  $(window).scroll(function() {
    if (window.pageYOffset > sticky) {
      header.addClass("sticky");
    } else {
      header.removeClass("sticky");
    }
  });
  function toggleNavigation() {
    if (jQuery(window).width() <= 1199) {

      $('.close-button').click(function () {
        $('.navigation-block').removeClass("show");
        $('body').removeClass("overflow-hidden menu-open");
        $('.backdrop').removeClass('show-backdrop');
      });

      $('.navbar-toggler').click(function () {
        $('.navigation-block').addClass("show");
        $('body').addClass("overflow-hidden menu-open");
        $('.backdrop').addClass('show-backdrop');
      });

    }
  }

  toggleNavigation();

  $(window).resize(function () {
    toggleNavigation();
  });

  // Store original parent
  const originalParent = $('.custom-aerrows-wrapper').parent();

  function moveArrows() {
    if ($(window).width() <= 767) {
      if (!$('.testimonial-slider-wrapper .custom-aerrows-wrapper').length) {
        $('.custom-aerrows-wrapper').appendTo('.testimonial-slider-wrapper');
      }
    } else {
      if (!originalParent.find('.custom-aerrows-wrapper').length) {
        $('.custom-aerrows-wrapper').appendTo(originalParent);
      }
    }
  }

  moveArrows();
  $(window).on('resize', moveArrows);

}); 