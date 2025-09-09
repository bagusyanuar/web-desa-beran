document.addEventListener('alpine:init', () => {
    Alpine.bind('select2Bind', () => ({
        'x-data': () => ({
            element: null,
            initSelect(config = {}) {
                const baseConfig = { width: '100%' };
                const cfg = Object.assign({}, baseConfig, config);
                this.$nextTick(() => {
                    this.element = $(this.$el);
                    this.element.select2(cfg);
                    this._initStyle();

                    this.element.on('change', () => {
                        const val = this.element.val();
                        this.$el._x_model.set(val);
                    });

                    this.$watch(() => {
                        return this.$el._x_model.get();
                    }, (val) => {
                        this.$el._x_model.set(val);
                        this.element.val(val).trigger("change");
                    })

                    this.element.on('select2:open', () => {
                        const dropdown = document.querySelector('.select2-container--open .select2-dropdown');
                        const searchDropwdown = document.querySelector('.select2-container--open .select2-search--dropdown');
                        const searchInput = document.querySelector('.select2-container--open .select2-search__field');
                        if (dropdown) {
                            Object.assign(dropdown.style, {
                                borderTopWidth: '1px',
                                borderTopStyle: 'solid'
                            });
                            dropdown.classList.add(
                                '!mt-1',
                                '!rounded-lg',
                                '!border-t-1',
                                '!border-neutral-300'
                            );
                        }

                        if (searchDropwdown) {
                            searchDropwdown.classList.add(
                                '!p-1.5'
                            )
                        }
                        if (searchInput) {
                            searchInput.classList.add(
                                '!rounded-md'
                            )
                        }

                    })
                })
            },
            _initStyle() {
                this.element.next('.select2-container').addClass('!w-full');
                const select2Class = 'w-full !text-sm !flex !items-center !px-[0rem] !h-[2.6rem] text-neutral-700 !rounded-lg border !border-neutral-300 outline-none focus:outline-none focus:ring-0 !focus:border-neutral-500 transition duration-300 ease-in-out';
                this.element.next('.select2-container').find('.select2-selection--single').addClass(select2Class);
                this.element.next('.select2-container').find('.select2-selection--single').find('.select2-selection__rendered').addClass('!px-[0.5rem] !leading-[2] !text-sm');
                this.element.next('.select2-container').find('.select2-selection--single').find('.select2-selection__arrow').addClass('!top-1/2 !h-[0]');
                this.element.next('.select2-container').find('.select2-dropdown').addClass('!bg-red-500');
            }
        })
    }))
});
