<section id="online-letter-widow-detail" data-component-id="online-letter-widow-detail" class="w-full">
    <div class="mb-7 flex items-start gap-3">
        <a href="{{ route('web-panel.online-letter.widow') }}"
            class="w-10 h-10 flex items-center justify-center rounded-lg border border-neutral-300 cursor-pointer hover:bg-neutral-100 transition-all ease-in-out duration-200"
            wire:ignore>
            <i data-lucide="arrow-left" class="text-neutral-700 h-4 w-4"></i>
        </a>
        <div>
            <p class="text-xl text-neutral-700 font-bold">Surat Keterangan Janda</p>
            <p class="text-md text-neutral-500">Halaman ini digunakan untuk mengelola surat keterangan janda.</p>
        </div>
    </div>
    <div class="w-full flex items-start gap-4">
        <div class="flex-1 p-6 bg-white border border-neutral-300 shadow-xl rounded-lg">
            <div class="flex items-center justify-between mb-3">
                <p class="text-sm font-bold text-neutral-700 mb-3">A. Data Diri</p>
                <x-chip.chip-status-detail status="{{ $data->status }}" />
            </div>

            <div class="w-full overflow-hidden rounded-lg border border-neutral-300 mb-5">
                <table class="border-collapse w-full text-sm font-semibold">
                    <tr class="even:bg-white odd:bg-brand-50">
                        <td class="px-3 py-2.5 w-48">
                            <span>Nama</span>
                        </td>
                        <td class="px-3 py-2.5 w-8">
                            <span>:</span>
                        </td>
                        <td class="px-3 py-2.5">
                            <span>{{ $data->person->name }}</span>
                        </td>
                    </tr>
                    <tr class="even:bg-white odd:bg-brand-50">
                        <td class="px-3 py-2.5">
                            <span>NIK</span>
                        </td>
                        <td class="px-3 py-2.5 w-8">
                            <span>:</span>
                        </td>
                        <td class="px-3 py-2.5">
                            <span>{{ $data->person->identifier_number }}</span>
                        </td>
                    </tr>
                    <tr class="even:bg-white odd:bg-brand-50">
                        <td class="px-3 py-2.5">
                            <span>Tempat, Tanggal Lahir</span>
                        </td>
                        <td class="px-3 py-2.5 w-8">
                            <span>:</span>
                        </td>
                        <td class="px-3 py-2.5">
                            @php
                                \Carbon\Carbon::setLocale('id');
                            @endphp
                            <span>{{ $data->person->birth_place . ', ' . \Carbon\Carbon::parse($data->person->date_of_birth)->translatedFormat('d F Y') }}</span>
                        </td>
                    </tr>
                    <tr class="even:bg-white odd:bg-brand-50">
                        <td class="px-3 py-2.5">
                            <span>Jenis Kelamin</span>
                        </td>
                        <td class="px-3 py-2.5 w-8">
                            <span>:</span>
                        </td>
                        <td class="px-3 py-2.5">
                            <span>{{ App\Commons\Libs\Helper\Converter::genderToDisplay($data->person->gender) }}</span>
                        </td>
                    </tr>
                    <tr class="even:bg-white odd:bg-brand-50">
                        <td class="px-3 py-2.5">
                            <span>Kewarganegaraan</span>
                        </td>
                        <td class="px-3 py-2.5 w-8">
                            <span>:</span>
                        </td>
                        <td class="px-3 py-2.5">
                            <span>{{ App\Commons\Libs\Helper\Converter::citizenshipToDisplay($data->person->citizenship) }}</span>
                        </td>
                    </tr>
                    <tr class="even:bg-white odd:bg-brand-50">
                        <td class="px-3 py-2.5">
                            <span>Agama</span>
                        </td>
                        <td class="px-3 py-2.5 w-8">
                            <span>:</span>
                        </td>
                        <td class="px-3 py-2.5">
                            <span>{{ ucfirst($data->person->religion) }}</span>
                        </td>
                    </tr>
                    <tr class="even:bg-white odd:bg-brand-50">
                        <td class="px-3 py-2.5">
                            <span>Status Perkawinan</span>
                        </td>
                        <td class="px-3 py-2.5 w-8">
                            <span>:</span>
                        </td>
                        <td class="px-3 py-2.5">
                            <span>{{ App\Commons\Libs\Helper\Converter::marriageToDisplay($data->person->marriage) }}</span>
                        </td>
                    </tr>
                    <tr class="even:bg-white odd:bg-brand-50">
                        <td class="px-3 py-2.5">
                            <span>Pekerjaan</span>
                        </td>
                        <td class="px-3 py-2.5 w-8">
                            <span>:</span>
                        </td>
                        <td class="px-3 py-2.5">
                            <span>{{ $data->person->job ?? '-' }}</span>
                        </td>
                    </tr>
                    <tr class="even:bg-white odd:bg-brand-50">
                        <td class="px-3 py-2.5">
                            <span>Alamat</span>
                        </td>
                        <td class="px-3 py-2.5 w-8">
                            <span>:</span>
                        </td>
                        <td class="px-3 py-2.5">
                            <span>{{ $data->person->address }}</span>
                        </td>
                    </tr>
                    <tr class="even:bg-white odd:bg-brand-50">
                        <td class="px-3 py-2.5">
                            <span>Nama Pasangan</span>
                        </td>
                        <td class="px-3 py-2.5 w-8">
                            <span>:</span>
                        </td>
                        <td class="px-3 py-2.5">
                            <span>{{ $data->person->spouse_name ?? '-' }}</span>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
        <div class="w-96 p-6 bg-white border border-neutral-300 shadow-xl rounded-lg">
            <p class="text-sm font-bold text-neutral-700 mb-3">Informasi Pemohon</p>
            <div class="flex items-center gap-2 mb-1" wire:ignore>
                <i data-lucide="user" class="w-4 h-4 text-neutral-700"></i>
                <p class="text-sm text-neutral-700">{{ $data->applicant->name }}</p>
            </div>
            <div class="flex items-center gap-2" wire:ignore>
                <i data-lucide="phone" class="w-4 h-4 text-neutral-700"></i>
                <p class="text-sm text-neutral-700">({{ $data->applicant->phone }})</p>
            </div>
            <div class="w-full border-b border-neutral-300 my-3">
            </div>
            @if ($data->status === App\Commons\Enum\CertificateStatus::Created->value)
                <p class="text-sm font-bold text-neutral-700 mb-3">Konfirmasi</p>
                <div class="w-full mb-3" wire:ignore>
                    <x-select.select2 id="status" x-init="initSelect({ placeholder: 'pilih status konfirmasi' })"
                        x-model="$store.SERVICE_WIDOW_DETAIL_STORE.form.status">
                        <option></option>
                        <option value="accept">Terima</option>
                        <option value="denied">Tolak</option>
                    </x-select.select2>
                    <template x-if="'status' in $store.SERVICE_WIDOW_DETAIL_STORE.formValidator">
                        <x-label.validator>
                            <span x-text="$store.SERVICE_WIDOW_DETAIL_STORE.formValidator.status[0]"></span>
                        </x-label.validator>
                    </template>
                </div>
                <div x-cloak x-show="$store.SERVICE_WIDOW_DETAIL_STORE.form.status === 'denied'" class="w-full"
                    wire:ignore>
                    <x-label.label for="address">
                        <span>Alasan Penolakan</span>
                        <span class="text-red-500 text-sm italic">*</span>
                    </x-label.label>
                    <x-input.text.textarea id="address" rows="3" class="!text-sm"
                        x-model="$store.SERVICE_WIDOW_DETAIL_STORE.form.reason" />
                    <template x-if="'reason' in $store.SERVICE_WIDOW_DETAIL_STORE.formValidator">
                        <x-label.validator>
                            <span x-text="$store.SERVICE_WIDOW_DETAIL_STORE.formValidator.reason[0]"></span>
                        </x-label.validator>
                    </template>
                </div>
                <div class="w-full border-b border-neutral-300 my-3">
                </div>
                <button x-on:click="$store.SERVICE_WIDOW_DETAIL_STORE.confirm()"
                    class="w-full flex items-center justify-center gap-1 rounded-lg py-2.5 text-sm text-white bg-accent-500 cursor-pointer hover:bg-accent-700 transition-all duration-200 ease-in-out"
                    wire:ignore>
                    <i data-lucide="check" class="h-4 w-4"></i>
                    <span>Konfirmasi</span>
                </button>
            @endif

            @if ($data->status === App\Commons\Enum\CertificateStatus::Failed->value)
                <p class="text-sm font-bold text-neutral-700 mb-3">Alasan Penolakan :</p>
                <p class="text-sm text-neutral-700">{{ $data->failed_description }}</p>
                <div class="w-full border-b border-neutral-300 my-3">
                </div>
            @endif

            @if (
                $data->status === App\Commons\Enum\CertificateStatus::Failed->value ||
                    $data->status === App\Commons\Enum\CertificateStatus::Pending->value ||
                    $data->status === App\Commons\Enum\CertificateStatus::Finished->value)
                <div class="w-full flex flex-col gap-2">
                    <div class="flex items-center gap-2">
                        <a href="{{ $chatTextLink }}" target="_blank"
                            class="flex-1 flex items-center justify-center gap-2 rounded-lg py-2.5 text-sm text-white bg-accent-500 cursor-pointer hover:bg-accent-700 transition-all duration-200 ease-in-out"
                            wire:ignore>
                            <i data-lucide="phone" class="h-4 w-4"></i>
                            <span>Hubungi Pemohon</span>
                        </a>
                        <button x-on:click="$store.SERVICE_WIDOW_DETAIL_STORE.download('{{ $id }}')"
                            class="flex items-center justify-center gap-2 rounded-lg py-2.5 px-3 text-sm text-accent-500 border border-accent-500 bg-neutral-50 cursor-pointer hover:bg-neutral-100 transition-all duration-200 ease-in-out"
                            wire:ignore>
                            <i data-lucide="printer" class="h-4 w-4"></i>
                        </button>
                    </div>
                    @if ($data->status === App\Commons\Enum\CertificateStatus::Pending->value)
                        <button x-on:click="$store.SERVICE_WIDOW_DETAIL_STORE.finish()"
                            class="w-full flex items-center justify-center gap-2 rounded-lg py-2.5 text-sm text-accent-500 bg-neutral-50 cursor-pointer hover:bg-neutral-100 transition-all duration-200 ease-in-out"
                            wire:ignore>
                            <span>Selesai</span>
                        </button>
                    @endif
                </div>
            @endif

        </div>
    </div>
    <x-alert.confirmation onAccept="$store.SERVICE_WIDOW_DETAIL_STORE.onConfirm()" acceptText="Konfrimasi">
        <p class="text-sm text-neutral-700 text-justify">Anda akan mengkonfirmasi <span class="font-semibold">Surat
                Keterangan Janda</span>. Pastikan data yang anda isi sudah
            lengkap dan
            benar, jika sudah klik <span class="font-semibold">"Konfirmasi"</span> jika belum silahkan klik
            <span class="font-semibold">"Batal"</span> dan perbaiki data anda.
        </p>
    </x-alert.confirmation>
    <x-loader.page-loader />
    <x-alert.toast />
