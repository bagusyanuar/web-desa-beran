<section id="landing-product" data-component-id="landing-product">
    <div class="w-full h-[32rem] relative">
        <div class="w-full h-[32rem]">
            <img src="{{ asset('static/images/bg-product.jpg') }}" class="h-[32rem] w-full object-cover object-top"
                alt="main-service" />
        </div>
        <div class="w-full h-[32rem] absolute top-0 left-0 bg-white/80 flex items-center justify-center">
            <x-container.landing-container class="flex items-start gap-5">
                <div class="w-2/5">
                    <h1 class="text-[3rem] text-accent-700 font-bold text-start">PRODUK UMKM</h1>
                    <p class="text-md text-brand-500 mb-7 text-start">Produk UMKM Desa kami lahir dari tangan-tangan
                        terampil
                        masyarakat lokal. Setiap karya mengandung cerita, tradisi, dan kearifan yang diwariskan
                        turun-temurun. Dengan bahan alami pilihan dan proses yang penuh ketelitian, kami
                        menghadirkan produk yang bukan hanya bernilai guna, tapi juga bernilai rasa dan budaya.</p>
                    <a href="{{ route('micro-business') }}" class="text-md text-brand-500 flex items-center gap-3">
                        <span>Lihat Selengkapnya</span>
                        <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                    </a>
                </div>
                <div class="w-3/5 h-80 relative" wire:ignore>
                    <div class="w-full h-80" x-bind="slickProductBind">
                        @foreach ($data as $v)
                            <div wire:click="toDetail('{{ $v->slug }}')"
                                class="w-[17rem] h-72 bg-white rounded-md my-6 mx-3 cursor-pointer relative group"
                                style="box-shadow: 10px 5px 15px rgba(0,0,0,0.5)">
                                <img src="{{ asset($v->image->image) }}"
                                    class="w-[17rem] h-72 rounded-md object-center object-cover" />
                                <div
                                    class="w-full rounded-md flex flex-col items-center justify-center p-4 bg-black/50 absolute bottom-0 left-0 opacity-0 h-0 group-hover:h-72 group-hover:opacity-100 transition-all duration-500">
                                    <p
                                        class="text-lg mb-3 font-bold text-center text-white uppercase overflow-hidden [display:-webkit-box] [-webkit-line-clamp:3] [-webkit-box-orient:vertical]">
                                        {{ $v->title }}</p>

                                    <div class="w-20 h-20 rounded-full mb-3">
                                        <img src="{{ asset($v->owner->image) }}"
                                            class="w-20 h-20 rounded-full border-2 border-white object-cover object-center" />
                                    </div>
                                    <p class="text-sm text-center text-white">{{ $v->owner->name }}</p>
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
            </x-container.landing-container>
        </div>
    </div>
</section>

{{-- <div class="w-full flex gap-3 mb-5" wire:ignore>
                        <x-slick.carousel slideToShow="3" speed="2000" mode="width">
                            @foreach ($data as $v)
                                <x-slick.card-product image="{{ $v->image->image }}"
                                    title="{{ $v->title }}" owner="{{ $v->owner->name }}"
                                    description="{{ strip_tags($v->description) }}" wire:click="toDetail('{{ $v->slug }}')" />
                            @endforeach
                        </x-slick.carousel>
                    </div>
                    <div class="flex items-center justify-center">
                        <a href="{{ route('micro-business') }}" class="text-md text-brand-500 flex items-center gap-3">
                            <span>Lihat Selengkapnya</span>
                            <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                        </a>
                    </div> --}}
