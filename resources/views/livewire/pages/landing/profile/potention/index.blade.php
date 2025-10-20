<section id="history" data-component-id="history" class="w-full">
    <div class="w-full h-[20rem] relative">
        <div class="w-full h-full">
            <img src="{{ asset('static/images/service/bg-service.png') }}"
                class="h-full w-full object-cover object-center" alt="main-service" />
        </div>
        <div class="w-full h-full absolute top-0 left-0 bg-white/80 flex items-center justify-center">
            <x-container.landing-container class="flex flex-col items-center gap-3">
                <h1 class="text-4xl text-accent-700 font-bold text-center">POTENSI DESA</h1>
                <p class="text-md text-brand-500 w-3/4 text-center">Desa Beran memiliki beragam potensi yang menjadi
                    kekuatan utama dalam pembangunan wilayahnya.
                    Sektor pertanian yang subur menjadi penopang utama ekonomi desa, didukung oleh lahan yang luas
                    dan sumber daya alam yang melimpah. Selain itu, munculnya usaha mikro, kecil, dan menengah (UMKM)
                    yang kreatif turut mendorong pertumbuhan ekonomi lokal. Potensi pariwisata berbasis budaya dan alam
                    juga mulai dikembangkan, menghadirkan peluang baru bagi masyarakat untuk meningkatkan kesejahteraan
                    tanpa mengabaikan kelestarian lingkungan dan nilai-nilai tradisi yang ada.</p>
            </x-container.landing-container>
        </div>
    </div>
    <div class="w-full py-10">
        <x-container.landing-container class="">
            <div class="w-full flex items-start gap-5">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-6 border border-neutral-300">
                    <p class="text-lg text-accent-500 font-bold mb-5">POTENSI DESA BERAN</p>
                    @if (!empty($data))
                        @if ($data->image !== null)
                            <div class="w-full rounded-lg bg-blue-600 mb-5">
                                <img src="{{ $data->image }}" alt="image-profile"
                                    class="w-full h-96 rounded-lg object-cover" />
                            </div>
                        @endif
                        <div class="w-full text-neutral-700 text-sm">
                            {!! $data->description !!}
                        </div>
                    @endif
                </div>
                <!-- page suggestion -->
                <div class="w-80 flex flex-col gap-5">
                    <livewire:features.landing.suggestion.online-letter />
                    <livewire:features.landing.suggestion.news />
                    <livewire:features.landing.suggestion.product />
                </div>
            </div>
        </x-container.landing-container>
    </div>
</section>
