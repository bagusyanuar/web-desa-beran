<section id="news" data-component-id="news" class="w-full">
    <div class="mb-7">
        <p class="text-xl text-neutral-700 font-bold">Berita</p>
        <p class="text-md text-neutral-500">Halaman ini digunakan untuk mengelola berita atau artikel desa beran.</p>
    </div>
    <div class="w-full p-6 bg-white border border-neutral-300 shadow-xl rounded-lg">
        <div class="flex items-center justify-between mb-3">
            <x-table.search store="SERVICE_NEWS_STORE" dispatcher="findAll" />
            <a href="{{ route('web-panel.news.new') }}"
                class="px-3.5 py-2 gap-1 rounded-md flex items-center justify-center bg-accent-500 border border-accent-500 cursor-pointer"
                wire:ignore>
                <i data-lucide="circle-plus" class="text-white h-4 w-4"></i>
                <span class="text-xs text-white">New</span>
            </a>
        </div>
        <x-table.table store="SERVICE_NEWS_STORE">
            <x-table.thead>
                <x-table.th width="w-[180px]" align="center">
                    <span class="text-sm text-neutral-700">Tanggal</span>
                </x-table.th>
                <x-table.th>
                    <span class="text-sm text-neutral-700">Judul Berita</span>
                </x-table.th>
                <x-table.th width="w-[80px]">
                </x-table.th>
            </x-table.thead>
            <x-table.tbody>
                <template x-for="(v, index) in data" :key="index">
                    <x-table.row>
                        <x-table.td width="w-[180]" align="center">
                            <span class="text-sm text-neutral-700 text-center"
                                x-text="new Intl.DateTimeFormat('id-ID', { day: '2-digit', month: '2-digit', year: 'numeric' }).format(new Date(v.created_at))"></span>
                        </x-table.td>
                        <x-table.td>
                            <span class="text-sm text-neutral-700" x-text="v.title"></span>
                        </x-table.td>
                        <x-table.td width="w-[80px]" align="center">
                            <x-popper.popper>
                                <div x-bind="popperTriggerBind" wire:ignore x-data="{
                                    initIcons() {
                                        setTimeout(() => { lucide.createIcons(); }, 0);
                                    }
                                }"
                                    x-init="initIcons()" x-effect="initIcons()"
                                    class="w-6 h-6 rounded-md flex items-center justify-center cursor-pointer hover:bg-neutral-100">
                                    <i data-lucide="ellipsis-vertical" class="text-neutral-500 h-4 w-4"></i>
                                </div>
                                <div x-bind="popperContentBind"
                                    class="fixed z-50 text-sm w-[130px] text-gray-500 bg-white border border-gray-200 rounded-md shadow-sm">
                                    <div class="flex flex-col py-1 justify-start items-start">
                                        <div x-on:click="$store.SERVICE_NEWS_STORE.goToDetail(v.id)"
                                            class="flex items-center justify-start gap-1 w-full text-xs px-2 py-1.5 cursor-pointer hover:bg-neutral-50">
                                            <div wire:ignore>
                                                <i data-lucide="edit" class="text-neutral-500 h-3 aspect-[1/1]"></i>
                                            </div>
                                            <span>Edit</span>
                                        </div>
                                        <div x-on:click="$store.SERVICE_NEWS_STORE.confirm(v.id)"
                                            class="flex items-center justify-start gap-1 w-full text-xs px-2 py-1.5 cursor-pointer hover:bg-neutral-50">
                                            <div wire:ignore>
                                                <i data-lucide="trash" class="text-neutral-500 h-3 aspect-[1/1]"></i>
                                            </div>
                                            <span>Delete</span>
                                        </div>
                                    </div>
                                </div>
                            </x-popper.popper>

                        </x-table.td>
                    </x-table.row>
                </template>
            </x-table.tbody>
        </x-table.table>
    </div>
    <x-alert.confirmation title="Konfirmasi Hapus Berita" onAccept="$store.SERVICE_NEWS_STORE.onConfirm()"
        acceptText="Konfrimasi">
        <p class="text-sm text-neutral-700 text-justify">Anda akan mengkonfirmasi <span
                class="font-semibold">Penghapusan
                Berita / Artikel</span>. Pastikan data yang anda pilih sudah
            benar, jika sudah klik <span class="font-semibold">"Konfirmasi"</span> jika belum silahkan klik
            <span class="font-semibold">"Batal"</span> dan perbaiki data anda.
        </p>
    </x-alert.confirmation>
</section>
@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_NEWS_STORE';
            const STORE_PROPS = {
                component: null,
                alertStore: null,
                pageLoaderStore: null,
                toastStore: null,
                totalRows: 100,
                page: 1,
                pageSize: 10,
                pageSizeOptions: [10, 25, 50],
                data: [],
                loading: false,
                param: '',
                selectedId: '',
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="news"]')?.getAttribute(
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
                    const query = {
                        param: this.param,
                        page: this.page,
                        pageSize: this.pageSize,
                    };
                    this.loading = true;
                    this.component.$wire.call('findAll', query)
                        .then(response => {
                            const {
                                status,
                                data,
                                meta
                            } = response;
                            if (status === 200) {
                                const {
                                    totalRows
                                } = meta;
                                this.data = data;
                                this.totalRows = totalRows;
                            }
                            console.log(response);
                        })
                        .finally(() => {
                            this.loading = false;
                        })
                },
                goToDetail(id) {
                    window.location.href = "/web-panel/berita/" + id + "/edit";
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
                                this.toastStore.success("Berhasil menghapus data berita", 2000,
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
            }

            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
