@props([
    'image' => null,
    'title' => 'Product Title',
    'owner' => 'Owner Name',
    'description' => '',
])

<div class="px-3 last:px-0">
    <div
        {{ $attributes->merge(['class' => 'bg-white shadow-xl w-56 h-72 flex flex-col rounded-lg border border-neutral-300 cursor-pointer']) }}>
        <div class="w-full h-32">
            <img src="{{ asset($image) }}" class="rounded-t-lg w-full h-full object-cover object-center" />
        </div>
        <div class="w-full flex flex-col flex-1 px-2 py-2">
            <p class="text-md text-brand-500 font-bold">{{ $title }}</p>
            <p class="text-xs text-neutral-700 mb-1">{{ $owner }}</p>
            <div class="flex-1">
                <p
                    class="text-xs text-neutral-700 overflow-hidden [display:-webkit-box] [-webkit-line-clamp:4] [-webkit-box-orient:vertical]">
                    {{ $description }}
                </p>
            </div>
            <div class="w-full flex justify-end items-center">
                <div
                    class="rounded-md h-6 w-6 text-neutral-500 flex items-center justify-center cursor-pointer hover:bg-neutral-300">
                    <i data-lucide="share-2" class="h-4 aspect-[1/1]"></i>
                </div>
            </div>
        </div>
    </div>
</div>
