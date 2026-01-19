<section id="history" data-component-id="history" class="w-full">
    <div class="w-full h-[20rem] relative">
        <div class="w-full h-full">
            <img src="{{ asset('static/images/service/bg-service.png') }}"
                class="h-full w-full object-cover object-center" alt="main-service" />
        </div>
        <div class="w-full h-full absolute top-0 left-0 bg-white/80 flex items-center justify-center">
            <x-container.landing-container class="flex flex-col items-center gap-3">
                <h1 class="text-4xl text-accent-700 font-bold text-center">RT/RW DESA BERAN</h1>
                <p class="text-md text-brand-500 w-1/2 text-center">Struktur wilayah Desa Beran terdiri dari dusun, RW,
                    dan RT yang saling mendukung dalam pelayanan masyarakat. Dusun menjadi wilayah administrasi utama,
                    RW mengkoordinasikan beberapa RT, dan RT menjadi unit terkecil yang berhubungan langsung dengan
                    warga. Kolaborasi ketiganya mencerminkan semangat kebersamaan dalam menjaga ketertiban,
                    keharmonisan, dan kemajuan Desa Beran.</p>
            </x-container.landing-container>
        </div>
    </div>
    <div class="w-full py-10">
        <x-container.landing-container class="">
            <div class="w-full flex items-start gap-5">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-6 border border-neutral-300">
                    <p class="text-lg text-accent-500 font-bold mb-5">RT/RW DESA BERAN</p>
                    @if (!empty($data))
                        @foreach ($data as $datum)
                            <div class="w-full rounded-lg mb-3 last:mb-0">
                                <div class="w-full rounded-t-lg bg-accent-500 text-white px-3 py-1.5 text-sm">
                                    <div class="flex items-center justify-between">
                                        <span>{{ $datum->name }}</span>
                                        <span>Kepala Dusun : {{ $datum->leader_name }}
                                            {{ $datum->leader_contact ? '(' . $datum->leader_contact . ')' : '' }}</span>
                                    </div>
                                </div>
                                <div class="w-full border border-neutral-400 border-t-0 rounded-b-lg px-3 py-2.5">
                                    <div class="w-full border border-neutral-400 rounded-md">
                                        <table class="w-full border-collapse text-sm text-neutral-700">
                                            <tr class="border-b border-neutral-400 font-semibold">
                                                <td class="w-[50px] px-1.5 py-1 text-center">
                                                    #
                                                </td>
                                                <td class="w-[150px] px-1.5 py-1">RW
                                                </td>
                                                <td class="min-w-[250px] px-1.5 py-1">
                                                    Ketua
                                                </td>
                                                <td class="w-[120px] px-1.5 py-1 text-center">Jumlah RT
                                                </td>
                                            </tr>
                                            @if (!empty($datum->community_units))
                                                @foreach ($datum->community_units as $communityUnit)
                                                    <tr class="">
                                                        <td class="w-[50px] px-1.5 py-1 text-center">
                                                            {{ $loop->index + 1 }}</td>
                                                        <td class="w-[150px] px-1.5 py-1">{{ $communityUnit->code }}
                                                        </td>
                                                        <td class="min-w-[250px] px-1.5 py-1 uppercase">
                                                            {{ $communityUnit->leader_name }}
                                                            {{ $communityUnit->leader_contact ? '(' . $communityUnit->leader_contact . ')' : '' }}
                                                        </td>
                                                        <td class="w-[120px] px-1.5 py-1 text-center">
                                                            {{ count($communityUnit->neighborhood_units) }}
                                                        </td>
                                                    </tr>
                                                    <tr class="border-b border-t border-neutral-400 last:border-b-0">
                                                        <td class="w-[50px] px-1.5 py-1 text-center">
                                                        </td>
                                                        <td colspan="3">
                                                            <table
                                                                class="w-full border-collapse text-sm text-neutral-700 border-l border-neutral-400">
                                                                <tr class="border-b border-neutral-400 font-semibold">
                                                                    <td class="w-[50px] px-1.5 py-1 text-center">
                                                                        #
                                                                    </td>
                                                                    <td class="w-[150px] px-1.5 py-1 text-center">
                                                                        RT
                                                                    </td>
                                                                    <td class="min-w-[250px] px-1.5 py-1">
                                                                        Ketua
                                                                    </td>
                                                                </tr>
                                                                @if (!empty($communityUnit->neighborhood_units))
                                                                    @forelse ($communityUnit->neighborhood_units as $neighborhoodUnit)
                                                                        <tr
                                                                            class="border-b border-neutral-400 last:border-b-0">
                                                                            <td
                                                                                class="w-[50px] px-1.5 py-1 text-center">
                                                                                {{ $loop->index + 1 }}</td>
                                                                            <td
                                                                                class="w-[150px] px-1.5 py-1 text-center">
                                                                                {{ $neighborhoodUnit->code }}
                                                                            </td>
                                                                            <td
                                                                                class="min-w-[250px] px-1.5 py-1 uppercase">
                                                                                {{ $neighborhoodUnit->leader_name }}
                                                                                {{ $neighborhoodUnit->leader_contact ? '(' . $neighborhoodUnit->leader_contact . ')' : '' }}
                                                                            </td>
                                                                        </tr>
                                                                    @empty
                                                                        <tr
                                                                            class="border-b border-neutral-400 last:border-b-0">
                                                                            <td colspan="3"
                                                                                class="px-1.5 py-1 text-center">
                                                                                <span>Tidak ada data RT</span>
                                                                            </td>
                                                                        </tr>
                                                                    @endforelse
                                                                @else
                                                                    <tr
                                                                        class="border-b border-neutral-400 last:border-b-0">
                                                                        <td colspan="3"
                                                                            class="px-1.5 py-1 text-center">
                                                                            <span>Tidak ada data rt</span>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            </table>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- page suggestion -->
                <div class="w-80 flex flex-col gap-5">
                    <livewire:features.landing.suggestion.online-letter />
                    <livewire:features.landing.suggestion.news />
                    <livewire:features.landing.suggestion.product />
                </div>
            </div>
        </x-container.landing-container>
    </div>
</section>
