document.addEventListener('alpine:init', () => {
    Alpine.bind('summernoteBind', () => ({
        'x-data': () => ({
            element: null,
            height: 120,
            initSummernote() {
                this.$nextTick(() => {
                    this.element = $(this.$el);
                    this.height = this.$el.getAttribute("height") || 120;

                    let self = this;
                    let alpineEl = this.$el;


                    $(this.$el).summernote({
                        placeholder: 'Hello stand alone ui',
                        tabsize: 2,
                        height: this.height,
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'underline', 'clear']],
                            ['color', ['color']],
                            ['paragraph', ['ul', 'ol', 'paragraph']],
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

                    this.$watch('$el._x_model.get()', (value) => {
                        // jangan overwrite kalau nilainya sama (biar gak loop)
                        if (value !== $(this.element).summernote('code')) {
                            $(this.element).summernote('code', value || '<p><br></p>');
                        }
                    });


                });
            }
        }),
        'x-init': 'initSummernote()'
    }))
});
