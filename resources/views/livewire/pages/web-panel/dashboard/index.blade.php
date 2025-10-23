<section id="dashboard" data-component-id="dashboard" class="w-full">
    <div class="mb-5">
        <p class="text-lg text-neutral-700 font-bold">Dashboard</p>
    </div>
    <div class="w-full grid grid-cols-4 gap-5 mb-5">
        <div class="w-full bg-white shadow-xl rounded-lg px-3 py-2.5 flex items-start gap-3 border-t-2 border-orange-500">
            <div class="w-16 h-16 rounded-md bg-orange-500 flex items-center justify-center text-white">
                <i data-lucide="mailbox" class="h-6 aspect-[1/1]"></i>
            </div>
            <div class="flex flex-col gap-1">
                <span class="text-neutral-700 font-semibold text-sm">Surat Online</span>
                <span class="text-brand-500 font-bold text-2xl">12</span>
            </div>
        </div>
        <div class="w-full bg-white shadow-xl rounded-lg px-3 py-2.5 flex items-start gap-3 border-t-2 border-rose-500">
            <div class="w-16 h-16 rounded-md bg-rose-500 flex items-center justify-center text-white">
                <i data-lucide="megaphone" class="h-6 aspect-[1/1]"></i>
            </div>
            <div class="flex flex-col gap-1">
                <span class="text-neutral-700 font-semibold text-sm">Aduan Masyarakat</span>
                <span class="text-brand-500 font-bold text-2xl">3</span>
            </div>
        </div>
        <div class="w-full bg-white shadow-xl rounded-lg px-3 py-2.5 flex items-start gap-3 border-t-2 border-teal-500">
            <div class="w-16 h-16 rounded-md bg-teal-500 flex items-center justify-center text-white">
                <i data-lucide="shopping-bag" class="h-6 aspect-[1/1]"></i>
            </div>
            <div class="flex flex-col gap-1">
                <span class="text-neutral-700 font-semibold text-sm">Produk UMKM</span>
                <span class="text-brand-500 font-bold text-2xl">200</span>
            </div>
        </div>
        <div class="w-full bg-white shadow-xl rounded-lg px-3 py-2.5 flex items-start gap-3 border-t-2 border-purple-500">
            <div class="w-16 h-16 rounded-md bg-purple-500 flex items-center justify-center text-white">
                <i data-lucide="newspaper" class="h-6 aspect-[1/1]"></i>
            </div>
            <div class="flex flex-col gap-1">
                <span class="text-neutral-700 font-semibold text-sm">Berita</span>
                <span class="text-brand-500 font-bold text-2xl">200</span>
            </div>
        </div>
    </div>
    <div class="w-full flex items-start">
        <div class="flex-1">
            <div class="w-full p-1 bg-white shadow-xl border-t-4 border-orange-500 rounded-lg">
                <div class="pt-2.5 px-7">
                    <p class="text-neutral-700 font-semibold">Statistik Pengajuan Surat Online</p>
                </div>
                <div id="selling-chart-canvas" class="h-[25rem]" style="min-width: 150px;"></div>
            </div>
        </div>
        <div class="w-80">
        </div>
    </div>
</section>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.6.0/dist/echarts.min.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            const componentProps = {
                component: null,
                toastStore: null,
                chartInstance: null,
                resizeHandler: null,
                loadingSellingChart: null,
                init: function() {
                    const componentID = document.querySelector(
                        '[data-component-id="dashboard"]')?.getAttribute('wire:id');
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        if (component.id === componentID) {
                            this.component = component;
                            // this.toastStore = Alpine.store('gxuiToastStore');
                            this.getSellingChart();
                        }
                    });
                },
                getSellingChart() {
                    this.generateChart([]);
                    this.loadingSellingChart = true;
                    // this.component.$wire.call('getSellingChart')
                    //     .then(response => {
                    //         const {
                    //             success,
                    //             data,
                    //             meta
                    //         } = response;
                    //         if (success) {
                    //             this.generateChart(data);
                    //         } else {
                    //             this.toastStore.failed(message);
                    //         }
                    //     }).finally(() => {
                    //         this.loadingSellingChart = false;
                    //     })
                },
                generateChart(d) {
                    const AVAILABLE_MONTH = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep",
                        "Oct", "Nov", "Des"
                    ];
                    let data = AVAILABLE_MONTH.map((v, k) => {
                        // return d[k + 1];
                        return 1;
                    });
                    let chartEl = document.getElementById('selling-chart-canvas');
                    this.chartInstance = echarts.init(chartEl);
                    this.chartInstance.setOption({
                        tooltip: {
                            trigger: "item",
                            formatter: function(params) {
                                const data = params['data'];
                                return `IDR${data.toLocaleString('id-ID')}`;
                            }
                        },
                        xAxis: {
                            type: "category",
                            data: AVAILABLE_MONTH
                        },
                        yAxis: {
                            type: "value"
                        },
                        series: [{
                            name: "Sales",
                            type: "line",
                            data: data,
                            showSymbol: true, // pastikan simbol titik ditampilkan
                            symbolSize: 10
                        }]
                    });
                }
            };
            const props = Object.assign({}, componentProps);
            Alpine.store('dashboardSellingChartStore', props);
        })
    </script>
@endpush
