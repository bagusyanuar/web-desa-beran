@props([
    'id' => null,
    'label' => '',
    'parentClassName' => '',
    'labelClassName' => '',
    'validatorKey' => '',
    'validatorField' => '',
    'required' => false,
])

@php
    $id = $id ?? uniqid('input-');
@endphp

<div class="{{ $parentClassName }}">
    <label for="{{ $id }}"
        class="text-sm text-neutral-700 {{ $label ? 'block mb-1' : '' }} {{ $labelClassName }}">{{ $label }} <span class="text-red-500">{{ $required ? '*' : '' }}</span></label>
    <div
        class="relative group w-full flex items-center border border-neutral-300 rounded focus-within:outline-none focus-within:ring-0 focus-within:border-neutral-500 transition-[border] duration-200 ease-in">
        <input id={{ $id }}
            {{ $attributes->merge(['class' => 'w-full text-md px-[0.5rem] leading-none py-[0.5rem] border-none rounded outline-none focus:outline-none focus:ring-0 text-neutral-700  disabled:bg-neutral-200']) }} />
    </div>
    @if ($validatorKey !== '')
        <template x-if="'{{ $validatorField }}' in {{ $validatorKey }}">
            <span class="text-xs text-red-500 mt-1 block"
                x-text="{{ $validatorKey }}['{{ $validatorField }}'][0]"></span>
        </template>
    @endif
</div>
