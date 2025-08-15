<section class="mb-7" id="section-landing-service" data-component-id="landing-service" class="">
    <x-container.landing-container class="">
        <div class="w-full bg-white rounded-xl shadow-xl p-6">
            <div class="w-full">
                <h1 class="text-2xl font-bold text-center text-brand-500">Layanan Desa Beran</h1>
            </div>
            <div class="border-b border-brand-300 my-6">
            </div>
            <div class="grid grid-cols-3 gap-6">
                @foreach ($services as $service)
                    <a href="{{ $service['link'] }}" class="flex items-center gap-3 hover:underline">
                        <div
                            class="rounded-full h-16 min-w-16 border border-brand-500 flex justify-center items-center">
                            <img src="{{ asset($service['icon']) }}" class="h-8 w-8" alt="" />
                        </div>
                        <p class="text-lg font-semibold text-brand-500 leading-none">
                            {{ $service['text'] }}
                        </p>
                    </a>
                @endforeach
            </div>
            <div class="border-b border-brand-300 my-6">
            </div>
        </div>
    </x-container.landing-container>
</section>

@push('scripts')
@endpush
