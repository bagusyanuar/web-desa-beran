@props([
    'text' => 'Menu',
    'to' => '#',
])

<li>
    <a href="{{ $to }}" class="flex items-center font-semibold text-xs px-3"
        x-bind:class="$store.LANDING_NAVBAR_STORE.mode === 'transparent' ? 'text-white' : 'text-brand-500'">
        <span>{{ $text }}</span>
    </a>
</li>
