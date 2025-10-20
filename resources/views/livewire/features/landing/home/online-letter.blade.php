<section id="landing-online-letter" data-component-id="landing-online-letter">
    <div class="w-full h-[30rem] relative">
        <div class="w-full h-[30rem]">
            <img src="{{ asset('static/images/service/bg-service.png') }}"
                class="h-[30rem] w-full object-cover object-center" alt="main-service" />
        </div>
        <div class="w-full h-[30rem] absolute top-0 left-0 bg-white/65 flex items-center justify-center">
            <x-container.landing-container class="flex items-center gap-3">
                <div class="flex-1">
                    <h1 class="text-[3rem] text-accent-700 font-bold">SURAT ONLINE</h1>
                    <p class="text-md text-brand-500 mb-5">Layanan surat online disediakan untuk memberi kemudahan
                        masyarakat Desa Beran dalam pembuatan surat keterangan secara online.</p>
                    <a href="{{ route('online-letter') }}" class="text-md text-brand-500 flex items-center gap-3">
                        <span>Lihat Selengkapnya</span>
                        <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                    </a>
                </div>
                <div class="flex-1 flex flex-col gap-3">
                    <a href="{{ route('online-letter.domicile') }}"
                        class="bg-white w-3/4 rounded-lg shadow-xl flex items-center justify-between px-3 py-3">
                        <p class="text-md text-brand-700">Surat Keterangan Domisili</p>
                        <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                    </a>
                    <a href="{{ route('online-letter.death') }}"
                        class="bg-white w-3/4 rounded-lg shadow-xl flex items-center justify-between justify-self-end ml-auto px-3 py-3">
                        <p class="text-md text-brand-700">Surat Keterangan Kematian</p>
                        <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                    </a>
                    <a href="{{ route('online-letter.incapacity') }}"
                        class="bg-white w-3/4 rounded-lg shadow-xl flex items-center justify-between px-3 py-3">
                        <p class="text-md text-brand-700">Surat Keterangan Tidak Mampu</p>
                        <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                    </a>
                    <a href="{{ route('online-letter.birth') }}"
                        class="bg-white w-3/4 rounded-lg shadow-xl flex items-center justify-between justify-self-end ml-auto px-3 py-3">
                        <p class="text-md text-brand-700">Surat Keterangan Kelahiran</p>
                        <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                    </a>
                    <a href="{{ route('online-letter.police-clearance') }}"
                        class="bg-white w-3/4 rounded-lg shadow-xl flex items-center justify-between px-3 py-3">
                        <p class="text-md text-brand-700">Surat Pengantar SKCK</p>
                        <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                    </a>
                </div>
            </x-container.landing-container>
        </div>
    </div>
</section>
