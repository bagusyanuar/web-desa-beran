<section class="mb-7" id="section-landing-service" data-component-id="landing-service">
    <x-container.landing-container class="">
        <div class="w-full bg-white rounded-xl shadow-xl p-6"
            style="background-image: url('{{ asset('/static/images/batik-bg.png') }}')">
            <div class="w-full">
                <h1 class="text-2xl font-bold text-center text-brand-500">Layanan Desa Beran</h1>
            </div>
            <div class="border-b border-brand-300 my-6">
            </div>
            <div class="grid grid-cols-3 gap-6">
                @foreach ($services as $service)
                    <div class="flex items-center gap-3">
                        <div class="rounded-full h-16 min-w-16 bg-neutral-500">
                        </div>
                        <p class="text-lg font-semibold text-brand-500 leading-none">
                            {{ $service['text'] }}
                        </p>
                    </div>
                @endforeach
            </div>
            <div class="border-b border-brand-300 my-6">
            </div>
        </div>
    </x-container.landing-container>
</section>

@push('scripts')
@endpush
