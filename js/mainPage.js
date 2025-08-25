class mainPage {

    constructor() {
        this.pointTime = "24:00:0";
        this.allFileApended = false;
        this.HooyoOffVideoArray = [];
        this.videoPlayed = '';
        this.activeSlided = 0;
        this.Midd = '';
        this.swiper;
    }


    calDiff(start, end) {
        start = start.split(":");
        end = end.split(":");
        let startDate = new Date(0, 0, 0, start[0], start[1], start[2]);
        let endDate = new Date(0, 0, 0, end[0], end[1], 0);
        let diff = endDate.getTime() - startDate.getTime();
        let hours = Math.floor(diff / 1000 / 60 / 60);
        diff -= hours * 1000 * 60 * 60;
        let minutes = Math.floor(diff / 1000 / 60);
        let def1 = endDate.getTime() - startDate.getTime();
        def1 -= hours * 1000 * 60 * 60;
        def1 -= minutes * 60 * 1000;
        let second = Math.floor(def1 / 1000);
        return (hours < 10 ? "0" : "") + hours + ":" + (minutes < 10 ? "0" : "") + minutes + ":" + (second < 10 ? "0" : "") + second;
    }

    async hideModalCustom() {
        await mainClass.puseAllVideo();
        document.getElementById('ryBlureBack').innerHTML = ``;
        document.getElementById('ryMAinContainer').classList.remove('mmmblure');
        document.getElementById('ryBlureBack').classList.remove('activeVideoPopUp');

    }

    async puseAllVideo() {
        const videoElements = document.querySelectorAll('video');
        for (const video of videoElements) {
            video.pause();
            video.currentTime = 0;
        }
    }

    appendVideoSrc() {
        return new Promise(resolve => {
            if (mainClass.allFileApended) {
                resolve(true)
            } else {
                let hls = document.createElement('script');
                hls.type = 'text/javascript';
                hls.src = document.getElementById('ry-locate').value + '/wp-content/themes/ck-pub/plyrio/hls.js@latest';
                document.head.appendChild(hls);
                let script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = document.getElementById('ry-locate').value + '/wp-content/themes/ck-pub/plyrio/plyr.js';
                document.head.appendChild(script);
                let link = document.createElement('link');
                hls.onload = () => {
                    this.allFileApended = true;
                    resolve(true)
                };
                link.href = document.getElementById('ry-locate').value + "/wp-content/themes/ck-pub/plyrio/plyr.css";
                link.type = "text/css";
                link.rel = "stylesheet";
                link.media = "screen,print";
                document.head.appendChild(link);
            }

        })

    }

    playVideo(id, videoType) {
        mainClass.puseAllVideo();
        mainClass.appendVideoSrc()
            .then(res => {
                if (res) {
                    let hasVideo = mainClass[videoType].filter(item => item.id == id)[0];
                    let html = ``;
                    mainClass.videoPlayed = `player${id}`;
                    html += `<video id="player${id}" class="w-100" style="max-height: 348px;" controls  autoplay></video>`;
                    document.getElementById(`videoContainer-` + id).innerHTML = html;
                    let player = new Plyr('#player' + id);
                    let source = document.getElementById('ry-locate').value + hasVideo.videoUrl;
                    let video = document.getElementById('player' + id);
                    if (Hls.isSupported()) {
                        let hls = new Hls();
                        hls.loadSource(source);
                        hls.attachMedia(video);
                        hls.on(Hls.Events.MANIFEST_PARSED, () => {
                            //player.play();

                        });
                    } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
                        video.src = source;
                        video.addEventListener('loadedmetadata', () => {
                            //player.play();
                        });

                    }
                    video.addEventListener('ended', (e) => {
                        let nextSlide = mainClass.activeSlided + 1;
                        mainClass.mySwip.slideTo(parseInt(nextSlide));
                    })
                }
            })
    }

    HooyoOffVideoArrayRet(idd) {

        let data = JSON.parse(document.getElementById(idd).value);
        mainClass.HooyoOffVideoArray = data;
        return data
    }

    firstVideoPlay(idd, num) {

        let videoArray = this.HooyoOffVideoArrayRet(idd).filter(item => item.video)[num];
        let vUrl = videoArray.id;
        let numVideo = 'HooyoOffVideoArray';
        if (idd === "ryHooyoOffAll") {
            numVideo = "HooyoOffVideoArray"
        }
        mainClass.playVideo(vUrl, numVideo);

    }

    shareToSocial(link) {
        if (navigator.share) {
            navigator.share({
                title: 'چهارخونه',
                url: link
            }).then(() => {
                console.log('Thanks for sharing!');
            })
                .catch(console.error);
        } else {
            shareDialog.classList.add('is-open');
        }
    }

    swiperSlides(idd) {
        let html = ``;
        let homeurl = document.getElementById('ry-locate').value;
        let temDirectory = '';
        let formatter = new Intl.NumberFormat('en-US', {});
        let videoArray = this.HooyoOffVideoArrayRet(idd).filter(item => item.video);
        videoArray.forEach((item, index) => {
            html += `
                <div class="swiper-slide lazy ry-pptrY">    
                        <div class="videoSwiperPop bg-white rounded-5 p-sm-3 d-flex flex-column position-relative text-center h471 h384" >
                            <div class="slideDownModal ry-pointer closeBtn" onclick="mainClass.hideModalCustom()"><i class="fa fa-times"></i> </div>
                            <div class="slideDownModal ry-pointer d-block  sharePointL0" onclick="mainClass.shareToSocial('${item.link}')"><i class="fa fa-share-alt"></i> </div>
                            <div class="blure ry-pointer position-relative heightBlPop"  id="videoContainer-${item.id}">
                               
                                <svg class="position-absolute playIconPop ry-pointer" onclick="mainClass.playVideo('${item.id}','HooyoOffVideoArray')" xmlns="http://www.w3.org/2000/svg" width="71" height="87" viewBox="0 0 71 87">
                                    <g id="Polygon_22" data-name="Polygon 22" transform="translate(71) rotate(90)" fill="#fff">
                                        <path d="M 65.57472991943359 70.5 L 21.42526054382324 70.5 C 17.20494079589844 70.5 13.45411968231201 68.30171966552734 11.39181995391846 64.61959838867188 C 9.329509735107422 60.93747711181641 9.414569854736328 56.59076690673828 11.61935043334961 52.99215698242188 L 33.694091796875 16.96212768554688 C 35.80109024047852 13.52311706542969 39.46685028076172 11.46997737884521 43.5 11.46997737884521 C 47.53313827514648 11.46997737884521 51.19889831542969 13.52311706542969 53.305908203125 16.96212768554688 L 75.38065338134766 52.99215698242188 C 77.58542633056641 56.59076690673828 77.67048645019531 60.93746566772461 75.60819244384766 64.61959075927734 C 73.54588317871094 68.30171966552734 69.79505920410156 70.5 65.57472991943359 70.5 Z" stroke="none"></path>
                                        <path d="M 43.5 11.969970703125 C 39.6422004699707 11.969970703125 36.13581848144531 13.933837890625 34.12044143676758 17.22332763671875 L 12.04570007324219 53.25336456298828 C 9.936767578125 56.69551849365234 9.85540771484375 60.85323715209961 11.82804870605469 64.37525939941406 C 13.80068969726562 67.89729309082031 17.388427734375 70 21.42526245117188 70 L 65.57472991943359 70 C 69.611572265625 70 73.19931030273438 67.89728546142578 75.17195129394531 64.37525939941406 C 77.14459228515625 60.85322570800781 77.06321716308594 56.69551849365234 74.95429229736328 53.25336456298828 L 52.87955856323242 17.22332763671875 C 50.86417007446289 13.933837890625 47.35779190063477 11.969970703125 43.5 11.969970703125 M 43.49999618530273 10.969970703125 C 47.44571685791016 10.969970703125 51.39144134521484 12.88027954101562 53.73225021362305 16.70090866088867 L 75.80697631835938 52.73094940185547 C 80.70587921142578 60.72682952880859 74.95201110839844 71 65.57472991943359 71 L 21.42526245117188 71 C 12.04798889160156 71 6.294120788574219 60.72682952880859 11.19300842285156 52.73094940185547 L 33.26774978637695 16.70090866088867 C 35.60855484008789 12.88027954101562 39.55427551269531 10.969970703125 43.49999618530273 10.969970703125 Z" stroke="none" fill="#ff0060"></path>
                                    </g>
                                </svg>
                               
                                
                                <div class="ryBluerImgPop position-absolute" onclick="mainClass.playVideo('${item.id}','HooyoOffVideoArray')"></div>
                            </div>
                            <div class="px-0 px-2 px-sm-3 d-flex flex-row">
                                <div class="flex-fill d-flex flex-column text-right">
                                    <a href="${item.link}"><p class="ry-TitleM color4d text-right fw-500 f-22 mt-2 mb-0 w-sm-100" >${item.title}</p></a>
                                    <div class="d-flex flex-row justify-content-start">‍‍‍‍‍`;
            if (item.allow == "ok" || item.variable == "ok") {
                if (item.regular_price !== item.final_price)
                    html += `<div class="deletedPrice f-16 color4d ry-iransans">${formatter.format(item.regular_price)}</div>`;
                html += `<div class="ryOrgPrice px-2 f-16 fw-800 ry-iransans">${formatter.format(item.final_price)}</div>
                                        <div class="ryOrgPrice f-16 fw-800">تومان</div>`;
            } else {
                html += `<div class="d-flex flex-row justify-content-center ">
                                        <p class="f-18 text-center  text-secondary text-namojood mb-0">ناموجود</p>
                                    </div>`;
            }


            html += `</div>
                                </div>`;

            if (item.variable !== "ok") {
                if (item.allow === "ok") {
                    let myBargain = 0;
                    if (item.final_price !== item.regular_price && item.regular_price != 0) {
                        myBargain = Math.round((1 - (parseInt(item.final_price) / parseInt(item.regular_price))) * 100);
                    }
                    html += `<div class="flex-fill d-flex flex-column justify-content-end w-AddToC" >
                                
                        <div class="myBtnAdToCartPop mt-2  px-3"
                         onclick="mainClass.addToCartModal('${item.id}');mainClass.hideModalCustom();">افزودن به سبد خرید</div>    
                    </div>`;
                } else {
                    html += `<div class="flex-fill mx-lg-5"> <a href="${item.link}" class="w-250"><div class="flex-fill d-flex flex-column justify-content-end">
                        <div class="myBtnAdToCartPop mt-3 toggltBuyBtn">مشاهده جزئیات</div>    
                    </div></a></div>`;
                }

            } else {
                html += `<div class="flex-fill d-flex flex-column justify-content-end w-AddToC" >
                        <a href="${item.link}" class=""><div class="flex-fill d-flex flex-column justify-content-end">
                                <div class="myBtnAdToCartPop mt-3">انتخاب رنگ محصول</div>    
                            </div></a></div>`;
            }
            html += `</div>
                        </div>     
                </div>
            `;
        });
        return html;
    }

    showVideoPop(e, num, idd) {
        document.getElementById('ryMAinContainer').classList.add('mmmblure');
        e.preventDefault();
        let backgroudCursor = document.getElementById('ryBlureBack');
        backgroudCursor.classList.add('activeVideoPopUp');
        let html = ``;
        html += `<div class="section position-relative flex-fill w-100 p-0">
                    <div class="swiper-container p-sm-3 swiper-container4" dir="rtl">
                    <div class="swiper-wrapper">`;
        html += mainClass.swiperSlides(idd);
        html += `
        
            </div>
                                <div class="ryBtnPrev" style="display:block!important;top: 56%;left: 0%;"><i class="fa fa-angle-left"></i></div>
                            <div class="ryBtnNext" style="display:block!important;top: 56%";><i class="fa fa-angle-right"></i></div>
                            <div class="swiper-pagination"></div>

        `;
        backgroudCursor.innerHTML = html;
        mainClass.mySwip = new Swiper('.swiper-container4', {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 2,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            breakpoints: {
                300: {
                    slidesPerView: 1,
                },
                500: {
                    slidesPerView: 1,
                },
                700: {
                    slidesPerView: 1,
                },
                800: {
                    slidesPerView: 1,
                },
                1000: {
                    slidesPerView: 2,
                },
                1250: {
                    slidesPerView: 2,
                },
                1400: {
                    slidesPerView: 2,
                }
            },
            navigation: {
                nextEl: '.ryBtnPrev',
                prevEl: '.ryBtnNext'
            },
            pagination: {
                el: ".swiper-pagination"
            }
        });
        setTimeout(() => {
            mainClass.mySwip.slideTo(parseInt(num));
        }, 200);

        //mainClass.mySwip.slideTo(parseInt(num));
        mainClass.mySwip.on('slideChange', function () {
            mainClass.activeSlided = mainClass.mySwip.activeIndex;
            let AllVideo = document.getElementsByTagName('video').length;
            for (let i = 0; i < AllVideo; i++) {
                document.getElementsByTagName('video')[i].pause();
            }
            mainClass.firstVideoPlay(idd, mainClass.mySwip.activeIndex);
        });
        mainClass.Midd = idd;

        mainClass.firstVideoPlay(idd, num);

    }

    addToCartModal(id) {
        var item = this;
        var data = {
            action: 'woocommerce_ajax_add_to_cart',
            product_id: id,
            product_sku: '',
            quantity: 1,
            variation_id: '',
        };
        $.ajax({
            type: 'post',
            url: wc_add_to_cart_params.ajax_url,
            data: data,
            beforeSend: function (response) {
                $(item).html(' <i class="fa fa-spinner ry-spin ry"></i>');

            },
            complete: function (response) {
                $(item).html('افزودن به سبد خرید');
            },
            success: function (response) {

                var cart = $('.fa-shopping-cart');
                var total_basket = parseInt($("#total-basket").html());
                total_basket = total_basket + 1;
                $("#total-basket").html(total_basket);
                jQuery(".fa-shopping-cart").effect("shake", {times: 2});

            },
        });
    }

}