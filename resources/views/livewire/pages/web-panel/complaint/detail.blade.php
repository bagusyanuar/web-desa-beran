<section id="complaint-detail" data-component-id="complaint-detail" class="w-full">
    <div class="mb-5 flex items-start gap-2">
        <a href="{{ route('web-panel.complaint') }}"
            class="w-8 h-8 flex items-center justify-center rounded-lg border border-neutral-300 cursor-pointer shadow-md hover:bg-neutral-200 transition-all ease-in-out duration-200"
            wire:ignore>
            <i data-lucide="arrow-left" class="text-neutral-700 h-3 w-3"></i>
        </a>
        <div>
            <p class="text-lg text-neutral-700 font-semibold leading-[1.2]">Aduan Masyarakat</p>
            <p class="text-sm text-neutral-500">Halaman ini digunakan untuk mengelola aduan masyarakat.</p>
        </div>
    </div>
    <div class="w-full flex items-start gap-5">
        <div class="flex-1 bg-white shadow-2xl p-6 rounded-lg border-t-4 border-accent-500">
            <div class="flex items-center justify-between mb-3">
                <p class="text-sm font-bold text-neutral-700">Informasi Aduan Masyarakat</p>
                <x-chip.chip-status-complaint x-data="{ status: '{{ $data->status }}' }" />
            </div>
            <div class="w-full pt-3 border-t border-neutral-300">
                <div class="w-full overflow-hidden rounded-lg border border-neutral-300 mb-5">
                    <table class="border-collapse w-full text-sm font-semibold text-neutral-700">
                        <tr class="even:bg-white odd:bg-brand-50">
                            <td class="px-3 py-2.5 w-24">
                                <span>No. Tiket</span>
                            </td>
                            <td class="px-3 py-2.5 w-8">
                                <span>:</span>
                            </td>
                            <td class="px-3 py-2.5">
                                <span>{{ $data->reference_number }}</span>
                            </td>
                        </tr>
                        <tr class="even:bg-white odd:bg-brand-50" style="vertical-align: top">
                            <td class="px-3 py-2.5 w-24">
                                <span>Aduan</span>
                            </td>
                            <td class="px-3 py-2.5 w-8">
                                <span>:</span>
                            </td>
                            <td class="px-3 py-2.5 text-neutral-700">
                                <span>{{ $data->description }}</span>
                            </td>
                        </tr>
                        <tr class="even:bg-white odd:bg-brand-50" style="vertical-align: top">
                            <td class="px-3 py-2.5 w-24">
                                <span>Lampiran</span>
                            </td>
                            <td class="px-3 py-2.5 w-8">
                                <span>:</span>
                            </td>
                            <td class="px-3 py-2.5 text-neutral-700">
                                <div class="w-full flex flex-col gap-1">
                                    @foreach ($data->images as $image)
                                        <div class="w-full h-48 rounded-lg">
                                            <img src="{{ asset($image->image) }}" alt="complaint-image"
                                                class="w-full h-full rounded-lg object-center object-cover" />
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="w-96 bg-white shadow-2xl p-6 rounded-lg border-t-4 border-accent-500">
            <p class="text-sm font-bold text-neutral-700 mb-3">Informasi Pemohon</p>
            <div class="flex items-center gap-3 mb-1" wire:ignore>
                <i data-lucide="user" class="w-4 h-4 text-neutral-700"></i>
                <p class="text-sm text-neutral-700 uppercase">{{ $data->applicant->name }}</p>
            </div>
            <div class="flex items-center gap-3" wire:ignore>
                <i data-lucide="phone" class="w-4 h-4 text-neutral-700"></i>
                <p class="text-sm text-neutral-700">({{ $data->applicant->phone }})</p>
            </div>
            <div class="w-full border-b border-neutral-300 my-3">
            </div>
            @if ($data->status === 'pending')
                <p class="text-sm font-bold text-neutral-700 mb-3">Konfirmasi</p>
                <div class="w-full mb-3" wire:ignore>
                    <x-select.select2 id="status" x-init="initSelect({ placeholder: 'pilih status konfirmasi' })"
                        x-model="$store.SERVICE_COMPLAINT_DETAIL_STORE.form.status">
                        <option></option>
                        <option value="approved">Terima</option>
                        <option value="denied">Tolak</option>
                    </x-select.select2>
                    <template x-if="'status' in $store.SERVICE_COMPLAINT_DETAIL_STORE.formValidator">
                        <x-label.validator>
                            <span x-text="$store.SERVICE_COMPLAINT_DETAIL_STORE.formValidator.status[0]"></span>
                        </x-label.validator>
                    </template>
                </div>
                <div x-cloak x-show="$store.SERVICE_COMPLAINT_DETAIL_STORE.form.status === 'denied'" class="w-full"
                    wire:ignore>
                    <x-label.label for="address">
                        <span>Alasan Penolakan</span>
                        <span class="text-red-500 text-sm italic">*</span>
                    </x-label.label>
                    <x-input.text.textarea id="address" rows="3" class="!text-sm"
                        x-model="$store.SERVICE_COMPLAINT_DETAIL_STORE.form.reason" />
                    <template x-if="'reason' in $store.SERVICE_COMPLAINT_DETAIL_STORE.formValidator">
                        <x-label.validator>
                            <span x-text="$store.SERVICE_COMPLAINT_DETAIL_STORE.formValidator.reason[0]"></span>
                        </x-label.validator>
                    </template>
                </div>
                <div class="w-full border-b border-neutral-300 my-3">
                </div>
                <button x-on:click="$store.SERVICE_COMPLAINT_DETAIL_STORE.confirm()"
                    class="w-full flex items-center justify-center gap-1 rounded-lg py-2.5 text-sm text-white bg-accent-500 cursor-pointer hover:bg-accent-700 transition-all duration-200 ease-in-out"
                    wire:ignore>
                    <i data-lucide="check" class="h-4 w-4"></i>
                    <span>Konfirmasi</span>
                </button>
            @endif

            @if ($data->status === 'denied')
                <p class="text-sm font-bold text-neutral-700 mb-3">Alasan Penolakan :</p>
                <p class="text-sm text-neutral-700">{{ $data->response }}</p>
                <div class="w-full border-b border-neutral-300 my-3">
                </div>
            @endif
        </div>
    </div>
    <x-alert.confirmation onAccept="$store.SERVICE_COMPLAINT_DETAIL_STORE.onConfirm()" acceptText="Konfrimasi">
        <p class="text-sm text-neutral-700 text-justify">Anda akan mengkonfirmasi <span class="font-semibold">Aduan
                Masyarakat</span>. Pastikan data yang anda isi sudah
            lengkap dan
            benar, jika sudah klik <span class="font-semibold">"Konfirmasi"</span> jika belum silahkan klik
            <span class="font-semibold">"Batal"</span> dan perbaiki data anda.
        </p>
    </x-alert.confirmation>
</section>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_COMPLAINT_DETAIL_STORE';
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
                                '[data-component-id="complaint-detail"]')
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
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
