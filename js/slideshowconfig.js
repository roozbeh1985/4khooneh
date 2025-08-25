window.onload = function () {
    var mySwiper1 = new Swiper('.swiper-container1', {
        // Optional parameters
        direction: 'horizontal',
        autoplay: true,
        slidesOffsetBefore: 0,
        slidesOffsetAfter: 0,
        effect: 'fade',
        speed: 400,
        spaceBetween: 100,
        slidesPerView: 1,
        loop: true,
        grabCursor: true,
        navigation: {
            nextEl: '.swiper-button-next1',
            prevEl: '.swiper-button-prev1'
        },
        lazy: true,
        breakpoints: {
            500: {
                slidesPerView: 1,
                spaceBetween: 0,
                slidesOffsetBefore: 0
            },
            1200: {
                slidesPerView: 1,
                slidesOffsetBefore: 0
            }
        },
        pagination: {
            el: '.swiper-pagination1'
        }
    });
    var mySwiper2 = new Swiper('.swiper-container2', {
        // Optional parameters
        direction: 'horizontal',
        slidesOffsetBefore: 0,
        slidesOffsetAfter: 0,
        speed: 200,
        spaceBetween: 50,
        slidesPerView: 4,
        loop: false,
        grabCursor: true,
        navigation: {
            nextEl: '.swiper-button-next2',
            prevEl: '.swiper-button-prev2'
        },
        lazy: true,
        breakpoints: {
            300: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            500: {
                slidesPerView: 2,
                spaceBetween: 20

            },
            800: {
                slidesPerView: 3,
                slidesOffsetBefore: 0
            },
            1200: {
                slidesPerView: 4,
                slidesOffsetBefore: 0
            }
        },
        pagination: {
            el: '.swiper-pagination2'
        }
    });
    var mySwiper3 = new Swiper('.swiper-container3', {
        // Optional parameters
        direction: 'horizontal',
        slidesOffsetBefore: 0,
        slidesOffsetAfter: 0,
        speed: 200,
        spaceBetween: 50,
        slidesPerView: 4,
        loop: false,
        grabCursor: true,
        navigation: {
            nextEl: '.swiper-button-next3',
            prevEl: '.swiper-button-prev3'
        },
        lazy: true,
        breakpoints: {
            300: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            500: {
                slidesPerView: 2,
                spaceBetween: 20

            },
            800: {
                slidesPerView: 3,
                slidesOffsetBefore: 0
            },
            1200: {
                slidesPerView: 4,
                slidesOffsetBefore: 0
            }
        },
        pagination: {
            el: '.swiper-pagination3'
        }
    });
    var mySwiper4 = new Swiper('.swiper-container4', {
        // Optional parameters
        direction: 'horizontal',
        slidesOffsetBefore: 0,
        slidesOffsetAfter: 0,
        speed: 200,
        spaceBetween: 50,
        slidesPerView: 4,
        loop: false,
        grabCursor: true,
        navigation: {
            nextEl: '.swiper-button-next4',
            prevEl: '.swiper-button-prev4'
        },
        lazy: true,
        breakpoints: {
            300: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            500: {
                slidesPerView: 2,
                spaceBetween: 20

            },
            800: {
                slidesPerView: 3,
                slidesOffsetBefore: 0
            },
            1200: {
                slidesPerView: 4,
                slidesOffsetBefore: 0
            }
        },
        pagination: {
            el: '.swiper-pagination4'
        }
    });

};