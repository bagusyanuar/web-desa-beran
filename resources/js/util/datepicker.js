document.addEventListener('alpine:init', () => {
    Alpine.bind('datepickerBind', () => ({
        'x-data': () => ({
            element: null,
            store: '',
            dispatcher: '',
            datepicker: null,
            stateDate: '',
            dateValue: '',
            format: 'basic',
            initDatePicker() {
                let baseConfig = {
                    language: 'id',
                    format: 'yyyy-mm-dd',
                    autohide: true,
                };

                this.$nextTick(() => {
                    this.element = $(this.$el);
                    this.store = this.$el.getAttribute("store") || '';
                    this.stateDate = this.$el.getAttribute("state-date") || '';
                    this.dispatcher = this.$el.getAttribute("dispatcher") || '';
                    this.format = this.$el.getAttribute('format');
                    if (this.format) {
                        const format = this.generateFormat(this.format);
                        baseConfig.format = format;
                    }
                    this.datepicker = new Datepicker(this.$el, baseConfig);
                    // event on change date
                    this.$el.addEventListener('changeDate', (event) => {
                        this.dateValue = event.target.value;
                        const store = Alpine.store(this.store)
                        if (store && this.stateDate) {
                            const val = this.formattedValue()
                            this.setNestedValue(store, this.stateDate, val);
                        }
                    });

                    if (this.stateDate) {
                        if (this.getNestedValue(Alpine.store(this.store), this.stateDate) !== '') {
                            this.datepicker.setDate(new Date(this.getNestedValue(Alpine.store(this.store), this.stateDate)))
                        } else {
                            this.datepicker.setDate(null);
                        }

                        this.$watch(() => {
                            return this.getNestedValue(Alpine.store(this.store), this.stateDate)
                        }, (val) => {
                            if (val === '') {
                                this.datepicker.setDate(null);
                            }
                        })
                    }
                })

            },
            setNestedValue(obj, path, value) {
                const keys = path.split(".");
                let current = obj;

                while (keys.length > 1) {
                    const key = keys.shift();
                    if (!(key in current)) {
                        current[key] = {}; // kalau belum ada, buat object baru
                    }
                    current = current[key];
                }

                current[keys[0]] = value;
            },
            getNestedValue(obj, path) {
                return path.split('.').reduce((acc, key) => acc?.[key], obj);
            },
            generateFormat() {
                let format = 'yyyy-mm-dd';
                switch (this.format) {
                    case 'slash':
                        format = {
                            toValue(dateStr, format, locale) {
                                if (!dateStr) return null;
                                const [dd, mm, yyyy] = dateStr.split('/');
                                return new Date(yyyy, mm - 1, dd);
                            },
                            toDisplay(date, format, locale) {
                                const year = date.getFullYear();
                                const month = String(date.getMonth() + 1).padStart(2, '0');
                                const day = String(date.getDate()).padStart(2, '0');
                                return `${day}/${month}/${year}`;
                            }
                        }
                        break;
                    case 'long':
                        format = {
                            toValue(dateStr, format, locale) {
                                return new Date(dateStr);
                            },
                            toDisplay(date, format, locale) {
                                const options = { day: 'numeric', month: 'long', year: 'numeric' };
                                return date.toLocaleDateString('id-ID', options);
                            }
                        }
                        break;
                    default:
                        break;
                }
                return format;
            },
            formattedValue() {
                let value = this.dateValue;
                switch (this.format) {
                    case 'slash':
                        const [dd, mm, yyyy] = this.dateValue.split('/');
                        const valSlash = new Date(yyyy, mm - 1, dd);
                        const yearSlash = valSlash.getFullYear();
                        const monthSlash = String(valSlash.getMonth() + 1).padStart(2, '0');
                        const daySlash = String(valSlash.getDate()).padStart(2, '0');
                        value = `${yearSlash}-${monthSlash}-${daySlash}`;
                        break;
                    case 'long':
                        const valLong = new Date(this.dateValue);
                        const yearLong = valLong.getFullYear();
                        const monthLong = String(valLong.getMonth() + 1).padStart(2, '0');
                        const dayLong = String(valLong.getDate()).padStart(2, '0');
                        value = `${yearLong}-${monthLong}-${dayLong}`;
                        break;
                    default:
                        break;
                }
                return value;
            }
        }),
    }));
})
