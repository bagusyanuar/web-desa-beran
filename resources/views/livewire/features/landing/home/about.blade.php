<section id="landing-about" data-component-id="landing-about" class="relative w-full">
    <img src="{{ asset('static/images/bg-ornament.png') }}" class="w-96 h-fit absolute top-0 right-0 scale-y-[-1]" />
    <div class="absolute bg-white/90 w-full h-full right-0 top-0"></div>
    <x-container.landing-container class="py-10">
        <div class="w-full h-[22.5rem] flex items-center gap-7">
            @if (!empty($data))
                @if ($data->image !== null)
                    <div class="h-full flex-1 relative">
                        <div class="w-full h-80 absolute top-1/2 -translate-y-1/2 rounded-lg bg-white"
                            style="box-shadow: 0px 2px 35px rgba(0,0,0,0.5)">
                            <img src="{{ $data->image }}" class="w-full h-full object-cover object-left rounded-lg" />
                        </div>
                    </div>
                @endif
                <div class="flex-1 relative">
                    <h1 class="text-[2rem] text-accent-700 font-bold mb-3">SEJARAH DESA BERAN</h1>
                    @if (!empty($data))
                        <p
                            class="text-brand-500  overflow-hidden [display:-webkit-box] [-webkit-line-clamp:9] [-webkit-box-orient:vertical]">
                            {{ strip_tags($data->description) }}
                        </p>
                    @else
                        <p
                            class="text-brand-500  overflow-hidden [display:-webkit-box] [-webkit-line-clamp:9] [-webkit-box-orient:vertical]">
                            Tidak Ada Konten
                        </p>
                    @endif
                    <a href="{{ route('history') }}" class="text-md text-accent-500 flex items-center gap-3 mt-5">
                        <span>Lihat Selengkapnya</span>
                        <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                    </a>
                </div>
            @else
                <div class="flex-1">
                    <h1 class="text-[2rem] text-accent-700 font-bold mb-3">SEJARAH DESA BERAN</h1>
                    <p
                        class="text-brand-500  overflow-hidden [display:-webkit-box] [-webkit-line-clamp:9] [-webkit-box-orient:vertical]">
                        Tidak Ada Konten
                    </p>
                    <a href="{{ route('history') }}" class="text-md text-accent-500 flex items-center gap-3 mt-5">
                        <span>Lihat Selengkapnya</span>
                        <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                    </a>
                </div>
            @endif
        </div>
    </x-container.landing-container>
</section>
