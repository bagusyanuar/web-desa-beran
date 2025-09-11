@props(['store', 'stateParam' => 'param', 'dispatcher' => 'dispatch', 'debounce' => 1500])

@if (empty($store))
    @php
        throw new Exception('The "store" property is required.');
    @endphp
@endif

<div class="flex items-center border border-neutral-300 rounded-md w-64" wire:ignore>
    <i data-lucide="search" class="text-neutral-500 min-h-4 min-w-4 ms-2"></i>
    <input type="text" placeholder="search..."
        class="flex-grow w-full py-2 ps-2 pe-3 rounded-md text-sm text-neutral-700 border-none focus:outline-none focus:ring-0"
        x-model="param" x-bind="tableSearch" x-bind:store="'{{ $store }}'"
        x-bind:state-param="'{{ $stateParam }}'" x-bind:dispatcher="'{{ $dispatcher }}'"
        x-bind:debounce="{{ $debounce }}" />
</div>
