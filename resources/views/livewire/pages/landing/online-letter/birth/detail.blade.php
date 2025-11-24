<section id="online-letter-birth-detail" data-component-id="online-letter-birth-detail" class="w-full">
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
                INFORMASI PENGAJUAN SURAT KETERANGAN KELAHIRAN
            </p>
            <div class="w-5/6 justify-self-center bg-white rounded-xl shadow-xl p-6 border border-neutral-300">
                <div class="w-full">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-sm font-bold text-neutral-700 mb-3">A. Data Bayi</p>
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
                                <td class="px-3 py-2.5 uppercase">
                                    <span>{{ $data->infant->name }}</span>
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
                                    <span>{{ $data->infant->birth_place . ', ' . \Carbon\Carbon::parse($data->infant->date_of_birth)->translatedFormat('d F Y') }}</span>
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
                                    <span>{{ App\Commons\Libs\Helper\Converter::genderToDisplay($data->infant->gender) }}</span>
                                </td>
                            </tr>
                            <tr class="even:bg-white odd:bg-brand-50">
                                <td class="px-3 py-2.5">
                                    <span>Jenis Kelahiran</span>
                                </td>
                                <td class="px-3 py-2.5 w-8">
                                    <span>:</span>
                                </td>
                                <td class="px-3 py-2.5">
                                    <span>{{ App\Commons\Libs\Helper\Converter::birthTypeToDisplay($data->infant->birth_type) }}</span>
                                </td>
                            </tr>
                            <tr class="even:bg-white odd:bg-brand-50">
                                <td class="px-3 py-2.5">
                                    <span>Anak Ke</span>
                                </td>
                                <td class="px-3 py-2.5 w-8">
                                    <span>:</span>
                                </td>
                                <td class="px-3 py-2.5">
                                    <span>{{ $data->infant->birth_order }}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-sm font-bold text-neutral-700 mb-3">B. Data Ibu</p>
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
                                <td class="px-3 py-2.5 uppercase">
                                    <span>{{ $data->mother->name }}</span>
                                </td>
                            </tr>
                            <tr class="even:bg-white odd:bg-brand-50">
                                <td class="px-3 py-2.5 w-48">
                                    <span>Tempat, Tanggal Lahir</span>
                                </td>
                                <td class="px-3 py-2.5 w-8">
                                    <span>:</span>
                                </td>
                                <td class="px-3 py-2.5">
                                    @php
                                        \Carbon\Carbon::setLocale('id');
                                    @endphp
                                    <span>{{ $data->mother->birth_place . ', ' . \Carbon\Carbon::parse($data->mother->date_of_birth)->translatedFormat('d F Y') }}</span>
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
                                    <span>{{ App\Commons\Libs\Helper\Converter::citizenshipToDisplay($data->mother->citizenship) }}</span>
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
                                    <span>{{ ucfirst($data->mother->religion) }}</span>
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
                                    <span>{{ $data->mother->job ?? '-' }}</span>
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
                                    <span>{{ $data->mother->address }}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-sm font-bold text-neutral-700 mb-3">C. Data Ayah</p>
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
                                <td class="px-3 py-2.5 uppercase">
                                    <span>{{ $data->father->name }}</span>
                                </td>
                            </tr>
                            <tr class="even:bg-white odd:bg-brand-50">
                                <td class="px-3 py-2.5 w-48">
                                    <span>Tempat, Tanggal Lahir</span>
                                </td>
                                <td class="px-3 py-2.5 w-8">
                                    <span>:</span>
                                </td>
                                <td class="px-3 py-2.5">
                                    @php
                                        \Carbon\Carbon::setLocale('id');
                                    @endphp
                                    <span>{{ $data->father->birth_place . ', ' . \Carbon\Carbon::parse($data->father->date_of_birth)->translatedFormat('d F Y') }}</span>
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
                                    <span>{{ App\Commons\Libs\Helper\Converter::citizenshipToDisplay($data->father->citizenship) }}</span>
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
                                    <span>{{ ucfirst($data->father->religion) }}</span>
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
                                    <span>{{ $data->father->job ?? '-' }}</span>
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
                                    <span>{{ $data->father->address }}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <p class="text-sm font-bold text-neutral-700 mb-3 mt-5">D. Data Permohonan</p>
                    <div class="w-full overflow-hidden rounded-lg border border-neutral-300">
                        <table class="border-collapse w-full text-sm font-semibold">
                            <tr class="even:bg-white odd:bg-brand-50">
                                <td class="px-3 py-2.5 w-64">
                                    <span>No. Permohonan</span>
                                </td>
                                <td class="px-3 py-2.5 w-8">
                                    <span>:</span>
                                </td>
                                <td class="px-3 py-2.5">
                                    <span>{{ $data->reference_number }}</span>
                                </td>
                            </tr>
                            <tr class="even:bg-white odd:bg-brand-50">
                                <td class="px-3 py-2.5">
                                    <span>Tgl. Permohonan</span>
                                </td>
                                <td class="px-3 py-2.5 w-8">
                                    <span>:</span>
                                </td>
                                <td class="px-3 py-2.5">
                                    @php
                                        \Carbon\Carbon::setLocale('id');
                                    @endphp
                                    <span>{{ \Carbon\Carbon::parse($data->date)->translatedFormat('d F Y') }}</span>
                                </td>
                            </tr>
                            <tr class="even:bg-white odd:bg-brand-50">
                                <td class="px-3 py-2.5">
                                    <span>Nama Pemohon</span>
                                </td>
                                <td class="px-3 py-2.5 w-8">
                                    <span>:</span>
                                </td>
                                <td class="px-3 py-2.5 uppercase">
                                    <span>{{ $data->applicant->name }}</span>
                                </td>
                            </tr>
                            <tr class="even:bg-white odd:bg-brand-50">
                                <td class="px-3 py-2.5">
                                    <span>No. Whatsapp Pemohon</span>
                                </td>
                                <td class="px-3 py-2.5 w-8">
                                    <span>:</span>
                                </td>
                                <td class="px-3 py-2.5">
                                    <span>{{ $data->applicant->phone }}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <p class="text-sm font-bold text-neutral-700 mb-3 mt-5">E. Persayaratan</p>
                    <div
                        class="w-full flex items-start gap-3 rounded-lg bg-blue-100 text-blue-500 border border-blue-500 p-3">
                        <i data-lucide="info" class="h-6 w-6"></i>
                        <div class="flex-1">
                            <p class="text-sm mb-3">Sehubungan dengan pengajuan Surat Keterangan Domisili, bersama ini
                                kami
                                sampaikan bahwa pemohon diwajibkan membawa dan melampirkan dokumen kelengkapan sebagai
                                berikut :</p>
                            <ol class="list-decimal list-outside ml-4 text-sm">
                                <li>
                                    <p>Fotokopi KTP</p>
                                </li>
                                <li>
                                    <p>Fotokopi Kartu Keluarga (KK)</p>
                                </li>
                                <li>
                                    <p>Surat Pengantar dari RT dan RW</p>
                                </li>
                            </ol>

                        </div>
                    </div>
                </div>
            </div>
        </x-container.landing-container>
    </div>
</section>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_BIRTH_DETAIL_STORE';
            const STORE_PROPS = {
                component: null,
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                                '[data-component-id="online-letter-birth-detail"]')
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
