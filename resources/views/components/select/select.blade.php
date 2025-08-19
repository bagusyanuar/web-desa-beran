@props([
    'options',
    'id' => null,
    'label' => '',
    'parentClassName' => '',
    'labelClassName' => '',
    'validatorKey' => '',
    'validatorField' => '',
    'required' => false,
])

@if (empty($options))
    @php
        throw new Exception('The "options" property is required.');
    @endphp
@endif

@php
    $id = $id ?? uniqid('input-');
@endphp

<div class="{{ $parentClassName }}">
    <label for="{{ $id }}"
        class="text-sm text-neutral-700 {{ $label ? 'block mb-1' : '' }} {{ $labelClassName }}">{{ $label }} <span
            class="text-red-500">{{ $required ? '*' : '' }}</span></label>
    <div
        class="relative group w-full flex items-center border border-neutral-300 rounded focus-within:outline-none focus-within:ring-0 focus-within:border-neutral-500 transition-[border] duration-200 ease-in">
        <select
            class="w-full text-md ps-[0.5rem] !pr-[1.5rem] appearance-none leading-none py-[0.58rem] border-none rounded outline-none focus:outline-none focus:ring-0 text-neutral-700  disabled:bg-neutral-200'"
            style="
                        background-position: right 0.5rem center;
                        background-size: 8px;
                        background-repeat: no-repeat;
                        background-image: url('data:image/svg+xml,%3csvg aria-hidden=%27true%27 xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 16 16%27%3e%3cpath stroke=%27%236B7280%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272%27 d=%27m2 6 6-6 6 6 m-12 4 6 6 6-6%27/%3e%3c/svg%3e');
                        ">
            @foreach ($options as $option)
                <option value="{{ $option['value'] }}">{{ $option['text'] }}</option>
            @endforeach
        </select>
    </div>
    @if ($validatorKey !== '')
        <template x-if="'{{ $validatorField }}' in {{ $validatorKey }}">
            <span class="text-xs text-red-500 mt-1 block"
                x-text="{{ $validatorKey }}['{{ $validatorField }}'][0]"></span>
        </template>
    @endif
</div>
