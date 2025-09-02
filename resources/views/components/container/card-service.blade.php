@props(['icon', 'text'])

@if (empty($icon) || empty($text))
    @php
        throw new Exception('The "icon" or "text" property is required.');
    @endphp
@endif

<div class="w-36 h-48 flex flex-col items-center justify-between cursor-pointer">
    <div class="w-36 h-36 rounded-md border border-neutral-500 shadow-sm flex items-center justify-center shadow-md">
        <img src="{{ $icon }}" alt="icon-image" class="w-32 h-32" />
    </div>
    <div class="h-10 w-full text-center">
        <p class="text-sm text-brand-500 font-semibold">{{ $text }}</p>
    </div>
</div>
