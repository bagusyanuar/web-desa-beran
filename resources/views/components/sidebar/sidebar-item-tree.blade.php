@props([
    'to' => '#',
    'text' => 'Item',
    'icon' => 'circle',
])

<div class="w-full" x-data="{ expanded: false }">
    <div x-on:click="expanded = !expanded;"
        class="group relative px-3 py-2.5 w-full rounded flex items-center gap-2 cursor-pointer transition-all duration-200 ease-in">
        <div class="group-hover:block w-1.5 h-5/6 bg-accent-500 absolute top-1/2 left-0 -translate-y-1/2 rounded-tr-md rounded-br-md transition-all duration-200 ease-in"
            x-bind:class="expanded ? 'block' : 'hidden'">
        </div>
        <i data-lucide="{{ $icon }}" class="text-neutral-500 group-hover:text-neutral-900 h-5 aspect-[1/1]"></i>
        <span class="text-neutral-500 group-hover:text-neutral-900 flex-1">{{ $text }}</span>
        <i data-lucide="chevron-down" class="text-neutral-500 group-hover:text-neutral-900 h-5 aspect-[1/1]"></i>
    </div>
    <div class="w-full flex flex-col" x-cloak x-show="expanded" x-collapse>
        <div class="w-full ps-6 pe-3">
            <div class="w-full border-l border-neutral-300">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
