@props([
    'to' => '#',
    'text' => 'Item',
    'icon' => 'circle',
])

@php
    $isActive = request()->is(trim(parse_url($to, PHP_URL_PATH), '/') . '*');
@endphp

<a href="{{ $to }}"
    class="group relative px-3 py-2.5 w-full rounded-md flex items-center gap-2 cursor-pointer {{ $isActive ? 'bg-accent-500' : 'hover:bg-accent-500' }} transition-all duration-300 ease-in-out">
    <i data-lucide="{{ $icon }}"
        class="{{ $isActive ? 'text-white' : 'text-white/80 group-hover:text-white' }} h-5 aspect-[1/1] transition-all duration-300 ease-in-out"></i>
    <span
        class="{{ $isActive ? 'text-white' : 'text-white/80 group-hover:text-white' }} font-light transition-all duration-300 ease-in-out">{{ $text }}</span>
</a>
