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
                    <p class="text-md text-brand-500 mb-5">Pemerintah Desa Beran menghadirkan layanan Surat Online
                        sebagai bentuk inovasi dalam meningkatkan mutu pelayanan administrasi kepada masyarakat. Melalui
                        layanan ini, warga dapat mengajukan berbagai surat keterangan secara digital tanpa harus datang
                        langsung ke kantor desa. Proses pengajuan dilakukan dengan cepat, mudah, dan transparan,
                        sehingga memberikan kemudahan bagi masyarakat dalam memperoleh pelayanan publik yang efektif dan
                        efisien. Layanan ini juga menjadi wujud komitmen Pemerintah Desa Beran dalam mewujudkan tata
                        kelola pemerintahan yang modern dan berorientasi pada kepuasan masyarakat.</p>
                    <a href="{{ route('online-letter') }}" class="text-md text-brand-500 flex items-center gap-3">
                        <span>Lihat Selengkapnya</span>
                        <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                    </a>
                </div>
                <div class="flex-1 flex items-center justify-center" wire:ignore>
                    <div class="w-[30rem] h-[26rem] relative">
                        <div class="w-[30rem] h-[26rem]" x-bind="slickOnlineLetterBind">
                            <div class="w-[24rem] h-[24rem] relative my-6 mx-12">
                                <div class="w-60 h-80 rounded-md absolute top-0 right-0 bg-white flex flex-col items-center justify-center px-6"
                                    style="box-shadow: 10px 5px 15px rgba(0,0,0,0.5)">
                                    <p class="text-sm font-bold text-brand-500 text-center mb-3">PEMERENITAH DESA NGAWI
                                    </p>
                                    <img src="{{ asset('static/images/institution-logo.png') }}"
                                        class="h-16 w-fit mb-3" />
                                    <p class="text-sm font-bold text-brand-500 text-center">SURAT KETERANGAN DOMISILI
                                    </p>
                                </div>
                                <div class="w-60 h-80 rounded-md absolute bottom-0 left-0 bg-white flex flex-col items-center justify-start"
                                    style="box-shadow: 10px 5px 25px rgba(0,0,0,0.5)">
                                    <img src="{{ asset('static/images/sample/domicile-sample.png') }}"
                                        class="w-full h-fit mb-3 rounded-md object-cover" />
                                </div>
                            </div>
                            <div class="w-[24rem] h-[24rem] relative my-6 mx-12">
                                <div class="w-60 h-80 rounded-md absolute top-0 right-0 bg-white flex flex-col items-center justify-center px-6"
                                    style="box-shadow: 10px 5px 15px rgba(0,0,0,0.5)">
                                    <p class="text-sm font-bold text-brand-500 text-center mb-3">PEMERENITAH DESA NGAWI
                                    </p>
                                    <img src="{{ asset('static/images/institution-logo.png') }}"
                                        class="h-16 w-fit mb-3" />
                                    <p class="text-sm font-bold text-brand-500 text-center">SURAT KETERANGAN DOMISILI
                                    </p>
                                </div>
                                <div class="w-60 h-80 rounded-md absolute bottom-0 left-0 bg-white flex flex-col items-center justify-start"
                                    style="box-shadow: 10px 5px 25px rgba(0,0,0,0.5)">
                                    <img src="{{ asset('static/images/sample/domicile-sample.png') }}"
                                        class="w-full h-fit mb-3 rounded-md object-cover" />
                                </div>
                            </div>
                        </div>
                        <button
                            class="ol-prev-btn h-10 w-10 text-white rounded-full bg-accent-400 border border-white absolute left-6 top-1/2 -translate-y-1/2 flex items-center justify-center hover:bg-accent-500 transition-all ease-in-out duration-200">
                            <i data-lucide="chevron-left" class="h-4 aspect-[1/1]"></i>
                        </button>
                        <button
                            class="ol-next-btn h-10 w-10 text-white rounded-full bg-accent-400 border border-white absolute right-6 top-1/2 -translate-y-1/2 flex items-center justify-center hover:bg-accent-500 transition-all ease-in-out duration-200">
                            <i data-lucide="chevron-right" class="h-4 aspect-[1/1]"></i>
                        </button>
                    </div>
                </div>
            </x-container.landing-container>
        </div>
    </div>
</section>
