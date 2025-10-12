<section id="micro-business-detail" data-component-id="micro-business-detail" class="w-full">
    <div class="w-full h-[20rem] relative">
        <div class="w-full h-full">
            <img src="{{ asset('static/images/bg-product.jpg') }}" class="h-full w-full object-cover object-center"
                alt="main-service" />
        </div>
        <div class="w-full h-full absolute top-0 left-0 bg-white/80 flex items-center justify-center">
            <x-container.landing-container class="flex flex-col items-center gap-3">
                <h1 class="text-4xl text-accent-700 font-bold text-center">PRODUK UMKM</h1>
                <p class="text-md text-brand-500 w-1/2 text-center">Produk UMKM Desa kami lahir dari tangan-tangan
                    terampil
                    masyarakat lokal. Setiap karya mengandung cerita, tradisi, dan kearifan yang diwariskan
                    turun-temurun. Dengan bahan alami pilihan dan proses yang penuh ketelitian, kami
                    menghadirkan produk yang bukan hanya bernilai guna, tapi juga bernilai rasa dan budaya.</p>
            </x-container.landing-container>
        </div>
    </div>
    <div class="w-full py-10">
        <x-container.landing-container class="">
            <div class="w-full flex items-start gap-5">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-6 border border-neutral-300">
                    @if (!empty($data))
                        <p class="text-lg text-accent-500 font-bold mb-3">{{ $data->title }}</p>
                        <div class="w-full flex items-center gap-3 mb-7">
                            <div class="w-14 h-14 rounded-full">
                                <img src="{{ $data->owner->image }}" alt="owner-image"
                                    class="w-full h-14 rounded-full object-cover" />
                            </div>
                            <div class="flex flex-col">
                                <p class="text-neutral-700 text-xs font-semibold">{{ $data->owner->name }}</p>
                                <p class="text-xs text-neutral-500">{{ $data->contact->value }}</p>
                            </div>
                        </div>
                        @if (!empty($data->image))
                            <div class="w-full rounded-lg mb-5">
                                <img src="{{ $data->image->image }}" alt="product-thumbnail"
                                    class="w-full h-96 rounded-lg object-cover" />
                            </div>
                        @endif
                        <div class="w-full border-b border-neutral-300 my-5">
                        </div>
                        <div class="w-full text-neutral-700 text-sm">
                            {!! $data->description !!}
                        </div>
                    @else
                    @endif

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
                            <a href="{{ route('online-letter.domicile') }}"
                                class="py-2 text-neutral-700 flex items-center justify-between border-b border-neutral-300 last:border-b-0">
                                <span class="text-xs font-semibold">SURAT DOMISILI</span>
                                <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                            </a>
                            <a href="{{ route('online-letter.police-clearance') }}"
                                class="py-2 text-neutral-700 flex items-center justify-between border-b border-neutral-300 last:border-b-0">
                                <span class="text-xs font-semibold">PENGANTAR SKCK</span>
                                <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                            </a>
                            <a href="{{ route('online-letter.incapacity') }}"
                                class="py-2 text-neutral-700 flex items-center justify-between border-b border-neutral-300 last:border-b-0">
                                <span class="text-xs font-semibold">KETERANGAN TIDAK MAMPU</span>
                                <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                            </a>
                            <a href="{{ route('online-letter.death') }}"
                                class="py-2 text-neutral-700 flex items-center justify-between border-b border-neutral-300 last:border-b-0">
                                <span class="text-xs font-semibold">KETERANGAN KEMATIAN</span>
                                <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                            </a>
                            <a href="{{ route('online-letter.birth') }}"
                                class="py-2 text-neutral-700 flex items-center justify-between border-b border-neutral-300 last:border-b-0">
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
