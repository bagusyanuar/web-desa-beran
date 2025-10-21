<section id="landing-news" data-component-id="landing-news" class="w-full relative">
    <img src="{{ asset('static/images/bg-ornament.png') }}" class="w-96 h-fit absolute top-0 right-0 scale-y-[-1]" />
    <div class="absolute bg-white/90 w-full h-full right-0 top-0"></div>
    <x-container.landing-container class="py-10 relative">
        <div class="w-full flex items-start gap-7">
            <div class="w-3/5 h-[22rem] relative flex items-start gap-3" wire:ignore>
                <div x-bind="slickNewsBind" class="w-full h-[20rem] news-slider">
                    @foreach ($data as $v)
                        <div wire:click="toDetail('{{ $v->slug }}')"
                            class="w-[28rem] h-[20rem] bg-white rounded-md cursor-pointer relative my-6 mx-3">
                            <img src="{{ asset($v->thumbnail->image) }}"
                                class="w-full h-[20rem] object-cover object-center rounded-md" />
                            <div
                                class="absolute top-0 left-0 w-full h-full bg-black/50 rounded-md flex items-center justify-center">
                                <p class="text-center text-lg uppercase text-white font-bold">{{ $v->title }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button
                    class="ol-prev-btn h-10 w-10 text-white rounded-full bg-accent-400 border border-white absolute left-0 top-1/2 -translate-y-1/2 -translate-x-1/2 flex items-center justify-center hover:bg-accent-500 hover:shadow-xl transition-all ease-in-out duration-300">
                    <i data-lucide="chevron-left" class="h-4 aspect-[1/1]"></i>
                </button>
                <button
                    class="ol-next-btn h-10 w-10 text-white rounded-full bg-accent-400 border border-white absolute right-0 top-1/2 -translate-y-1/2  translate-x-1/2 flex items-center justify-center hover:bg-accent-500 hover:shadow-xl transition-all ease-in-out duration-300">
                    <i data-lucide="chevron-right" class="h-4 aspect-[1/1]"></i>
                </button>
            </div>
            <div class="w-2/5">
                <h1 class="text-[3rem] text-accent-700 font-bold text-start">BERITA TERKINI</h1>
                <p class="text-md text-brand-500 mb-7 text-start">Informasi terbaru seputar kegiatan masyarakat,
                    pembangunan,
                    kebijakan desa, serta peristiwa penting lainnya yang disajikan secara transparan dan aktual. Setiap
                    berita hadir untuk memberikan wawasan yang lebih luas, mempererat hubungan antarwarga, serta
                    mendorong tumbuhnya keterbukaan, partisipasi, dan rasa memiliki terhadap kemajuan desa.</p>
                <a href="{{ route('news') }}" class="text-md text-accent-500 flex items-center gap-3 mt-5">
                    <span>Lihat Selengkapnya</span>
                    <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                </a>
            </div>
        </div>
    </x-container.landing-container>
</section>
