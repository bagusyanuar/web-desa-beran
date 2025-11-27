<section id="regional" data-component-id="regional" class="w-full">
    <div class="w-full h-[20rem] relative">
        <div class="w-full h-full">
            <img src="{{ asset('static/images/service/bg-service.png') }}"
                class="h-full w-full object-cover object-center" alt="main-service" />
        </div>
        <div class="w-full h-full absolute top-0 left-0 bg-white/80 flex items-center justify-center">
            <x-container.landing-container class="flex flex-col items-center gap-3">
                <h1 class="text-4xl text-accent-700 font-bold text-center">PROFIL WILAYAH DESA BERAN</h1>
                <p class="text-md text-brand-500 w-1/2 text-center">Profil wilayah desa memuat gambaran umum tentang
                    letak geografis, batas wilayah, pembagian dusun, serta kondisi sosial ekonomi masyarakat. Informasi
                    ini menjadi dasar dalam perencanaan pembangunan sekaligus cerminan potensi dan identitas desa.</p>
            </x-container.landing-container>
        </div>
    </div>
    <div class="w-full py-10">
        <x-container.landing-container class="">
            <div class="w-full flex items-start gap-5">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-6 border border-neutral-300">
                    <p class="text-lg text-accent-500 font-bold mb-5">PROFIL WILAYAH DESA BERAN</p>
                    @if (!empty($data))
                        <div class="w-full text-neutral-700 text-sm">
                            {!! $data->description !!}
                        </div>
                    @endif
                    <p class="text-lg text-accent-500 font-bold mb-5 mt-5">PETA WILAYAH DESA</p>
                    <div id="map" class="z-10" style="height: 450px; width: 100%"></div>
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

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_REGIONAL_STORE';
            const STORE_PROPS = {
                component: null,
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="regional"]')?.getAttribute(
                            'wire:id');
                        if (component.id === componentID) {
                            this.component = component;
                            this.generateMap()
                        }
                    });
                },
                generateMap() {
                    const map = L.map('map').setView([-7.407, 110.36], 14);

                    // Tile OSM
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '© OpenStreetMap'
                    }).addTo(map);

                    fetch('/static/geojson/map.geojson')
                        .then(res => res.json())
                        .then(data => {
                            const area = L.geoJSON(data, {
                                style: {
                                    color: 'red',
                                    weight: 2,
                                    fillColor: 'yellow',
                                    fillOpacity: 0.3
                                }
                            }).addTo(map);

                            // Zoom otomatis ke area polygon
                            map.fitBounds(area.getBounds());

                            // Optional: tambahkan popup nama desa
                            area.bindPopup('Desa Beran, Ngawi');
                        })
                        .catch(err => console.error('Gagal load GeoJSON:', err));
                },
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
