{{-- <div style="background-image: url('{{ asset('/static/images/batik-bg.png') }}')" class="w-full h-20"
    id="section-landing-navbar" data-component-id="landing-navbar">
    <x-container.landing-container class="h-full flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="flex items-center gap-1">
                <img src="{{ asset('static/images/institution-logo.png') }}" alt="logo-image" class="h-14" />
                <div class="flex flex-col">
                    <span class="text-neutral-700 text-xs font-semibold">Pemerintah Kota Ngawi</span>
                    <span class="text-neutral-700 text-xs font-semibold">Desa Beran</span>
                </div>
            </div>
            <div class="flex items-center gap-1">
                <img src="{{ asset('static/images/logo.png') }}" alt="logo-image" class="h-20" />
            </div>
        </div>
        <div class="flex items-center gap-1">
            <a href="#"
                class="text-sm text-neutral-700 font-semibold px-3 py-1.5 rounded-lg hover:bg-brand-500 hover:text-white transition-all duration-200 ease-in">Beranda</a>
            <a href="#"
                class="text-sm text-neutral-700 font-semibold px-3 py-1.5 rounded-lg hover:bg-brand-500 hover:text-white transition-all duration-200 ease-in">
                <span>Informasi Desa</span>
            </a>
            <a href="#"
                class="text-sm text-neutral-700 font-semibold px-3 py-1.5 rounded-lg hover:bg-brand-500 hover:text-white transition-all duration-200 ease-in">Berita</a>
            <a href="#"
                class="text-sm text-neutral-700 font-semibold px-3 py-1.5 rounded-lg hover:bg-brand-500 hover:text-white transition-all duration-200 ease-in">Produk Desa</a>
        </div>
    </x-container.landing-container>
</div> --}}

<nav id="landing-navbar" data-component-id="landing-navbar" class="w-full h-16 fixed z-30 top-0 left-0"
    x-bind:class="$store.LANDING_NAVBAR_STORE.mode === 'transparent' ? 'bg-transparent border-none' : 'bg-white border-b border-brand-500' "
>
    <x-container.landing-container class="h-full">
        <div class="w-full h-full flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{ asset('static/images/logo-image-white.png') }}" class="w-10 h-10" />
                <span class="text-white font-semibold text-sm">Beran Digital</span>
            </div>
            <div class="flex items-center gap-5">
                <ul class="flex items-center gap-1">
                    <x-navbar.navbar-item text="Beranda" to="/" />
                    <x-navbar.navbar-item-tree text="Profil">
                        <div class="w-48 bg-white p-3 rounded-md">
                        </div>
                    </x-navbar.navbar-item-tree>
                    <x-navbar.navbar-item text="Produk" to="/" />
                </ul>
            </div>
            <div>
                <a href="#"
                    class="font-semibold flex items-center justify-center px-5 py-2.5 rounded-md text-sm text-white">
                    <span>Ajukan Surat</span>
                </a>
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
                treshold: 20,
                mode: 'transparent',
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="landing-navbar"]')?.getAttribute('wire:id');
                        if (component.id === componentID) {
                            this.component = component;
                            console.log('init');
                        }
                    });

                    window.addEventListener('scroll', () => {
                        this.scrollY = window.scrollY;

                        if (this.scrollY > this.treshold) {
                            this.mode = 'fill';
                        } else {
                            this.mode = 'transparent';
                        }
                    })
                },
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        })
    </script>
@endpush
