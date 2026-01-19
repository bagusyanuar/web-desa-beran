<section id="gallery" data-component-id="gallery" class="w-full">
    <div class="mb-5">
        <p class="text-lg text-neutral-700 font-semibold leading-[1.2]">Galeri</p>
        <p class="text-sm text-neutral-500">Halaman ini digunakan untuk mengelola galeri foto desa beran.</p>
    </div>
    <div class="w-full bg-white shadow-2xl p-6 rounded-lg border-t-4 border-accent-500">
        <div class="flex items-center justify-between mb-6">
            <span class="text-sm font-bold text-neutral-700 uppercase">Data Gallery</span>
            <a href="{{ route('web-panel.gallery.new') }}"
                class="px-3.5 py-2 gap-1 rounded-md flex items-center justify-center bg-accent-500 border border-accent-500 cursor-pointer"
                wire:ignore>
                <i data-lucide="circle-plus" class="text-white h-4 w-4"></i>
                <span class="text-xs text-white">New</span>
            </a>
        </div>
        <div class="w-full grid grid-cols-3 gap-5">
            <template x-if="$store.SERVICE_GALLERY_STORE.loading">
                <template x-for="(data, index) in [1, 2, 3, 4, 5, 6]" :key="index">
                    <x-loader.shimmer class="!w-full !h-64 !rounded-lg" />
                </template>
            </template>
            <template x-if="!$store.SERVICE_GALLERY_STORE.loading && $store.SERVICE_GALLERY_STORE.data.length <= 0">
                <div
                    class="col-span-4 w-full h-96 flex items-center justify-center flex-col border border-neutral-300 rounded-lg shadow-xl">
                    <img src="{{ asset('static/images/no-data.png') }}" class="h-32 w-32" />
                    <span class="text-sm font-semibold text-accent-700">Tidak ada data gallery</span>
                </div>
            </template>
            <template x-if="!$store.SERVICE_GALLERY_STORE.loading && $store.SERVICE_GALLERY_STORE.data.length > 0">
                <template x-for="(data, index) in $store.SERVICE_GALLERY_STORE.data" :key="index">
                    <div class="w-full flex flex-col items-center gap-1">
                        <div class="w-full h-64 rounded-lg relative group cursor-pointer">
                            <img x-bind:src="data.image" alt="img-gallery"
                                class="w-full h-full rounded-lg object-cover object-center" />
                            <div
                                class="w-full h-0 flex flex-col items-center justify-center p-3 rounded-lg bg-black/50 absolute bottom-0 left-0 opacity-0 group-hover:h-full group-hover:opacity-100 transition-all duration-500">
                                <p x-text="data.title"
                                    class="text-lg mb-3 font-bold text-center text-white uppercase overflow-hidden [display:-webkit-box] [-webkit-line-clamp:4] [-webkit-box-orient:vertical]">
                                </p>
                            </div>
                        </div>
                        <a x-on:click.prevent="$store.SERVICE_GALLERY_STORE.confirm(data.id)" href="#"
                            class="text-sm text-brand-500 hover:underline transition-all ease-in-out duration-300">Hapus</a>
                    </div>
                </template>
            </template>
        </div>
    </div>
    <x-alert.confirmation title="Konfirmasi Hapus Gallery" onAccept="$store.SERVICE_GALLERY_STORE.onConfirm()"
        acceptText="Konfrimasi">
        <p class="text-sm text-neutral-700 text-justify">Anda akan mengkonfirmasi <span
                class="font-semibold">Penghapusan
                Gallery</span>. Pastikan data yang anda pilih sudah
            benar, jika sudah klik <span class="font-semibold">"Konfirmasi"</span> jika belum silahkan klik
            <span class="font-semibold">"Batal"</span> dan perbaiki data anda.
        </p>
    </x-alert.confirmation>
</section>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_GALLERY_STORE';
            const STORE_PROPS = {
                component: null,
                alertStore: null,
                pageLoaderStore: null,
                toastStore: null,
                loading: true,
                data: [],
                selectedId: '',
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="gallery"]')?.getAttribute(
                            'wire:id');
                        if (component.id === componentID) {
                            this.component = component;
                            this.alertStore = Alpine.store('alertStore');
                            this.pageLoaderStore = Alpine.store('pageLoaderStore');
                            this.toastStore = Alpine.store('toastStore');
                            this.findAll();
                        }
                    });
                },
                findAll() {
                    this.loading = true;
                    this.component.$wire.call('findAll')
                        .then(response => {
                            const {
                                status,
                                message,
                                data,
                                meta
                            } = response;
                            console.log(response);

                            switch (status) {
                                case 200:
                                    this.data = data;
                                    break;
                                case 500:
                                    this.data = [];
                                    this.toastStore.error(message, 2000);
                                default:
                                    break;
                            }
                        })
                        .finally(() => {
                            this.loading = false;
                        });

                },
                confirm(id) {
                    this.selectedId = id;
                    this.alertStore.show();
                },
                onConfirm() {
                    this.alertStore.hide();
                    this.pageLoaderStore.show();
                    this.component.$wire.call('delete', this.selectedId)
                        .then(response => {
                            const {
                                status,
                                message,
                            } = response;
                            if (status === 200) {
                                let self = this;
                                this.toastStore.success("Berhasil menghapus data perpustakaan online", 2000,
                                    function() {
                                        self.findAll();
                                    });
                            } else {
                                this.toastStore.error(message, 2000);
                            }
                        })
                        .finally(() => {
                            this.selectedId = '';
                            this.pageLoaderStore.hide();
                        })
                }
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
