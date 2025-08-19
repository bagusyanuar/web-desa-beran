@props([
    'image' => 'static/images/hero/slide-1.png',
    'title' => '',
    'subTitle' => '',
])

<div class="w-full h-72 relative">
    <img src="{{ asset($image) }}" class="h-full w-full object-cover" alt="bg-hero" />
    <div
        class="absolute h-full w-full top-0 left-0 bg-gradient-to-b from-brand-600/90 to-brand-600/70 backdrop-blur-[3px] flex items-center justify-center">
        <x-container.landing-container>
            <h1 class="text-[36px] font-bold text-white">{{ $title }}</h1>
            <p class="text-white">{{ $subTitle }}</p>
        </x-container.landing-container>
    </div>
</div>
