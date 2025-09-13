document.addEventListener('alpine:init', () => {
    Alpine.store('alertStore', {
        showAlert: false,
        show() {
            this.showAlert = true;
        },
        hide() {
            this.showAlert = false;
        }
    })

    Alpine.store('toastStore', {
        showToast: false,
        message: '',
        duration: 1500,
        type: 'success',
        success(message = '', duration = 1500, callback = function () { }) {
            this.type = 'success';
            this.duration = duration;
            this.message = message;
            this.showToast = true;
            setTimeout(() => {
                this.showToast = false;
                callback();
            }, this.duration);
        },
        error(message = '', duration = 1500) {
            this.type = 'error';
            this.duration = duration;
            this.message = message;
            this.showToast = true;
            setTimeout(() => {
                this.showToast = false;
            }, this.duration);
        },

    })
});
