<section id="micro-business-detail" data-component-id="micro-business-detail" class="w-full">
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
                <a href="{{ route('micro-business') }}" class="text-brand-500 font-semibold hover:underline">Produk Umkm
                    Desa Beran</a>
                @if (!empty($data))
                    <div wire:ignore class="text-brand-500">
                        <i data-lucide="chevron-right" class="h-4 aspect-[1/1]"></i>
                    </div>
                    <span class="text-brand-500 font-semibold">{{ $data->title }}</span>
                @endif

            </div>
            <div class="w-full flex items-start gap-5">
                <div class="flex-1 bg-white rounded-lg shadow-2xl p-6">
                    @if (!empty($data))
                        @if (!empty($data->image))
                            <div class="w-full rounded-lg mb-5 border-2 border-accent-500">
                                <img src="{{ $data->image->image }}" alt="product-thumbnail"
                                    class="w-full h-[32rem] rounded-lg object-cover" />
                            </div>
                        @endif
                        <div class="w-full flex items-center gap-3 mb-5">
                            <div class="flex-1 flex flex-col gap-1">
                                <p class="text-xl uppercase text-accent-500 font-bold">{{ $data->title }}</p>
                                <div class="flex items-center text-neutral-700">
                                    <p class="text-md text-brand-500 font-bold">Rp
                                        {{ number_format($data->price, 2, ',', '.') }}</p>
                                    <span class="text-neutral-700 ms-3 me-2">|</span>
                                    <div class="relative" x-data="{ open: false }">
                                        <div class="flex items-center cursor-pointer" x-on:click="open = !open;">
                                            <i data-lucide="forward" class="h-4 aspect-[1/1]"></i>
                                            <span class="text-sm">Bagikan</span>
                                        </div>
                                        <div x-cloak x-show="open" x-on:click.away="open = false;"
                                            class="absolute top-7 right-0"
                                            x-transition:enter="transition ease-out duration-300"
                                            x-transition:enter-start="opacity-0 -translate-y-5"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition ease-in duration-300"
                                            x-transition:leave-start="opacity-100 translate-y-0"
                                            x-transition:leave-end="opacity-0 -translate-y-5">
                                            <div
                                                class="w-48 px-1.5 py-1.5 bg-white rounded-md border border-neutral-300 shadow-lg">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                                    target="_blank"
                                                    class="px-1.5 py-1.5 text-xs flex items-center gap-1 text-neutral-500 hover:text-neutral-700 hover:bg-neutral-100">
                                                    <svg viewBox="0 0 48 48" version="1.1"
                                                        xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 rounded-sm"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <title>Facebook-color</title>
                                                            <desc>Created with Sketch.</desc>
                                                            <defs> </defs>
                                                            <g id="Icons" stroke="none" stroke-width="1"
                                                                fill="none" fill-rule="evenodd">
                                                                <g id="Color-"
                                                                    transform="translate(-200.000000, -160.000000)"
                                                                    fill="#4460A0">
                                                                    <path
                                                                        d="M225.638355,208 L202.649232,208 C201.185673,208 200,206.813592 200,205.350603 L200,162.649211 C200,161.18585 201.185859,160 202.649232,160 L245.350955,160 C246.813955,160 248,161.18585 248,162.649211 L248,205.350603 C248,206.813778 246.813769,208 245.350955,208 L233.119305,208 L233.119305,189.411755 L239.358521,189.411755 L240.292755,182.167586 L233.119305,182.167586 L233.119305,177.542641 C233.119305,175.445287 233.701712,174.01601 236.70929,174.01601 L240.545311,174.014333 L240.545311,167.535091 C239.881886,167.446808 237.604784,167.24957 234.955552,167.24957 C229.424834,167.24957 225.638355,170.625526 225.638355,176.825209 L225.638355,182.167586 L219.383122,182.167586 L219.383122,189.411755 L225.638355,189.411755 L225.638355,208 L225.638355,208 Z"
                                                                        id="Facebook"> </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span>Facebook</span>
                                                </a>
                                                <a href="#"
                                                    class="px-1.5 py-1.5 text-xs flex items-center gap-1 text-neutral-500 hover:text-neutral-700 hover:bg-neutral-100">
                                                    <svg class="w-4 h-4 rounded-sm" viewBox="0 0 32 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <rect x="2" y="2" width="28" height="28"
                                                                rx="6" fill="url(#paint0_radial_87_7153)">
                                                            </rect>
                                                            <rect x="2" y="2" width="28" height="28"
                                                                rx="6" fill="url(#paint1_radial_87_7153)">
                                                            </rect>
                                                            <rect x="2" y="2" width="28" height="28"
                                                                rx="6" fill="url(#paint2_radial_87_7153)">
                                                            </rect>
                                                            <path
                                                                d="M23 10.5C23 11.3284 22.3284 12 21.5 12C20.6716 12 20 11.3284 20 10.5C20 9.67157 20.6716 9 21.5 9C22.3284 9 23 9.67157 23 10.5Z"
                                                                fill="white"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M16 21C18.7614 21 21 18.7614 21 16C21 13.2386 18.7614 11 16 11C13.2386 11 11 13.2386 11 16C11 18.7614 13.2386 21 16 21ZM16 19C17.6569 19 19 17.6569 19 16C19 14.3431 17.6569 13 16 13C14.3431 13 13 14.3431 13 16C13 17.6569 14.3431 19 16 19Z"
                                                                fill="white"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M6 15.6C6 12.2397 6 10.5595 6.65396 9.27606C7.2292 8.14708 8.14708 7.2292 9.27606 6.65396C10.5595 6 12.2397 6 15.6 6H16.4C19.7603 6 21.4405 6 22.7239 6.65396C23.8529 7.2292 24.7708 8.14708 25.346 9.27606C26 10.5595 26 12.2397 26 15.6V16.4C26 19.7603 26 21.4405 25.346 22.7239C24.7708 23.8529 23.8529 24.7708 22.7239 25.346C21.4405 26 19.7603 26 16.4 26H15.6C12.2397 26 10.5595 26 9.27606 25.346C8.14708 24.7708 7.2292 23.8529 6.65396 22.7239C6 21.4405 6 19.7603 6 16.4V15.6ZM15.6 8H16.4C18.1132 8 19.2777 8.00156 20.1779 8.0751C21.0548 8.14674 21.5032 8.27659 21.816 8.43597C22.5686 8.81947 23.1805 9.43139 23.564 10.184C23.7234 10.4968 23.8533 10.9452 23.9249 11.8221C23.9984 12.7223 24 13.8868 24 15.6V16.4C24 18.1132 23.9984 19.2777 23.9249 20.1779C23.8533 21.0548 23.7234 21.5032 23.564 21.816C23.1805 22.5686 22.5686 23.1805 21.816 23.564C21.5032 23.7234 21.0548 23.8533 20.1779 23.9249C19.2777 23.9984 18.1132 24 16.4 24H15.6C13.8868 24 12.7223 23.9984 11.8221 23.9249C10.9452 23.8533 10.4968 23.7234 10.184 23.564C9.43139 23.1805 8.81947 22.5686 8.43597 21.816C8.27659 21.5032 8.14674 21.0548 8.0751 20.1779C8.00156 19.2777 8 18.1132 8 16.4V15.6C8 13.8868 8.00156 12.7223 8.0751 11.8221C8.14674 10.9452 8.27659 10.4968 8.43597 10.184C8.81947 9.43139 9.43139 8.81947 10.184 8.43597C10.4968 8.27659 10.9452 8.14674 11.8221 8.0751C12.7223 8.00156 13.8868 8 15.6 8Z"
                                                                fill="white"></path>
                                                            <defs>
                                                                <radialGradient id="paint0_radial_87_7153"
                                                                    cx="0" cy="0" r="1"
                                                                    gradientUnits="userSpaceOnUse"
                                                                    gradientTransform="translate(12 23) rotate(-55.3758) scale(25.5196)">
                                                                    <stop stop-color="#B13589"></stop>
                                                                    <stop offset="0.79309" stop-color="#C62F94">
                                                                    </stop>
                                                                    <stop offset="1" stop-color="#8A3AC8"></stop>
                                                                </radialGradient>
                                                                <radialGradient id="paint1_radial_87_7153"
                                                                    cx="0" cy="0" r="1"
                                                                    gradientUnits="userSpaceOnUse"
                                                                    gradientTransform="translate(11 31) rotate(-65.1363) scale(22.5942)">
                                                                    <stop stop-color="#E0E8B7"></stop>
                                                                    <stop offset="0.444662" stop-color="#FB8A2E">
                                                                    </stop>
                                                                    <stop offset="0.71474" stop-color="#E2425C">
                                                                    </stop>
                                                                    <stop offset="1" stop-color="#E2425C"
                                                                        stop-opacity="0"></stop>
                                                                </radialGradient>
                                                                <radialGradient id="paint2_radial_87_7153"
                                                                    cx="0" cy="0" r="1"
                                                                    gradientUnits="userSpaceOnUse"
                                                                    gradientTransform="translate(0.500002 3) rotate(-8.1301) scale(38.8909 8.31836)">
                                                                    <stop offset="0.156701" stop-color="#406ADC">
                                                                    </stop>
                                                                    <stop offset="0.467799" stop-color="#6A45BE">
                                                                    </stop>
                                                                    <stop offset="1" stop-color="#6A45BE"
                                                                        stop-opacity="0"></stop>
                                                                </radialGradient>
                                                            </defs>
                                                        </g>
                                                    </svg>
                                                    <span>Instagram</span>
                                                </a>
                                                <a href="#"
                                                    class="px-1.5 py-1.5 text-xs flex items-center gap-1 text-neutral-500 hover:text-neutral-700 hover:bg-neutral-100">
                                                    <svg class="w-4 h-4 rounded-sm" viewBox="0 -4 48 48"
                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <title>Twitter-color</title>
                                                            <desc>Created with Sketch.</desc>
                                                            <defs> </defs>
                                                            <g id="Icons" stroke="none" stroke-width="1"
                                                                fill="none" fill-rule="evenodd">
                                                                <g id="Color-"
                                                                    transform="translate(-300.000000, -164.000000)"
                                                                    fill="#00AAEC">
                                                                    <path
                                                                        d="M348,168.735283 C346.236309,169.538462 344.337383,170.081618 342.345483,170.324305 C344.379644,169.076201 345.940482,167.097147 346.675823,164.739617 C344.771263,165.895269 342.666667,166.736006 340.418384,167.18671 C338.626519,165.224991 336.065504,164 333.231203,164 C327.796443,164 323.387216,168.521488 323.387216,174.097508 C323.387216,174.88913 323.471738,175.657638 323.640782,176.397255 C315.456242,175.975442 308.201444,171.959552 303.341433,165.843265 C302.493397,167.339834 302.008804,169.076201 302.008804,170.925244 C302.008804,174.426869 303.747139,177.518238 306.389857,179.329722 C304.778306,179.280607 303.256911,178.821235 301.9271,178.070061 L301.9271,178.194294 C301.9271,183.08848 305.322064,187.17082 309.8299,188.095341 C309.004402,188.33225 308.133826,188.450704 307.235077,188.450704 C306.601162,188.450704 305.981335,188.390033 305.381229,188.271578 C306.634971,192.28169 310.269414,195.2026 314.580032,195.280607 C311.210424,197.99061 306.961789,199.605634 302.349709,199.605634 C301.555203,199.605634 300.769149,199.559408 300,199.466956 C304.358514,202.327194 309.53689,204 315.095615,204 C333.211481,204 343.114633,188.615385 343.114633,175.270495 C343.114633,174.831347 343.106181,174.392199 343.089276,173.961719 C345.013559,172.537378 346.684275,170.760563 348,168.735283"
                                                                        id="Twitter"> </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span>Twitter</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="w-fit">
                                <a href="#"
                                    class="text-xs bg-white border border-accent-500 px-3 py-2.5 rounded-lg  text-accent-500 hover:text-white hover:bg-accent-500 transition-all ease-in-out duration-500 hover:shadow-md hover:shadow-accent-400">Hubungi
                                    Penjual</a>
                            </div>
                        </div>

                        <!-- tab desc -->
                        <div class="w-full flex items-center border-b border-neutral-300 mb-3">
                            <div x-on:click="$store.SERVICE_MICRO_BUSINESS_DETAIL_STORE.onChangeTab('description')"
                                x-bind:class="$store.SERVICE_MICRO_BUSINESS_DETAIL_STORE.selectedTab === 'description' ?
                                    'shadow-md bg-neutral-100' : ''"
                                class="px-3 py-2.5 border border-neutral-300 border-b-0   cursor-pointer">
                                <span class="text-sm text-neutral-700">Deskripsi</span>
                            </div>
                            <div x-on:click="$store.SERVICE_MICRO_BUSINESS_DETAIL_STORE.onChangeTab('owner')"
                                x-bind:class="$store.SERVICE_MICRO_BUSINESS_DETAIL_STORE.selectedTab === 'owner' ?
                                    'shadow-md bg-neutral-100' : ''"
                                class="px-3 py-2.5 border border-neutral-300 border-b-0 border-l-0 cursor-pointer">
                                <span class="text-sm text-neutral-700">Pemilik Usaha</span>
                            </div>
                        </div>
                        <div class="w-full text-neutral-700 text-sm"
                            x-show="$store.SERVICE_MICRO_BUSINESS_DETAIL_STORE.selectedTab === 'description'">
                            {!! $data->description !!}
                        </div>
                        <div class="w-full text-neutral-700 text-sm" x-cloak
                            x-show="$store.SERVICE_MICRO_BUSINESS_DETAIL_STORE.selectedTab === 'owner'">
                            @if (!empty($data->owner))
                                <div class="w-full flex gap-3">
                                    <div class="flex-1">
                                        <div class="w-full rounded-lg border-neutral-300">
                                            <div
                                                class="w-full flex items-center gap-1 px-3 py-1.5 bg-white rounded-t-lg text-neutral-700 text-sm border-neutral-300">
                                                <div class="w-32">
                                                    <span>Nama</span>
                                                </div>
                                                <div class="w-8 text-center">
                                                    <span>:</span>
                                                </div>
                                                <div class="flex-1">
                                                    <span>{{ $data->owner->name }}</span>
                                                </div>
                                            </div>
                                            <div
                                                class="w-full flex items-center gap-1 px-3 py-1.5 bg-white rounded-t-lg text-neutral-700 text-sm border-neutral-300">
                                                <div class="w-32">
                                                    <span>No. Whatsapp</span>
                                                </div>
                                                <div class="w-8 text-center">
                                                    <span>:</span>
                                                </div>
                                                <div class="flex-1">
                                                    <span>{{ $data->contact->value }}</span>
                                                </div>
                                            </div>
                                            <div
                                                class="w-full flex items-center gap-1 px-3 py-1.5 bg-white rounded-t-lg text-neutral-700 text-sm border-neutral-300">
                                                <div class="w-32">
                                                    <span>Alamat</span>
                                                </div>
                                                <div class="w-8 text-center">
                                                    <span>:</span>
                                                </div>
                                                <div class="flex-1">
                                                    <span>{{ $data->address->address }}</span>
                                                </div>
                                            </div>
                                            <div
                                                class="w-full flex items-center gap-1 px-3 py-1.5 bg-white rounded-b-lg text-neutral-700 text-sm">
                                                <div class="w-32">
                                                    <span>Deskripsi</span>
                                                </div>
                                                <div class="w-8 text-center">
                                                    <span>:</span>
                                                </div>
                                                <div class="flex-1">
                                                    <span>{!! $data->owner->description !!}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{ $data->owner->image }}" alt="owner-thumbnail"
                                        class="h-32 w-32 rounded-lg object-cover" />
                                </div>
                            @else
                            @endif

                        </div>
                    @else
                    @endif

                </div>
                <!-- page suggestion -->
                <div class="w-80 flex flex-col gap-5">
                    <livewire:features.landing.suggestion.online-letter />
                    <livewire:features.landing.suggestion.news />
                </div>
            </div>
        </x-container.landing-container>
    </div>
</section>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_MICRO_BUSINESS_DETAIL_STORE';
            const STORE_PROPS = {
                component: null,
                selectedTab: 'description',
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="micro-business-detail"]')?.getAttribute(
                            'wire:id');
                        if (component.id === componentID) {
                            this.component = component;
                        }
                    });
                },
                onChangeTab(value) {
                    this.selectedTab = value;
                }
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
