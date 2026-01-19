<section id="gallery" data-component-id="gallery" class="w-full">
    <div class="w-full h-[20rem] relative">
        <div class="w-full h-full">
            <img src="{{ asset('static/images/bg-product.jpg') }}" class="h-full w-full object-cover object-center"
                alt="main-service" />
        </div>
        <div class="w-full h-full absolute top-0 left-0 bg-white/80 flex items-center justify-center">
            <x-container.landing-container class="flex flex-col items-center gap-3">
                <h1 class="text-4xl text-accent-700 font-bold text-center">GALERI DESA BERAN</h1>
                <p class="text-md text-brand-500 w-1/2 text-center">Jelajahi berbagai dokumentasi kegiatan, potret
                    kehidupan masyarakat, serta keindahan alam Desa Beran.
                    Galeri ini menjadi wadah untuk menampilkan karya, kreativitas, dan momen berharga yang menggambarkan
                    semangat gotong royong serta kemajuan desa menuju masyarakat yang mandiri dan berdaya.</p>
            </x-container.landing-container>
        </div>
    </div>
    <div class="w-full py-10 relative">
        <img src="{{ asset('static/images/bg-ornament.png') }}"
            class="w-96 h-fit absolute top-0 right-0 scale-y-[-1]" />
        <img src="{{ asset('static/images/bg-ornament.png') }}" class="w-96 h-fit absolute top-0 left-0 rotate-180" />
        <div class="absolute bg-white/90 w-full h-full right-0 top-0"></div>
        <x-container.landing-container class="relative">
            <div class="w-full flex items-center gap-1 mb-3" wire:ignore x-data="{
                initIcons() {
                    setTimeout(() => { lucide.createIcons(); }, 0);
                }
            }" x-init="initIcons()"
                x-effect="initIcons()">
                <a href="/" class="text-brand-500 font-semibold hover:underline">Beranda</a>
                <div wire:ignore class="text-brand-500">
                    <i data-lucide="chevron-right" class="h-4 aspect-[1/1]"></i>
                </div>
                <span class="text-brand-500 font-semibold">Galeri</span>
            </div>
            <div class="w-full grid grid-cols-3 gap-5 mb-5">
                <template x-if="$store.SERVICE_GALLERY_STORE.loading">
                    <template x-for="(data, index) in [1, 2, 3, 4, 5, 6]" :key="index">
                        <x-loader.shimmer class="!w-full !h-80 !rounded-lg" />
                    </template>
                </template>
                <template x-if="!$store.SERVICE_GALLERY_STORE.loading && $store.SERVICE_GALLERY_STORE.data.length <= 0">
                    <div
                        class="col-span-4 w-full h-96 flex items-center justify-center flex-col border border-neutral-300 rounded-lg shadow-xl">
                        <img src="{{ asset('static/images/no-data.png') }}" class="h-32 w-32" />
                        <span class="text-sm font-semibold text-accent-700">Tidak ada data gallery</span>
                    </div>
                </template>
                <template x-if="!$store.SERVICE_GALLERY_STORE.loading && $store.SERVICE_GALLERY_STORE.data.length > 0">
                    <template x-for="(data, index) in $store.SERVICE_GALLERY_STORE.data" :key="index">
                        <div
                            class="flex flex-col w-full h-80 rounded-lg shadow-lg cursor-pointer hover:shadow-2xl transition-all ease-in-out duration-500">
                            <div class="h-80 w-full relative group">
                                <img x-bind:src="data.image"
                                    class="rounded-lg w-full h-full object-cover object-center" />
                                <div
                                    class="absolute bottom-0 left-0 w-full h-0 px-6 bg-black/60 rounded-lg flex flex-col gap-3 items-center justify-center opacity-0 group-hover:h-full group-hover:opacity-100 transition-all duration-500">
                                    <p x-text="data.title"
                                        class="text-center text-lg uppercase text-white font-bold overflow-hidden [display:-webkit-box] [-webkit-line-clamp:3] [-webkit-box-orient:vertical]">
                                    </p>
                                    <p class="text-sm text-white" x-text="data.author_name"></p>
                                </div>
                            </div>
                        </div>
                    </template>
                </template>
            </div>
        </x-container.landing-container>
    </div>
</section>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_GALLERY_STORE';
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
                            '[data-component-id="gallery"]')?.getAttribute(
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
                    window.location.href = '/perpustakaan-online-desa-beran/' + slug;
                },
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
