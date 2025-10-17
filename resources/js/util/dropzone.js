document.addEventListener('alpine:init', () => {
    Alpine.bind('dropzoneBind', () => ({
        'x-data': () => ({
            component: null,
            storeName: '',
            stateComponent: '',
            initDropper() {
                this.$nextTick(() => {
                    this.storeName = this.$el.getAttribute("store-name") || '';
                    this.stateComponent = this.$el.getAttribute("state-component") || '';
                    const dropElement = this.$el.querySelector('.dropzone');
                    if (dropElement) {
                        this.component = new Dropzone(dropElement, {
                            url: '/url-dropper',
                            autoProcessQueue: false,
                            addRemoveLinks: true,
                            acceptedFiles: '.jpg, .png, .jpeg, .pdf',
                            uploadMultiple: false,
                            maxFiles: 1,
                            init: function () {
                                this.on('addedfile', file => {
                                    if (this.files.length > 1) {
                                        this.removeFile(this.files[0]);
                                    }
                                    file.previewElement.querySelector('.dz-filename').style.display = 'none';
                                });
                            }
                        });
                        let store = Alpine.store(this.storeName);
                        if (store && this.stateComponent in store) {
                            store[this.stateComponent] = this.component;
                        }
                    }
                });
            }
        }),
        'x-init': "initDropper"
    }));
});
