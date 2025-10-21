document.addEventListener('alpine:init', () => {
    Alpine.bind('slickBind', () => ({
        'x-data': () => ({
            element: null,
            slideToShow: 3,
            mode: 'base',
            speed: 1000,
            initSlick() {
                this.$nextTick(() => {
                    this.element = $(this.$el);
                    this.slideToShow = this.$el.getAttribute('slide-to-show') || 3;
                    this.mode = this.$el.getAttribute('mode') || 'base';
                    console.log(this.mode);

                    this.speed = this.$el.getAttribute('speed') || 1000;
                    const config = this.config();
                    $(this.element).not('.slick-initialized').slick(config);
                });
            },
            config() {
                let config = {
                    arrows: true,
                    infinite: true,
                    slidesToShow: this.slideToShow,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: this.speed,
                };
                switch (this.mode) {
                    case 'width':
                        config = {
                            arrows: true,
                            infinite: true,
                            slidesToScroll: 1,
                            autoplay: true,
                            centerMode: true,
                            autoplaySpeed: this.speed,
                            variableWidth: true
                        };
                        break;
                    default:
                        break;
                }
                return config;
            }
        }),
        'x-init': 'initSlick()'
    }));

    Alpine.bind('slickOnlineLetterBind', () => ({
        'x-data': () => ({
            element: null,
            slideToShow: 1,
            mode: 'base',
            speed: 1000,
            initSlick() {
                this.$nextTick(() => {
                    this.element = $(this.$el);
                    const parent = this.$el.parentElement
                    let config = {
                        arrows: true,
                        infinite: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 2000,
                        centerMode: true,
                        variableWidth: true,
                        prevArrow: parent.querySelector('.ol-prev-btn'),
                        nextArrow: parent.querySelector('.ol-next-btn'),
                    };
                    $(this.element).not('.slick-initialized').slick(config);
                });
            },
        }),
        'x-init': 'initSlick()'
    }))

    Alpine.bind('slickProductBind', () => ({
        'x-data': () => ({
            element: null,
            slideToShow: 1,
            mode: 'base',
            speed: 1000,
            initSlick() {
                this.$nextTick(() => {
                    this.element = $(this.$el);
                    const parent = this.$el.parentElement
                    let config = {
                        arrows: true,
                        infinite: false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        variableWidth: true,
                        prevArrow: parent.querySelector('.ol-prev-btn'),
                        nextArrow: parent.querySelector('.ol-next-btn'),
                        responsive: [
                            {
                                breakpoint: 9999, // angka besar agar selalu diterapkan
                                settings: {
                                    arrows: true,
                                    infinite: false,
                                },
                            },
                        ]
                    };
                    $(this.element).not('.slick-initialized').slick(config);
                });
            },
        }),
        'x-init': 'initSlick()'
    }))

    Alpine.bind('slickNewsBind', () => ({
        'x-data': () => ({
            element: null,
            slideToShow: 1,
            mode: 'base',
            speed: 1000,
            initSlick() {
                this.$nextTick(() => {
                    this.element = $(this.$el);
                    const parent = this.$el.parentElement
                    let config = {
                        arrows: true,
                        infinite: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        variableWidth: true,
                        prevArrow: parent.querySelector('.ol-prev-btn'),
                        nextArrow: parent.querySelector('.ol-next-btn'),
                    };

                    const $slider = $(this.element).not('.slick-initialized').slick(config);

                    // Tambahkan listener untuk handle "loncatan" slick saat loop
                    $slider.on('afterChange', (event, slick, currentSlide) => {
                        // Periksa apakah slick sedang menampilkan clone terakhir (sebelum lompat)
                        const $current = $(slick.$slides.get(currentSlide));

                        // Jika slide ini clone, re-sync shadow ke slide asli
                        if ($current.hasClass('slick-cloned')) {
                            const targetIndex = currentSlide % slick.$slides.length;
                            setTimeout(() => {
                                $(slick.$slides).removeClass('slick-current');
                                $(slick.$slides.get(targetIndex)).addClass('slick-current');
                            }, 20); // waktu pendek agar sinkron
                        }
                    });
                });
            },
        }),
        'x-init': 'initSlick()'
    }))


});
