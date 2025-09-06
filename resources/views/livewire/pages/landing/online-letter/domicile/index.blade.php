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
                    <div class="w-full grid grid-cols-2 gap-x-7 gap-y-5">
                        <div class="w-full">
                            <label for="name" class="text-sm text-neutral-700 block mb-1">
                                <span>Nama Lengkap</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </label>
                            <input id="name" type="text"
                                class="w-full border border-neutral-300 text-md p-[0.5rem] rounded-lg focus:outline-none focus:ring-0 focus:border-neutral-500" />
                            <span class="text-xs text-red-500 ms-1 mt-1">
                                kolom nama wajib di isi
                            </span>
                        </div>
                        <div class="w-full">
                            <label for="nik" class="text-sm text-neutral-700 block mb-1">
                                <span>NIK (Nomor Induk Kependudukan)</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </label>
                            <input id="nik" type="text"
                                class="w-full border border-neutral-300 text-md p-[0.5rem] rounded-lg focus:outline-none focus:ring-0 focus:border-neutral-500" />
                            <span class="text-xs text-red-500 ms-1 mt-1">
                                kolom nik wajib di isi
                            </span>
                        </div>
                        <div class="w-full">
                            <label for="birth-place" class="text-sm text-neutral-700 block mb-1">
                                <span>Tempat Lahir</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </label>
                            <input id="birth-place" type="text"
                                class="w-full border border-neutral-300 text-md p-[0.5rem] rounded-lg focus:outline-none focus:ring-0 focus:border-neutral-500" />
                        </div>
                        <div class="w-full">
                            <label for="date-of-birth" class="text-sm text-neutral-700 block mb-1">
                                <span>Tanggal Lahir</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </label>
                            <input readonly id="date-of-birth" type="text"
                                class="w-full border border-neutral-300 text-md p-[0.5rem] rounded-lg focus:outline-none focus:ring-0 focus:border-neutral-500"
                                x-bind:store-name="'SERVICE_DOMICILE_STORE'"
                                x-model="$store.SERVICE_DOMICILE_STORE.form.dateOfBirth" x-bind="datepickerBind"
                                x-init="initDatePicker()" />
                        </div>
                        <div class="w-full">
                            <label for="gender" class="text-sm text-neutral-700 block mb-1">
                                <span>Jenis Kelamin</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </label>
                            <select id="gender"
                                class="w-full border border-neutral-300 text-md p-[0.5rem] rounded-lg focus:outline-none focus:ring-0 focus:border-neutral-500">
                                <option value="male" class="py-1.5">Laki-Laki</option>
                            </select>
                        </div>
                    </div>
                    <p class="text-md font-bold text-neutral-700 my-5">B. Informasi Pemohon</p>
                    <button class="w-full text-md text-white py-1.5 bg-brand-500"
                        x-on:click="$store.SERVICE_DOMICILE_STORE.send()">
                        <span>Kirim</span>
                    </button>
                </div>
            </div>
        </x-container.landing-container>
    </div>
</section>

@push('scripts')
    @vite(['resources/js/util/datepicker.js'])
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_DOMICILE_STORE';
            const STORE_PROPS = {
                component: null,
                captchaToken: '',
                form: {
                    name: '',
                    dateOfBirth: ''
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
                        }
                    });
                },
                send() {
                    const val = new Date(this.form.dateOfBirth);
                    const year = val.getFullYear();
                    const month = String(val.getMonth() + 1).padStart(2, '0'); // bulan dimulai dari 0
                    const day = String(val.getDate()).padStart(2, '0');

                    const formatted = `${year}-${month}-${day}`;
                    console.log(formatted);

                    // this.component.$wire.call('mutate', this.captchaToken);
                }
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
