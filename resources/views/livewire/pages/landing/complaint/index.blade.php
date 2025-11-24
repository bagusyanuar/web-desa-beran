<section id="complaint" data-component-id="complaint" class="w-full">
    <div class="w-full h-[20rem] relative">
        <div class="w-full h-full">
            <img src="{{ asset('static/images/bg-product.jpg') }}" class="h-full w-full object-cover object-center"
                alt="main-service" />
        </div>
        <div class="w-full h-full absolute top-0 left-0 bg-white/80 flex items-center justify-center">
            <x-container.landing-container class="flex flex-col items-center gap-3">
                <h1 class="text-4xl text-accent-700 font-bold text-center">ADUAN MASYARAKAT</h1>
                <p class="text-md text-brand-500 w-1/2 text-center">Layanan Aduan Masyarakat Desa Beran hadir sebagai
                    sarana bagi warga untuk menyampaikan keluhan, masukan, maupun laporan terkait pelayanan publik dan
                    kondisi lingkungan di desa. Setiap aduan yang disampaikan akan menjadi bahan evaluasi dan perbaikan
                    demi terciptanya tata kelola desa yang transparan, responsif, dan berkeadilan.</p>
            </x-container.landing-container>
        </div>
    </div>
    <div class="w-full py-10 relative">
        <img src="{{ asset('static/images/bg-ornament.png') }}"
            class="w-96 h-fit absolute top-0 right-0 scale-y-[-1]" />
        <img src="{{ asset('static/images/bg-ornament.png') }}" class="w-96 h-fit absolute top-0 left-0 rotate-180" />
        <div class="absolute bg-white/90 w-full h-full right-0 top-0"></div>
        <x-container.landing-container class="relative">
            <div class="w-full flex items-center gap-1 mb-3" wire:ignore x-data="{
                initIcons() {
                    setTimeout(() => { lucide.createIcons(); }, 0);
                }
            }" x-init="initIcons()"
                x-effect="initIcons()">
                <a href="/" class="text-brand-500 font-semibold hover:underline">Beranda</a>
                <div wire:ignore class="text-brand-500">
                    <i data-lucide="chevron-right" class="h-4 aspect-[1/1]"></i>
                </div>
                <span class="text-brand-500 font-semibold">Aduan Masyarakat</span>
            </div>

            <div class="w-full flex items-start gap-5">
                <div class="flex-1 bg-white rounded-lg shadow-2xl p-6 border-t-4 border-accent-500">
                    <p class="text-center text-accent-500 text-lg font-bold mb-10">
                        FORMULIR ADUAN MASYARAKAT
                    </p>
                    <div class="w-full grid grid-cols-2 gap-x-7 gap-y-7">
                        <div class="w-full col-span-2">
                            <x-label.label for="applicant_name">
                                <span>Nama Pelapor</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.text.text id="applicant_name" placeholder="nama pelapor"
                                x-model="$store.SERVICE_COMPLAINT_STORE.form.applicantName" />
                            <template x-if="'applicantName' in $store.SERVICE_COMPLAINT_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_COMPLAINT_STORE.formValidator.applicantName[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full col-span-2">
                            <x-label.label for="applicant_phone">
                                <span>No. Whatsapp Pelapor</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.text.text id="applicant_phone" placeholder="contoh: 62817656627718"
                                x-model="$store.SERVICE_COMPLAINT_STORE.form.applicantPhone" />
                            <template x-if="'applicantPhone' in $store.SERVICE_COMPLAINT_STORE.formValidator">
                                <x-label.validator>
                                    <span
                                        x-text="$store.SERVICE_COMPLAINT_STORE.formValidator.applicantPhone[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full col-span-2">
                            <x-label.label for="description">
                                <span>Isi Laporan</span>
                                <span class="text-red-500 text-sm italic">*</span>
                            </x-label.label>
                            <x-input.text.textarea id="description" rows="3"
                                x-model="$store.SERVICE_COMPLAINT_STORE.form.description" />
                            <template x-if="'description' in $store.SERVICE_COMPLAINT_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_COMPLAINT_STORE.formValidator.description[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full col-span-2">
                            <x-label.label for="image">
                                <span>Foto / Gambar</span>
                            </x-label.label>
                            <x-input.file.dropzone-multi store="SERVICE_COMPLAINT_STORE" stateComponent="imageDropper"
                                class="!h-12"></x-input.file.dropzone-multi>
                            <template x-if="'image' in $store.SERVICE_COMPLAINT_STORE.formValidator">
                                <x-label.validator>
                                    <span x-text="$store.SERVICE_COMPLAINT_STORE.formValidator.image[0]"></span>
                                </x-label.validator>
                            </template>
                        </div>
                        <div class="w-full col-span-2 flex justify-center items-center" wire:ignore>
                            <x-captcha.recaptcha store="SERVICE_COMPLAINT_STORE" stateData="captchaToken" />
                        </div>
                    </div>
                    <button class="w-full rounded-lg text-md text-white py-2.5 bg-brand-500"
                        x-on:click="$store.SERVICE_COMPLAINT_STORE.send()">
                        <span>Kirim</span>
                    </button>
                </div>
                <!-- page suggestion -->
                <div class="w-80 flex flex-col gap-5">
                    <livewire:features.landing.suggestion.online-letter />
                    <livewire:features.landing.suggestion.news />
                </div>
            </div>
        </x-container.landing-container>
    </div>
    <div>
        <div x-cloak x-show="$store.SERVICE_COMPLAINT_STORE.showReceipt"
            class="fixed w-full h-dvh bg-black/50 top-0 left-0 z-50"></div>
        <div x-cloak x-show="$store.SERVICE_COMPLAINT_STORE.showReceipt"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="translate-y-[-10rem] opacity-0"
            x-transition:enter-end="-translate-y-1/2 opacity-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="-translate-y-1/2 opacity-100"
            x-transition:leave-end="translate-y-[-10rem] opacity-0"
            class="w-full fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-[51] flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-lg w-[40rem] p-4">
                <p class="text-lg text-accent-500 text-center font-bold mb-5">ADUAN MASYARAKAT BERHASIL
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
                        <p class="text-neutral-700 font-semibold mb-3">Informasi Pelapor
                        </p>
                        <table class="border-collapse w-full mb-3">
                            <tr>
                                <td>
                                    <span class="text-sm text-neutral-700">No. Tiket</span>
                                </td>
                                <td>
                                    <span class="text-sm text-neutral-700">:</span>
                                </td>
                                <td>
                                    <span class="text-sm text-neutral-700"
                                        x-text="$store.SERVICE_COMPLAINT_STORE.receiptData.referenceNumber"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-sm text-neutral-700">Pelapor</span>
                                </td>
                                <td>
                                    <span class="text-sm text-neutral-700">:</span>
                                </td>
                                <td>
                                    <span class="text-sm text-neutral-700 uppercase"
                                        x-text="$store.SERVICE_COMPLAINT_STORE.receiptData.applicantName"></span>
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
                                        x-text="$store.SERVICE_COMPLAINT_STORE.receiptData.applicantPhone"></span>
                                </td>
                            </tr>
                        </table>
                        <div class="w-full flex items-center gap-1">
                            <button x-on:click="$store.SERVICE_COMPLAINT_STORE.closeReceipt()"
                                class="w-full bg-accent-500 rounded-lg text-white py-2.5 text-sm hover:bg-accent-700 transition-all duration-200 ease-in">
                                <span>Tutup</span>
                            </button>
                        </div>
                        <span class="text-xs text-neutral-500 italic leading-none">*) Gunakan QR Code untuk melakukan
                            monitoring status laporan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-alert.confirmation onAccept="$store.SERVICE_COMPLAINT_STORE.onAccept()">
        <p class="text-sm text-neutral-700 text-justify">Anda akan mengirim permohonan <span
                class="font-semibold">Aduan
                Masyarakat</span>. Pastikan data yang anda isi sudah
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_COMPLAINT_STORE';
            const STORE_PROPS = {
                component: null,
                captchaToken: '',
                alertStore: null,
                pageLoaderStore: null,
                toastStore: null,
                imageDropper: null,
                form: {
                    applicantName: '',
                    applicantPhone: '',
                    description: '',
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
                            '[data-component-id="complaint"]')?.getAttribute(
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
                },
                async onAccept() {
                    this.alertStore.hide();
                    this.pageLoaderStore.show();
                    const uploadImage = this.imageDropper.files
                        .filter(file => file instanceof File)
                        .map((file, index) => {
                            return new Promise((resolve, reject) => {
                                this.component.$wire.upload(`images.${index}`, file, resolve,
                                    reject);
                            });
                        })
                    await Promise.all(uploadImage);
                    const response = await this.component.$wire.call('send', this.form, this.captchaToken);
                    const {
                        status,
                        data,
                        message
                    } = response;

                    switch (status) {
                        case 201:
                            this.toastStore.success("Berhasil mengirim aduan masyarakat", 2000,
                                () => {
                                    this.formClear();
                                    const code = data['url'];
                                    const complaint = data['complaint'];
                                    const {
                                        name,
                                        phone
                                    } = data['applicant']
                                    const referenceNumber = complaint['reference_number'];
                                    this.receiptData.applicantName = name;
                                    this.receiptData.applicantPhone = phone;
                                    this.receiptData.referenceNumber = referenceNumber;
                                    this.generateQRCode(code);
                                    this.showReceipt = true;
                                });
                            break;
                        case 422:
                            this.formValidator = data;
                            this.toastStore.error(
                                'Harap mengisi formulir dengan lengkap dan benar',
                                2000);
                            break;
                        case 500:
                            this.toastStore.error(message, 3000);
                        default:
                            break;
                    }

                    this.pageLoaderStore.hide();
                },
                closeReceipt() {
                    this.showReceipt = false;
                    this.clearReceiptData();
                    window.location.reload();
                },
                formClear() {
                    this.form.applicantName = '';
                    this.form.applicantPhone = '';
                    this.form.description = '';
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
