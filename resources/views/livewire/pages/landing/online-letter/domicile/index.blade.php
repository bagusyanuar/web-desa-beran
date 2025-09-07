<section id="online-letter-domicile" data-component-id="online-letter-domicile" class="w-full">
    <div class="w-full h-[20rem] relative">
        <div class="w-full h-full">
            <img src="{{ asset('static/images/service/bg-service.png') }}"
                class="h-full w-full object-cover object-center" alt="main-service" />
        </div>
        <div class="w-full h-full absolute top-0 left-0 bg-white/80 flex items-center justify-center">
            <x-container.landing-container class="flex flex-col items-center gap-3">
                <h1 class="text-4xl text-accent-700 font-bold">SURAT KETERANGAN DOMISILI</h1>
                <p class="text-md text-brand-500 w-1/2 text-center">Dokumen resmi dari kelurahan atau desa yang
                    menerangkan dan membuktikan alamat tempat tinggal seseorang atau badan hukum</p>
            </x-container.landing-container>
        </div>
    </div>
    <div class="w-full py-10">
        <x-container.landing-container class="">
            <p class="text-center text-accent-500 text-lg font-bold mb-10">
                FORMULIR SURAT KETERANGAN DOMISILI PENDUDUK DESA BERAN
            </p>
            <div class="w-5/6 justify-self-center bg-white rounded-xl shadow-xl p-6 border border-neutral-300">
                <div class="w-full">
                    <p class="text-md font-bold text-neutral-700 mb-5">A. Data Diri</p>
                    <div class="w-full grid grid-cols-2 gap-x-7 gap-y-7">
                        <div class="w-full">
                            <x-label.label for="name">
                                <span>Nama Lengkap</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.text.text id="name" x-model="$store.SERVICE_DOMICILE_STORE.form.name" />
                            <x-label.validator>
                                <span>kolom nama wajib diisi.</span>
                            </x-label.validator>
                        </div>
                        <div class="w-full">
                            <x-label.label for="nik">
                                <span>NIK (Nomor Induk Kependudukan)</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.text.text id="nik" x-model="$store.SERVICE_DOMICILE_STORE.form.nik" />
                            <x-label.validator>
                                <span>kolom nik wajib diisi.</span>
                            </x-label.validator>
                        </div>
                        <div class="w-full">
                            <x-label.label for="birth-place">
                                <span>Tempat Lahir</span>
                                <span class="text-red-500 text-sm italic">* <span class="text-xs">(Nama kota /
                                        kabupaten)</span></span>
                            </x-label.label>
                            <x-input.text.text id="birth-place"
                                x-model="$store.SERVICE_DOMICILE_STORE.form.birthPlace" />
                            <x-label.validator>
                                <span>kolom tempat lahir wajib diisi.</span>
                            </x-label.validator>
                        </div>
                        <div class="w-full">
                            <x-label.label for="date-of-birth">
                                <span>Tanggal Lahir</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.date.datepicker id="date-of-birth" x-bind:store-name="'SERVICE_DOMICILE_STORE'"
                                x-model="$store.SERVICE_DOMICILE_STORE.form.dateOfBirth" />
                        </div>
                        <div class="w-full">
                            <label for="gender" class="text-sm text-neutral-700 block mb-1">
                                <span>Jenis Kelamin</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </label>
                            <x-select.select2 id="gender" x-init="initSelect({ placeholder: 'pilih jenis kelamin' })"
                                x-model="$store.SERVICE_DOMICILE_STORE.form.gender">
                                <option></option>
                                <option value="male">Laki-Laki</option>
                                <option value="female">Perempuan</option>
                            </x-select.select2>
                        </div>
                        <div class="w-full">
                            <label for="citizenship" class="text-sm text-neutral-700 block mb-1">
                                <span>Kewarganegaraan</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </label>
                            <x-select.select2 id="citizenship" x-init="initSelect({ placeholder: 'pilih kewarganegaraan' })"
                                x-model="$store.SERVICE_DOMICILE_STORE.form.citizenship">
                                <option></option>
                                <option value="indonesia">Indonesia</option>
                                <option value="foreign">Warga Negara Asing</option>
                            </x-select.select2>
                        </div>
                        <div class="w-full">
                            <label for="religion" class="text-sm text-neutral-700 block mb-1">
                                <span>Agama</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </label>
                            <x-select.select2 id="religion" x-init="initSelect({ placeholder: 'pilih agama' })"
                                x-model="$store.SERVICE_DOMICILE_STORE.form.religion">
                                <option></option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katholik">Katholik</option>
                                <option value="hindu">Hindu</option>
                                <option value="budha">Budha</option>
                                <option value="konghucu">Konghucu</option>
                                <option value="other">Lainnya</option>
                            </x-select.select2>
                        </div>
                        <div class="w-full">
                            <label for="marriage" class="text-sm text-neutral-700 block mb-1">
                                <span>Status Perkawinan</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </label>
                            <x-select.select2 id="marriage" x-init="initSelect({ placeholder: 'pilih status perkawinan' })"
                                x-model="$store.SERVICE_DOMICILE_STORE.form.marriage">
                                <option></option>
                                <option value="married" class="py-1.5">Menikah</option>
                                <option value="not-married" class="py-1.5">Belum Menikah</option>
                            </x-select.select2>
                        </div>
                        <div class="w-full col-span-2">
                            <x-label.label for="job">
                                <span>Pekerjaan</span>
                            </x-label.label>
                            <x-input.text.text id="job" x-model="$store.SERVICE_DOMICILE_STORE.form.job" />
                        </div>
                        <div class="w-full col-span-2">
                            <x-label.label for="address">
                                <span>Alamat</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.text.textarea id="address" rows="3"
                                x-model="$store.SERVICE_DOMICILE_STORE.form.address" />
                        </div>
                    </div>
                    <p class="text-md font-bold text-neutral-700 mb-5 mt-10">B. Informasi Pemohon</p>
                    <div class="w-full grid grid-cols-2 gap-x-7 gap-y-7 mb-10">
                        <div class="w-full">
                            <x-label.label for="applicant_name">
                                <span>Nama Lengkap Pemohon</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.text.text id="applicant_name"
                                x-model="$store.SERVICE_DOMICILE_STORE.form.applicatName" />
                            <x-label.validator>
                                <span>kolom nama pemohon wajib diisi.</span>
                            </x-label.validator>
                        </div>
                        <div class="w-full">
                            <x-label.label for="applicant_phone">
                                <span>No. Whatsapp Pemohon</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.text.text id="applicant_name"
                                x-model="$store.SERVICE_DOMICILE_STORE.form.applicantPhone" />
                            <x-label.validator>
                                <span>kolom no. whatsapp pemohon wajib diisi.</span>
                            </x-label.validator>
                        </div>
                        <div class="w-full col-span-2 flex justify-center items-center">
                            <x-captcha.recaptcha store="SERVICE_DOMICILE_STORE" stateData="captchaToken" />
                        </div>
                    </div>

                    <button class="w-full rounded-lg text-md text-white py-2.5 bg-brand-500"
                        x-on:click="$store.SERVICE_DOMICILE_STORE.send()">
                        <span>Kirim</span>
                    </button>
                </div>
            </div>
        </x-container.landing-container>
    </div>
    <x-alert.confirmation onAccept="$store.SERVICE_DOMICILE_STORE.onAccept()">
        <p class="text-sm text-neutral-700 text-justify">Anda akan mengirim permohonan <span
                class="font-semibold">Surat Keterangan Domisili</span>. Pastikan data yang anda isi sudah
            lengkap dan
            benar, jika sudah klik <span class="font-semibold">"Kirim"</span> jika belum silahkan klik
            <span class="font-semibold">"Batal"</span> dan perbaiki data anda.
        </p>
    </x-alert.confirmation>
    <x-loader.page-loader />
    <x-alert.toast />
