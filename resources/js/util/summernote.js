document.addEventListener('alpine:init', () => {
    Alpine.bind('summernoteBind', () => ({
        'x-data': () => ({
            element: null,
            initSummernote() {
                this.$nextTick(() => {
                    this.element = $(this.$el);
                    let self = this;
                    $(this.$el).summernote({
                        placeholder: 'Hello stand alone ui',
                        tabsize: 2,
                        height: 120,
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'underline', 'clear']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['table', ['table']],
                            ['insert', ['link', 'picture', 'video']],
                            ['view', ['fullscreen', 'codeview', 'help']]
                        ],
                        callbacks: {
                            onChange: function (contents) {
                                self.$dispatch('input', contents)
                            }
                        }
                    });
                });
            }
        }),
        'x-init': 'initSummernote()'
    }))
});
