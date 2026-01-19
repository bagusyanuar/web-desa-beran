@props([
    'to' => '#',
    'text' => 'Item',
])

@php
    $isActive = request()->is(trim(parse_url($to, PHP_URL_PATH), '/') . '*');
@endphp

<a href="{{ $to }}"
    class="{{ $isActive ? 'text-accent-500 font-normal' : 'font-light text-white/80 hover:text-accent-500 hover:font-normal' }} ps-3 py-2 w-full rounded flex items-center gap-2 cursor-pointer transition-all duration-300 ease-in">
    <span>{{ $text }}</span>
</a>
