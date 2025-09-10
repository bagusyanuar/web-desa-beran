document.addEventListener('alpine:init', () => {
    Alpine.bind('tablePagination', () => ({
        'x-data': () => ({
            element: null,
            store: '',
            stateTotalRows: '',
            statePage: '',
            statePageSize: '',
            statePageSizeOptions: '',
            totalRows: 0,
            page: 1,
            pageSize: 10,
            pageSizeOptions: [10, 25, 50],
            dispatcher: '',
            totalPages: 0,
            shownPages: [],
            initPagination() {
                this.$nextTick(() => {
                    this.element = $(this.$el);
                    this.store = this.$el.getAttribute('store') || '';
                    this.stateTotalRows = this.$el.getAttribute('state-total-rows') || '';
                    this.statePage = this.$el.getAttribute('state-page') || '';
                    this.statePageSize = this.$el.getAttribute('state-page-size') || '';
                    this.statePageSizeOptions = this.$el.getAttribute('state-page-size-options') || '';
                    this.dispatcher = this.$el.getAttribute('dispatcher') || '';

                    if (this.store) {
                        this.initValue();
                        this.paginate();

                        this.$watch('page', () => {
                            this.paginate();
                        })
                        this.$watch('pageSize', () => {
                            this.paginate();
                            this.dispatch()
                        })
                    }
                })
            },
            initValue() {
                this.totalRows = Alpine.store(this.store)[this.stateTotalRows];
                this.page = Alpine.store(this.store)[this.statePage];
                this.pageSize = Alpine.store(this.store)[this.statePageSize];
                this.pageSizeOptions = Alpine.store(this.store)[this.statePageSizeOptions];
            },
            onPreviouspage() {
                if (this.page > 1) {
                    this.page -= 1;
                }
            },
            onNextpage() {
                if (this.page < this.totalPages) {
                    this.page += 1;
                }
            },
            onPageChange(page) {
                this.page = page;
            },
            dispatch() {
                if (this.store && this.dispatcher) {
                    const store = Alpine.store(this.store)
                    if (store && typeof store[this.dispatcher] === 'function') {
                        store[this.dispatcher]();
                    }
                }
            },
            paginate() {
                const maxPageRange = 5;
                let totalPages = Math.ceil(this.totalRows / this.pageSize);
                let halfRange = Math.floor(maxPageRange / 2);
                let startPage = Math.max(1, (this.page - halfRange));
                let endPage = Math.min(totalPages, (this.page + halfRange));
                if ((endPage - startPage + 1) < maxPageRange) {
                    if (startPage === 1) {
                        endPage = Math.min(totalPages, (startPage + maxPageRange - 1));
                    } else {
                        startPage = Math.max(1, (endPage - maxPageRange + 1))
                    }
                }
                this.shownPages = Array.from({ length: endPage - startPage + 1 }, (_, i) => startPage + i);
                this.totalPages = totalPages;
            }
        }),
        'x-init': 'initPagination()'
    }))
})