</section>
@push('scripts')
    @vite(['resources/js/util/index.js'])
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_WIDOW_DETAIL_STORE';
            const STORE_PROPS = {
                component: null,
                alertStore: null,
                pageLoaderStore: null,
                toastStore: null,
                form: {
                    status: '',
                    reason: ''
                },
                formValidator: {},
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                                '[data-component-id="online-letter-widow-detail"]')
                            ?.getAttribute(
                                'wire:id');
                        if (component.id === componentID) {
                            this.component = component;
                            this.alertStore = Alpine.store('alertStore');
                            this.pageLoaderStore = Alpine.store('pageLoaderStore');
                            this.toastStore = Alpine.store('toastStore');
                        }
                    });
                },
                confirm() {
                    this.alertStore.show();
                },
                onConfirm() {
                    this.alertStore.hide();
                    this.pageLoaderStore.show();
                    this.component.$wire.call('confirm', this.form)
                        .then(response => {
                            const {
                                status,
                                message,
                                data
                            } = response;
                            switch (status) {
                                case 200:
                                    this.toastStore.success("Berhasil melakukan konfirmasi", 2000,
                                        function() {
                                            window.location.reload();
                                        });
                                    break;
                                case 422:
                                    this.formValidator = data;
                                    this.toastStore.error('Harap mengisi data dengan lengkap dan benar',
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
                finish() {
                    this.pageLoaderStore.show();
                    this.component.$wire.call('finish')
                        .then(response => {
                            const {
                                status,
                                message,
                                data
                            } = response;
                            switch (status) {
                                case 200:
                                    this.toastStore.success("Berhasil menyelesaikan pengajuan surat", 1500,
                                        function() {
                                            window.location.reload();
                                        });
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
                download(id) {
                    this.pageLoaderStore.show();
                    this.component.$wire.call('create_receipt', id)
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
                }
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
