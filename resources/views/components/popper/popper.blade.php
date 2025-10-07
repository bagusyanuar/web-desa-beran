<div
    {{ $attributes->merge(['class' => 'w-fit']) }}
    x-bind="popperBind"
    x-data
>
    {{ $slot }}
</div>
