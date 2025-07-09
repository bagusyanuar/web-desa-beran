@props([
    'to' => '#',
    'text' => 'Item',
    'icon' => 'circle'
])

<a href="{{ $to }}"
    class="px-3 py-2.5 w-full rounded flex items-center gap-2 cursor-pointer hover:bg-neutral-200 transition-all duration-200 ease-in">
    <i data-lucide="{{ $icon }}" class="text-neutral-700 group-focus-within:text-neutral-700 h-5 aspect-[1/1]"></i>
    <span class="text-neutral-700">{{ $text }}</span>
</a>
