<div class="w-full rounded-lg shadow-xl bg-white">
    <div class="w-full rounded-t-lg h-10 px-3 flex items-center justify-between bg-accent-500">
        <p class="text-sm text-white font-bold">Berita Terkini</p>
    </div>
    <div class="w-full rounded-b-lg p-3">
        @php
            \Carbon\Carbon::setLocale('id');
        @endphp
        @forelse ($data as $datum)
            <div
                class="w-full flex items-start gap-3 cursor-pointer pb-3 last:pb-0 last:mb-0 mb-3 last:border-0 border-b border-neutral-300">
                <div class="w-16 h-16 rounded-md">
                    <img src="{{ asset($datum->thumbnail->image) }}"
                        class="w-16 h-16 rounded-md object-cover object-center" />
                </div>
                <div class="flex-1 flex flex-col h-16">
                    <p
                        class="flex-1 text-sm font-semibold text-neutral-700 leading-[1.1] overflow-hidden [display:-webkit-box] [-webkit-line-clamp:3] [-webkit-box-orient:vertical]">
                        {{ $datum->title }}
                    </p>
                    <span
                        class="text-xs text-neutral-500">{{ \Carbon\Carbon::parse($datum->created_at)->translatedFormat('d F Y') }}</span>
                </div>
            </div>
        @empty
            <div class="w-full h-36 flex items-center justify-center flex-col gap-2">
                <img src="{{ asset('static/images/no-data.png') }}" class="w-20 h-20" alt="no-data" />
                <span class="text-xs text-accent-500 font-semibold">Belum ada berita</span>
            </div>
        @endforelse
    </div>
    <div class="w-full flex items-center justify-center py-2.5 border-t border-neutral-300">
        <a href="{{ route('news') }}" class="text-brand-500 text-xs flex items-center gap-1">
            <span>Selengkapnya</span>
            <i data-lucide="arrow-right" class="h-3 aspect-[1/1]"></i>
        </a>
    </div>
</div>
