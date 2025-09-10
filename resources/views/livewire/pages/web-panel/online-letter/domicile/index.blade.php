<section id="online-letter-domicile" data-component-id="online-letter-domicile" class="w-full">
    <div class="mb-7">
        <p class="text-xl text-neutral-700 font-bold">Surat Keterangan Domisili</p>
        <p class="text-md text-neutral-500">Halaman ini digunakan untuk mengelola surat keterangan domisili.</p>
    </div>
    <div class="w-full p-3 bg-white border border-neutral-300 shadow-xl rounded-lg">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center border border-neutral-300 rounded-md w-64">
                <i data-lucide="search" class="text-neutral-500 min-h-4 min-w-4 ms-2"></i>
                <input type="text" placeholder="search..."
                    class="flex-grow w-full py-2 ps-2 pe-3 rounded-md text-sm text-neutral-700 border-none focus:outline-none focus:ring-0" />
            </div>
        </div>
        <div class="w-full border border-neutral-300 rounded-lg overflow-x-auto">
            <table class="w-full border-collapse">
                <thead class="rounded-tl-lg rounded-tr-lg">
                    <tr class=" bg-neutral-100 border-b border-neutral-300">
                        <td class="min-w-[10rem] first:rounded-tl-lg">
                            <div class="px-3 py-1.5 flex items-center justify-center">
                                <span class="text-sm text-neutral-700">Tanggal</span>
                            </div>
                        </td>
                        <td class="min-w-[500px] last:rounded-tr-lg">
                            <div class="w-full px-3 py-1.5 flex items-center">
                                <span class="text-sm text-neutral-700">No. Pengajuan</span>
                            </div>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-neutral-300 last:border-b-0">
                        <td class="min-w-[10rem]">
                            <div class="px-3 py-1.5 flex items-center justify-center">
                                <span class="text-sm text-neutral-700">Tanggal</span>
                            </div>
                        </td>
                        <td class="min-w-[500px]">
                            <div class="w-full px-3 py-1.5 flex items-center">
                                <span class="text-sm text-neutral-700">No. Pengajuan</span>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-neutral-300 last:border-b-0">
                        <td class="min-w-[10rem]">
                            <div class="px-3 py-1.5 flex items-center justify-center">
                                <span class="text-sm text-neutral-700">Tanggal</span>
                            </div>
                        </td>
                        <td class="min-w-[500px]">
                            <div class="w-full px-3 py-1.5 flex items-center">
                                <span class="text-sm text-neutral-700">No. Pengajuan</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <x-table.pagination store="SERVICE_DOMICILE_STORE"  dispatcher="findAll" />
    </div>
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
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="online-letter-domicile"]')?.getAttribute(
                            'wire:id');
                        if (component.id === componentID) {
                            this.component = component;
                        }
                    });
                },
                findAll() {
                    console.log('dispatch');
                }
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
