<section id="online-letter-domicile" data-component-id="online-letter-domicile" class="w-full">
    <div class="mb-7">
        <p class="text-xl text-neutral-700 font-bold">Surat Keterangan Domisili</p>
        <p class="text-md text-neutral-500">Halaman ini digunakan untuk mengelola surat keterangan domisili.</p>
    </div>
    <div class="w-full p-3 bg-white border border-neutral-300 shadow-xl rounded-lg">
        <div class="flex items-center justify-between mb-3">
            <x-table.search store="SERVICE_DOMICILE_STORE" dispatcher="findAll" />
            <x-table.filter>
                <div class="w-64 flex flex-col">
                    <p class="text-xs font-semibold text-neutral-700">Filter :</p>
                    <div class="w-full border-b border-neutral-300 my-3"></div>
                    <p class="text-xs font-semibold text-neutral-700 mb-2">Status :</p>
                    <div class="w-full flex flex-col gap-2 mb-5">
                        <div class="w-full flex items-center">
                            <input type="checkbox" id="created" value="created"
                                x-model="$store.SERVICE_DOMICILE_STORE.status"
                                class="w-4 h-4 rounded-sm text-accent-500 bg-gray-100 border-neutral-300 !focus:ring-0 !focus:outline-none"
                                style="box-shadow: none" />
                            <label for="created" class="ms-2 text-xs text-neutral-700">Menunggu Konfirmasi</label>
                        </div>
                        <div class="w-full flex items-center">
                            <input type="checkbox" id="pending" value="pending"
                                x-model="$store.SERVICE_DOMICILE_STORE.status"
                                class="w-4 h-4 rounded-sm text-accent-500 bg-gray-100 border-neutral-300 !focus:ring-0 !focus:outline-none"
                                style="box-shadow: none" />
                            <label for="pending" class="ms-2 text-xs text-neutral-700">Menunggu Diambil</label>
                        </div>
                        <div class="w-full flex items-center">
                            <input type="checkbox" id="finished" value="finished"
                                x-model="$store.SERVICE_DOMICILE_STORE.status"
                                class="w-4 h-4 rounded-sm text-accent-500 bg-gray-100 border-neutral-300 !focus:ring-0 !focus:outline-none"
                                style="box-shadow: none" />
                            <label for="finished" class="ms-2 text-xs text-neutral-700">Selesai</label>
                        </div>
                        <div class="w-full flex items-center">
                            <input type="checkbox" id="failed" value="failed"
                                x-model="$store.SERVICE_DOMICILE_STORE.status"
                                class="w-4 h-4 rounded-sm text-accent-500 bg-gray-100 border-neutral-300 !focus:ring-0 !focus:outline-none"
                                style="box-shadow: none" />
                            <label for="failed" class="ms-2 text-xs text-neutral-700">Gagal</label>
                        </div>
                    </div>
                    <p class="text-xs font-semibold text-neutral-700 mb-2">Periode :</p>
                    <div class="flex items-center mb-3 gap-1">
                        <div class="flex-1" wire:ignore>
                            <x-input.date.datepicker class="!text-xs" id="start-date" store="SERVICE_DOMICILE_STORE"
                                stateDate="startDate" format="slash" />
                        </div>
                        <span class="text-xs text-neutral-700">/</span>
                        <div class="flex-1" wire:ignore>
                            <x-input.date.datepicker class="!text-xs" id="start-date" store="SERVICE_DOMICILE_STORE"
                                stateDate="endDate" format="slash" />
                        </div>
                    </div>
                    <div class="w-full">
                        <button x-on:click="open = false; $store.SERVICE_DOMICILE_STORE.filter()"
                            class="rounded-md w-full py-2 bg-brand-500 text-white text-xs hover:bg-brand-700 transition-all ease-in-out duration-200 cursor-pointer">
                            <span>Filter</span>
                        </button>
                    </div>
                </div>
            </x-table.filter>
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
                                class="w-6 h-6 rounded-md flex items-center justify-center cursor-pointer hover:bg-neutral-100"
                                x-on:click="$store.SERVICE_DOMICILE_STORE.redirectToDetail(v.id)">
                                <i data-lucide="ellipsis-vertical" class="text-neutral-500 h-4 w-4"></i>
                            </div>
                        </x-table.td>
                    </x-table.row>
                </template>
            </x-table.tbody>
        </x-table.table>
        <x-table.pagination store="SERVICE_DOMICILE_STORE" dispatcher="findAll" />
    </div>
</section>

@push('scripts')
    @vite(['resources/js/util/index.js'])
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
                loading: false,
                param: '',
                startDate: '',
                endDate: '',
                status: [],
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
                        param: this.param,
                        page: this.page,
                        pageSize: this.pageSize,
                        status: this.status,
                        startDate: this.startDate,
                        endDate: this.endDate
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
                redirectToDetail(id) {
                    window.location.href = '/web-panel/surat-keterangan-domisili/' + id;
                },
                filter() {
                    this.findAll()
                }
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
