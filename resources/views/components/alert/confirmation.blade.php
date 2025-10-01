@props([
    'title' => 'Konfirmasi Pengajuan Surat',
    'onAccept' => '',
    'acceptText' => 'Kirim',
    'cancelText' => 'Batal',
])

<div>
    <div class="fixed inset-0 bg-black/30 z-50" x-cloak x-show="$store.alertStore.showAlert">
    </div>
    <div x-cloak x-show="$store.alertStore.showAlert" x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="translate-y-[-10rem] opacity-0" x-transition:enter-end="-translate-y-1/2 opacity-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="-translate-y-1/2 opacity-100" x-transition:leave-end="translate-y-[-10rem] opacity-0"
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-[51] flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg w-[30rem] h-48 p-4 flex flex-col">
            <div class="w-full flex items-start gap-3 flex-1">
                <div class="w-12 h-12 flex items-center justify-center" wire:ignore>
                    <i data-lucide="circle-question-mark" class="text-yellow-500"
                        style="height: 48px; width: 48px;"></i>
                </div>
                <div class="flex-1">
                    <p class="text-accent-500 text-md font-bold mb-1">{{ $title }}</p>
                    {{ $slot }}
                </div>
            </div>
            <div class="flex items-center justify-end gap-1">
                <button x-on:click="$store.alertStore.hide()"
                    class="text-neutral-700 bg-white px-5 py-1.5 rounded hover:bg-neutral-200 transition-all ease-in duration-200">
                    <span>{{ $cancelText }}</span>
                </button>
                <button x-on:click="{{ $onAccept }}" class="text-sm text-white bg-accent-500 px-5 py-1.5 rounded">
                    <span>{{ $acceptText }}</span>
                </button>
            </div>
        </div>
    </div>
</div>
