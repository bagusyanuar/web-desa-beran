@props([
    'slideToShow' => 3,
    'speed' => 1000,
    'mode' => 'base',
])

<div wire:ignore class="w-full">
    <div class="my-slick" x-bind="slickBind" x-bind:mode="'{{ $mode }}'"
        x-bind:slide-to-show="{{ $slideToShow }}" x-bind:speed="{{ $speed }}">
        {{ $slot }}
    </div>
</div>
