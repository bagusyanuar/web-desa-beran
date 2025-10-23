<div {{ $attributes->merge(['class' => 'text-[10px] rounded-md px-3 py-1']) }}
    :class="{
        'bg-orange-100 text-orange-500 border border-orange-500': status === 'pending',
        'bg-green-100 text-green-500 border border-green-500': status === 'approved',
        'bg-red-100 text-red-500 border border-red-500': status === 'denied',
    }">
    <span
        x-text="{
        'pending':  'Menunggu Konfirmasi',
        'approved': 'Telah Dikonfirmasi',
        'denied':   'Ditolak'
    }[status]"></span>
</div>
