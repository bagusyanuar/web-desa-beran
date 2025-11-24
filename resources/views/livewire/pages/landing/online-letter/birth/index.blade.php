<section id="online-letter-birth" data-component-id="online-letter-birth" class="w-full">
    <div class="w-full h-[20rem] relative">
        <div class="w-full h-full">
            <img src="{{ asset('static/images/service/bg-service.png') }}"
                class="h-full w-full object-cover object-center" alt="main-service" />
        </div>
        <div class="w-full h-full absolute top-0 left-0 bg-white/80 flex items-center justify-center">
            <x-container.landing-container class="flex flex-col items-center gap-3">
                <h1 class="text-4xl text-accent-700 font-bold">SURAT KETERANGAN KELAHIRAN</h1>
                <p class="text-md text-brand-500 w-1/2 text-center">Surat resmi dari kelurahan atau desa yang menyatakan
                    kelahiran seorang anak, digunakan untuk keperluan administrasi kependudukan dan hukum.</p>
            </x-container.landing-container>
        </div>
    </div>
    <div class="w-full py-10">
        <x-container.landing-container class="">
            <p class="text-center text-accent-500 text-lg font-bold mb-10">
                FORMULIR SURAT KETERANGAN KELAHIRAN PENDUDUK DESA BERAN
            </p>
            <div class="w-5/6 justify-self-center bg-white rounded-xl shadow-xl p-6 border border-neutral-300">
                <div class="w-full">
                    <div
                        class="w-full flex items-start gap-3 rounded-lg bg-blue-100 text-blue-500 border border-blue-500 p-3">
                        <i data-lucide="info" class="h-6 w-6"></i>
                        <div class="flex-1">
                            <p class="text-sm mb-3">Sehubungan dengan pengajuan Surat Keterangan Kelahiran, bersama
                                ini
                                kami
                                sampaikan bahwa pemohon diwajibkan membawa dan melampirkan dokumen kelengkapan sebagai
                                berikut :</p>
                            <ol class="list-decimal list-outside ml-4 text-sm">
                                <li>
                                    <p>Fotokopi KTP atau Fotokopi Kartu Keluarga (KK)</p>
                                </li>
                                <li>
                                    <p>Surat Pengantar dari RT Setempat</p>
                                </li>
                            </ol>

                        </div>
                    </div>
                    <p class="text-md font-bold text-neutral-700 my-5">A. Data Anak</p>
                    <div class="w-full grid grid-cols-2 gap-x-7 gap-y-7">
                        <div class="w-full col-span-2">
                            <x-label.label for="infant-name">
                                <span>Nama Lengkap</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.text.text id="infant-name" x-model="$store.SERVICE_BIRTH_STORE.form.infantName" />
                            <template x-if="'infantName' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_BIRTH_STORE.formValidator.infantName[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full">
                            <x-label.label for="infant-birth-place">
                                <span>Tempat Lahir</span>
                                <span class="text-red-500 text-sm italic">* <span class="text-xs">(Nama kota /
                                        kabupaten)</span></span>
                            </x-label.label>
                            <x-input.text.text id="infant-birth-place"
                                x-model="$store.SERVICE_BIRTH_STORE.form.infantBirthPlace" />
                            <template x-if="'infantBirthPlace' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_BIRTH_STORE.formValidator.infantBirthPlace[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full">
                            <x-label.label for="infant-date-of-birth">
                                <span>Tanggal Lahir</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.date.datepicker id="infant-date-of-birth" store="SERVICE_BIRTH_STORE"
                                stateDate="form.infantDateOfBirth" format="long" />
                            <template x-if="'infantDateOfBirth' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_BIRTH_STORE.formValidator.infantDateOfBirth[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full" wire:ignore>
                            <label for="infant-gender" class="text-sm text-neutral-700 block mb-1">
                                <span>Jenis Kelamin</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </label>
                            <x-select.select2 id="infant-gender" x-init="initSelect({ placeholder: 'pilih jenis kelamin' })"
                                x-model="$store.SERVICE_BIRTH_STORE.form.infantGender">
                                <option></option>
                                <option value="male">Laki-Laki</option>
                                <option value="female">Perempuan</option>
                            </x-select.select2>
                            <template x-if="'infantGender' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_BIRTH_STORE.formValidator.infantGender[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full" wire:ignore>
                            <label for="infant-birth-type" class="text-sm text-neutral-700 block mb-1">
                                <span>Jenis Kelahiran</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </label>
                            <x-select.select2 id="infant-birth-type" x-init="initSelect({ placeholder: 'pilih jenis kelahiran' })"
                                x-model="$store.SERVICE_BIRTH_STORE.form.infantBirthType">
                                <option></option>
                                <option value="single">Tunggal</option>
                                <option value="twin">Kembar</option>
                            </x-select.select2>
                            <template x-if="'infantBirthType' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_BIRTH_STORE.formValidator.infantBirthType[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full col-span-2">
                            <x-label.label for="infant-birth-order">
                                <span>Anak Ke</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.text.text type="number" id="infant-birth-order"
                                x-model="$store.SERVICE_BIRTH_STORE.form.infantBirthOrder" />
                            <template x-if="'infantBirthOrder' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_BIRTH_STORE.formValidator.infantBirthOrder[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                    </div>
                    <p class="text-md font-bold text-neutral-700 mb-5 mt-10">B. Data Ibu</p>
                    <div class="w-full grid grid-cols-2 gap-x-7 gap-y-7">
                        <div class="w-full">
                            <x-label.label for="mother-name">
                                <span>Nama Lengkap</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.text.text id="mother-name" x-model="$store.SERVICE_BIRTH_STORE.form.motherName" />
                            <template x-if="'motherName' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_BIRTH_STORE.formValidator.motherName[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full">
                            <x-label.label for="mother-nik">
                                <span>NIK (Nomor Induk Kependudukan)</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.text.text id="mother-nik" x-model="$store.SERVICE_BIRTH_STORE.form.motherNik" />
                            <template x-if="'motherNik' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_BIRTH_STORE.formValidator.motherNik[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full">
                            <x-label.label for="mother-birth-place">
                                <span>Tempat Lahir</span>
                                <span class="text-red-500 text-sm italic">* <span class="text-xs">(Nama kota /
                                        kabupaten)</span></span>
                            </x-label.label>
                            <x-input.text.text id="mother-birth-place"
                                x-model="$store.SERVICE_BIRTH_STORE.form.motherBirthPlace" />
                            <template x-if="'motherBirthPlace' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_BIRTH_STORE.formValidator.motherBirthPlace[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full">
                            <x-label.label for="mother-date-of-birth">
                                <span>Tanggal Lahir</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.date.datepicker id="mother-date-of-birth" store="SERVICE_BIRTH_STORE"
                                stateDate="form.motherDateOfBirth" format="long" />
                            <template x-if="'motherDateOfBirth' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span
                                        x-text="$store.SERVICE_BIRTH_STORE.formValidator.motherDateOfBirth[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full" wire:ignore>
                            <label for="mother-citizenship" class="text-sm text-neutral-700 block mb-1">
                                <span>Kewarganegaraan</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </label>
                            <x-select.select2 id="mother-citizenship" x-init="initSelect({ placeholder: 'pilih kewarganegaraan' })"
                                x-model="$store.SERVICE_BIRTH_STORE.form.motherCitizenship">
                                <option></option>
                                <option value="indonesia">Indonesia</option>
                                <option value="foreign">Warga Negara Asing</option>
                            </x-select.select2>
                            <template x-if="'motherCitizenship' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span
                                        x-text="$store.SERVICE_BIRTH_STORE.formValidator.motherCitizenship[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full" wire:ignore>
                            <label for="mother-religion" class="text-sm text-neutral-700 block mb-1">
                                <span>Agama</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </label>
                            <x-select.select2 id="mother-religion" x-init="initSelect({ placeholder: 'pilih agama' })"
                                x-model="$store.SERVICE_BIRTH_STORE.form.motherReligion">
                                <option></option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katholik">Katholik</option>
                                <option value="hindu">Hindu</option>
                                <option value="budha">Budha</option>
                                <option value="konghucu">Konghucu</option>
                                <option value="other">Lainnya</option>
                            </x-select.select2>
                            <template x-if="'motherReligion' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_BIRTH_STORE.formValidator.motherReligion[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full col-span-2">
                            <x-label.label for="mother-job">
                                <span>Pekerjaan</span>
                            </x-label.label>
                            <x-input.text.text id="mother-job" x-model="$store.SERVICE_BIRTH_STORE.form.motherJob" />
                        </div>
                        <div class="w-full col-span-2">
                            <x-label.label for="mother-address">
                                <span>Alamat</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.text.textarea id="mother-address" rows="3"
                                x-model="$store.SERVICE_BIRTH_STORE.form.motherAddress" />
                            <template x-if="'motherAddress' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_BIRTH_STORE.formValidator.motherAddress[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                    </div>

                    <p class="text-md font-bold text-neutral-700 mb-5 mt-10">C. Data Ayah</p>
                    <div class="w-full grid grid-cols-2 gap-x-7 gap-y-7">
                        <div class="w-full">
                            <x-label.label for="father-name">
                                <span>Nama Lengkap</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.text.text id="father-name"
                                x-model="$store.SERVICE_BIRTH_STORE.form.fatherName" />
                            <template x-if="'fatherName' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_BIRTH_STORE.formValidator.fatherName[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full">
                            <x-label.label for="father-nik">
                                <span>NIK (Nomor Induk Kependudukan)</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.text.text id="father-nik" x-model="$store.SERVICE_BIRTH_STORE.form.fatherNik" />
                            <template x-if="'fatherNik' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_BIRTH_STORE.formValidator.fatherNik[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full">
                            <x-label.label for="father-birth-place">
                                <span>Tempat Lahir</span>
                                <span class="text-red-500 text-sm italic">* <span class="text-xs">(Nama kota /
                                        kabupaten)</span></span>
                            </x-label.label>
                            <x-input.text.text id="father-birth-place"
                                x-model="$store.SERVICE_BIRTH_STORE.form.fatherBirthPlace" />
                            <template x-if="'fatherBirthPlace' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_BIRTH_STORE.formValidator.fatherBirthPlace[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full">
                            <x-label.label for="father-date-of-birth">
                                <span>Tanggal Lahir</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.date.datepicker id="father-date-of-birth" store="SERVICE_BIRTH_STORE"
                                stateDate="form.fatherDateOfBirth" format="long" />
                            <template x-if="'fatherDateOfBirth' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span
                                        x-text="$store.SERVICE_BIRTH_STORE.formValidator.fatherDateOfBirth[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full" wire:ignore>
                            <label for="father-citizenship" class="text-sm text-neutral-700 block mb-1">
                                <span>Kewarganegaraan</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </label>
                            <x-select.select2 id="father-citizenship" x-init="initSelect({ placeholder: 'pilih kewarganegaraan' })"
                                x-model="$store.SERVICE_BIRTH_STORE.form.fatherCitizenship">
                                <option></option>
                                <option value="indonesia">Indonesia</option>
                                <option value="foreign">Warga Negara Asing</option>
                            </x-select.select2>
                            <template x-if="'fatherCitizenship' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span
                                        x-text="$store.SERVICE_BIRTH_STORE.formValidator.fatherCitizenship[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full" wire:ignore>
                            <label for="father-religion" class="text-sm text-neutral-700 block mb-1">
                                <span>Agama</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </label>
                            <x-select.select2 id="father-religion" x-init="initSelect({ placeholder: 'pilih agama' })"
                                x-model="$store.SERVICE_BIRTH_STORE.form.fatherReligion">
                                <option></option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katholik">Katholik</option>
                                <option value="hindu">Hindu</option>
                                <option value="budha">Budha</option>
                                <option value="konghucu">Konghucu</option>
                                <option value="other">Lainnya</option>
                            </x-select.select2>
                            <template x-if="'fatherReligion' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_BIRTH_STORE.formValidator.fatherReligion[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full col-span-2">
                            <x-label.label for="father-job">
                                <span>Pekerjaan</span>
                            </x-label.label>
                            <x-input.text.text id="father-job" x-model="$store.SERVICE_BIRTH_STORE.form.fatherJob" />
                        </div>
                        <div class="w-full col-span-2">
                            <x-label.label for="father-address">
                                <span>Alamat</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.text.textarea id="father-address" rows="3"
                                x-model="$store.SERVICE_BIRTH_STORE.form.fatherAddress" />
                            <template x-if="'fatherAddress' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_BIRTH_STORE.formValidator.fatherAddress[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                    </div>
                    <p class="text-md font-bold text-neutral-700 mb-5 mt-10">D. Informasi Pemohon</p>
                    <div class="w-full grid grid-cols-2 gap-x-7 gap-y-7 mb-10">
                        <div class="w-full">
                            <x-label.label for="applicant_name">
                                <span>Nama Lengkap Pemohon</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.text.text id="applicant_name"
                                x-model="$store.SERVICE_BIRTH_STORE.form.applicantName" />
                            <template x-if="'applicantName' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_BIRTH_STORE.formValidator.applicantName[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full">
                            <x-label.label for="applicant_phone">
                                <span>No. Whatsapp Pemohon</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.text.text id="applicant_name"
                                x-model="$store.SERVICE_BIRTH_STORE.form.applicantPhone" />
                            <template x-if="'applicantPhone' in $store.SERVICE_BIRTH_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_BIRTH_STORE.formValidator.applicantPhone[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full col-span-2 flex justify-center items-center" wire:ignore>
                            <x-captcha.recaptcha store="SERVICE_BIRTH_STORE" stateData="captchaToken" />
                        </div>
                    </div>

                    <button class="w-full rounded-lg text-md text-white py-2.5 bg-brand-500"
                        x-on:click="$store.SERVICE_BIRTH_STORE.send()">
                        <span>Kirim</span>
                    </button>
                </div>
            </div>
        </x-container.landing-container>
    </div>
    <div>
        <div x-cloak x-show="$store.SERVICE_BIRTH_STORE.showReceipt"
            class="fixed w-full h-dvh bg-black/50 top-0 left-0 z-50"></div>
        <div x-cloak x-show="$store.SERVICE_BIRTH_STORE.showReceipt"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="translate-y-[-10rem] opacity-0"
            x-transition:enter-end="-translate-y-1/2 opacity-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="-translate-y-1/2 opacity-100"
            x-transition:leave-end="translate-y-[-10rem] opacity-0"
            class="w-full fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-[51] flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-lg w-[40rem] p-4">
                <p class="text-lg text-accent-500 text-center font-bold mb-5">SURAT KETERANGAN KELAHIRAN BERHASIL
                    DIBUAT
                </p>
                <div class="w-full flex items-center gap-3">
                    <div class="w-56">
                        <div class="w-52 h-52 flex items-center justify-center rounded-md border border-neutral-300">
                            <div wire:ignore>
                                <div id="qrcode"></div>
                            </div>
                        </div>

                    </div>
                    <div class="flex-1">
                        <p class="text-neutral-700 font-semibold mb-3">Informasi Permohonan
                        </p>
                        <table class="border-collapse w-full mb-3">
                            <tr>
                                <td>
                                    <span class="text-sm text-neutral-700">No. Pengajuan</span>
                                </td>
                                <td>
                                    <span class="text-sm text-neutral-700">:</span>
                                </td>
                                <td>
                                    <span class="text-sm text-neutral-700"
                                        x-text="$store.SERVICE_BIRTH_STORE.receiptData.referenceNumber"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-sm text-neutral-700">Pemohon</span>
                                </td>
                                <td>
                                    <span class="text-sm text-neutral-700">:</span>
                                </td>
                                <td>
                                    <span class="text-sm text-neutral-700"
                                        x-text="$store.SERVICE_BIRTH_STORE.receiptData.applicantName"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-sm text-neutral-700">No. Whatsapp</span>
                                </td>
                                <td>
                                    <span class="text-sm text-neutral-700">:</span>
                                </td>
                                <td>
                                    <span class="text-sm text-neutral-700"
                                        x-text="$store.SERVICE_BIRTH_STORE.receiptData.applicantPhone"></span>
                                </td>
                            </tr>
                        </table>
                        <div class="w-full flex items-center gap-1">
                            <button x-on:click="$store.SERVICE_BIRTH_STORE.closeReceipt()"
                                class="w-full bg-white text-brand-500 py-2.5 rounded-lg hover:bg-neutral-200 transition-all ease-in duration-200">
                                <span>Tutup</span>
                            </button>
                            <button
                                class="w-full bg-accent-500 rounded-lg text-white py-2.5 text-sm hover:bg-accent-700 transition-all duration-200 ease-in"
                                x-on:click="$store.SERVICE_BIRTH_STORE.download()">
                                <span>Unduh Bukti</span>
                            </button>
                        </div>
                        <span class="text-xs text-neutral-500 italic leading-none">*) Gunakan QR Code untuk melakukan
                            monitoring status pengajuan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-alert.confirmation onAccept="$store.SERVICE_BIRTH_STORE.onAccept()">
        <p class="text-sm text-neutral-700 text-justify">Anda akan mengirim permohonan <span
                class="font-semibold">Surat Keterangan Kelahiran</span>. Pastikan data yang anda isi sudah
            lengkap dan
            benar, jika sudah klik <span class="font-semibold">"Kirim"</span> jika belum silahkan klik
            <span class="font-semibold">"Batal"</span> dan perbaiki data anda.
        </p>
    </x-alert.confirmation>
    <x-loader.page-loader />
    <x-alert.toast />
