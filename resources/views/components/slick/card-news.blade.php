@props([
    'image' => null,
    'title' => 'Product Title',
    'description' => '',
    'date' => '',
])

<div class="px-3 last:px-0">
    <div class="bg-white shadow-xl w-56 h-72 flex flex-col rounded-lg border border-neutral-300">
        <div class="w-full h-32">
            <img src="{{ asset($image) }}" class="rounded-t-lg w-full h-full object-cover object-center" />
        </div>
        <div class="w-full flex flex-col flex-1 px-2 py-2">
            <p class="text-sm mb-1 leading-[1.2] text-brand-500 font-bold overflow-hidden [display:-webkit-box] [-webkit-line-clamp:2] [-webkit-box-orient:vertical]">{{ $title }}</p>
            <div class="flex-1">
                <p
                    class="text-xs text-neutral-700 overflow-hidden [display:-webkit-box] [-webkit-line-clamp:4] [-webkit-box-orient:vertical]">
                    {{ $description }}
                </p>
            </div>
            <div class="w-full flex justify-end items-center">
                <span class="text-xs text-neutral-500">1 September 2025</span>
            </div>
        </div>
    </div>
</div>
