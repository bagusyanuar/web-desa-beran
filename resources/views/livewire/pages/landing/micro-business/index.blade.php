<section id="history" data-component-id="history" class="w-full">
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
                    <p class="text-lg text-accent-500 font-bold mb-5">PRODUK UMKM DESA BERAN</p>
                    <div class="flex items-center border border-neutral-300 rounded-md w-full mb-5" wire:ignore>
                        <i data-lucide="search" class="text-neutral-500 min-h-4 min-w-4 ms-2"></i>
                        <input type="text" placeholder="search..."
                            class="flex-grow w-full py-2 ps-2 pe-3 rounded-md text-sm text-neutral-700 border-none focus:outline-none focus:ring-0" />
                    </div>
                    <div class="w-full grid grid-cols-4 gap-3 mb-5">
                        @foreach ([1, 2, 3, 4] as $v)
                            <div class="w-full h-60 bg-white border border-neutral-300 rounded-lg shadow-xl">
                            </div>
                        @endforeach
                    </div>
                    <div class="flex items-center justify-center gap-3" wire:ignore>
                        <button class="w-8 h-8 flex items-center justify-center rounded-md bg-brand-500 text-white cursor-pointer">
                            <i data-lucide="chevron-left" class="text-white h-4 w-4"></i>
                        </button>
                        <button class="w-8 h-8 flex items-center justify-center rounded-md bg-brand-500 text-white cursor-pointer">
                            <i data-lucide="chevron-right" class="text-white h-4 w-4"></i>
                        </button>
                    </div>
                </div>
                <!-- page suggestion -->
                <div class="w-80 flex flex-col gap-5">
                </div>
            </div>
        </x-container.landing-container>
    </div>
</section>
