<div class="w-full min-h-[40rem] relative">
    <img src="{{ asset('static/images/bg-ornament.png') }}" class="w-72 h-72 absolute top-5 left-5 rotate-180" />
    <img src="{{ asset('static/images/bg-ornament.png') }}" class="w-72 h-72 absolute bottom-5 right-5" />
    <div class="absolute top-0 left-0 w-full h-full bg-white/80">
    </div>
    <x-container.landing-container class="py-7 relative">
        {{ $slot }}
    </x-container.landing-container>
</div>