</section>

@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js?render=explicit" async defer></script>
    @vite(['resources/js/util/captcha.js', 'resources/js/util/datepicker.js', 'resources/js/util/select2.js', 'resources/js/util/alert.js', 'resources/js/util/loader.js'])
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_DOMICILE_STORE';
            const STORE_PROPS = {
                component: null,
                captchaToken: '',
                alertStore: null,
                pageLoaderStore: null,
                toastStore: null,
                form: {
                    name: '',
                    nik: '',
                    birthPlace: '',
                    dateOfBirth: '',
                    gender: '',
                    citizenship: '',
                    religion: '',
                    marriage: '',
                    job: '',
                    address: '',
                    applicantName: '',
                    applicantPhone: '',
                },
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="online-letter-domicile"]')?.getAttribute(
                            'wire:id');
                        if (component.id === componentID) {
                            this.component = component;
                            this.alertStore = Alpine.store('alertStore');
                            this.pageLoaderStore = Alpine.store('pageLoaderStore');
                            this.toastStore = Alpine.store('toastStore');
                        }
                    });
                },
                send() {
                    if (this.captchaToken === '') {
                        console.log('isi captcha');
                        this.toastStore.success('isi captcha');
                    } else {
                        const val = new Date(this.form.dateOfBirth);
                        const year = val.getFullYear();
                        const month = String(val.getMonth() + 1).padStart(2, '0'); // bulan dimulai dari 0
                        const day = String(val.getDate()).padStart(2, '0');

                        const formatted = `${year}-${month}-${day}`;
                        console.log(formatted);
                        console.log(this.form);
                        this.alertStore.show();
                    }
                },
                onAccept() {
                    this.alertStore.hide();
                    this.pageLoaderStore.show();
                    console.log('accept');

                }
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
