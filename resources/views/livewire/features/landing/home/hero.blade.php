<section id="section-landing-hero" data-component-id="landing-hero">
    <div class="w-full">
        <x-carousel.hero-wrapper>
            @foreach ($heroes as $hero)
                <x-carousel.hero-item image="{{ $hero }}" />
            @endforeach
        </x-carousel.hero-wrapper>
    </div>
</section>

@push('scripts')
    @vite(['resources/js/landing/landing-hero.js'])
@endpush
