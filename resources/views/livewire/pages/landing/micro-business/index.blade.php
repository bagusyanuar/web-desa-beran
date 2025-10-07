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
    <div class="w-full py-10">
        <x-container.landing-container class="">
            <div class="w-full flex items-start gap-5">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-6 border border-neutral-300">
                    <p class="text-lg text-accent-500 font-bold mb-5">PRODUK UMKM DESA BERAN</p>
                    <div class="flex items-center border border-neutral-300 rounded-md w-full mb-5" wire:ignore>
                        <i data-lucide="search" class="text-neutral-500 min-h-4 min-w-4 ms-2"></i>
                        <input type="text" placeholder="search..."
                            class="flex-grow w-full py-2 ps-2 pe-3 rounded-md text-sm text-neutral-700 border-none focus:outline-none focus:ring-0" />
                    </div>
                    <div class="w-full grid grid-cols-4 gap-3 mb-5">
                        <template x-if="$store.SERVICE_MICRO_BUSINESS_STORE.loading">

                        </template>
                        @foreach ([1, 2, 3, 4, 5, 6, 7, 8] as $v)
                            <div
                                class="w-full h-60 flex flex-col bg-white border border-neutral-300 rounded-lg shadow-xl">
                                <div class="w-full h-28">
                                    <img src="{{ asset('/static/images/products/product-1.jpg') }}"
                                        class="rounded-t-lg w-full h-full object-cover object-center" />
                                </div>
                                <div class="w-full flex-1 flex flex-col px-2 py-1.5">
                                    <p
                                        class="text-sm text-brand-500 font-bold leading-[1.2] overflow-hidden [display:-webkit-box] [-webkit-line-clamp:2] [-webkit-box-orient:vertical]">
                                        Product Name</p>
                                    <p class="text-xs text-neutral-700 mb-1">Bp. Widhyan Rahmat</p>
                                    <div class="flex-1">
                                        <p
                                            class="text-xs text-neutral-700 overflow-hidden [display:-webkit-box] [-webkit-line-clamp:3] [-webkit-box-orient:vertical]">
                                            {{ strip_tags("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged") }}
                                        </p>
                                    </div>
                                </div>
                                <div class="w-full flex justify-end items-center pb-1.5 px-2">
                                    <div wire:ignore
                                        class="rounded-md h-6 w-6 text-neutral-500 flex items-center justify-center cursor-pointer hover:bg-neutral-300">
                                        <i data-lucide="phone" class="h-4 aspect-[1/1]"></i>
                                    </div>
                                    <div wire:ignore
                                        class="rounded-md h-6 w-6 text-neutral-500 flex items-center justify-center cursor-pointer hover:bg-neutral-300">
                                        <i data-lucide="share-2" class="h-4 aspect-[1/1]"></i>
                                    </div>
                                </div>
                            </div>
                            {{-- <x-loader.shimmer class="!w-full !h-60" /> --}}
                        @endforeach
                    </div>
                    <div class="flex items-center justify-center gap-3" wire:ignore>
                        <button
                            class="w-8 h-8 flex items-center justify-center rounded-md bg-brand-500 text-white cursor-pointer">
                            <i data-lucide="chevron-left" class="text-white h-4 w-4"></i>
                        </button>
                        <button
                            class="w-8 h-8 flex items-center justify-center rounded-md bg-brand-500 text-white cursor-pointer">
                            <i data-lucide="chevron-right" class="text-white h-4 w-4"></i>
                        </button>
                    </div>
                </div>
                <!-- page suggestion -->
                <div class="w-80 flex flex-col gap-5">
                </div>
            </div>
        </x-container.landing-container>
    </div>
</section>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_MICRO_BUSINESS_STORE';
            const STORE_PROPS = {
                component: null,
                alertStore: null,
                pageLoaderStore: null,
                toastStore: null,
                loading: true,
                param: '',
                data: [],
                page: 1,
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="micro-business"]')?.getAttribute(
                            'wire:id');
                        if (component.id === componentID) {
                            this.component = component;
                            this.alertStore = Alpine.store('alertStore');
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
                    this.component.$wire.call('findAll', this.query)
                        .then(response => {
                            const {
                                status,
                                message,
                                data
                            } = response;
                            console.log(response);

                            switch (status) {
                                case 200:
                                    this.data = data;
                                    break;
                                case 500:
                                    this.data = [];
                                    this.toastStore.error(message, 2000);
                                default:
                                    break;
                            }
                        })
                        .finally(() => {
                            this.loading = false;
                        });

                }
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
