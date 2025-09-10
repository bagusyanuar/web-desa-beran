@props(['store', 'stateData' => 'data', 'stateLoading' => 'loading'])

@if (empty($store))
    @php
        throw new Exception('The "store" property is required.');
    @endphp
@endif

<div {{ $attributes->merge(['class' => 'w-full border border-neutral-300 rounded-lg overflow-x-auto']) }}
    x-bind:store="'{{ $store }}'" x-bind:state-data="'{{ $stateData }}'"
    x-bind:state-loading="'{{ $stateLoading }}'" x-bind="tableBind">
    <table class="w-full border-collapse">
        {{ $slot }}
    </table>
</div>
