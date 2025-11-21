<nav id="web-panel-navbar" data-component-id="web-panel-navbar"
    class="w-full bg-neutral-100 h-16 ps-72 top-0 z-[30] fixed right-0 transition-all ease-in-out duration-300">
    <div class="w-full h-full flex items-center justify-between px-6">
        <div class="">
            <span class="text-neutral-700">Selamat Datang, <span
                    class="font-semibold me-2">{{ auth()->user()->username }}</span><span class="text-xl">🖐</span></span>
        </div>
        <div class="relative" x-data="{ open: false }">
            <div class="flex items-center gap-2 cursor-pointer" x-on:click="open = !open">
                <div
                    class="h-10 w-10 rounded-full bg-accent-500 flex items-center justify-center border-2 border-white shadow-xl">
                    <span class="text-white text-sm">BD</span>
                </div>

                <div class="flex flex-col justify-center gap-0.5">
                    <span
                        class="text-neutral-700 text-xs font-semibold leading-none inline-block">{{ auth()->user()->username }}</span>
                    <span class="text-neutral-700 text-xs block leading-none">Administrator</span>
                </div>
            </div>
            <div x-cloak x-show="open" x-on:click.away="open = false;"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-3" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-3"
                class="absolute right-0 z-50 py-1 mt-1 w-48 bg-white rounded-md shadow-lg">
                <div class="w-full">
                    <a href="#" x-on:click.prevent="$store.WEB_PANEL_NAVBAR_STORE.logout()"
                        class="w-full flex items-center px-3 py-1.5 bg-white hover:bg-neutral-200 transition-all duration-200 ease-in">
                        <i data-lucide="power"
                            class="text-neutral-700 group-focus-within:text-neutral-700 h-3 aspect-[1/1]"></i>
                        <span class="text-xs text-neutral-500">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- <x-loader.page-loader />
    <x-alert.toast /> --}}
</nav>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'WEB_PANEL_NAVBAR_STORE';
            const STORE_PROPS = {
                component: null,
                pageLoaderStore: null,
                toastStore: null,
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="web-panel-navbar"]')?.getAttribute('wire:id');
                        if (component.id === componentID) {
                            this.component = component;
                            this.pageLoaderStore = Alpine.store('pageLoaderStore');
                            this.toastStore = Alpine.store('toastStore');
                        }
                    });
                },
                logout() {
                    this.pageLoaderStore.show();
                    this.component.$wire.call('logout', this.form)
                        .then(response => {
                            const {
                                status,
                                message,
                                data
                            } = response;
                            switch (status) {
                                case 200:
                                    this.toastStore.success(message, 500,
                                        function() {
                                            window.location.href = '/web-panel';
                                        });
                                    break;
                                case 500:
                                    this.toastStore.error(message, 2000);
                                default:
                                    break;
                            }
                        })
                        .finally(() => {
                            this.pageLoaderStore.hide();
                        });
                }
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        })
    </script>
@endpush
