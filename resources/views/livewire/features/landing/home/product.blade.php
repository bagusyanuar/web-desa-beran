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
                    <p class="text-md text-brand-500 mb-5 text-center">Produk UMKM Desa kami lahir dari tangan-tangan
                        terampil
                        masyarakat lokal. Setiap karya mengandung cerita, tradisi, dan kearifan yang diwariskan
                        turun-temurun. Dengan bahan alami pilihan dan proses yang penuh ketelitian, kami
                        menghadirkan produk yang bukan hanya bernilai guna, tapi juga bernilai rasa dan budaya.</p>
                    {{-- <a href="#" class="text-md text-brand-500 flex items-center gap-3">
                        <span>Lihat Selengkapnya</span>
                        <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                    </a> --}}
                    <div class="w-full flex gap-3" wire:ignore>
                        <x-slick.carousel slideToShow="3" mode="width">
                            <div class="px-3 w-48">
                                <div class="bg-white shadow-xl h-64">
                                </div>
                            </div>
                            <div class="px-3 w-48">
                                <div class="bg-white shadow-xl h-64">
                                </div>
                            </div>
                            <div class="px-3 w-48">
                                <div class="bg-white shadow-xl h-64">
                                </div>
                            </div>
                            <div class="px-3 w-48">
                                <div class="bg-white shadow-xl h-64">
                                </div>
                            </div>
                            <div class="px-3 w-48">
                                <div class="bg-white shadow-xl h-64">
                                </div>
                            </div>
                            <div class="">
                                <div class="bg-white shadow-xl h-64">
                                </div>
                            </div>

                        </x-slick.carousel>
                    </div>
                </div>
                {{-- <div class="flex-1 flex flex-col gap-5">
                    <div
                        class="bg-white w-3/4 h-32 rounded-lg shadow-xl flex items-start gap-3 p-1 cursor-pointer hover:shadow-2xl hover:translate-x-2 transition-all duration-300 ease-in">
                        <div class="h-full w-1/3 rounded-lg">
                            <img src="{{ asset('/static/images/products/product-1.jpg') }}"
                                class="rounded-lg w-full h-full object-cover object-center" />
                        </div>
                        <div class="flex-1 h-full flex flex-col">
                            <p class="text-md text-brand-500 font-bold">Srundeng Enak</p>
                            <p class="text-xs text-neutral-700 mb-1">Bp. Widyan Rahmat</p>
                            <div class="flex-1">
                                <p
                                    class="text-xs text-neutral-700 overflow-hidden [display:-webkit-box] [-webkit-line-clamp:3] [-webkit-box-orient:vertical]">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been
                                    the industry's standard dummy text ever since the 1500s, when an unknown printer
                                    took a galley
                                    of type and scrambled it to make a type specimen book. It has survived not only
                                    five centuries,
                                    but also the leap into electronic typesetting, remaining essentially unchanged.
                                </p>
                            </div>
                            <div class="flex items-center">
                                <div
                                    class="rounded-md h-6 w-6 text-neutral-500 flex items-center justify-center cursor-pointer hover:bg-neutral-300">
                                    <i data-lucide="share-2" class="h-4 aspect-[1/1]"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-white w-3/4 h-32 rounded-lg shadow-xl flex items-start gap-3 p-1 ml-auto cursor-pointer hover:shadow-2xl hover:-translate-x-2 transition-all duration-300 ease-in">
                        <div class="h-full w-1/3 rounded-lg">
                            <img src="{{ asset('/static/images/products/product-2.jpeg') }}"
                                class="rounded-lg w-full h-full object-cover object-center" />
                        </div>
                        <div class="flex-1 h-full flex flex-col">
                            <p class="text-md text-brand-500 font-bold">Kripik Singkong</p>
                            <p class="text-xs text-neutral-700 mb-1">Bp. Pradana</p>
                            <div class="flex-1">
                                <p
                                    class="text-xs text-neutral-700 overflow-hidden [display:-webkit-box] [-webkit-line-clamp:3] [-webkit-box-orient:vertical]">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been
                                    the industry's standard dummy text ever since the 1500s, when an unknown printer
                                    took a galley
                                    of type and scrambled it to make a type specimen book. It has survived not only
                                    five centuries,
                                    but also the leap into electronic typesetting, remaining essentially unchanged.
                                </p>
                            </div>
                            <div class="flex items-center">
                                <div
                                    class="rounded-md h-6 w-6 text-neutral-500 flex items-center justify-center cursor-pointer hover:bg-neutral-300">
                                    <i data-lucide="share-2" class="h-4 aspect-[1/1]"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-white w-3/4 h-32 rounded-lg shadow-xl flex items-start gap-3 p-1 cursor-pointer hover:shadow-2xl hover:translate-x-2 transition-all duration-300 ease-in">
                        <div class="h-full w-1/3 rounded-lg">
                            <img src="{{ asset('/static/images/products/product-3.jpg') }}"
                                class="rounded-lg w-full h-full object-cover object-center" />
                        </div>
                        <div class="flex-1 h-full flex flex-col">
                            <p class="text-md text-brand-500 font-bold">Wingko Babat</p>
                            <p class="text-xs text-neutral-700 mb-1">Bp. Joni</p>
                            <div class="flex-1">
                                <p
                                    class="text-xs text-neutral-700 overflow-hidden [display:-webkit-box] [-webkit-line-clamp:3] [-webkit-box-orient:vertical]">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been
                                    the industry's standard dummy text ever since the 1500s, when an unknown printer
                                    took a galley
                                    of type and scrambled it to make a type specimen book. It has survived not only
                                    five centuries,
                                    but also the leap into electronic typesetting, remaining essentially unchanged.
                                </p>
                            </div>
                            <div class="flex items-center">
                                <div
                                    class="rounded-md h-6 w-6 text-neutral-500 flex items-center justify-center cursor-pointer hover:bg-neutral-300">
                                    <i data-lucide="share-2" class="h-4 aspect-[1/1]"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </x-container.landing-container>
        </div>
    </div>
</section>


@push('scripts')
    @vite(['resources/js/util/index.js'])
@endpush
