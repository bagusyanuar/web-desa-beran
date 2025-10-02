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
    }))
});
