<section id="online-letter-domicile" data-component-id="online-letter-domicile" class="w-full">
    <div class="mb-7">
        <p class="text-xl text-neutral-700 font-bold">Surat Keterangan Domisili</p>
        <p class="text-md text-neutral-500">Halaman ini digunakan untuk mengelola surat keterangan domisili.</p>
    </div>
    <div class="w-full p-3 bg-white border border-neutral-300 shadow-xl rounded-lg">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center border border-neutral-300 rounded-md w-64" wire:ignore>
                <i data-lucide="search" class="text-neutral-500 min-h-4 min-w-4 ms-2"></i>
                <input type="text" placeholder="search..."
                    class="flex-grow w-full py-2 ps-2 pe-3 rounded-md text-sm text-neutral-700 border-none focus:outline-none focus:ring-0" />
            </div>
        </div>
        <x-table.table store="SERVICE_DOMICILE_STORE">
            <x-table.thead>
                <x-table.th width="w-[140px]" align="center">
                    <span class="text-sm text-neutral-700">Tanggal</span>
                </x-table.th>
                <x-table.th width="w-[180px]" align="center">
                    <span class="text-sm text-neutral-700">No. Pengajuan</span>
                </x-table.th>
                <x-table.th>
                    <span class="text-sm text-neutral-700">Pemohon</span>
                </x-table.th>
                <x-table.th width="w-[140px]" align="center">
                    <span class="text-sm text-neutral-700">No. Whatsapp</span>
                </x-table.th>
                <x-table.th width="w-[180px]" align="center">
                    <span class="text-sm text-neutral-700">Status</span>
                </x-table.th>
                <x-table.th width="w-[80px]">
                </x-table.th>
            </x-table.thead>
            <x-table.tbody>
                <template x-for="(v, index) in data" :key="index">
                    <x-table.row>
                        <x-table.td width="w-[140px]" align="center">
                            <span class="text-sm text-neutral-700"
                                x-text="new Intl.DateTimeFormat('id-ID', { day: '2-digit', month: '2-digit', year: 'numeric' }).format(new Date(v.date))"></span>
                        </x-table.td>
                        <x-table.td width="w-[180px]" align="center">
                            <span class="text-sm text-neutral-700" x-text="v.reference_number"></span>
                        </x-table.td>
                        <x-table.td>
                            <span class="text-sm text-neutral-700" x-text="v.applicant?.name || '-'"></span>
                        </x-table.td>
                        <x-table.td width="w-[140px]" align="center">
                            <span class="text-sm text-neutral-700" x-text="v.applicant?.phone || '-'"></span>
                        </x-table.td>
                        <x-table.td width="w-[180px]" align="center">
                            <x-chip.chip-status x-data="{ status: v.status }" />
                        </x-table.td>
                        <x-table.td width="w-[80px]" align="center">
                            <div wire:ignore x-data="{
                                initIcons() {
                                    setTimeout(() => { lucide.createIcons(); }, 0);
                                }
                            }" x-init="initIcons()" x-effect="initIcons()"
                                class="w-6 h-6 rounded-md flex items-center justify-center cursor-pointer hover:bg-neutral-100">
                                <i data-lucide="ellipsis-vertical" class="text-neutral-500 h-4 w-4"></i>
                            </div>
                        </x-table.td>
                    </x-table.row>
                </template>
            </x-table.tbody>
        </x-table.table>
        <x-table.pagination store="SERVICE_DOMICILE_STORE" dispatcher="findAll" />


    </div>
    <button x-on:click="$store.SERVICE_DOMICILE_STORE.append()">
        Push
    </button>
</section>

@push('scripts')
    @vite(['resources/js/util/table.js'])
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_DOMICILE_STORE';
            const STORE_PROPS = {
                component: null,
                totalRows: 100,
                page: 1,
                pageSize: 10,
                pageSizeOptions: [10, 25, 50],
                data: [],
                loading: true,
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="online-letter-domicile"]')?.getAttribute(
                            'wire:id');
                        if (component.id === componentID) {
                            this.component = component;
                            this.findAll()
                        }
                    });
                },
                findAll() {
                    const query = {
                        param: '',
                        page: this.page,
                        pageSize: this.pageSize
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
                append() {
                    this.data.push({
                        date: '1/2/2022'
                    })
                }
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
