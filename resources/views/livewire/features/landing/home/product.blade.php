<section id="landing-product" data-component-id="landing-product">
    <div class="w-full h-[35rem] relative">
        <div class="w-full h-[35rem]">
            <img src="{{ asset('static/images/bg-product.jpg') }}" class="h-[35rem] w-full object-cover object-top"
                alt="main-service" />
        </div>
        <div class="w-full h-[35rem] absolute top-0 left-0 bg-white/80 flex items-center justify-center">
            <x-container.landing-container class="flex items-center gap-7">
                <div class="w-full">
                    <h1 class="text-[3rem] text-accent-700 font-bold text-center">PRODUK UMKM</h1>
                    <p class="text-md text-brand-500 mb-7 text-center">Produk UMKM Desa kami lahir dari tangan-tangan
                        terampil
                        masyarakat lokal. Setiap karya mengandung cerita, tradisi, dan kearifan yang diwariskan
                        turun-temurun. Dengan bahan alami pilihan dan proses yang penuh ketelitian, kami
                        menghadirkan produk yang bukan hanya bernilai guna, tapi juga bernilai rasa dan budaya.</p>

                    <div class="w-full flex gap-3 mb-5" wire:ignore>
                        <x-slick.carousel slideToShow="3" speed="2000" mode="width">
                            @foreach ([1, 2, 3, 4, 5] as $v)
                                <x-slick.card-product image="/static/images/products/product-1.jpg"
                                    title="Srundeng Enak" owner="Bp. Widyan Rahmat"
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
        </div>
    </div>
</section>


@push('scripts')
    @vite(['resources/js/util/slick.js'])
@endpush
