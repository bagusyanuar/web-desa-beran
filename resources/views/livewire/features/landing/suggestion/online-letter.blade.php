<div class="w-full rounded-lg shadow-xl border border-neutral-300">
    <div class="w-full rounded-t-lg h-10 px-3 flex items-center justify-between bg-accent-500">
        <p class="text-sm text-white font-bold">Layanan Surat Online</p>
    </div>
    <div class="w-full rounded-b-lg px-3 py-1 flex flex-col">
        <a href="{{ route('online-letter.domicile') }}"
            class="py-2 text-neutral-700 flex items-center justify-between border-b border-neutral-300 last:border-b-0">
            <span class="text-xs font-semibold">SURAT DOMISILI</span>
            <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
        </a>
        <a href="{{ route('online-letter.police-clearance') }}"
            class="py-2 text-neutral-700 flex items-center justify-between border-b border-neutral-300 last:border-b-0">
            <span class="text-xs font-semibold">PENGANTAR SKCK</span>
            <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
        </a>
        <a href="{{ route('online-letter.incapacity') }}"
            class="py-2 text-neutral-700 flex items-center justify-between border-b border-neutral-300 last:border-b-0">
            <span class="text-xs font-semibold">KETERANGAN TIDAK MAMPU</span>
            <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
        </a>
        <a href="{{ route('online-letter.death') }}"
            class="py-2 text-neutral-700 flex items-center justify-between border-b border-neutral-300 last:border-b-0">
            <span class="text-xs font-semibold">KETERANGAN KEMATIAN</span>
            <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
        </a>
        <a href="{{ route('online-letter.birth') }}"
            class="py-2 text-neutral-700 flex items-center justify-between border-b border-neutral-300 last:border-b-0">
            <span class="text-xs font-semibold">KETERANGAN KELAHIRAN</span>
            <i data-lucide="arrow-right" class="h-4 aspect-[1/1]"></i>
        </a>
    </div>
    <div class="w-full flex items-center justify-center py-1.5 border-t border-neutral-300">
        <a href="{{ route('online-letter') }}" class="text-brand-500 text-xs flex items-center gap-1">
            <span>Selengkapnya</span>
            <i data-lucide="arrow-right" class="h-3 aspect-[1/1]"></i>
        </a>
    </div>
</div>
