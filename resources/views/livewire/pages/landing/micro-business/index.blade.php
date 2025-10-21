<section id="micro-business" data-component-id="micro-business" class="w-full">
    <div class="w-full h-[20rem] relative">
        <div class="w-full h-full">
            <img src="{{ asset('static/images/bg-product.jpg') }}" class="h-full w-full object-cover object-center"
                alt="main-service" />
        </div>
        <div class="w-full h-full absolute top-0 left-0 bg-white/80 flex items-center justify-center">
            <x-container.landing-container class="flex flex-col items-center gap-3">
                <h1 class="text-4xl text-accent-700 font-bold text-center">PRODUK UMKM</h1>
                <p class="text-md text-brand-500 w-1/2 text-center">Produk UMKM Desa kami lahir dari tangan-tangan
                    terampil
                    masyarakat lokal. Setiap karya mengandung cerita, tradisi, dan kearifan yang diwariskan
                    turun-temurun. Dengan bahan alami pilihan dan proses yang penuh ketelitian, kami
                    menghadirkan produk yang bukan hanya bernilai guna, tapi juga bernilai rasa dan budaya.</p>
            </x-container.landing-container>
        </div>
    </div>
    <div class="w-full py-10 relative">
        <img src="{{ asset('static/images/bg-ornament.png') }}"
            class="w-96 h-fit absolute top-0 right-0 scale-y-[-1]" />
        <img src="{{ asset('static/images/bg-ornament.png') }}" class="w-96 h-fit absolute top-0 left-0 rotate-180" />
        <div class="absolute bg-white/90 w-full h-full right-0 top-0"></div>
        <x-container.landing-container class="relative">
            <div class="w-full flex items-center gap-1 mb-5" wire:ignore x-data="{
                initIcons() {
                    setTimeout(() => { lucide.createIcons(); }, 0);
                }
            }" x-init="initIcons()"
                x-effect="initIcons()">
                <a href="/" class="text-brand-500 font-semibold hover:underline">Beranda</a>
                <div wire:ignore class="text-brand-500">
                    <i data-lucide="chevron-right" class="h-4 aspect-[1/1]"></i>
                </div>
                <span class="text-brand-500 font-semibold">Produk Umkm Desa Beran</span>
            </div>
            <div class="w-full py-6 rounded-lg mb-3">
                <p class="text-lg text-accent-500 font-bold mb-3 leading-[1] text-center">Penelusuran Produk UMKM</p>
                <div class="flex items-center border border-neutral-300 rounded-md w-full bg-white" wire:ignore>
                    <i data-lucide="search" class="text-neutral-500 min-h-4 min-w-4 ms-2"></i>
                    <input type="text" placeholder="telusuri produk umkm desa beran..."
                        x-model="$store.SERVICE_MICRO_BUSINESS_STORE.param"
                        x-on:input="$store.SERVICE_MICRO_BUSINESS_STORE.onSearch()"
                        class="flex-grow w-full py-2.5 ps-2 pe-3 rounded-md text-sm text-neutral-700 border-none focus:outline-none focus:ring-0 placeholder:text-neutral-400" />
                </div>
            </div>
            <div class="w-full grid grid-cols-4 gap-5 mb-5">
                <template x-if="$store.SERVICE_MICRO_BUSINESS_STORE.loading">
                    <template x-for="(data, index) in [1, 2, 3, 4, 5, 6, 7, 8]" :key="index">
                        <x-loader.shimmer class="!w-full !h-[21rem] !rounded-lg" />
                    </template>
                </template>
                <template
                    x-if="!$store.SERVICE_MICRO_BUSINESS_STORE.loading && $store.SERVICE_MICRO_BUSINESS_STORE.data.length <= 0">
                    <div
                        class="col-span-4 w-full h-96 flex items-center justify-center flex-col border border-neutral-300 rounded-lg shadow-xl">
                        <img src="{{ asset('static/images/no-data.png') }}" class="h-32 w-32" />
                        <span class="text-sm font-semibold text-accent-700">Tidak ada produk UMKM</span>
                    </div>
                </template>
                <template
                    x-if="!$store.SERVICE_MICRO_BUSINESS_STORE.loading && $store.SERVICE_MICRO_BUSINESS_STORE.data.length > 0">
                    <template x-for="(data, index) in $store.SERVICE_MICRO_BUSINESS_STORE.data" :key="index">
                        <div x-on:click="$store.SERVICE_MICRO_BUSINESS_STORE.goToDetail(data.slug)"
                            class="bg-white flex flex-col w-full h-[21rem] border border-neutral-300 rounded-lg shadow-md cursor-pointer hover:shadow-2xl transition-all ease-in-out duration-500">
                            <div class="h-52 w-full">
                                <img x-bind:src="data.image?.image"
                                    class="rounded-t-lg w-full h-full object-cover object-center" />
                            </div>
                            <div class="flex-1 w-full px-3 py-2.5 flex flex-col">
                                <div class="flex-1 flex flex-col items-center">
                                    <p x-text="data.title"
                                        class="text-center text-md mb-1 leading-[1.2] font-bold text-brand-500 overflow-hidden [display:-webkit-box] [-webkit-line-clamp:1] [-webkit-box-orient:vertical]">
                                    </p>
                                    <p x-text="new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(data.price)"
                                        class="text-center text-md text-neutral-700 font-bold mb-3"></p>
                                    <a href="#"
                                        class="text-xs bg-white border border-accent-500 px-3 py-2.5 rounded-lg  text-accent-500 hover:text-white hover:bg-accent-500 transition-all ease-in-out duration-500 hover:shadow-md hover:shadow-accent-400">Hubungi
                                        Penjual</a>
                                </div>
                            </div>
                        </div>
                    </template>
                </template>
            </div>
            <div class="w-full flex items-center justify-center gap-3" wire:ignore>
                <button x-on:click="$store.SERVICE_MICRO_BUSINESS_STORE.onPrev()"
                    x-bind:disabled="$store.SERVICE_MICRO_BUSINESS_STORE.page === 1 || $store.SERVICE_MICRO_BUSINESS_STORE
                        .totalPages <= 0"
                    class="w-8 h-8 flex items-center justify-center rounded-md bg-brand-500 text-white cursor-pointer disabled:text-neutral-500 disabled:cursor-default disabled:bg-neutral-300">
                    <i data-lucide="chevron-left" class="h-4 w-4"></i>
                </button>
                <button x-on:click="$store.SERVICE_MICRO_BUSINESS_STORE.onNext()"
                    x-bind:disabled="$store.SERVICE_MICRO_BUSINESS_STORE.page === $store.SERVICE_MICRO_BUSINESS_STORE
                        .totalPages || $store
                        .SERVICE_MICRO_BUSINESS_STORE.totalPages <= 0"
                    class="w-8 h-8 flex items-center justify-center rounded-md bg-brand-500 text-white cursor-pointer disabled:text-neutral-500 disabled:cursor-default disabled:bg-neutral-300">
                    <i data-lucide="chevron-right" class="h-4 w-4"></i>
                </button>
            </div>
        </x-container.landing-container>
    </div>
    <x-loader.page-loader />
    <x-alert.toast />
