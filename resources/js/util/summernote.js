document.addEventListener('alpine:init', () => {
    Alpine.bind('summernoteBind', () => ({
        'x-data': () => ({
            element: null,
            initSummernote() {
                this.$nextTick(() => {
                    this.element = $(this.$el);
                    console.log('summernote');

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
                        ]
                    });
                });
            }
        }),
        'x-init': 'initSummernote()'
    }))
});
