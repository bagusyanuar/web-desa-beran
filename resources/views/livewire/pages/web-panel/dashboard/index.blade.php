<section id="dashboard" data-component-id="dashboard" class="w-full">
    <div class="mb-5">
        <p class="text-lg text-neutral-700 font-bold">Dashboard</p>
    </div>
    <div class="w-full grid grid-cols-4 gap-5 mb-5">
        <div
            class="w-full bg-white shadow-xl rounded-lg px-3 py-2.5 flex items-start gap-3 border-t-2 border-orange-500">
            <div
                class="w-16 h-16 rounded-md bg-orange-500 flex items-center justify-center text-white shadow-sm shadow-orange-400">
                <i data-lucide="mail" class="h-6 aspect-[1/1]"></i>
            </div>
            <div class="flex flex-col gap-1">
                <span class="text-neutral-700 font-semibold text-sm leading-[1.2]">Surat Online</span>
                <span class="text-brand-500 font-bold text-2xl leading-[1]">12</span>
            </div>
        </div>
        <div class="w-full bg-white shadow-xl rounded-lg px-3 py-2.5 flex items-start gap-3 border-t-2 border-rose-500">
            <div
                class="w-16 h-16 rounded-md bg-rose-500 flex items-center justify-center text-white shadow-sm shadow-rose-400">
                <i data-lucide="megaphone" class="h-6 aspect-[1/1]"></i>
            </div>
            <div class="flex flex-col gap-1">
                <span class="text-neutral-700 font-semibold text-sm">Aduan Masyarakat</span>
                <span class="text-brand-500 font-bold text-2xl">3</span>
            </div>
        </div>
        <div class="w-full bg-white shadow-xl rounded-lg px-3 py-2.5 flex items-start gap-3 border-t-2 border-teal-500">
            <div
                class="w-16 h-16 rounded-md bg-teal-500 flex items-center justify-center text-white shadow-sm shadow-teal-400">
                <i data-lucide="shopping-bag" class="h-6 aspect-[1/1]"></i>
            </div>
            <div class="flex flex-col gap-1">
                <span class="text-neutral-700 font-semibold text-sm">Produk UMKM</span>
                <span class="text-brand-500 font-bold text-2xl">200</span>
            </div>
        </div>
        <div
            class="w-full bg-white shadow-xl rounded-lg px-3 py-2.5 flex items-start gap-3 border-t-2 border-purple-500">
            <div
                class="w-16 h-16 rounded-md bg-purple-500 flex items-center justify-center text-white shadow-sm shadow-purple-400">
                <i data-lucide="newspaper" class="h-6 aspect-[1/1]"></i>
            </div>
            <div class="flex flex-col gap-1">
                <span class="text-neutral-700 font-semibold text-sm">Berita</span>
                <span class="text-brand-500 font-bold text-2xl">200</span>
            </div>
        </div>
    </div>
    <div class="w-full flex items-start gap-5">
        <div class="flex-1 flex flex-col gap-5">
            <div class="w-full p-1 bg-white shadow-xl border-t-4 border-orange-500 rounded-lg">
                <div class="pt-2.5 px-3">
                    <p class="text-neutral-700 font-semibold">Statistik Pengajuan Surat Online</p>
                </div>
                <div id="online-letter-chart-canvas" class="h-[20rem]" style="min-width: 150px;"></div>
            </div>
            <div class="w-full p-1 bg-white shadow-xl border-t-4 border-rose-500 rounded-lg">
                <div class="pt-2.5 px-3">
                    <p class="text-neutral-700 font-semibold">Statistik Pengajuan Aduan Masyarakat</p>
                </div>
                <div id="complaint-chart-canvas" class="h-[20rem]" style="min-width: 150px;"></div>
            </div>
        </div>
        <div class="w-96 flex flex-col gap-5">
            <div class="w-full bg-white shadow-xl border-t-4 border-orange-500 rounded-lg px-3.5 py-2.5">
                <div class="flex items-center justify-between gap-3 mb-3">
                    <span class="text-sm text-neutral-700 font-semibold">Surat Online Terbaru</span>
                    {{-- <a href="#"
                        class="text-neutral-500 hover:text-neutral-700 transition-all duration-200 ease-in-out">
                        <i data-lucide="ellipsis" class="w-4 aspect-[1/1]"></i>
                    </a> --}}
                </div>
                <div class="w-full flex flex-col py-3 gap-1 border-t border-neutral-300">
                    <div class="w-full h-80 flex flex-col items-center justify-center">
                        <img src="{{ asset('static/images/no-data.png') }}" class="w-32 h-32 object-cover object-center"
                            alt="no-data-image" />
                        <span class="text-xs text-accent-500">Belum ada surat terbaru</span>
                    </div>
                    {{-- <div
                        class="h-16 w-full flex items-start justify-between bg-white cursor-pointer rounded-lg hover:bg-neutral-100 transition-all duration-300 ease-in-out">
                        <div class="flex-1 flex flex-col justify-between">
                            <span class="text-xs font-semibold text-neutral-700 uppercase">surat keterangan domisili</span>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="w-full bg-white shadow-xl border-t-4 border-rose-500 rounded-lg px-3 py-2.5">
                <div class="flex items-center justify-between gap-3">
                    <span class="text-sm text-neutral-700 font-semibold">Aduan Terbaru</span>
                    <a href="#"
                        class="text-neutral-500 hover:text-neutral-700 transition-all duration-200 ease-in-out">
                        <i data-lucide="ellipsis" class="w-4 aspect-[1/1]"></i>
                    </a>
                </div>
                <div class="w-full flex flex-col py-3 gap-1 border-t border-neutral-300">
                    <div class="w-full h-80 flex flex-col items-center justify-center">
                        <img src="{{ asset('static/images/no-data.png') }}" class="w-32 h-32 object-cover object-center"
                            alt="no-data-image" />
                        <span class="text-xs text-accent-500">Belum ada aduan terbaru</span>
                    </div>
                    {{-- <div
                        class="h-16 w-full flex items-start justify-between bg-white cursor-pointer rounded-lg hover:bg-neutral-100 transition-all duration-300 ease-in-out">
                        <div class="flex-1 flex flex-col justify-between">
                            <span class="text-xs font-semibold text-neutral-700 uppercase">surat keterangan domisili</span>
                        </div>
                    </div> --}}
                </div>
            </div>
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
                chartComplaintInstance: null,
                resizeHandler: null,
                loadingOnlineLetterChart: null,
                loadingComplaintChart: null,
                init: function() {
                    const componentID = document.querySelector(
                        '[data-component-id="dashboard"]')?.getAttribute('wire:id');
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        if (component.id === componentID) {
                            this.component = component;
                            // this.toastStore = Alpine.store('gxuiToastStore');
                            this.getOnlineLetterChart();
                            this.getComplaintChart();
                        }
                    });
                },
                getOnlineLetterChart() {
                    this.generateChart([]);
                    this.loadingOnlineLetterChart = true;
                    // this.component.$wire.call('getOnlineLetterChart')
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
                    //         this.loadingOnlineLetterChart = false;
                    //     })
                },
                getComplaintChart() {
                    this.generateComplaintChart([]);
                    this.loadingComplaintChart = true;
                },
                generateChart(d) {
                    const AVAILABLE_MONTH = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep",
                        "Oct", "Nov", "Des"
                    ];
                    let data = AVAILABLE_MONTH.map((v, k) => {
                        // return d[k + 1];
                        return 1;
                    });
                    let chartEl = document.getElementById('online-letter-chart-canvas');
                    this.chartInstance = echarts.init(chartEl);
                    this.chartInstance.setOption({
                        grid: {
                            top: 35,
                            right: 40,
                            bottom: 50,
                            left: 45,
                        },
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
                },
                generateComplaintChart(d) {
                    const AVAILABLE_MONTH = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep",
                        "Oct", "Nov", "Des"
                    ];
                    let data = AVAILABLE_MONTH.map((v, k) => {
                        // return d[k + 1];
                        return 1;
                    });
                    let chartEl = document.getElementById('complaint-chart-canvas');
                    this.chartComplaintInstance = echarts.init(chartEl);
                    this.chartComplaintInstance.setOption({
                        grid: {
                            top: 35,
                            right: 40,
                            bottom: 50,
                            left: 45,
                        },
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
                            name: "Complaint",
                            type: "bar",
                            data: data,
                            showSymbol: true, // pastikan simbol titik ditampilkan
                            symbolSize: 10,
                            itemStyle: {
                                color: '#be123c',
                                borderRadius: [4, 4, 0, 0], // 🔹 ubah ini ke warna yang kamu mau
                            }
                        }]
                    });
                }
            };
            const props = Object.assign({}, componentProps);
            Alpine.store('dashboardChartStore', props);
        })
    </script>
@endpush
