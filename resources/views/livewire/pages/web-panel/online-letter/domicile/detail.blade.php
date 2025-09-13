<section id="online-letter-domicile-detail" data-component-id="online-letter-domicile-detail" class="w-full">
    <div class="mb-7 flex items-start gap-3">
        <a href="{{ route('web-panel.online-letter.domicile') }}"
            class="w-10 h-10 flex items-center justify-center rounded-lg border border-neutral-300 cursor-pointer hover:bg-neutral-100 transition-all ease-in-out duration-200"
            wire:ignore>
            <i data-lucide="arrow-left" class="text-neutral-700 h-4 w-4"></i>
        </a>
        <div>
            <p class="text-xl text-neutral-700 font-bold">Surat Keterangan Domisili</p>
            <p class="text-md text-neutral-500">Halaman ini digunakan untuk mengelola surat keterangan domisili.</p>
        </div>
    </div>
    <div class="w-full flex items-start gap-4">
        <div class="flex-1 p-6 bg-white border border-neutral-300 shadow-xl rounded-lg">
            <p class="text-sm font-bold text-neutral-700 mb-3">A. Data Diri</p>
            <div class="w-full overflow-hidden rounded-lg border border-neutral-300">
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
                            <span>Indonesia</span>
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
                            <span>Kristen</span>
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
                            <span>Belum Menikah</span>
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
                            <span>Freelancer</span>
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
                            <span>Jl. surya no. 8, jagalan, surakarta</span>
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
                <p class="text-sm text-neutral-700">(627718812958)</p>
            </div>
            <div class="w-full border-b border-neutral-300 my-3">
            </div>
            <p class="text-sm font-bold text-neutral-700 mb-3">Konfirmasi</p>
            <div class="w-full mb-3" wire:ignore>
                <x-select.select2 id="gender" x-init="initSelect({ placeholder: 'pilih status konfirmasi' })"
                    x-model="$store.SERVICE_DOMICILE_DETAIL_STORE.form.status">
                    <option></option>
                    <option value="accept">Terima</option>
                    <option value="denied">Tolak</option>
                </x-select.select2>
            </div>
            <div x-cloak x-show="$store.SERVICE_DOMICILE_DETAIL_STORE.form.status === 'denied'" class="w-full"
                wire:ignore>
                <x-label.label for="address">
                    <span>Alasan Penolakan</span>
                    <span class="text-red-500 text-sm italic">*</span>
                </x-label.label>
                <x-input.text.textarea id="address" rows="3"
                    x-model="$store.SERVICE_DOMICILE_STORE.form.reason" />
                <template x-if="'reason' in $store.SERVICE_DOMICILE_DETAIL_STORE.formValidator">
                    <x-label.validator>
                        <span x-text="$store.v.formValidator.reason[0]"></span>
                    </x-label.validator>
                </template>
            </div>
            <div class="w-full border-b border-neutral-300 my-3">
            </div>
            <button
                class="w-full flex items-center justify-center gap-1 rounded-lg py-2.5 text-sm text-white bg-accent-500 cursor-pointer hover:bg-accent-700 transition-all duration-200 ease-in-out"
                wire:ignore>
                <i data-lucide="check" class="h-4 w-4"></i>
                <span>Konfirmasi</span>
            </button>
        </div>
    </div>

</section>
@push('scripts')
    @vite(['resources/js/util/select2.js', 'resources/js/util/alert.js', 'resources/js/util/loader.js'])
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_DOMICILE_DETAIL_STORE';
            const STORE_PROPS = {
                component: null,
                form: {
                    status: '',
                    reason: ''
                },
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                                '[data-component-id="online-letter-domicile-detail"]')
                            ?.getAttribute(
                                'wire:id');
                        if (component.id === componentID) {
                            this.component = component;
                        }
                    });
                },
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
