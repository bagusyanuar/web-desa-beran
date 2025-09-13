@props([
    'status' => 'created',
])

@php
    $chipClass = match ($status) {
        'created' => 'bg-orange-100 text-orange-500 border border-orange-500',
        'pending' => 'bg-blue-100 text-blue-500 border border-blue-500',
        'finished' => 'bg-green-100 text-green-500 border border-green-500',
        'failed' => 'bg-red-100 text-red-500 border border-red-500',
    };

    $chipText = match ($status) {
        'created' => 'Menunggu Konfirmasi',
        'pending' => 'Menunggu Diambil',
        'finished' => 'Selesai',
        'failed' => 'Gagal',
    };

    $chipIcon = match ($status) {
        'created' => 'loader',
        'pending' => 'loader',
        'finished' => 'circle-check',
        'failed' => 'circle-x'
    };
@endphp

<div {{ $attributes->class(['flex items-center gap-1 text-xs rounded-md px-3 py-1', $chipClass]) }} wire:ignore>
    <i data-lucide="{{ $chipIcon }}" class="h-4 w-4"></i>
    <span>{{ $chipText }}</span>
</div>
