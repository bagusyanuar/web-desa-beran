@props(['store', 'format' => 'basic', 'stateDate' => 'date'])

@if (empty($store))
    @php
        throw new Exception('The "store" property is required.');
    @endphp
@endif

<input readonly type="text"
    {{ $attributes->merge(['class' => 'w-full text-neutral-700 border border-neutral-300 text-md p-[0.5rem] rounded-lg focus:outline-none focus:ring-0 focus:border-neutral-500 placeholder:text-neutral-400 placeholder:font-normal placeholder:text-sm']) }}
    x-bind="datepickerBind" x-init="initDatePicker()" x-bind:store="'{{ $store }}'"
    x-bind:state-date="'{{ $stateDate }}'" x-bind:format="'{{ $format }}'" x-model="dateValue" />
