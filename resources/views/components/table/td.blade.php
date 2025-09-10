@props([
    'width' => '',
    'align' => 'start',
])

@php
    $alignClass = match ($align) {
        'start' => 'justify-start',
        'center' => 'justify-center',
        'end' => 'justify-end',
    };
@endphp

<td {{ $attributes->class(['', $width]) }}>
    <div class="w-full px-3 py-1.5 flex items-center {{ $alignClass }}">
        {{ $slot }}
    </div>
</td>