</section>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=explicit" async defer></script>
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_BIRTH_STORE';
            const STORE_PROPS = {
                component: null,
                captchaToken: '',
                alertStore: null,
                pageLoaderStore: null,
                toastStore: null,
                form: {
                    infantName: '',
                    infantBirthPlace: '',
                    infantDateOfBirth: '',
                    infantGender: '',
                    infantBirthType: '',
                    infantBirthOrder: 1,
                    motherName: '',
                    motherNik: '',
                    motherBirthPlace: '',
                    motherDateOfBirth: '',
                    motherCitizenship: '',
                    motherReligion: '',
                    motherJob: '',
                    motherAddress: '',
                    fatherName: '',
                    fatherNik: '',
                    fatherBirthPlace: '',
                    fatherDateOfBirth: '',
                    fatherCitizenship: '',
                    fatherReligion: '',
                    fatherJob: '',
                    fatherAddress: '',
                    applicantName: '',
                    applicantPhone: '',
                },
                showReceipt: false,
                receiptData: {
                    referenceNumber: '',
                    applicantName: '',
                    applicantPhone: ''
                },
                formValidator: {},
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="online-letter-birth"]')?.getAttribute(
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
                    this.alertStore.show();
                    console.log(this.form);

                },
                onAccept() {
                    this.alertStore.hide();
                    this.pageLoaderStore.show();
                    this.component.$wire.call('send', this.form, this.captchaToken)
                        .then(response => {
                            const {
                                status,
                                message,
                                data
                            } = response;
                            console.log(response);

                            switch (status) {
                                case 201:
                                    this.formClear();
                                    const code = data['url'];
                                    const birth = data['birth'];
                                    const {
                                        name, phone
                                    } = data['applicant']
                                    const referenceNumber = birth['reference_number'];
                                    this.receiptData.applicantName = name;
                                    this.receiptData.applicantPhone = phone;
                                    this.receiptData.referenceNumber = referenceNumber;
                                    this.generateQRCode(code);
                                    this.showReceipt = true;
                                    break;
                                case 422:
                                    this.formValidator = data;
                                    this.toastStore.error('Harap mengisi formulir dengan lengkap dan benar',
                                        2000);
                                    break;
                                case 500:
                                    this.toastStore.error(message, 2000);
                                default:
                                    break;
                            }
                        })
                        .finally(() => {
                            this.pageLoaderStore.hide();
                        });
                },
                download() {
                    const referenceNumber = this.receiptData.referenceNumber;
                    this.pageLoaderStore.show();
                    this.component.$wire.call('create_receipt', referenceNumber)
                        .then(response => {
                            const {
                                status,
                                message,
                                data
                            } = response;
                            if (status === 200) {
                                const byteCharacters = atob(data);
                                const byteNumbers = new Array(byteCharacters.length).fill(0).map((_, i) =>
                                    byteCharacters.charCodeAt(i));
                                const byteArray = new Uint8Array(byteNumbers);
                                const blob = new Blob([byteArray], {
                                    type: 'application/pdf'
                                });
                                const blobUrl = URL.createObjectURL(blob);
                                window.open(blobUrl, '_blank');

                                // const link = document.createElement('a');
                                // link.href = blobUrl;
                                // link.download = "letter-receipt.pdf";
                                // link.click();

                                // URL.revokeObjectURL(blobUrl);
                            } else {
                                this.toastStore.error(message, 2000);
                            }
                        })
                        .finally(() => {
                            this.pageLoaderStore.hide();
                        });
                },
                closeReceipt() {
                    this.showReceipt = false;
                    this.clearReceiptData();
                    window.location.reload();
                },
                formClear() {
                    this.form.applicantName = '';
                    this.form.applicantPhone = '';
                    this.form.name = '';
                    this.form.nik = '';
                    this.form.birthPlace = '';
                    this.form.dateOfBirth = '';
                    this.form.gender = '';
                    this.form.citizenship = '';
                    this.form.religion = '';
                    this.form.marriage = '';
                    this.form.job = '';
                    this.form.address = '';
                },
                clearReceiptData() {
                    this.receiptData.applicantName = '';
                    this.receiptData.applicantPhone = '';
                    this.receiptData.referenceNumber = '';
                },
                generateQRCode(code) {
                    const el = document.getElementById('qrcode');
                    if (!el) return;
                    el.innerHTML = '';
                    new QRCode(el, {
                        text: code,
                        width: 200,
                        height: 200
                    });
                }
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
