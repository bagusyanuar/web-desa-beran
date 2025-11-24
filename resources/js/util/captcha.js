window.initRecaptcha = function () {
    grecaptcha.render("recaptcha-container", {
        sitekey: env("CAPTCHA_SITE_KEY"), // ganti dengan site key
        callback: function (token) {
            console.log(token);

            // component.set('captcha', token);
        },
        "expired-callback": function () {
            component.set("captcha", null);
        },
    });
};

document.addEventListener("alpine:init", () => {
    Alpine.bind("recaptcha", () => ({
        "x-data": () => ({
            captchaReady: false,
            initRecaptcha() {
                this.$nextTick(() => {
                    const loadCaptcha = () => {
                        if (typeof grecaptcha === "undefined") {
                            setTimeout(loadCaptcha, 300);
                            return;
                        }

                        grecaptcha.ready(() => {
                            this.captchaReady = true;
                            grecaptcha.render(this.$refs.recaptchaEl, {
                                sitekey: env("CAPTCHA_SITE_KEY"),
                                callback: (token) => {
                                    let store = Alpine.store(this.storeName);
                                    store[this.stateData] = token;
                                },
                                "expired-callback": () => {
                                    let store = Alpine.store(this.storeName);
                                    store[this.stateData] = null;
                                },
                            });
                        });
                    };

                    loadCaptcha();
                });
            },
        }),
        "x-init": "initRecaptcha()",
    }));
});
