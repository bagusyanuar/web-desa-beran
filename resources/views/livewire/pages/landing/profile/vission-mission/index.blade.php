<section id="vission-mission" data-component-id="vission-mission" class="w-full">
    <div class="w-full h-[20rem] relative">
        <div class="w-full h-full">
            <img src="{{ asset('static/images/service/bg-service.png') }}"
                class="h-full w-full object-cover object-center" alt="main-service" />
        </div>
        <div class="w-full h-full absolute top-0 left-0 bg-white/80 flex items-center justify-center">
            <x-container.landing-container class="flex flex-col items-center gap-3">
                <h1 class="text-4xl text-accent-700 font-bold text-center">VISI DAN MISI DESA BERAN</h1>
                <p class="text-md text-brand-500 w-1/2 text-center">Visi dan misi Desa Beran merupakan arah dan pedoman
                    dalam mewujudkan tata kelola pemerintahan desa yang
                    transparan, partisipatif, dan berorientasi pada kesejahteraan masyarakat. Melalui visi yang jelas
                    dan misi yang
                    terukur, Desa Beran berkomitmen membangun lingkungan yang maju, mandiri, dan berkeadilan bagi
                    seluruh warga.</p>
            </x-container.landing-container>
        </div>
    </div>
    <div class="w-full py-10">
        <x-container.landing-container class="">
            <div class="w-full flex items-center gap-1 mb-5" wire:ignore x-data="{
                initIcons() {
                    setTimeout(() => { lucide.createIcons(); }, 0);
                }
            }" x-init="initIcons()"
                x-effect="initIcons()">
                <a href="/" class="text-brand-500 font-semibold hover:underline">Beranda</a>
                <div wire:ignore class="text-brand-500">
                    <i data-lucide="chevron-right" class="h-4 aspect-[1/1]"></i>
                </div>
                <span class="text-brand-700 font-semibold">Visi dan Misi Desa Beran</span>
            </div>
            <div class="w-full flex items-start gap-5">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-6 border border-neutral-300">
                    <p class="text-lg text-accent-500 font-bold mb-5">VISI DAN MISI DESA BERAN</p>
                    @if (!empty($data))
                        <p class="text-lg text-neutral-700 font-bold mb-1">VISI</p>
                        <div class="text-content w-full text-neutral-700 text-sm mb-5">
                            {!! $data->vission !!}
                        </div>
                        <p class="text-lg text-neutral-700 font-bold mb-1">MISI</p>
                        <div class="text-content w-full text-neutral-700 text-sm mb-5">
                            {!! $data->mission !!}
                        </div>
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
