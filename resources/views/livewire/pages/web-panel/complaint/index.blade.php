<section id="complaint" data-component-id="complaint" class="w-full">
    <div class="mb-5">
        <p class="text-lg text-neutral-700 font-semibold">Aduan Masyarakat</p>
        <p class="text-sm text-neutral-500">Halaman ini digunakan untuk mengelola aduan masyarakat.</p>
    </div>
    <div class="w-full bg-white shadow-2xl p-6 rounded-lg border-t-4 border-accent-500">
        <div class="flex items-center justify-between mb-3">
            <span class="text-sm font-bold text-neutral-700 uppercase">Data Aduan Masyarakat</span>
            <div class="flex items-center gap-1">
                <x-table.search store="SERVICE_COMPLAINT_STORE" dispatcher="findAll" />
                <x-table.filter>
                    <div class="w-64 flex flex-col">
                        <p class="text-xs font-semibold text-neutral-700">Filter :</p>
                        <div class="w-full border-b border-neutral-300 my-3"></div>
                        <p class="text-xs font-semibold text-neutral-700 mb-2">Status :</p>
                        <div class="w-full flex flex-col gap-2 mb-5">
                            <div class="w-full flex items-center">
                                <input type="checkbox" id="pending" value="pending"
                                    x-model="$store.SERVICE_COMPLAINT_STORE.status"
                                    class="w-4 h-4 rounded-sm text-accent-500 bg-gray-100 border-neutral-300 !focus:ring-0 !focus:outline-none"
                                    style="box-shadow: none" />
                                <label for="pending" class="ms-2 text-xs text-neutral-700">Menunggu Konfirmasi</label>
                            </div>
                            <div class="w-full flex items-center">
                                <input type="checkbox" id="approved" value="approved"
                                    x-model="$store.SERVICE_COMPLAINT_STORE.status"
                                    class="w-4 h-4 rounded-sm text-accent-500 bg-gray-100 border-neutral-300 !focus:ring-0 !focus:outline-none"
                                    style="box-shadow: none" />
                                <label for="approved" class="ms-2 text-xs text-neutral-700">Telah Dikonfirmasi</label>
                            </div>
                            <div class="w-full flex items-center">
                                <input type="checkbox" id="denied" value="denied"
                                    x-model="$store.SERVICE_COMPLAINT_STORE.status"
                                    class="w-4 h-4 rounded-sm text-accent-500 bg-gray-100 border-neutral-300 !focus:ring-0 !focus:outline-none"
                                    style="box-shadow: none" />
                                <label for="denied" class="ms-2 text-xs text-neutral-700">Ditolak</label>
                            </div>
                        </div>
                        <p class="text-xs font-semibold text-neutral-700 mb-2">Periode :</p>
                        <div class="flex items-center mb-3 gap-1">
                            <div class="flex-1" wire:ignore>
                                <x-input.date.datepicker class="!text-xs" id="start-date"
                                    store="SERVICE_COMPLAINT_STORE" stateDate="startDate" format="slash" />
                            </div>
                            <span class="text-xs text-neutral-700">/</span>
                            <div class="flex-1" wire:ignore>
                                <x-input.date.datepicker class="!text-xs" id="start-date"
                                    store="SERVICE_COMPLAINT_STORE" stateDate="endDate" format="slash" />
                            </div>
                        </div>
                        <div class="w-full pt-3 border-t border-neutral-300">
                            <button x-on:click="open = false; $store.SERVICE_COMPLAINT_STORE.filter()"
                                class="rounded-md w-full py-2.5 bg-accent-500 text-white text-xs hover:bg-accent-600 transition-all ease-in-out duration-200 cursor-pointer">
                                <span>Filter</span>
                            </button>
                        </div>
                    </div>
                </x-table.filter>
            </div>
        </div>
        <x-table.table store="SERVICE_COMPLAINT_STORE">
            <x-table.thead>
                <x-table.th width="w-[140px]" align="center">
                    <span class="text-sm text-neutral-700">Tanggal</span>
                </x-table.th>
                <x-table.th width="w-[180px]" align="center">
                    <span class="text-sm text-neutral-700">No. Tiket</span>
                </x-table.th>
                <x-table.th>
                    <span class="text-sm text-neutral-700">Nama Pelapor</span>
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
                                x-text="new Intl.DateTimeFormat('id-ID', { day: '2-digit', month: '2-digit', year: 'numeric' }).format(new Date(v.created_at))"></span>
                        </x-table.td>
                        <x-table.td width="w-[180px]" align="center">
                            <span class="text-sm text-neutral-700" x-text="v.reference_number"></span>
                        </x-table.td>
                        <x-table.td>
                            <span class="text-sm text-neutral-700" x-text="v.applicant?.name || '-'"></span>
                        </x-table.td>
                        <x-table.td width="w-[180px]" align="center">
                            <x-chip.chip-status-complaint x-data="{ status: v.status }" />
                        </x-table.td>
                        <x-table.td width="w-[80px]" align="center">
                            <div wire:ignore x-data="{
                                initIcons() {
                                    setTimeout(() => { lucide.createIcons(); }, 0);
                                }
                            }" x-init="initIcons()" x-effect="initIcons()"
                                class="w-6 h-6 rounded-md flex items-center justify-center cursor-pointer hover:bg-neutral-100"
                                x-on:click="$store.SERVICE_COMPLAINT_STORE.redirectToDetail(v.id)">
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
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_COMPLAINT_STORE';
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
                            '[data-component-id="complaint"]')?.getAttribute(
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
                            console.log(response);
                            if (status === 200) {
                                const {
                                    totalRows
                                } = meta;
                                this.data = data;
                                this.totalRows = totalRows;
                            }
                        })
                        .finally(() => {
                            this.loading = false;
                        })
                },
                redirectToDetail(id) {
                    window.location.href = '/web-panel/aduan-masyarakat/' + id;
                },
                filter() {
                    this.findAll()
                }
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
