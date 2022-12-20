    (function($) {

        "use strict";
        var target = 3;
        var $document = $(document),
            $window = $(window),
            // Template options
            templateOption = {
                stickyHeader: true,
                smoothScroll: false,
                backToTop: true
            },

            // Template Blocks
            blocks = {
                mainSlider: $('#mainSlider'),
                slideNav: $('#slide-nav'),
                categoryCarousel: $('.category-carousel'),
                servicesSimpleCarousel: $('.services-carousel'),
                servicesCarousel: $('.services-mobile-carousel'),
                servicesCarouselCircle: $('.services-circle-carousel'),
                testimonialsCarousel: $('.testimonials-carousel'),
                testimonialsCarousel1: $('.testimonials-carousel-1'),
                servicesBlockAlt: $('.services-block-alt'),
                textIconCarousel: $('.text-icon-carousel'),
                personCarousel: $('.person-carousel'),
                personCarousel2: $('.person-carousel-2'),
                numbersCarousel: $('.numbers-carousel'),
                couponsCarousel: $('.coupons-carousel'),
                brandCarousel: $('.brand-carousel'),
                submenu: $('[data-submenu]'),
                counterBlock: $('.numbers-carousel, .counter-row'),
                isotopeGallery: $('#isotopeGallery'),
                slickGallery: $('#slickGallery'),
                postGallery: $('.blog-isotope'),
                postCarousel: $('.post-carousel'),
                newsCarousel: $('.news-carousel'),
                priceCarousel: $('.price-carousel'),
                priceCarousel3: $('.price-carousel-3'),
                priceCarousel1: $('.price-carousel-tab'),
                textIconsCarousel: $('.text-icon-carousel'),
                prdCarousel: $('.prd-carousel'),
                postMoreLink: $('.view-more-post'),
                testimonialMoreLink: $('.view-more-testimonials'),
                testimonialsLength: $('.testimonial-item.grid-item'),
                getQuoteLink: $('.form-popup-link'),
                animation: $('.animation'),
                rangeSlider: $('#rangeSlider1'),
                stickyHeader: $(".header-sticky"),
                productImage: $("#mainImage"),
                rtltrue: jQuery('body').hasClass('rtl'),
                restHtml: '',
            };
        // ligth box options
        lightbox.option({
                'fadeDuration': 300,
                'imageFadeDuration': 300,
                'alwaysShowNavOnTouchDevices': true
            }

            /* ---------------------------------------------
             Scripts initialization
             --------------------------------------------- */
        );

        $document.ready(function() {
            if ($('.datetimepicker').length) {
                $('.datetimepicker').datetimepicker({
                    format: cleaning_services_ajax_object.form_date_format,
                    icons: {
                        time: 'icon icon-clock',
                        date: 'icon icon-calendar',
                        up: 'icon icon-arrow_up',
                        down: 'icon icon-arrow_down',
                        previous: 'icon icon-arrow-left',
                        next: 'icon icon-arrow-right',
                        today: 'icon icon-today',
                        clear: 'icon icon-trash',
                        close: 'icon icon-cancel-music'
                    }
                });
            }


            $(".cart .input-text.qty.text").spinner({
                spin: function(event, ui) {
                    $('.woocommerce-cart-form input[name="update_cart"]').prop('disabled', false);
                }
            });
            $(document.body).on('updated_cart_totals', function() {
                $(".cart .input-text.qty.text").spinner({
                    spin: function(event, ui) {
                        $('.woocommerce-cart-form input[name="update_cart"]').prop('disabled', false);
                    }
                });
            });

            $('.header-cart').on('click', '.prd-sm-delete', function() {
                $(this).closest('.prd-sm-item').append('<div class="loader-cart-delete"><img src="' + cleaning_services_ajax_object.loader_img + '"></div>');
                var id = $(this).data('product_id')
                var qty = $(this).data('qty')
                var cid = $(this).data('cid')
                 var vid = $(this).data('variation_id')
                $.ajax({
                    type: "POST",
                    url: cleaning_services_ajax_object.ajax_url,
                    data: {
                        action: 'remove_item_from_cart',
                        product_id: id,
                        cid: cid,
                        vid: vid,
                        security: cleaning_services_ajax_object.ajax_nonce_removecart,
                    },
                    success: function(res) {
                        if (res.fragments) {
                            $('.cart-contents').replaceWith(res.fragments['a.cart-contents'])
                            $('.header-cart-dropdown').replaceWith(res.fragments['div.header-cart-dropdown'])
                        }
                        $('.loader-cart-delete').replaceWith('');
                    }
                });
            })


            var windowWidth = window.innerWidth || $window.width();
            var windowH = $window.height();

            // set background image inline
            if ($('[data-bg]').length) {
                $('[data-bg]').each(function() {
                    var $this = $(this),
                        bg = $this.attr('data-bg');
                    if ($this.hasClass('fullwidth-bg') || $this.hasClass('fullwidth')) {
                        $this.css({
                            'background-image': 'url(' + bg + ')'
                        });
                    } else {
                        $this.find('.container').first().css({
                            'background-image': 'url(' + bg + ')'
                        });
                    }
                });
            }

            //for testimonials
            if (blocks.testimonialsLength.length > target) {
                $('.view-more-testimonials').show();
            }

            $('.view-more-testimonials').on('click', function() {
                $('.view-more-testimonials').hide()
                $('.more-loader').addClass('visible');
                setTimeout(function() {
                    var i = 0
                    var j = 0
                    $('.testimonial-item.grid-item').each(function() {
                        if ($(this).is(':visible')) {
                            j++;
                        } else {
                            if (i < target) {
                                var h = $('.testimonial-item.grid-item:first-child').find('.text').height()
                                $(this).show()
                                $(this).find('.text').height(h)
                                i++
                            }
                        }
                    })

                    if (blocks.testimonialsLength.length == i + j) {
                        $('.more-loader').removeClass('visible');
                        $('.view-more-testimonials').hide()
                    } else {
                        $('.more-loader').removeClass('visible');
                        $('.view-more-testimonials').show()

                    }
                }, 2000);
            })


            // number counter
            if (blocks.counterBlock.length) {
                blocks.counterBlock.waypoint(function() {
                    $('.number > span.count', blocks.counterBlock).each(count);
                }, {
                    triggerOnce: true,
                    offset: '80%'
                });
            }

            // post isotope
            if (blocks.postGallery.length) {
                var $postgallery = $('.blog-isotope');
                $postgallery.imagesLoaded(function() {
                    $postgallery.isotope({
                        itemSelector: '.blog-post, .testimonial-card',
                        masonry: {
                            gutter: 30,
                            columnWidth: '.blog-post, .testimonial-card'
                        }
                    });
                });
            }

            // product gallery
            if (blocks.productImage.length) {
                blocks.productImage.elevateZoom({
                    gallery: 'productPreviews',
                    cursor: 'pointer',
                    galleryActiveClass: 'active',
                    zoomWindowPosition: 1,
                    zoomWindowFadeIn: 500,
                    zoomWindowFadeOut: 500,
                    lensFadeIn: 500,
                    lensFadeOut: 500
                });
                var ezApi = blocks.productImage.data('elevateZoom');
                if ((window.innerWidth || $window.width()) < 769) {
                    ezApi.changeState('disable');
                }
                $(window).on('resize', function() {
                    if ((window.innerWidth || $window.width()) < 769) {
                        ezApi.changeState('disable');
                    } else {
                        ezApi.changeState('enable');
                    }
                });
                $('#productPreviews > a').on('click', function() {
                    blocks.productImage.attr({
                        src: $(this).attr('data-image'),
                        'data-zoom-image': $(this).attr('data-zoom-image')
                    });
                });
            }

            // rangeSlider
            if (blocks.rangeSlider.length) {
                var rangeSlider1 = document.getElementById('rangeSlider1');
                noUiSlider.create(rangeSlider1, {
                    start: [100, 2000],
                    connect: true,
                    step: 100,
                    padding: 100,
                    rtl: blocks.rtltrue,
                    range: {
                        'min': 0,
                        'max': 10100
                    }
                });
                var number1_1 = document.getElementById('number-1-1');
                var number1_2 = document.getElementById('number-1-2');
                rangeSlider1.noUiSlider.on('update', function(values, handle) {
                    var value = values[handle];
                    if (handle) {
                        number1_1.textContent = Math.round(value);
                    } else {
                        number1_2.textContent = Math.round(value);
                    }
                });
                number1_1.addEventListener('change', function() {
                    rangeSlider1.noUiSlider.set([this.textContent, null]);
                });
                number1_2.addEventListener('change', function() {
                    rangeSlider1.noUiSlider.set([null, this.textContent]);
                });
            }
           

            // products carousel
            if (blocks.prdCarousel.length) {
                blocks.prdCarousel.slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false,
                    arrows: true,
                    rtl: blocks.rtltrue,
                    responsive: [{
                        breakpoint: 1299,
                        settings: {
                            dots: true,
                            arrows: false
                        }
                    }, {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3
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

            // numbers carousel
            if (blocks.numbersCarousel.length) {
                blocks.numbersCarousel.slick({
                    mobileFirst: JSON.parse(ajax_numberslide.mobile_first),
                    slidesToShow: JSON.parse(ajax_numberslide.slides_to_show),
                    slidesToScroll: JSON.parse(ajax_numberslide.slides_to_scroll),
                    infinite: JSON.parse(ajax_numberslide.infinite),
                    autoplay: JSON.parse(ajax_numberslide.autoplay),
                    autoplaySpeed: parseInt(ajax_numberslide.autoplay_speed),
                    rtl: blocks.rtltrue,
                    arrows: JSON.parse(ajax_numberslide.arrows),
                    dots: JSON.parse(ajax_numberslide.dots),
                    responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3
                        }
                    }, {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2
                        }
                    }, {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            centerMode: true,
                            centerPadding: '40px'
                        }
                    }]
                });
            }

            // coupons carousel
            if (blocks.couponsCarousel.length) {
                blocks.couponsCarousel.slick({
                    mobileFirst: JSON.parse(ajax_coupon.mobile_first),
                    slidesToShow: JSON.parse(ajax_coupon.slides_to_show),
                    slidesToScroll: JSON.parse(ajax_coupon.slides_to_scroll),
                    infinite: JSON.parse(ajax_coupon.infinite),
                    autoplay: JSON.parse(ajax_coupon.autoplay),
                    autoplaySpeed: parseInt(ajax_coupon.autoplay_speed),
                    rtl: blocks.rtltrue,
                    arrows: JSON.parse(ajax_coupon.arrows),
                    dots: JSON.parse(ajax_coupon.dots),
                    responsive: [{
                        breakpoint: 667,
                        settings: {
                            slidesToShow: 1
                        }
                    }]
                });
            }

            // text_icon carousel
            if (blocks.textIconCarousel.length) {
                blocks.textIconCarousel.slick({
                    mobileFirst: JSON.parse(ajax_textimonials.mobile_first),
                    slidesToShow: JSON.parse(ajax_textimonials.slides_to_show),
                    slidesToScroll: JSON.parse(ajax_textimonials.slides_to_scroll),
                    infinite: JSON.parse(ajax_textimonials.infinite),
                    autoplay: JSON.parse(ajax_textimonials.autoplay),
                    rows: JSON.parse(ajax_textimonials.rows_per),
                    slidesPerRow: JSON.parse(ajax_textimonials.slides_per_row),
                    autoplaySpeed: parseInt(ajax_textimonials.autoplay_speed),
                    rtl: blocks.rtltrue,
                    arrows: JSON.parse(ajax_textimonials.arrows),
                    dots: JSON.parse(ajax_textimonials.dots),
                    responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesPerRow: 1
                        }
                    }]
                });
            }

           
            // person carousel (team)
            if (blocks.personCarousel.length) {
                blocks.personCarousel.slick({
                    mobileFirst: JSON.parse(ajax_teamcarousel.mobile_first),
                    slidesToShow: JSON.parse(ajax_teamcarousel.slides_to_show),
                    slidesToScroll: JSON.parse(ajax_teamcarousel.slides_to_scroll),
                    infinite: JSON.parse(ajax_teamcarousel.infinite),
                    autoplay: JSON.parse(ajax_teamcarousel.autoplay),
                    autoplaySpeed: parseInt(ajax_teamcarousel.autoplay_speed),
                    rtl: blocks.rtltrue,
                    arrows: JSON.parse(ajax_teamcarousel.arrows),
                    dots: JSON.parse(ajax_teamcarousel.dots),
                    responsive: [{
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 2
                        }
                    }, {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1
                        }
                    }]
                });
            }


            // category carousel
            if (blocks.categoryCarousel.length) {
                blocks.categoryCarousel.slick({
                    mobileFirst: false,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    arrows: false,
                    rtl: blocks.rtltrue,
                    autoplay: true,
                    dots: true,
                    responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3
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

            // post carousel
            if (blocks.postCarousel.length) {
                blocks.postCarousel.slick({
                    mobileFirst: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    autoplay: false,
                    arrows: true,
                    rtl: blocks.rtltrue,
                    dots: false
                });
            }

            // END CAROUSELS

            headerSearch();
            mobileMenu(windowWidth);
            toggleCart('.header-cart', '.header-cart-dropdown');
            printThis('.coupon-print', '.coupon');
            backToTop('.js-backToTop', templateOption.backToTop);
            doubleTap(windowWidth);
            mobileInfoSlide();
            isotopeGallery(blocks.isotopeGallery, blocks.slickGallery, windowWidth);
            changeInput();
            $(".testimonial-item.cutted").dotdotdot();


            if (windowWidth < 769) {
                if (typeof(ajax_bannercarousel) != 'undefined') {
                    slickMobile(blocks.servicesCarousel, 479, 1, 1, ajax_bannercarousel);
                }
                if (typeof(ajax_bannershine) != 'undefined') {
                    slickMobile(blocks.servicesCarouselCircle, 767, 1, 1, ajax_bannershine);
                }



            }

            if (blocks.stickyHeader.length && templateOption.stickyHeader) {
                $(blocks.stickyHeader).stickyHeader();
            }

            // lazy loading effect
            if (blocks.animation.length) {
                onScrollInit(blocks.animation, windowWidth);
            }
            // Resize window events

            $window.resize(function() {
                var windowWidth = window.innerWidth || $window.width();

                if (windowWidth < 769) {
                    if (typeof(ajax_bannercarousel) != 'undefined') {
                        slickMobile(blocks.servicesCarousel, 479, 1, 1, ajax_bannercarousel);
                    }
                    if (typeof(ajax_bannershine) != 'undefined') {
                        slickMobile(blocks.servicesCarouselCircle, 767, 1, 1, ajax_bannershine);
                    }

                } else {
                    if ($('.services-circle-carousel.hidden-sm').length == 0) {
                        $('.services-circle-carousel').append(blocks.restHtml)
                    }
                }
            });

            $(window).resize(debouncer(function(e) {
                var windowWidth = window.innerWidth || $window.width();
                isotopeGallery(blocks.isotopeGallery, blocks.slickGallery, windowWidth);
                doubleTap(windowWidth);
                if (windowWidth > 991) {
                    mobileMenuClose(false);
                }

            }));
        });

        $window.on('load', function() {
            var windowWidth = window.innerWidth || $window.width();
            $('body').addClass('is-loaded');
        });


        /* ---------------------------------------------
         Functions
         --------------------------------------------- */
        // double tap
        function doubleTap(windowWidth) {
            if (windowWidth > 767) {
                $('.page-header-menu').addClass('doubletap');
                $('.page-header-menu li:has(ul)').doubleTapToGo();
            }

            if (windowWidth > 991) {
                $('.page-header--style2 .page-header-menu').addClass('doubletap');
                $('.page-header--style2 .page-header-menu li:has(ul)').doubleTapToGo();
            }
        }
        // icrease/decrease input
        function changeInput() {
            $(document).on('click', '.count-add, .count-reduce', function(e) {
                var $this = $(e.target),
                    input = $this.parent().find('.count-input'),
                    valString = input.val(),
                    valNum = valString.replace(/[^0-9]/g, ''),
                    valText = valString.replace(/[0-9]/g, ''),
                    v = $this.hasClass('count-reduce') ? valNum - 1 : valNum * 1 + 1,
                    min = input.attr('data-min') ? input.attr('data-min') : 0;
                if (v >= min)
                    input.val(v + valText);
                e.preventDefault();
            });
        }

        // back to top
        function backToTop(button, flag) {
            if (flag) {
                var $button = $(button);
                $(window).on('scroll', function() {
                    if ($(this).scrollTop() >= 500) {
                        $button.addClass('visible');
                    } else {
                        $button.removeClass('visible');
                    }
                });
                $button.on('click', function() {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 1000);
                });
            } else {
                $(button).hide();
            }
        }

        // mobile collapsed text
        function allViewMobile() {
            $("[data-show-xs]").on('click', function(e) {
                e.preventDefault();
                $('.' + $(this).attr('data-show-xs')).each(function() {
                    $(this).toggleClass('collapsed');
                })
                $(this).hide();
            })
        }
        // header search
        function headerSearch() {
            $('.header-search-toggle').on('click', function() {
                $('.header-search-drop').toggleClass('opened');
                $(this).toggleClass('opened');
            })
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.header-search').length) {
                    $('.header-search-drop').removeClass('opened');
                    $('.header-search-toggle').removeClass('opened');
                }
            });
        }

        // sticky header
        $.fn.stickyHeader = function() {
            var $header = this,
                $body = $('body'),
                headerOffset,
                stickyH;

            function setHeigth() {
                $(".fix-space").remove();
                $header.removeClass('animated is-sticky fadeIn');
                $body.removeClass('hdr-sticky');
                headerOffset = $('.page-header-menu', $header).offset().top;
                stickyH = $header.height() + headerOffset;
            }
            setHeigth();
            var prevWindow = window.innerWidth || $(window).width();
            $(window).bind('resize', function() {
                var currentWindow = window.innerWidth || $(window).width();
                if (currentWindow != prevWindow) {
                    setHeigth();
                    prevWindow = currentWindow;
                }
            });
            $(window).scroll(function() {
                var st = getCurrentScroll();
                if (st > headerOffset) {
                    if (!$(".fix-space").length && !$body.hasClass('home')) {
                        $header.after('<div class="fix-space"></div>');
                        $(".fix-space").css({
                            'height': $header.height() + 'px'
                        });
                    }
                    $header.addClass('is-sticky animated fadeIn');
                    $body.addClass('hdr-sticky');
                } else {
                    $(".fix-space").remove();
                    $header.removeClass('animated is-sticky fadeIn');
                    $body.removeClass('hdr-sticky');
                }
            });

            function getCurrentScroll() {
                return window.pageYOffset || document.documentElement.scrollTop;
            }
        };

        function isotopeGallery(galleryIsotope, gallerySlick, windowWidth) {
            var $galleryIsotope = $(galleryIsotope),
                $gallerySlick = $(gallerySlick);
            if (windowWidth > 767) {
                if ($galleryIsotope.length) {
                    var isoOptions = {
                        itemSelector: '.gallery-item',
                        masonry: {
                            columnWidth: '.gallery-item',
                            gutter: 0
                        }
                    };
                    $galleryIsotope.imagesLoaded(function() {
                        $galleryIsotope.isotope(isoOptions);
                    });
                    isotopeFilters($galleryIsotope);
                }
            } else {
                if ($gallerySlick.length) {
                    if (!$gallerySlick.hasClass('slick-slider')) {
                        $gallerySlick.append($galleryIsotope.children().clone().removeAttr('style'));
                        $("#isotopeGalleryFilters").children().clone().appendTo("#slickGalleryFilters");
                        $gallerySlick.slick({
                            mobileFirst: JSON.parse(ajax_gallery.mobile_first),
                            slidesToShow: parseInt(ajax_gallery.slides_to_show),
                            slidesToScroll: parseInt(ajax_gallery.slides_to_scroll),
                            infinite: JSON.parse(ajax_gallery.infinite),
                            autoplay: JSON.parse(ajax_gallery.autoplay),
                            autoplaySpeed: parseInt(ajax_gallery.autoplay_speed),
                            rtl: blocks.rtltrue,
                            arrows: JSON.parse(ajax_gallery.arrows),
                            dots: JSON.parse(ajax_gallery.dots),
                            responsive: [{
                                breakpoint: 321,
                                settings: {
                                    slidesToShow: 1
                                }
                            }]
                        });

                        slickFilters("#slickGallery");
                    }
                }
            }
        }

        // Filters (for gallery)
        function isotopeFilters(gallery) {
            var $gallery = $(gallery);
            if ($gallery.length) {
                var container = $gallery;
                var optionSets = $(".filters-by-category .option-set"),
                    optionLinks = optionSets.find("a");
                optionLinks.on('click', function(e) {
                    var thisLink = $(this);
                    if (thisLink.hasClass("selected")) return false;
                    var optionSet = thisLink.parents(".option-set");
                    optionSet.find(".selected").removeClass("selected");
                    thisLink.addClass("selected");
                    var options = {},
                        key = optionSet.attr("data-option-key"),
                        value = thisLink.attr("data-option-value");
                    value = value === "false" ? false : value;
                    options[key] = value;
                    if (key === "layoutMode" && typeof changeLayoutMode === "function") changeLayoutMode($this, options);
                    else {
                        container.isotope(options);
                    }
                    return false;
                });
            }
        }

        function slickFilters() {
            $('#slickGalleryFilters [data-option-value]').on('click', function(e) {
                var $this = $(this),
                    $carousel = $('#slickGallery'),
                    filtername = $this.attr('data-option-value'),
                    currentclass = $this.attr('class');
                $carousel.slick('slickUnfilter');
                $carousel.slick('slickFilter', filtername);
                $('#slickGalleryFilters').find(".selected").removeClass("selected");
                $this.addClass('selected');
                e.preventDefault();
            });
        }

        // print
        function printThis(link, target) {
            $(link).on('click', function() {
                $(this).closest(target).print();
            });
        }

        // Mobile Only carousel initialization
        function slickMobile(carousel, breakpoint, slidesToShow, slidesToScroll, options) {
            if (carousel.length) {
                var windowWidth = window.innerWidth || $window.width();
                if (windowWidth < breakpoint + 1) {
                    if (carousel.find('.services-circle-item.hidden-sm').length != 0) {
                        blocks.restHtml = carousel.find('.services-circle-item.hidden-sm');
                        $('.services-circle-item.hidden-sm').remove()
                    }
                    carousel.slick({
                        mobileFirst: JSON.parse(options.mobile_first),
                        slidesToShow: parseInt(options.slides_to_show),
                        slidesToScroll: parseInt(options.slides_to_scroll),
                        infinite: JSON.parse(options.infinite),
                        autoplay: JSON.parse(options.autoplay),
                        autoplaySpeed: parseInt(options.autoplay_speed),
                        rtl: blocks.rtltrue,
                        arrows: JSON.parse(options.arrows),
                        dots: JSON.parse(options.dots),

                        responsive: [{
                            breakpoint: breakpoint,
                            settings: "unslick"
                        }]
                    });


                }
            }
        }

        // Time Out Resize
        function debouncer(func, timeout) {
            var timeoutID,
                timeout = timeout || 500;
            return function() {
                var scope = this,
                    args = arguments;
                clearTimeout(timeoutID);
                timeoutID = setTimeout(function() {
                    func.apply(scope, Array.prototype.slice.call(args));
                }, timeout);
            };
        }

        // Count To
        function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
            $this.countTo(options);
        }

        // Mobile Header Collapse
        function mobileInfoSlide() {
            var $toggle = $('.page-header-mobile-info-toggle'),
                $content = $('.page-header-mobile-info-content');
            $toggle.on('click', function(e) {
                e.preventDefault();
                $content.slideToggle(200);
                $toggle.toggleClass('opened');
            })
        }

        // Menu max height
        function mHeight() {
            return $(window).height() - $('.page-header').height();
        }

        // Navigation dropdown menu
        function mobileMenu(windowWidth) {

            var $menu = $('.page-header .menu'),
                $menuWrap = $('.page-header-menu'),
                $menuToggle = $('.menu-toggle'),
                $menuSub = $('.page-header .menu'),
                $menuArrow = $('.page-header .menu .arrow');

            $menuToggle.on('click', function(e) {
                e.preventDefault();
                var $this = $(this);
                if (!$menu.hasClass('opened')) {
                    $menu.slideDown().addClass('opened');
                    $this.addClass('opened');
                    $('body').addClass('fixed');
                    $menuWrap.css({
                        'height': mHeight() + 'px'
                    });
                } else {
                    $menu.slideUp().removeClass('opened');
                    $this.removeClass('opened');
                    $('body').removeClass('fixed');
                    $menuWrap.css({
                        'height': ''
                    });
                }
            });

            $menuArrow.on('click', function(e) {
                e.preventDefault();
                var $this = $(this).parent('a');
                $this.next('ul').slideToggle();
                $this.toggleClass('opened');
            });

        }

        function mobileMenuClose(mobile) {
            var $menu = $('.page-header .menu'),
                $menuWrap = $('.page-header-menu'),
                $menuToggle = $('.menu-toggle');
            if (mobile === true) {
                $menu.slideUp();
            } else {
                $('.sub-menu', $menu).removeAttr('style');
                $('.menu', $menu).removeAttr('style');
            }
            $menu.removeClass('opened').show();
            $menuToggle.removeClass('opened');
            $('body').removeClass('fixed');
            $menuWrap.css({
                'height': ''
            });
        }

        // Header Cart dropdown menu
        function toggleCart(cart, drop) {
            $(document).on('click', cart, function() {
                $(cart).toggleClass('opened');
            });
            $(document).on('click', function(e) {
                if (!$(e.target).closest(cart).length) {
                    if ($(cart).hasClass("opened")) {
                        $(cart).removeClass('opened');
                    }
                }
            });
        }

        // Lazy Load animation
        function onScrollInit(items, wW) {
            if (wW > 991) {
                if (!$('body').data('firstInit')) {
                    items.each(function() {
                        var $element = $(this),
                            animationClass = $element.attr('data-animation'),
                            animationDelay = $element.attr('data-animation-delay');
                        $element.removeClass('no-animate');
                        $element.css({
                            '-webkit-animation-delay': animationDelay,
                            '-moz-animation-delay': animationDelay,
                            'animation-delay': animationDelay
                        });
                        var trigger = $element;
                        trigger.waypoint(function() {
                            $element.addClass('animated').addClass(animationClass);
                            if ($element.hasClass('hoveranimation')) {
                                $element.on("webkitAnimationEnd mozAnimationEnd oAnimationEnd animationEnd", function() {
                                    $(this).removeClass("animated").removeClass("animation").removeClass(animationClass);
                                });
                            }
                        }, {
                            triggerOnce: true,
                            offset: '90%'
                        });
                    });
                    $('body').data('firstInit', true);
                }
            } else {
                items.each(function() {
                    var $element = $(this);
                    $element.addClass('no-animate');
                });
            }
        }

        // Get Scrollbar Width
        function getScrollbarWidth() {
            var outer = document.createElement("div");
            outer.style.visibility = "hidden";
            outer.style.width = "100px";
            outer.style.msOverflowStyle = "scrollbar"; // needed for WinJS apps

            document.body.appendChild(outer);

            var widthNoScroll = outer.offsetWidth;
            // force scrollbars
            outer.style.overflow = "scroll";
            // add innerdiv
            var inner = document.createElement("div");
            inner.style.width = "100%";
            outer.appendChild(inner);

            var widthWithScroll = inner.offsetWidth;

            // remove divs
            outer.parentNode.removeChild(outer);

            return widthNoScroll - widthWithScroll;
        }

        // store the slider in a local variable
        var $window = $(window),
            flexslider = { vars: {} };

        // tiny helper function to add breakpoints
        function getGridSize() {

            var gridSize = (window.innerWidth < 600) ? 2 : (window.innerWidth < 900) ? 2 : 4;
            if (window.innerWidth < 321)
                gridSize = 1
            flexslider.vars.minItems = gridSize;
            flexslider.vars.maxItems = gridSize;

        }

        function callflexslider(a) {
            if ($('.related.products .prd-grid').length && $('.related.products .prd-grid .prd-img').length > a) {
                $('.related.products .prd-grid').flexslider({
                    animation: "slide",
                    selector: ".slides > div",
                    animationLoop: true,
                    itemWidth: 200,
                    itemMargin: 15,
                    minItems: a,
                    maxItems: a,
                    controlNav: false
                });
            }


            if ($('.up-sells.upsells .prd-grid').length && $('.up-sells.upsells .prd-grid .prd-img').length > a) {
                $('.up-sells.upsells .prd-grid').flexslider({
                    animation: "slide",
                    selector: ".slides > div",
                    animationLoop: true,
                    itemWidth: 200,
                    itemMargin: 15,
                    minItems: a,
                    maxItems: a,
                    controlNav: false
                });
            }

        }

        $window.load(function() {
            getGridSize();
            callflexslider(flexslider.vars.minItems)

        });

        // check grid size on resize event
        $window.resize(function() {
            getGridSize();
            callflexslider(flexslider.vars.minItems)

        });
        if (window.innerWidth < 766) {
            if (jQuery('.hide-first-in-mobile').length != 0) {
                jQuery('.hide-first-in-mobile').hide()
                var row = jQuery('.hide-first-in-mobile').closest(".vc_row-fluid");
                if (jQuery(row).find('.showallServices').length == 0)
                    jQuery(row).append('<div class="showallServices"> ' + cleaning_services_ajax_object.all_service + '</div>')
                jQuery('.showallServices').on('click', function() {
                    jQuery('.hide-first-in-mobile').show()
                    jQuery(this).replaceWith('')
                })
            }
        }


        $('body').on('click', '.service-cart', function() {
            var id = $(this).data('product_id');
            var selectorid = $(this).attr('id');
            var quantity = 1;
            var price = $('.value_price').val();

            var service_name = $(this).attr('data-service-title');

            var $this = $(this);
            if (price == 0) {
                $('[data-target="' + selectorid + '"]').nextAll('.control-indicator').addClass('shadow')
                return false;
            }
            $($this).prev('.spinner').show();
            $this.hide();
            $('[data-target="' + selectorid + '"]').nextAll('.control-indicator').removeClass('shadow')
            $.ajax({
                type: "POST",
                url: cleaning_services_ajax_object.ajax_url,
                data: {
                    action: 'service_add_to_cart',
                    product_id: id,
                    price: price,
                    quantity: quantity,
                    service_name: service_name,
                    security: cleaning_services_ajax_object.ajax_nonce_servicecart,
                },
                success: function(res) {
                    if (res = 'success')
                        $("body").trigger("wc_fragment_refresh")
                    $this.show();
                    $($this).prev('.spinner').hide();
                }
            });
        })

        // END FUNCTIONS
    })(jQuery);

    jQuery(document).ready(function() {
        // obj.init();
        //mutation event for rtl
        if (jQuery('body').hasClass('rtl')) {
            var $targets = document.querySelectorAll('.vc_row[data-vc-full-width]');
            NodeList.prototype.forEach = Array.prototype.forEach;
            $targets.forEach(function($target) {
                var $config = { attributes: true, childList: true, characterData: true };
                var observer = new MutationObserver(function(mutations) {
                    mutations.forEach(function(mutation) {
                        if (mutation.attributeName == 'style' && $target.style.left.indexOf('-') != -1) {
                            var $right = $target.style.left;
                            $target.style.left = 'auto';
                            $target.style.right = $right;
                        }
                    });
                });
                observer.observe($target, $config);
            });
        }
    });