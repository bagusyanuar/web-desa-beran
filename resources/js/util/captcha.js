window.initRecaptcha = function () {
    grecaptcha.render('recaptcha-container', {
        'sitekey': '6LcvqakrAAAAADQ80fKbSSBnVmPErT15Yhucp4km', // ganti dengan site key
        'callback': function (token) {
            console.log(token);

            // component.set('captcha', token);
        },
        'expired-callback': function () {
            component.set('captcha', null);
        }
    });
}

document.addEventListener('alpine:init', () => {
    Alpine.bind('recaptcha', () => ({
        'x-data': () => ({
            storeName: '',
            stateData: '',
            captchaReady: false,
            initRecaptcha() {
                this.$nextTick(() => {
                    this.storeName = this.$el.getAttribute("store") || '';
                    this.stateData = this.$el.getAttribute("state-data") || '';

                    let waitingForCaptcha = () => {
                        if (typeof grecaptcha === 'undefined') {
                            setTimeout(waitingForCaptcha, 300);
                            return;
                        }
                        grecaptcha.ready(() => {
                            this.captchaReady = true;
                            grecaptcha.render(this.$refs.recaptchaEl, {
                                sitekey: '6LcvqakrAAAAADQ80fKbSSBnVmPErT15Yhucp4km',
                                callback: (token) => {
                                    let store = Alpine.store(this.storeName);
                                    if (store && this.stateData in store) {
                                        store[this.stateData] = token;
                                    }
                                    console.log("captcha token", token);
                                },
                                'expired-callback': () => {
                                    let store = Alpine.store(this.storeName);
                                    if (store && this.stateData in store) {
                                        store[this.stateData] = null;
                                    }
                                }
                            });
                        });
                    };
                    waitingForCaptcha();
                });

            },
        }),
        'x-init': 'initRecaptcha()'
    }));
});
