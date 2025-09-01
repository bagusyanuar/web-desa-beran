@props([
    'text' => 'Menu',
    'to' => '#'
])

<li>
    <a href="{{ $to }}" class="flex items-center text-white font-semibold text-xs px-3">
        <span>{{ $text }}</span>
    </a>
</li>
