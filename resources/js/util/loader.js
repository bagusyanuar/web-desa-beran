document.addEventListener('alpine:init', () => {
    Alpine.store('pageLoaderStore', {
        showLoader: false,
        show() {
            this.showLoader = true;
        },
        hide() {
            this.showLoader = false;
        }
    })
});
