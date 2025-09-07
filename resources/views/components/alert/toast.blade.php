<div x-cloak x-show="$store.toastStore.showToast" class="fixed top-8 left-1/2 -translate-x-1/2 z-50"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-5"
    x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-5">
    <div class="bg-white w-72 rounded-lg border border-neutral-300 p-3">
        <div class="flex items-start gap-3">
            <div class="w-9 h-9" wire:ignore x-cloak x-show="$store.toastStore.type === 'error'">
                <i data-lucide="circle-x" class="text-red-500" style="height: 36px; width: 36px;"></i>
            </div>
            <div class="w-9 h-9" wire:ignore x-cloak x-show="$store.toastStore.type === 'success'">
                <i data-lucide="circle-check" class="text-green-500" style="height: 36px; width: 36px;"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-red-500" x-cloak x-show="$store.toastStore.type === 'error'">
                    Terjadi kesalahan</p>
                <p class="text-sm font-semibold text-green-500" x-cloak x-show="$store.toastStore.type === 'success'">
                    Berhasil</p>
                <p class="text-neutral-700 text-xs" x-text="$store.toastStore.message"></p>
            </div>
        </div>
    </div>
</div>
