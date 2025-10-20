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
                <div class="flex-1 bg-white rounded-lg shadow-xl p-6 border border-neutral-300">
                    @if (!empty($data))
                        @if (!empty($data->image))
                            <div class="w-full rounded-lg mb-5 border border-accent-500">
                                <img src="{{ $data->image->image }}" alt="product-thumbnail"
                                    class="w-full h-96 rounded-lg object-cover" />
                            </div>
                        @endif
                        <p class="text-lg uppercase text-accent-500 font-bold mb-5">{{ $data->title }}</p>
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
