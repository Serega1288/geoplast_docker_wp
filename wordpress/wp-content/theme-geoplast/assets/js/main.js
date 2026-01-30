jQuery(document).ready(function ($) {
    $window = $(window);
    $body = $('body');

    $window.scroll(function () {
        if ($window.scrollTop() > $('.wrap-header').offset().top) {
            $('header').addClass('scroll');
        } else {
            $('header').removeClass('scroll');
        }
    });

    new Swiper(".gallery", {
        slidesPerView: 3,
        spaceBetween: 10,
        loop: true,
        breakpoints: {
            570: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 10,
            },
            992: {
                slidesPerView: 5,
                spaceBetween: 10,
            },
            1200: {
                slidesPerView: 6,
                spaceBetween: 10,
            },
            1600: {
                slidesPerView: 8,
                spaceBetween: 10,
            },
        },
    });

    $('[data-swiper-reviews]').each(function () {
        var id = $(this).data('swiper-reviews');
        var n = $(this).data('id');

        var activeSwiper = new Swiper(id, {
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                prevEl: ".buttons-" + n + " .swiper-button-next",
                nextEl: ".buttons-" + n + " .swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                570: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                1600: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
            },
        });

        console.log('data-swiper-reviews >>>', id, n, activeSwiper);

    });

    new Swiper(".subcat-swiper", {
        slidesPerView: 2,
        spaceBetween: 10,
        // loop: true,
        pagination: {
            el: ".swiper-pagination",
        },
        navigation: {
            nextEl: ".subcat-swiper-button-next",
            prevEl: ".subcat-swiper-button-prev",
        },
        breakpoints: {
            570: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 10,
            },
            992: {
                slidesPerView: 5,
                spaceBetween: 10,
            },
            1200: {
                slidesPerView: 6,
                spaceBetween: 10,
            },
            1600: {
                slidesPerView: 7,
                spaceBetween: 10,
            },
        },
    });


    new Swiper('.swiper-portfolio', {
        slidesPerView: 2.8,
        spaceBetween: 20,
        loop: false,

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            500: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 2.8,
                spaceBetween: 20,
            }

        },
    });


    new Swiper('.swiper-look', {
        slidesPerView: 7,
        spaceBetween: 20,
        loop: false,

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 2.5,
                spaceBetween: 16,
            },
            570: {
                slidesPerView: 3,
                spaceBetween: 16,
            },
            992: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
            1200: {
                slidesPerView: 5,
                spaceBetween: 20,
            },
            1500: {
                slidesPerView: 7,
                spaceBetween: 20,
            },

        },

    });



    $(".WrapMenuScroll .item, ul [scroll]").on('click', function() {
        var hash = $(this).attr('scroll');
        var top = $('#' + hash).offset().top;
        $('html,body').animate({scrollTop: top - 160 }, 300);

        $('#' + hash).addClass('active');
        $('#' + hash).next().slideDown();

    });

    $('.WrapContent .h2').click(function(){
        if( $(this).hasClass('active') ) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
        $(this).next().slideToggle();
    })

    $(window).scroll(function() {
        if ( $(window).scrollTop() > $('.WrapScroll').offset().top - $('header.header').outerHeight() ){
            $('.WrapMenuScroll').addClass('scroll');
            $('.WrapMenuScroll').css('top', $(window).scrollTop() - $('.WrapScroll').offset().top + $('header.header').outerHeight() );


            if ($(window).scrollTop() + $('header.header').outerHeight() + $('.WrapMenuScroll').outerHeight() > $('.WrapScroll').offset().top + $('.WrapScroll').outerHeight() ){
                $('.WrapMenuScroll').addClass('scroll-end');
            } else {
                $('.WrapMenuScroll').removeClass('scroll-end');
            }

        } else {
            $('.WrapMenuScroll').removeClass('scroll');
            $('.WrapMenuScroll').css('top', 0 );
        }

        // + $('.WrapScroll').outerHeight()

        //console.log('>>', $('.WrapScroll').offset().top + $('.WrapScroll').outerHeight() ,  $(window).scrollTop() + $(window).outerHeight()  )
        console.log('>>', $('.WrapScroll').offset().top + $('.WrapScroll').outerHeight() ,  $(window).scrollTop() + $('header.header').outerHeight() + $('.WrapMenuScroll').outerHeight()  )

    });

    if($(window).width() < 992 ) {
        $('.WrapContentSeo .WrapContent > *').removeClass('active')
        $('.WrapContentSeo .WrapContentItem').css('display', 'none;')
    }

    $('.seo-text .btn:not(.not-off)').click(function () {
        $(this).prev().addClass('active');
        $(this).addClass('disable');
    });

    $('.js-btn-open-filter').click(function () {
        $('.wrap-filter-mobile').toggleClass('active');
        $('body').toggleClass('ovh');
    });



});


document.addEventListener('DOMContentLoaded', () => {

    const solutionTabs = () => {
        const questions = document.querySelectorAll('.solution__item');
        const answers = document.querySelectorAll('.solution__item-info');

        questions.forEach((item, index) => {
            item.addEventListener('click', () => {
                questions.forEach((item) => {
                    item.classList.remove('active')
                })

                answers.forEach((item) => {
                    item.classList.remove('active')
                })

                item.classList.add('active');
                answers[index].classList.add('active');
            });
        });

    }

    solutionTabs();

});