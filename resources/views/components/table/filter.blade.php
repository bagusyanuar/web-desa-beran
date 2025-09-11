<div class="relative" x-data="{ open: false }">
    <div class="h-10 w-10 rounded-md flex items-center justify-center bg-white border border-neutral-300 cursor-pointer"
        wire:ignore x-on:click="open = !open">
        <i data-lucide="filter" class="text-neutral-500 h-4 w-4"></i>
    </div>
    <div x-cloak x-show="open" class="absolute p-2 top-11 right-0 bg-white border border-neutral-300 rounded-md"
        x-on:click.away="open = false;" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-5" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-5">
        {{ $slot }}
    </div>
</div>
