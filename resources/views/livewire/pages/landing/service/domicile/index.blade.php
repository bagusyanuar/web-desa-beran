<section id="section-service-domicile" data-component-id="service-domicile" class="w-full">
    <div class="w-full h-72 relative">
        <img src="{{ asset('static/images/hero/slide-1.png') }}" class="h-full w-full object-cover" alt="bg-hero" />
        <div
            class="absolute h-full w-full top-0 left-0 bg-gradient-to-b from-brand-600/90 to-brand-600/70 backdrop-blur-[3px] flex items-center justify-center">
            <x-container.landing-container>
                <h1 class="text-[36px] font-bold text-white">SURAT KETERANGAN DOMISILI</h1>
                <p class="text-white">Halaman Pengajuan Surat Keterangan Domisili</p>
            </x-container.landing-container>
        </div>
    </div>
    <div class="w-full min-h-[40rem] relative">
        <img src="{{ asset('static/images/bg-ornament.png') }}" class="w-72 h-72 absolute top-5 left-5 rotate-180" />
        <img src="{{ asset('static/images/bg-ornament.png') }}" class="w-72 h-72 absolute bottom-5 right-5" />
        <div class="absolute top-0 left-0 w-full h-full bg-white/80">
        </div>
        <x-container.landing-container class="py-7 relative">
            <div x-data x-init="$el.classList.remove('opacity-0', 'translate-x-10')"
                class="w-full grid grid-cols-3 gap-5 items-start opacity-0 translate-x-10 transition-all transform duration-700 delay-300">
                <div class="w-full col-span-2 bg-white shadow-xl rounded-2xl border border-neutral-300 p-7">
                    <p class="text-xl font-bold text-neutral-700">Form Pengajuan Surat Keterangan Domisili</p>
                    <div class="border-b border-neutral-300 w-full my-5"></div>
                    <div class="grid grid-cols-2 gap-5 mb-5">
                        <x-input.text.text :required="true" label="Nama" labelClassName="font-semibold"
                            parentClassName="w-full" />
                        <x-input.text.text :required="true" label="NIK (Nomor Induk Kependudukan)"
                            labelClassName="font-semibold" parentClassName="w-full" />
                    </div>
                    <div class="grid grid-cols-2 gap-5 mb-5">
                        <x-input.text.text :required="true" label="Tempat Lahir" parentClassName="w-full"
                            labelClassName="font-semibold" />
                        <x-input.date.datepicker :required="true" label="Tanggal Lahir" parentClassName="w-full"
                            labelClassName="font-semibold" store="SERVICE_DOMICILE_STORE" dispatcher=""
                            x-model="$store.SERVICE_DOMICILE_STORE.dateOfBirth" />
                    </div>
                    <div class="grid grid-cols-2 gap-5 mb-5">
                        <x-select.select :options="$gender" :required="true" label="Jenis Kelamin"
                            parentClassName="w-full" labelClassName="font-semibold" />
                        <x-select.select :options="$citizenship" :required="true" label="Kewarganegaraan"
                            parentClassName="w-full" labelClassName="font-semibold" />
                    </div>
                    <div class="grid grid-cols-2 gap-5 mb-5">
                        <x-select.select :options="$religion" :required="true" label="Agama" parentClassName="w-full"
                            labelClassName="font-semibold" />
                        <x-select.select :options="$marriage" :required="true" label="Status Perkawinan"
                            parentClassName="w-full" labelClassName="font-semibold" />
                    </div>
                    <div class="grid grid-cols-1 gap-5 mb-5">
                        <x-input.text.text label="Pekerjaan" parentClassName="w-full" labelClassName="font-semibold" />
                    </div>
                    <div class="grid grid-cols-1 gap-5 mb-5">
                        <x-input.text.textarea :required="true" label="Alamat" parentClassName="w-full"
                            labelClassName="font-semibold" rows="5" />
                    </div>
                    <div class="border-b border-neutral-300 w-full my-5"></div>

                </div>
                <div class="bg-white shadow-xl rounded-2xl border border-neutral-300 p-7">
                    <!-- informasi pemohon -->
                    <p class="text-xl font-bold text-neutral-700">Informasi Pemohon</p>
                    <div class="border-b border-neutral-300 w-full my-5"></div>
                    <x-input.text.text :required="true" label="Nama" parentClassName="w-full mb-5"
                        labelClassName="font-semibold" />
                    <x-input.text.text :required="true" label="No. Whatsapp" parentClassName="w-full mb-5"
                        labelClassName="font-semibold" />
                    <x-captcha.recaptcha store="SERVICE_DOMICILE_STORE" stateData="captchaToken" />
                    <div class="border-b border-neutral-300 w-full my-5"></div>
                    <div class="flex items-center justify-end gap-3">
                        <button
                            class="cursor-pointer text-sm rounded py-[0.5rem] px-[0.5rem] text-brand-500 bg-white hover:bg-neutral-100 transition-all duration-300 ease-in">
                            <span class="font-semibold">Pratinjau</span>
                        </button>
                        <x-button.button x-on:click="$store.SERVICE_DOMICILE_STORE.send()">
                            <span>Kirim</span>
                        </x-button.button>
                    </div>
                </div>
            </div>

        </x-container.landing-container>
    </div>
</section>

@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js?render=explicit" async defer></script>
    @vite(['resources/js/util/index.js', 'resources/js/landing/service/certificate-domicile.js'])
@endpush
