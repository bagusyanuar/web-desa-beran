<section id="history" data-component-id="history" class="w-full">
    <div class="w-full h-[20rem] relative">
        <div class="w-full h-full">
            <img src="{{ asset('static/images/service/bg-service.png') }}"
                class="h-full w-full object-cover object-center" alt="main-service" />
        </div>
        <div class="w-full h-full absolute top-0 left-0 bg-white/80 flex items-center justify-center">
            <x-container.landing-container class="flex flex-col items-center gap-3">
                <h1 class="text-4xl text-accent-700 font-bold text-center">PERANGKAT DESA BERAN</h1>
                <p class="text-md text-brand-500 w-1/2 text-center">Perangkat Desa merupakan unsur penyelenggara
                    pemerintahan yang membantu Kepala Desa dalam menjalankan
                    tugas-tugas administrasi, pelayanan masyarakat, dan pembangunan di tingkat desa. Dengan peran dan
                    tanggung jawab
                    masing-masing, perangkat desa berkontribusi dalam mewujudkan tata kelola pemerintahan yang
                    transparan,
                    akuntabel, dan berorientasi pada kemajuan Desa Beran.</p>
            </x-container.landing-container>
        </div>
    </div>
    <div class="w-full py-10">
        <x-container.landing-container class="">
            <div class="w-full flex items-start gap-5">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-6 border border-neutral-300">
                    <p class="text-lg text-accent-500 font-bold mb-5">PERANGKAT DESA BERAN</p>
                    @if (!empty($data))
                        @foreach ($data as $datum)
                            <div class="w-full grid grid-cols-4 gap-3">
                                <div class="flex flex-col items-center w-full">
                                    <img src="{{ asset($datum->image) }}" alt="photo"
                                        class="w-full h-64 rounded-lg object-cover object-top mb-1" />
                                    <span
                                        class="text-md font-bold text-neutral-700 text-center">{{ $datum->name }}</span>
                                    <span class="text-md text-neutral-500 text-center">{{ $datum->position }}</span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="w-full h-96 flex flex-col items-center justify-center">
                            <img src="{{ asset('static/images/no-data.png') }}" alt="no-data"
                                class="h-32 w-32 object-cover object-center" />
                            <span class="text-sm text-accent-500">Perangkat desa tidak ditemukan.</span>
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
