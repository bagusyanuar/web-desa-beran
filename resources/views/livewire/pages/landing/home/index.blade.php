<section id="section-landing-home" data-component-id="landing-home" class="w-full">
    <livewire:features.landing.home.hero imageHero="{{ $imageHero }}" />
    <div class="w-full">
        <livewire:features.landing.home.online-letter />
        <livewire:features.landing.home.about />
        <livewire:features.landing.home.product />
        <livewire:features.landing.home.news />
    </div>
</section>

@push('scripts')
@endpush
