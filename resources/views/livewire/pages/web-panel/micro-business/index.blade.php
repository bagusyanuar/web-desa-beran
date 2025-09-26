<section id="micro-business" data-component-id="micro-business" class="w-full">
    <div class="mb-7">
        <p class="text-xl text-neutral-700 font-bold">Produk UMKM</p>
        <p class="text-md text-neutral-500">Halaman ini digunakan untuk mengelola produk UMKM desa beran.</p>
    </div>
    <div class="w-full p-4 bg-white border border-neutral-300 shadow-xl rounded-lg">
        <div class="flex items-center justify-between mb-3">
            <x-table.search store="SERVICE_MICRO_BUSINESS_STORE" dispatcher="findAll" />
            <a href="{{ route('web-panel.micro-business.new') }}"
                class="px-3.5 py-2 gap-1 rounded-md flex items-center justify-center bg-accent-500 border border-accent-500 cursor-pointer"
                wire:ignore>
                <i data-lucide="circle-plus" class="text-white h-4 w-4"></i>
                <span class="text-xs text-white">New</span>
            </a>
        </div>
        <x-table.table store="SERVICE_MICRO_BUSINESS_STORE">
            <x-table.thead>
                <x-table.th>
                    <span class="text-sm text-neutral-700">Nama UMKM</span>
                </x-table.th>
                <x-table.th width="w-[180px]" align="center">
                    <span class="text-sm text-neutral-700">Pemilik</span>
                </x-table.th>
                <x-table.th width="w-[140px]" align="center">
                    <span class="text-sm text-neutral-700">Kontak</span>
                </x-table.th>
                <x-table.th width="w-[80px]">
                </x-table.th>
            </x-table.thead>
            <x-table.tbody>
                <template x-for="(v, index) in data" :key="index">
                    <x-table.row>
                        <x-table.td>
                            <span class="text-sm text-neutral-700" x-text="v.title"></span>
                        </x-table.td>
                        <x-table.td width="w-[140px]" align="center">
                            <span class="text-sm text-neutral-700" x-text="v.owner?.name || '-'"></span>
                        </x-table.td>
                        <x-table.td width="w-[140px]" align="center">
                            <span class="text-sm text-neutral-700" x-text="v.main_contact?.value || '-'"></span>
                        </x-table.td>
                        <x-table.td width="w-[80px]" align="center">
                            <div wire:ignore x-data="{
                                initIcons() {
                                    setTimeout(() => { lucide.createIcons(); }, 0);
                                }
                            }" x-init="initIcons()" x-effect="initIcons()"
                                class="w-6 h-6 rounded-md flex items-center justify-center cursor-pointer hover:bg-neutral-100"
                                x-on:click="$store.SERVICE_MICRO_BUSINESS_STORE.redirectToDetail(v.id)">
                                <i data-lucide="ellipsis-vertical" class="text-neutral-500 h-4 w-4"></i>
                            </div>
                        </x-table.td>
                    </x-table.row>
                </template>
            </x-table.tbody>
        </x-table.table>
    </div>
</section>

@push('scripts')
    @vite(['resources/js/util/table.js'])
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_MICRO_BUSINESS_STORE';
            const STORE_PROPS = {
                component: null,
                totalRows: 100,
                page: 1,
                pageSize: 10,
                pageSizeOptions: [10, 25, 50],
                data: [],
                loading: false,
                param: '',
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="micro-business"]')?.getAttribute(
                            'wire:id');
                        if (component.id === componentID) {
                            this.component = component;
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
            }

            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
