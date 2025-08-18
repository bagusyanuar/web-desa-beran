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
