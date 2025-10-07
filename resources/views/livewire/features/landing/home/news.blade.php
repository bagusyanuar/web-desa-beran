<section id="landing-news" data-component-id="landing-news">
    <x-container.landing-container class="py-10">
        <div class="w-full">
            <h1 class="text-[3rem] text-accent-700 font-bold text-center">BERITA TERKINI</h1>
            <p class="text-md text-brand-500 mb-7 text-center">Informasi terbaru seputar kegiatan masyarakat,
                pembangunan,
                kebijakan desa, serta peristiwa penting lainnya yang disajikan secara transparan dan aktual. Setiap
                berita hadir untuk memberikan wawasan yang lebih luas, mempererat hubungan antarwarga, serta
                mendorong tumbuhnya keterbukaan, partisipasi, dan rasa memiliki terhadap kemajuan desa.</p>
            <div class="w-full flex gap-3 mb-5" wire:ignore>
                <x-slick.carousel slideToShow="3" speed="2000" mode="width">
                    @foreach ([1, 2, 3, 4, 5] as $v)
                        <x-slick.card-news image="/static/images/about-1.jpg"
                            title="Pelantikan Kepala Daerah Desa Beran" date="1 Januari 2025"
                            description="Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry. Lorem
                                                    Ipsum has been
                                                    the industry's standard dummy text ever since the 1500s, when an
                                                    unknown
                                                    printer
                                                    took a galley
                                                    of type and scrambled it to make a type specimen book. It has
                                                    survived
                                                    not only
                                                    five centuries,
                                                    but also the leap into electronic typesetting, remaining essentially
                                                    unchanged." />
                    @endforeach
                </x-slick.carousel>
            </div>
            <div class="flex items-center justify-center">
                <a href="#" class="text-md text-brand-500 flex items-center gap-3">
                    <span>Lihat Selengkapnya</span>
                    <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                </a>
            </div>
        </div>
    </x-container.landing-container>
</section>

@push('scripts')
    @vite(['resources/js/util/slick.js'])
@endpush