</section>

@push('scripts')
    @vite(['resources/js/util/alert.js', 'resources/js/util/loader.js'])
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_MICRO_BUSINESS_STORE';
            const STORE_PROPS = {
                component: null,
                pageLoaderStore: null,
                toastStore: null,
                loading: true,
                param: '',
                data: [],
                page: 1,
                totalPages: 0,
                debounceTimer: null,
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="micro-business"]')?.getAttribute(
                            'wire:id');
                        if (component.id === componentID) {
                            this.component = component;
                            this.pageLoaderStore = Alpine.store('pageLoaderStore');
                            this.toastStore = Alpine.store('toastStore');
                            this.findAll();
                        }
                    });
                },
                findAll() {
                    const query = {
                        param: this.param,
                        page: this.page,
                        pageSize: 8,
                    }
                    this.loading = true;
                    this.component.$wire.call('findAll', query)
                        .then(response => {
                            const {
                                status,
                                message,
                                data,
                                meta
                            } = response;
                            console.log(response);

                            switch (status) {
                                case 200:
                                    this.data = data;
                                    const {
                                        page, totalRows, pageSize
                                    } = meta;
                                    this.totalPages = Math.ceil(totalRows / pageSize);
                                    break;
                                case 500:
                                    this.data = [];
                                    this.page = 1;
                                    this.totalPages = 0;
                                    this.toastStore.error(message, 2000);
                                default:
                                    break;
                            }
                        })
                        .finally(() => {
                            this.loading = false;
                        });

                },
                stripTags(html) {
                    const doc = new DOMParser().parseFromString(html, 'text/html');
                    return doc.body.textContent || "";
                },
                onNext() {
                    this.page += 1;
                    this.findAll();
                },
                onPrev() {
                    this.page -= 1;
                    this.findAll();
                },
                onSearch() {
                    clearTimeout(this.debounceTimer);
                    this.debounceTimer = setTimeout(() => {
                        this.page = 1;
                        this.findAll();
                    }, 1000);
                },
                goToDetail(slug) {
                    window.location.href = '/produk-umkm-desa-beran/' + slug;
                },
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
