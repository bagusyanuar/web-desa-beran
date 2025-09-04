<section id="landing-hero" data-component-id="landing-hero">
    <div class="w-full h-dvh">
        <div class="w-full h-dvh">
            <img src="{{ asset('static/images/hero/main-hero.png') }}" class="h-dvh w-full object-cover object-center"
                alt="main-hero" />
        </div>
        <div class="w-full h-dvh absolute top-0 left-0 bg-black/50">
            <x-container.landing-container class="absolute top-1/2 -translate-y-1/2 mt-16">
                <h1 class="text-white font-semibold text-[2.25rem] w-1/2 leading-normal mb-7">Portal Data,
                    Layanan Dan Informasi
                    Desa Beran</h1>
                <h2 class="text-white text-[0.875rem] w-1/2">
                    Platform digital terpadu yang mendukung berbagai layanan pengajuan surat, produk UMKM, aduan
                    masyarakat dan berbagai informasi yang
                    ada di Desa
                    Beran, untuk mewujudkan Desa Beran sebagai desa digital.
                </h2>
            </x-container.landing-container>
        </div>
    </div>
</section>

{{-- @push('scripts')
    @vite(['resources/js/landing/landing-hero.js'])
@endpush --}}
