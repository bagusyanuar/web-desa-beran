<div class="w-full bg-brand-500 h-14 text-white" id="section-landing-top-navbar" data-component-id="landing-top-navbar">
    <x-container.landing-container class="h-full flex items-center justify-between">
        <div class="flex items-center gap-1">
            {{-- <img src="{{ asset('static/images/logo-image-white.png') }}" alt="logo-image" class="h-8" /> --}}
            <span class="font-bold">BeranDigital.id</span>
        </div>
        <div class="flex items-center gap-3">
            <div class="flex items-center gap-1">
                <i data-lucide="phone" class="text-white h-4 aspect-[1/1]"></i>
                <span class="text-xs">
                    (0812) 1234 5678
                </span>
            </div>
            <div class="flex items-center gap-1">
                <i data-lucide="mail" class="text-whit h-4 aspect-[1/1]"></i>
                <span class="text-xs">
                    desaberan@gmail.com
                </span>
            </div>
            <div class="h-4 border-r border-white"></div>
            <div class="flex items-center gap-1">
                <div class="flex items-center gap-1">
                    <i data-lucide="calendar" class="text-whit h-4 aspect-[1/1]"></i>
                    <span class="text-xs">
                        {{ \Carbon\Carbon::now()->format('Y-m-d') }}
                    </span>
                </div>
                <div class="flex items-center gap-1">
                    <i data-lucide="clock-4" class="text-whit h-4 aspect-[1/1]"></i>
                    <span class="text-xs" x-text="$store.landingTopNavbarStore.time"></span>
                </div>
            </div>
        </div>
    </x-container.landing-container>
</div>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_PROPS = {
                component: null,
                time: '00:00 WIB',
                interval: null,
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="landing-top-navbar"]')?.getAttribute('wire:id');
                        if (component.id === componentID) {
                            this.component = component;
                        }
                        this.initTime();
                    });
                },
                initTime() {
                    this.updateTime(); // set waktu awal
                    this.interval = setInterval(() => {
                        this.updateTime();
                    }, 1000);
                },
                updateTime() {
                    const now = new Date();
                    this.time = now.toLocaleTimeString('id-ID', {
                        hour: '2-digit',
                        minute: '2-digit',
                    }) + ' WIB';
                }
            };
            Alpine.store('landingTopNavbarStore', STORE_PROPS);
        })
    </script>
@endpush
