<nav id="landing-navbar" data-component-id="landing-navbar"
    class="w-full h-16 z-30 top-0 left-0 transition-colors ease-in duration-300"
    x-bind:class="{
        'bg-transparent border-none' : $store.LANDING_NAVBAR_STORE.mode === 'transparent',
        'bg-white border-b border-brand-500 shadow-sm' : $store.LANDING_NAVBAR_STORE.mode !== 'transparent',
        'sticky' : $store.LANDING_NAVBAR_STORE.fixMode,
        'fixed' : !$store.LANDING_NAVBAR_STORE.fixMode,
    }">
    <x-container.landing-container class="h-full">
        <div class="w-full h-full flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img x-bind:src="$store.LANDING_NAVBAR_STORE.mode === 'transparent' ?
                    '{{ asset('static/images/logo-image-white.png') }}' : '{{ asset('static/images/logo-image.png') }}'"
                    class="w-10 h-10" />
                <span class="font-semibold text-sm"
                    x-bind:class="$store.LANDING_NAVBAR_STORE.mode === 'transparent' ? 'text-white' :
                        'text-brand-500'">Beran
                    Digital</span>
            </div>
            <div class="flex items-center gap-5">
                <ul class="flex items-center gap-1">
                    <x-navbar.navbar-item text="Beranda" to="/" />
                    <x-navbar.navbar-item-tree text="Profil">
                        <div class="w-48 bg-white px-1.5 py-1.5 rounded-md border border-neutral-300">
                            <a href="#"
                                class="rounded block p-1.5 text-xs text-neutral-700 hover:bg-neutral-100 transition-all duration-200 ease-in">Tentang
                                Desa</a>
                            <a href="#"
                                class="rounded block p-1.5 text-xs text-neutral-700 hover:bg-neutral-100 transition-all duration-200 ease-in">Visi
                                dan Misi</a>
                            <a href="#"
                                class="rounded block p-1.5 text-xs text-neutral-700 hover:bg-neutral-100 transition-all duration-200 ease-in">Aparatur
                                Desa</a>
                            <a href="#"
                                class="rounded block p-1.5 text-xs text-neutral-700 hover:bg-neutral-100 transition-all duration-200 ease-in">Statistik
                                Desa</a>
                        </div>
                    </x-navbar.navbar-item-tree>
                    <x-navbar.navbar-item-tree text="Layanan">
                        <div class="w-48 bg-white px-1.5 py-1.5  rounded-md border border-neutral-300">
                            <a href="{{ route('online-letter') }}"
                                class="rounded block p-1.5 text-xs text-neutral-700 hover:bg-neutral-100 transition-all duration-200 ease-in">Surat
                                Online</a>
                            <a href="#"
                                class="rounded block p-1.5 text-xs text-neutral-700 hover:bg-neutral-100 transition-all duration-200 ease-in">Aduan</a>
                        </div>
                    </x-navbar.navbar-item-tree>
                    <x-navbar.navbar-item-tree text="Publikasi">
                        <div class="w-48 bg-white p-3 rounded-md border border-neutral-300">
                            <a href="#" class="block text-xs text-neutral-700">Berita</a>
                            <a href="#" class="block text-xs text-neutral-700">Galeri</a>
                        </div>
                    </x-navbar.navbar-item-tree>
                    <x-navbar.navbar-item text="Produk" to="/" />
                </ul>
            </div>
            <div>
                {{-- <a href="#"
                    class="font-semibold flex items-center justify-center px-5 py-2.5 rounded-md text-sm text-white">
                    <span>Ajukan Surat</span>
                </a> --}}
            </div>
        </div>
    </x-container.landing-container>
</nav>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'LANDING_NAVBAR_STORE';
            const STORE_PROPS = {
                component: null,
                scrollY: 0,
                treshold: 50,
                mode: 'fill',
                fixMode: true,
                routeTransparent: ['/'],
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="landing-navbar"]')?.getAttribute('wire:id');
                        if (component.id === componentID) {
                            this.component = component;
                            const path = window.location.pathname;
                            const isFixMode = !this.routeTransparent.includes(path);
                            if (!isFixMode) {
                                this.fixMode = false;
                                this.mode = 'transparent';
                            }
                        }
                    });

                    window.addEventListener('scroll', () => {
                        this.scrollY = window.scrollY;
                        if (this.scrollY > this.treshold) {
                            this.mode = 'fill';
                        } else {
                            if (!this.fixMode) {
                                this.mode = 'transparent';
                            }
                        }
                    })
                },
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        })
    </script>
@endpush
