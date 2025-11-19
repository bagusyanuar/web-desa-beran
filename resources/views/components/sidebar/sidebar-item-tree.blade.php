@props([
    'to' => '#',
    'text' => 'Item',
    'icon' => 'circle',
    'routes' => [],
    'active' => false,
])

@php
    $isActive = $active;
    foreach ($routes as $pattern) {
        if (request()->routeIs($pattern) || request()->routeIs($pattern . '.*')) {
            $isActive = true;
            break;
        }
    }
@endphp

<div class="w-full" x-data="{ expanded: {{ $isActive ? 'true' : 'false' }} }">
    <div x-on:click="expanded = !expanded;"
        class="group relative px-3 py-2.5 w-full rounded-md flex items-center gap-2 cursor-pointer transition-all duration-300 ease-in"
        x-bind:class="expanded ? 'bg-accent-500 text-white' : 'text-white/80 hover:bg-accent-500'">
        {{-- <div class="group-hover:block w-1.5 h-5/6 bg-accent-500 absolute top-1/2 left-0 -translate-y-1/2 rounded-tr-md rounded-br-md transition-all duration-200 ease-in"
            x-bind:class="expanded ? 'block' : 'hidden'">
        </div> --}}
        <i data-lucide="{{ $icon }}" class="h-5 aspect-[1/1] text-white/80 transition-all duration-300 ease-in-out"
            x-bind:class="expanded ? 'text-white' : 'text-white/80 group-hover:text-white'"></i>
        <span class="flex-1 text-white/80 font-light transition-all duration-300 ease-in-out"
            x-bind:class="expanded ? 'text-white' : 'text-white/80 group-hover:text-white'">{{ $text }}</span>
        <i data-lucide="chevron-down" class="h-5 aspect-[1/1] text-white/80 transition-all duration-300 ease-in-out"
            x-bind:class="expanded ? 'text-white' : 'text-white/80 group-hover:text-white'"></i>
    </div>
    <div class="w-full flex flex-col" x-cloak x-show="expanded" x-collapse>
        <div class="w-full ps-6 pe-3">
            <div class="w-full border-l border-neutral-300">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
