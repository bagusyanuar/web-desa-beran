<section id="complaint-detail" data-component-id="complaint-detail" class="w-full">
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
                <a href="{{ route('complaint') }}" class="text-brand-500 font-semibold hover:underline">Aduan
                    Masyarakat</a>
                <div wire:ignore class="text-brand-500">
                    <i data-lucide="chevron-right" class="h-4 aspect-[1/1]"></i>
                </div>
                <span class="text-brand-500 font-semibold">{{ $data->reference_number }}</span>
            </div>
            <div class="w-full flex items-start gap-5">
                <div class="flex-1 p-6 bg-white rounded-lg shadow-xl border-t-4 border-accent-500">
                    <p class="text-sm font-bold text-neutral-700">Informasi Aduan Masyarakat</p>
                    <div class="w-full pt-3 border-t border-neutral-300">
                        <div class="w-full overflow-hidden rounded-lg border border-neutral-300 mb-5">
                            <table class="border-collapse w-full text-sm font-semibold text-neutral-700">
                                <tr class="even:bg-white odd:bg-brand-50">
                                    <td class="px-3 py-2.5 w-32">
                                        <span>No. Tiket</span>
                                    </td>
                                    <td class="px-3 py-2.5 w-8">
                                        <span>:</span>
                                    </td>
                                    <td class="px-3 py-2.5">
                                        <span>{{ $data->reference_number }}</span>
                                    </td>
                                </tr>
                                <tr class="even:bg-white odd:bg-brand-50">
                                    <td class="px-3 py-2.5 w-32">
                                        <span>Status</span>
                                    </td>
                                    <td class="px-3 py-2.5 w-8">
                                        <span>:</span>
                                    </td>
                                    <td class="px-3 py-2.5">
                                        <x-chip.chip-status-complaint class="w-fit" x-data="{ status: '{{ $data->status }}' }" />
                                    </td>
                                </tr>
                                <tr class="even:bg-white odd:bg-brand-50">
                                    <td class="px-3 py-2.5 w-32">
                                        <span>Pelapor</span>
                                    </td>
                                    <td class="px-3 py-2.5 w-8">
                                        <span>:</span>
                                    </td>
                                    <td class="px-3 py-2.5">
                                        <span class="uppercase">{{ $data->applicant->name }}</span>
                                    </td>
                                </tr>
                                <tr class="even:bg-white odd:bg-brand-50">
                                    <td class="px-3 py-2.5 w-32">
                                        <span>No. Whatsapp</span>
                                    </td>
                                    <td class="px-3 py-2.5 w-8">
                                        <span>:</span>
                                    </td>
                                    <td class="px-3 py-2.5">
                                        <span>{{ $data->applicant->phone }}</span>
                                    </td>
                                </tr>
                                <tr class="even:bg-white odd:bg-brand-50" style="vertical-align: top">
                                    <td class="px-3 py-2.5 w-32">
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
                                                <div class="w-full h-60 rounded-lg">
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
                <!-- page suggestion -->
                <div class="w-80 flex flex-col gap-5">
                    <livewire:features.landing.suggestion.online-letter />
                    <livewire:features.landing.suggestion.product />
                </div>
            </div>
        </x-container.landing-container>
    </div>
</section>
