@props([
    'type' => 'text',
    'icon' => 'circle',
])

<div
    class="relative group w-full ps-[1.325rem] pe-[0.625rem] flex items-center border border-neutral-300 rounded-lg focus-within:outline-none focus-within:ring-0 focus-within:border-neutral-500 transition-[border] duration-200 ease-in">
    <div wire:ignore class="h-full flex items-center px-[0.25rem] absolute inset-y-0 start-0">
        <i data-lucide="{{ $icon }}" class="text-neutral-500 group-focus-within:text-neutral-700 h-[1rem] aspect-[1/1]"></i>
    </div>
    <input
        {{ $attributes->merge(['class' => 'w-full text-md ps-[0.5rem] pe-0 leading-none py-[0.5rem] border-none rounded-lg outline-none focus:outline-none focus:ring-0 text-neutral-700  disabled:bg-neutral-200 placeholder:text-neutral-500']) }} />
</div>
