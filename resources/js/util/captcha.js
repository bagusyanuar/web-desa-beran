window.initRecaptcha = function () {
    if (window.recaptchaWidgetId !== undefined) {
        // Sudah pernah dirender
        return;
    }

    window.recaptchaWidgetId = grecaptcha.render("recaptcha-container", {
        sitekey: "6LebL-ErAAAAACcMUe-ExbSYUZJ3CaLTzJxGoWIf",
        callback: function (token) {
            console.log("token:", token);
        },
        "expired-callback": function () {
            console.log("expired");
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
                                sitekey:
                                    "6LebL-ErAAAAACcMUe-ExbSYUZJ3CaLTzJxGoWIf",
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
