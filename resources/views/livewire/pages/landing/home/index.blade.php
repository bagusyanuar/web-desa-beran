<section id="section-landing-home" data-component-id="landing-home" class="w-full">
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
    <div class="w-full">
        <x-container.landing-container class="py-5">
            <p class="text-center text-lg font-semibold text-brand-500 mb-5">Layanan Desa Beran</p>
            <div class="w-2/3 flex gap-5 flex-wrap items-start justify-center justify-self-center">
                <x-container.card-service icon="{{ asset('static/images/service/domicile.png') }}"
                    text="Surat Keterangan Domisili" />
                <x-container.card-service icon="{{ asset('static/images/service/lost.png') }}"
                    text="Surat Keterangan Kehilangan" />
                <x-container.card-service icon="{{ asset('static/images/service/lost.png') }}"
                    text="Surat Keterangan Tidak Mampu" />
                <x-container.card-service icon="{{ asset('static/images/service/lost.png') }}"
                    text="Surat Keterangan Pindah" />
                <x-container.card-service icon="{{ asset('static/images/service/lost.png') }}"
                    text="Surat Keterangan Kelahiran" />
                <x-container.card-service icon="{{ asset('static/images/service/lost.png') }}"
                    text="Surat Keterangan Belum Menikah" />
                <x-container.card-service icon="{{ asset('static/images/service/lost.png') }}"
                    text="Surat Pengantar SKCK" />
                <x-container.card-service icon="{{ asset('static/images/service/lost.png') }}"
                    text="Surat Keterangan Janda/Duda" />
            </div>
        </x-container.landing-container>
        <x-container.landing-container class="py-5">
            <p class="text-center text-lg font-semibold text-brand-500 mb-5">Tentang Desa Beran</p>
        </x-container.landing-container>
    </div>
    {{-- <livewire:features.landing.home.hero />
    <div class="w-full relative -translate-y-[5rem] z-50">
        <livewire:features.landing.home.service />
        <livewire:features.landing.home.about />
        <livewire:features.landing.home.news />
    </div> --}}
</section>

@push('scripts')
@endpush
