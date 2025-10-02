<section id="history" data-component-id="history" class="w-full">
    <div class="w-full h-[20rem] relative">
        <div class="w-full h-full">
            <img src="{{ asset('static/images/service/bg-service.png') }}"
                class="h-full w-full object-cover object-center" alt="main-service" />
        </div>
        <div class="w-full h-full absolute top-0 left-0 bg-white/80 flex items-center justify-center">
            <x-container.landing-container class="flex flex-col items-center gap-3">
                <h1 class="text-4xl text-accent-700 font-bold text-center">SEJARAH DESA BERAN</h1>
                <p class="text-md text-brand-500 w-1/2 text-center">Sejarah desa bukan hanya catatan masa lalu,
                    melainkan cerminan dari identitas masyarakat yang hidup di dalamnya. Dari awal berdirinya hingga
                    perkembangan sekarang, desa tumbuh bersama dengan budaya, kearifan lokal, serta nilai gotong royong
                    yang tetap terjaga</p>
            </x-container.landing-container>
        </div>
    </div>
    <div class="w-full py-10">
        <x-container.landing-container class="">
            <div class="w-full flex items-start gap-5">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-6 border border-neutral-300">
                    <p class="text-lg text-accent-500 font-bold mb-5">SEJARAH DESA BERAN</p>
                    @if ($data->image !== null)
                        <div class="w-full rounded-lg bg-blue-600 mb-5">
                            <img src="{{ $data->image }}" class="w-full h-96 rounded-lg object-cover" />
                        </div>
                    @endif
                    <div class="w-full text-neutral-700 text-sm">
                        {!! $data->description !!}
                    </div>
                </div>
                <!-- page suggestion -->
                <div class="w-80 flex flex-col gap-5">
                    <div class="w-full rounded-lg shadow-xl border border-neutral-300">
                        <div class="w-full rounded-t-lg h-10 px-3 flex items-center justify-between bg-accent-500">
                            <p class="text-sm text-white font-bold">Layanan Surat Online</p>
                            <a href="{{ route('online-letter') }}" class="text-white">
                                <i data-lucide="arrow-right" class="h-3 aspect-[1/1]"></i>
                            </a>
                        </div>
                        <div class="w-full rounded-b-lg px-3 py-1 flex flex-col">
                            <a href="{{ route('online-letter.domicile') }}" class="py-2 text-neutral-700 flex items-center justify-between border-b border-neutral-300 last:border-b-0">
                                <span class="text-xs font-semibold">SURAT DOMISILI</span>
                                <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                            </a>
                            <a href="{{ route('online-letter.police-clearance') }}" class="py-2 text-neutral-700 flex items-center justify-between border-b border-neutral-300 last:border-b-0">
                                <span class="text-xs font-semibold">PENGANTAR SKCK</span>
                                <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                            </a>
                            <a href="{{ route('online-letter.incapacity') }}" class="py-2 text-neutral-700 flex items-center justify-between border-b border-neutral-300 last:border-b-0">
                                <span class="text-xs font-semibold">KETERANGAN TIDAK MAMPU</span>
                                <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                            </a>
                            <a href="{{ route('online-letter.death') }}" class="py-2 text-neutral-700 flex items-center justify-between border-b border-neutral-300 last:border-b-0">
                                <span class="text-xs font-semibold">KETERANGAN KEMATIAN</span>
                                <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                            </a>
                            <a href="{{ route('online-letter.birth') }}" class="py-2 text-neutral-700 flex items-center justify-between border-b border-neutral-300 last:border-b-0">
                                <span class="text-xs font-semibold">KETERANGAN KELAHIRAN</span>
                                <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                            </a>
                        </div>
                    </div>
                    <div class="w-full rounded-lg shadow-xl border border-neutral-300">
                        <div class="w-full rounded-t-lg h-10 px-3 flex items-center bg-accent-500">
                            <p class="text-sm text-white font-bold">Berita Terkini</p>
                        </div>
                        <div class="w-full rounded-b-lg p-3">
                        </div>
                    </div>
                </div>
            </div>
        </x-container.landing-container>
    </div>
</section>
