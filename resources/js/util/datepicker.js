document.addEventListener('alpine:init', () => {
    Alpine.bind('datepickerBind', () => ({
        'x-data': () => ({
            storeName: '',
            dispatcher: '',
            datepicker: null,
            dateValue: '',
            initDatePicker(config = {}) {
                const baseConfig = {
                    format: 'yyyy-mm-dd',
                    autohide: true,
                };
                const cfg = Object.assign({}, baseConfig, config);
                this.$nextTick(() => {
                    this.storeName = this.$el.getAttribute("store-name") || '';
                    this.dispatcher = this.$el.getAttribute("dispatcher") || '';
                    this.datepicker = new Datepicker(this.$el, cfg);

                    // set default value from model
                    const modelValue = this.$el._x_model?.get();
                    if (modelValue) {
                        this.$el.value = modelValue;
                    }

                    // event on change date
                    this.$el.addEventListener('changeDate', (event) => {
                        // set model value
                        this.$el._x_model.set(event.target.value);

                        // call disptacher if dispatcher exist
                        let store = Alpine.store(this.storeName);
                        if (store && typeof store[this.dispatcher] === "function") {
                            store[this.dispatcher]();
                        }
                    });

                    // watch if any change on model & set date value
                    this.$watch(() => {
                        return this.$el._x_model.get();
                    }, (val) => {
                        this.$el._x_model.set(val);
                        if (val === '') {
                            this.datepicker.setDate(null);
                        }
                    });
                })

            },
        }),
    }));
})
