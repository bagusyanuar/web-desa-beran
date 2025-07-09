@props([
    'id' => null,
    'label' => '',
    'parentClassName' => '',
    'labelClassName' => '',
    'validatorKey' => '',
    'validatorField' => '',
])

@php
    $id = $id ?? uniqid('input-');
@endphp

<div class="{{ $parentClassName }}">
    <label for="{{ $id }}"
        class="text-sm text-neutral-700 {{ $label ? 'block mb-1' : '' }} {{ $labelClassName }}">{{ $label }}</label>
    <div
        class="relative group w-full ps-[1.325rem] pe-[0.625rem] flex items-center border border-neutral-300 rounded focus-within:outline-none focus-within:ring-0 focus-within:border-neutral-500 transition-[border] duration-200 ease-in">
        <div wire:ignore class="h-full flex items-center px-[0.25rem] absolute inset-y-0 start-0">
            <i data-lucide="user"
                class="text-neutral-500 group-focus-within:text-neutral-700 h-[0.875rem] aspect-[1/1]"></i>
        </div>
        <input id={{ $id }}
            {{ $attributes->merge(['class' => 'w-full text-sm ps-[0.5rem] pe-0 leading-none py-[0.5rem] border-none rounded outline-none focus:outline-none focus:ring-0 text-neutral-700  disabled:bg-neutral-200']) }} />
    </div>
    @if ($validatorKey !== '')
        <template x-if="'{{ $validatorField }}' in {{ $validatorKey }}">
            <span class="text-xs text-red-500 mt-1 block"
                x-text="{{ $validatorKey }}['{{ $validatorField }}'][0]"></span>
        </template>
    @endif
</div>
