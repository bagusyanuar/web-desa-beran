<section id="online-letter" data-component-id="online-letter" class="w-full">
    <div class="w-full h-[20rem] relative">
        <div class="w-full h-full">
            <img src="{{ asset('static/images/service/bg-service.png') }}"
                class="h-full w-full object-cover object-center" alt="main-service" />
        </div>
        <div class="w-full h-full absolute top-0 left-0 bg-white/80 flex items-center justify-center">
            <x-container.landing-container class="flex flex-col items-center gap-3">
                <h1 class="text-6xl text-accent-700 font-bold">SURAT ONLINE</h1>
                <p class="text-md text-brand-500 w-1/2 text-center">Layanan Surat Online merupakan fasilitas resmi yang
                    disediakan untuk
                    mempermudah masyarakat dalam mengurus berbagai keperluan administrasi secara digital.</p>
            </x-container.landing-container>
        </div>
    </div>
    <div class="w-full py-10">
        <x-container.landing-container class="">
            <p class="text-center text-accent-500 text-lg font-bold mb-10">
                ALUR PENGAJUAN SURAT ONLINE
            </p>
            <div class="w-full flex items-start justify-center gap-7 flex-wrap mb-10">
                <div class="w-72">
                    <div class="w-72 h-48 rounded-lg mb-5">
                        <img src="{{ asset('static/images/service-tutorial/request.png') }}"
                            class="w-full h-full object-cover object-center rounded-lg" alt="request-tutorial" />
                    </div>
                    <p class="text-brand-500 text-lg font-bold text-center mb-1">Pilih Surat</p>
                    <p class="text-neutral-700 text-center">Pilih terlebih dahulu jenis surat online yang akan di
                        ajukan</p>
                </div>
                <div class="w-72">
                    <div class="w-72 h-48 rounded-lg mb-5">
                        <img src="{{ asset('static/images/service-tutorial/form.png') }}"
                            class="w-full h-full object-cover object-center rounded-lg" alt="request-tutorial" />
                    </div>
                    <p class="text-brand-500 text-lg font-bold text-center mb-1">Isi Formulir</p>
                    <p class="text-neutral-700 text-center">Isi data diri dan beberapa lampiran persyaratan pembuatan
                        surat dengan lengkap dan benar</p>
                </div>
                <div class="w-72">
                    <div class="w-72 h-48 rounded-lg mb-5">
                        <img src="{{ asset('static/images/service-tutorial/download.png') }}"
                            class="w-full h-full object-cover object-center rounded-lg" alt="request-tutorial" />
                    </div>
                    <p class="text-brand-500 text-lg font-bold text-center mb-1">Unduh Bukti</p>
                    <p class="text-neutral-700 text-center">Unduh bukti pembuatan surat untuk melakukan monitoring
                        status surat yang telah diajukan</p>
                </div>
                <div class="w-72">
                    <div class="w-72 h-48 rounded-lg mb-5">
                        <img src="{{ asset('static/images/service-tutorial/notification.png') }}"
                            class="w-full h-full object-cover object-center rounded-lg" alt="request-tutorial" />
                    </div>
                    <p class="text-brand-500 text-lg font-bold text-center mb-1">Dapatkan Pemberitahuan</p>
                    <p class="text-neutral-700 text-center">Anda akan mendapatkan pemberitahuan melalui whatsapp apabila
                        surat yang diajukan telah selesai</p>
                </div>
                <div class="w-72">
                    <div class="w-72 h-48 rounded-lg mb-5">
                        <img src="{{ asset('static/images/service-tutorial/finish.png') }}"
                            class="w-full h-full object-cover object-center rounded-lg" alt="request-tutorial" />
                    </div>
                    <p class="text-brand-500 text-lg font-bold text-center mb-1">Ambil Surat</p>
                    <p class="text-neutral-700 text-center">Ambil surat melalui kantor desa Beran, jika surat anda telah
                        selesai di verifikasi oleh petugas</p>
                </div>
            </div>
            <p class="text-center text-accent-500 text-lg font-bold mb-10">
                LAYANAN SURAT ONLINE
            </p>
            <div class="w-2/3 justify-self-center">
                <div class="w-full flex flex-col gap-3">
                    <a href="{{ route('online-letter.domicile') }}"
                        class="bg-white rounded-lg shadow-xl w-full h-16 px-6 border border-neutral-300 flex items-center justify-between cursor-pointer">
                        <span class="text-brand-500 font-semibold text-lg">SURAT KETERANGAN DOMISILI</span>
                        <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                    </a>
                    <a href="{{ route('online-letter.death') }}"
                        class="bg-white rounded-lg shadow-xl w-full h-16 px-6 border border-neutral-300 flex items-center justify-between cursor-pointer">
                        <span class="text-brand-500 font-semibold text-lg">SURAT KETERANGAN KEMATIAN</span>
                        <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                    </a>
                    <a href="{{ route('online-letter.birth') }}"
                        class="bg-white rounded-lg shadow-xl w-full h-16 px-6 border border-neutral-300 flex items-center justify-between cursor-pointer">
                        <span class="text-brand-500 font-semibold text-lg">SURAT KETERANGAN KELAHIRAN</span>
                        <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                    </a>
                    <a href="{{ route('online-letter.police-clearance') }}"
                        class="bg-white rounded-lg shadow-xl w-full h-16 px-6 border border-neutral-300 flex items-center justify-between cursor-pointer">
                        <span class="text-brand-500 font-semibold text-lg">SURAT PENGANTAR KETERANGAN CATATAN KEPOLISIAN</span>
                        <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                    </a>
                    <a href="{{ route('online-letter.single-status') }}"
                        class="bg-white rounded-lg shadow-xl w-full h-16 px-6 border border-neutral-300 flex items-center justify-between cursor-pointer">
                        <span class="text-brand-500 font-semibold text-lg">SURAT KETERANGAN BELUM MENIKAH</span>
                        <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                    </a>
                    <a href="{{ route('online-letter.incapacity') }}"
                        class="bg-white rounded-lg shadow-xl w-full h-16 px-6 border border-neutral-300 flex items-center justify-between cursor-pointer">
                        <span class="text-brand-500 font-semibold text-lg">SURAT KETERANGAN TIDAK MAMPU</span>
                        <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
                    </a>
                </div>
            </div>
        </x-container.landing-container>
    </div>
</section>
