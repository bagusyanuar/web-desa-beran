@props([
    'to' => '#',
    'text' => 'Item',
    'icon' => 'circle'
])

<a href="{{ $to }}"
    class="group relative px-3 py-2.5 w-full rounded flex items-center gap-2 cursor-pointer transition-all duration-200 ease-in">
    <div class="hidden group-hover:block w-1.5 h-5/6 bg-accent-500 absolute top-1/2 left-0 -translate-y-1/2 rounded-tr-md rounded-br-md transition-all duration-200 ease-in">
    </div>
    <i data-lucide="{{ $icon }}" class="text-neutral-500 group-hover:text-neutral-900 h-5 aspect-[1/1]"></i>
    <span class="text-neutral-500 group-hover:text-neutral-900">{{ $text }}</span>
</a>
