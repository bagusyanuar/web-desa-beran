@props([
    'text' => 'Menu',
    'to' => '#'
])
<a href="{{ $to }}"
    class="rounded block p-1.5 text-sm text-neutral-700 hover:bg-brand-500 hover:text-white transition-all duration-200 ease-in">{{ $text }}</a>
