@props([
    'to' => '#',
    'text' => 'Item',
])

<a href="{{ $to }}"
    class="ps-3 py-2 text-neutral-500 hover:text-neutral-900 w-full rounded flex items-center gap-2 cursor-pointer transition-all duration-200 ease-in">
    <span>{{ $text }}</span>
</a>
