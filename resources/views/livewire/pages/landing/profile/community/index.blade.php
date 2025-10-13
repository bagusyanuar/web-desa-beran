<section id="history" data-component-id="history" class="w-full">
    <div class="w-full h-[20rem] relative">
        <div class="w-full h-full">
            <img src="{{ asset('static/images/service/bg-service.png') }}"
                class="h-full w-full object-cover object-center" alt="main-service" />
        </div>
        <div class="w-full h-full absolute top-0 left-0 bg-white/80 flex items-center justify-center">
            <x-container.landing-container class="flex flex-col items-center gap-3">
                <h1 class="text-4xl text-accent-700 font-bold text-center">PROFIL MASYARAKAT DESA BERAN</h1>
                <p class="text-md text-brand-500 w-1/2 text-center">Masyarakat Desa Beran dikenal sebagai komunitas yang
                    menjunjung tinggi nilai kebersamaan dan gotong royong. Sebagian besar penduduknya bermata
                    pencaharian di bidang pertanian, perdagangan, serta usaha kecil menengah yang menjadi penopang
                    ekonomi desa. Dengan tingkat pendidikan dan kesadaran sosial yang terus meningkat, masyarakat Desa
                    Beran berkomitmen untuk membangun desa yang maju, sejahtera, dan berbudaya tanpa meninggalkan
                    nilai-nilai luhur warisan leluhur.</p>
            </x-container.landing-container>
        </div>
    </div>
    <div class="w-full py-10">
        <x-container.landing-container class="">
            <div class="w-full flex items-start gap-5">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-6 border border-neutral-300">
                    <p class="text-lg text-accent-500 font-bold mb-5">MASYARAKAT DESA BERAN</p>
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
                </div>
            </div>
        </x-container.landing-container>
    </div>
</section>
