<div>
    <div class="fixed inset-0 bg-black/30 z-50" x-cloak x-show="$store.pageLoaderStore.showLoader">
    </div>
    <div x-cloak x-show="$store.pageLoaderStore.showLoader"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="translate-y-[-10rem] opacity-0" x-transition:enter-end="-translate-y-1/2 opacity-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="-translate-y-1/2 opacity-100" x-transition:leave-end="translate-y-[-10rem] opacity-0"
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-[51] flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg w-[30rem] h-48 p-4 flex flex-col items-center justify-center">
            <svg class="w-6 h-6 animate-spinner me-1 text-accent-500" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24">
                <g>
                    <circle cx="3" cy="12" r="1.5" class="fill-current" />
                    <circle cx="21" cy="12" r="1.5" class="fill-current" />
                    <circle cx="12" cy="21" r="1.5" class="fill-current" />
                    <circle cx="12" cy="3" r="1.5" class="fill-current" />
                    <circle cx="5.64" cy="5.64" r="1.5" class="fill-current" />
                    <circle cx="18.36" cy="18.36" r="1.5" class="fill-current" />
                    <circle cx="5.64" cy="18.36" r="1.5" class="fill-current" />
                    <circle cx="18.36" cy="5.64" r="1.5" class="fill-current" />
                </g>
            </svg>
            <p class="text-sm text-accent-500">Please wait...</p>
        </div>
    </div>
</div>
