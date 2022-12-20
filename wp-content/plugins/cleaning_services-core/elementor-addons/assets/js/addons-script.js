(function ($) {
  "use strict";

        // slider carousel
        var nivoSlider = function ($scope, $) {
          // main slider
          jQuery(document).ready(function ($) {
            setTimeout(function () {
              function doAnimations(elements) {
                var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                elements.each(function () {
                  var $this = $(this);
                  var $animationDelay = $this.data('delay');
                  var $animationType = 'animated ' + $this.data('animation');
                  $this.css({
                    'animation-delay': $animationDelay,
                    '-webkit-animation-delay': $animationDelay
                  });
                  $this.addClass($animationType).one(animationEndEvents, function () {
                    $this.removeClass($animationType);
                  });
                  if ($this.hasClass('animate')) {
                    $this.removeClass('animation');
                  }
                });
              }
              var rtltrue = jQuery('body').hasClass('rtl');
              if ($('#mainSlider').length) {
                var testiSlider = $('#mainSliderWrapper').data('slickslider');
                var $el = $('#mainSlider');
                $el.on('init', function (e, slick) {
                  var $firstAnimatingElements = $('div.slide:first-child').find('[data-animation]');
                  doAnimations($firstAnimatingElements);
                });
                $el.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
                  var $currentSlide = $('div.slide[data-slick-index="' + nextSlide + '"]');
                  var $animatingElements = $currentSlide.find('[data-animation]');
                  doAnimations($animatingElements);
                });
                $el.not('.slick-initialized').slick({
                  autoplay: testiSlider['autoplay'],
                  autoplaySpeed: testiSlider['autoplay_speed'],
                  arrows: testiSlider['arrows'],
                  dots: testiSlider['dots'],
                  fade: testiSlider['fade'],
                  rtl: rtltrue,
                  pauseOnHover: testiSlider['pause_on_hover'],
                  pauseOnDotsHover: testiSlider['pause_on_dots_hover'],
                });
              }
            }, 200);
          });
        };

        var testimonials = function ($scope, $) {
          jQuery(document).ready(function ($) {
            var rtltrue = jQuery('body').hasClass('rtl');
            var test_testimonial_all = $('.testimonials-carousel').data('testimonial');
            if ($('.testimonials-carousel').length) {
              $('.testimonials-carousel').not('.slick-initialized').slick({
                mobileFirst: test_testimonial_all['mobileFirst'],
                slidesToShow: test_testimonial_all['slidesToShow'],
                slidesToScroll: test_testimonial_all['slidesToScroll'],
                infinite: test_testimonial_all['infinite'],
                autoplay: test_testimonial_all['autoplay'],
                autoplaySpeed: test_testimonial_all['autoplaySpeed'],
                rtl: rtltrue,
                arrows: test_testimonial_all['arrows'],
                dots: test_testimonial_all['dots'],
                cssEase: 'linear',
                responsive: [{
                  breakpoint: 1199,
                  settings: {
                    arrows: false,
                    dots: true
                  }
                }]
              });
            }
          });
        };

        var testimonialstwo = function ($scope, $) {
          
          jQuery(document).ready(function ($) {
            var test_testimonialtwo = $('.testimonials-carousel-1').data('testimonialtwo');
            var rtltrue = jQuery('body').hasClass('rtl');

            if ($('.testimonials-carousel-1').length) {
              $('.testimonials-carousel-1').not('.slick-initialized').slick({
                mobileFirst: test_testimonialtwo['mobileFirst'],
                slidesToShow: test_testimonialtwo['slidesToShow'],
                slidesToScroll: test_testimonialtwo['slidesToScroll'],
                infinite: test_testimonialtwo['infinite'],
                autoplay: test_testimonialtwo['autoplay'],
                autoplaySpeed: test_testimonialtwo['autoplaySpeed'],
                rtl: rtltrue,
                arrows: test_testimonialtwo['arrows'],
                dots: test_testimonialtwo['dots'],
                cssEase: 'linear',
                responsive: [{
                  breakpoint: 1299,
                  settings: {
                    arrows: false,
                    dots: true
                  }
                }]
              });
            }

          })
        };


        var brand_carosel = function ($scope, $) {
            jQuery(document).ready(function ($) {
              var rtltrue = jQuery('body').hasClass('rtl');

              var brand_all = $('.brand-carousel').data('brand');
              if ($('.brand-carousel').length) {
                $('.brand-carousel').not('.slick-initialized').slick({
                  mobileFirst: brand_all['mobileFirst'],
                  slidesToShow: brand_all['slidesToShow'],
                  slidesToScroll: brand_all['slidesToScroll'],
                  infinite: brand_all['infinite'],
                  autoplay: brand_all['autoplay'],
                  autoplaySpeed: brand_all['autoplaySpeed'],
                  rtl: rtltrue,
                  arrows: brand_all['arrows'],
                  dots: brand_all['dots'],
                  variableWidth: true,
                  responsive: [{
                    breakpoint: 1199,
                    settings: {
                      slidesToShow: 6,
                      arrows: false,
                      dots: true
                    }
                  }, {
                    breakpoint: 767,
                    settings: {
                      slidesToShow: 5,
                      arrows: false,
                      dots: true
                    }
                  }]
                });
              }
            });
        };

        var coupon_carosel = function ($scope, $) {

            jQuery(document).ready(function($) {
              var rtltrue = jQuery('body').hasClass('rtl');
              var coupon_all = $('.coupons-carousel').data('coupon');
              
              // coupons carousel
              if ($('.coupons-carousel').length) {
                  $('.coupons-carousel').slick({
                      mobileFirst: coupon_all['mobileFirst'],
                      slidesToShow: coupon_all['slidesToShow'],
                      slidesToScroll: coupon_all['slidesToScroll'],
                      infinite: coupon_all['infinite'],
                      autoplay: coupon_all['autoplay'],
                      autoplaySpeed: coupon_all['autoplaySpeed'],
                      rtl: rtltrue,
                      arrows: coupon_all['arrows'],
                      dots: coupon_all['dots'],
                      responsive: [{
                          breakpoint: 667,
                          settings: {
                              slidesToShow: 1
                          }
                      }]
                  });
              }
          });
        };


        var price_box_tab = function ($scope, $) {

          jQuery(document).ready(function($) {
            var rtltrue = jQuery('body').hasClass('rtl');

            var price_all = $('.price-carousel-tab').data('price');


            if ($('.price-carousel-tab').length) {
                $('.price-carousel-tab').not('.slick-initialized').slick({
                    mobileFirst: price_all['mobileFirst'],
                    slidesToShow: price_all['slidesToShow'],
                    slidesToScroll: price_all['slidesToScroll'],
                    infinite: price_all['infinite'],
                    autoplay: price_all['autoplay'],
                    autoplaySpeed: price_all['autoplaySpeed'],
                    rtl: rtltrue,
                    arrows: price_all['arrows'],
                    dots: price_all['dots'],
                    responsive: [{
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                        }
                    }, {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }, {
                        breakpoint: 500,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }]
                });
            }
        });

        };

        var price_box = function ($scope, $) {

          var pricetwo_all = $('#price-carousel-custom').data('pricetwo');

          jQuery(document).ready(function($) {
            var rtltrue = jQuery('body').hasClass('rtl');
            if ($('.price-carousel-3').length) {
              $('.price-carousel-3').not('.slick-initialized').slick({
                mobileFirst: pricetwo_all['mobileFirst'],
                slidesToShow: pricetwo_all['slidesToShow'],
                slidesToScroll: pricetwo_all['slidesToScroll'],
                infinite: pricetwo_all['infinite'],
                autoplay: pricetwo_all['autoplay'],
                autoplaySpeed: pricetwo_all['autoplaySpeed'],
                rtl: rtltrue,
                arrows: pricetwo_all['arrows'],
                dots: pricetwo_all['dots'],
                responsive: [{
                  breakpoint: 991,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                }, {
                  breakpoint: 767,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    arrows: false,
                    dots: true
                  }
                }, {
                  breakpoint: 500,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true
                  }
                }]
              });
            }
          });
          jQuery(document).ready(function($) {
            var rtltrue = jQuery('body').hasClass('rtl');
            if ($('.price-carousel').length) {
              $('.price-carousel').not('.slick-initialized').slick({
                mobileFirst: pricetwo_all['mobileFirst'],
                slidesToShow: pricetwo_all['slidesToShow'],
                slidesToScroll: pricetwo_all['slidesToScroll'],
                infinite: pricetwo_all['infinite'],
                autoplay: pricetwo_all['autoplay'],
                autoplaySpeed: pricetwo_all['autoplaySpeed'],
                rtl: rtltrue,
                arrows: pricetwo_all['arrows'],
                dots: pricetwo_all['dots'],
                responsive: [{
                  breakpoint: 991,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                  }
                }, {
                  breakpoint: 767,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                }, {
                  breakpoint: 500,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }]
              });
            }
          });

        };


        var service_box = function ($scope, $) {
            jQuery(document).ready(function($) {
              var rtltrue = jQuery('body').hasClass('rtl');
              var service_all = $('.services-carousel').data('service');
              
              if ($('.services-carousel').length) {
                $('.services-carousel').not('.slick-initialized').slick({
                  slidesToShow: service_all['slidesToShow'],
                  slidesToScroll: service_all['slidesToScroll'],
                  infinite: service_all['infinite'],
                  autoplay: service_all['autoplay'],
                  autoplaySpeed: service_all['autoplaySpeed'],
                  rtl: rtltrue,
                  arrows: service_all['arrows'],
                  dots: service_all['dots'],
                  responsive: [{
                    breakpoint: 1299,
                    settings: {
                      dots: true,
                      arrows: false
                    }
                  },{
                    breakpoint: 991,
                    settings: {
                      slidesToShow: 2,
                      dots: true,
                      arrows: false
                    }
                  },{
                    breakpoint: 767,
                    settings: {
                      slidesToShow: 2,
                      dots: true,
                      arrows: false
                    }
                  },{
                    breakpoint: 480,
                    settings: {
                      slidesToShow: 1,
                      dots: true,
                      arrows: false
                    }
                  }]
                });
              }
            });
        };

        var newsslider = function ($scope, $) {
            jQuery(document).ready(function($) {
              var rtltrue = jQuery('body').hasClass('rtl');
              var news_all = $('.news-carousel').data('news');
             
              if ($('.news-carousel').length) {
                $('.news-carousel').not('.slick-initialized').slick({
                  slidesToShow: news_all['slidesToShow'],
                  slidesToScroll: news_all['slidesToScroll'],
                  infinite: news_all['infinite'],
                  autoplay: news_all['autoplay'],
                  autoplaySpeed: news_all['autoplaySpeed'],
                  rtl: rtltrue,
                  arrows: news_all['arrows'],
                  dots: news_all['dots'],
                  adaptiveHeight: true,
                  responsive: [{
                    breakpoint: 991,
                    settings: {
                      slidesToShow: 2
                    }
                  }, {
                    breakpoint: 767,
                    settings: {
                      slidesToShow: 2
                    }
                  }, {
                    breakpoint: 480,
                    settings: {
                      slidesToShow: 1
                    }
                  }]
                });
              }
            })
        };


        var team_member = function ($scope, $) {

          jQuery(document).ready(function($) {
            var rtltrue = jQuery('body').hasClass('rtl');
            var team_all = $('#team_member').data('team');
            
            if ($('.person-carousel-2').length) {
              $('.person-carousel-2').not('.slick-initialized').slick({
                mobileFirst: team_all['mobileFirst'],
                slidesToShow: team_all['slidesToShow'],
                slidesToScroll: team_all['slidesToScroll'],
                infinite: team_all['infinite'],
                autoplay: team_all['autoplay'],
                autoplaySpeed: team_all['autoplaySpeed'],
                rtl: rtltrue,
                arrows: team_all['arrows'],
                dots: team_all['dots'],
                responsive: [{
                  breakpoint: 991,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                  }
                }, {
                  breakpoint: 767,
                  settings: {
                    slidesToShow: 1
                  }
                }]
              });
            }
          });
        };


  $(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction("frontend/element_ready/cleaning_banner_slider.default", nivoSlider);
    elementorFrontend.hooks.addAction("frontend/element_ready/cleaning_testimonials_2.default",testimonials);
    
    elementorFrontend.hooks.addAction("frontend/element_ready/cleaning_services_testimonials.default", testimonials);
    elementorFrontend.hooks.addAction("frontend/element_ready/brand_carousel.default", brand_carosel);
    elementorFrontend.hooks.addAction("frontend/element_ready/our_coupons.default", coupon_carosel);
    elementorFrontend.hooks.addAction("frontend/element_ready/cleaning_price_box_tab.default", price_box_tab);
    elementorFrontend.hooks.addAction("frontend/element_ready/cleaning_price_box.default", price_box);
    elementorFrontend.hooks.addAction("frontend/element_ready/cleaning_service_slider.default", service_box);
    elementorFrontend.hooks.addAction("frontend/element_ready/cleaning_blog_postslider.default", newsslider);
    elementorFrontend.hooks.addAction("frontend/element_ready/cleaning_team_member.default", team_member);
    elementorFrontend.hooks.addAction("frontend/element_ready/cleaning_services_testimonials.default", testimonialstwo);

  });
})(jQuery);