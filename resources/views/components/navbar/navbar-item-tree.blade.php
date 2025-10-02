@props([
    'text' => 'Menu',
])

<li x-data="{ open: false }" class="relative">
    <a href="#" class="relative flex items-center font-semibold text-sm ps-3 pe-1.5"
        x-bind:class="$store.LANDING_NAVBAR_STORE.mode === 'transparent' ? 'text-white' : 'text-brand-500'"
        x-on:click.prevent="open = !open">
        <span>{{ $text }}</span>
        <i data-lucide="chevron-down" class="h-[0.875rem] aspect-[1/1]"></i>
    </a>
    <div x-cloak x-show="open" x-on:click.away="open = false;" class="absolute top-10 right-0"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-5"
        x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-5">
        {{ $slot }}
    </div>
</li>
