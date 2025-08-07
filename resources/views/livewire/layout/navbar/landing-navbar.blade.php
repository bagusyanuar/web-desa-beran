<div style="background-image: url('{{ asset('/static/images/batik-bg.png') }}')" class="w-full h-20"
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
</div>
