<section id="neighborhood-unit-update" data-component-id="neighborhood-unit-update" class="w-full">
    <div class="mb-5 flex items-start gap-2">
        <a href="{{ route('web-panel.rt') }}"
            class="w-8 h-8 flex items-center justify-center rounded-lg border border-neutral-300 cursor-pointer shadow-md hover:bg-neutral-200 transition-all ease-in-out duration-200"
            wire:ignore>
            <i data-lucide="arrow-left" class="text-neutral-700 h-3 w-3"></i>
        </a>
        <div>
            <p class="text-lg text-neutral-700 font-semibold leading-[1.2]">RT</p>
            <p class="text-sm text-neutral-500">Halaman ini digunakan untuk mengelola data Rt pada desa beran.</p>
        </div>
    </div>
    <div class="w-full p-6 bg-white shadow-2xl rounded-lg border-t-4 border-accent-500 mb-6">
        <p class="text-sm font-bold text-neutral-700 mb-0">Informasi RT</p>
        <div class="w-full border-b border-neutral-300 my-3"></div>
        <div class="w-full grid grid-cols-2 gap-x-6 gap-y-6">
            <div class="w-full col-span-2" wire:ignore>
                <label for="community-unit" class="text-sm text-neutral-700 block mb-1">
                    <span>RW</span>
                    <span class="text-red-500 text-sm italic">*</span>
                </label>
                <x-select.select2 id="community-unit" x-init="initSelect({ placeholder: 'pilih rw' })"
                    x-model="$store.SERVICE_NEIGHBORHOOD_UNIT_UPDATE_STORE.form.communityUnitId">
                    <option></option>
                    @foreach ($communityUnits as $communityUnit)
                        <option value="{{ $communityUnit->id }}">RW {{ $communityUnit->code }} (Dusun {{ $communityUnit->village->name }})</option>
                    @endforeach
                </x-select.select2>
                <template x-if="'communityUnitId' in $store.SERVICE_NEIGHBORHOOD_UNIT_UPDATE_STORE.formValidator">
                    <x-label.validator>
                        <span x-text="$store.SERVICE_NEIGHBORHOOD_UNIT_UPDATE_STORE.formValidator.communityUnitId[0]"></span>
                    </x-label.validator>
                </template>
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="code">
                    <span>Nomor RT</span>
                    <span class="text-red-500 text-sm italic">*</span>
                </x-label.label>
                <x-input.text.text placeholder="nomor rt" id="code"
                    x-model="$store.SERVICE_NEIGHBORHOOD_UNIT_UPDATE_STORE.form.code" />
                <template x-if="'code' in $store.SERVICE_NEIGHBORHOOD_UNIT_UPDATE_STORE.formValidator">
                    <x-label.validator>
                        <span x-text="$store.SERVICE_NEIGHBORHOOD_UNIT_UPDATE_STORE.formValidator.code[0]"></span>
                    </x-label.validator>
                </template>
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="leader-name">
                    <span>Ketua RT</span>
                </x-label.label>
                <x-input.text.text placeholder="ketua rt" id="leader-name"
                    x-model="$store.SERVICE_NEIGHBORHOOD_UNIT_UPDATE_STORE.form.leaderName" />
                <template x-if="'leaderName' in $store.SERVICE_NEIGHBORHOOD_UNIT_UPDATE_STORE.formValidator">
                    <x-label.validator>
                        <span x-text="$store.SERVICE_NEIGHBORHOOD_UNIT_UPDATE_STORE.formValidator.leaderName[0]"></span>
                    </x-label.validator>
                </template>
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="leader-contact">
                    <span>Kontak</span>
                </x-label.label>
                <x-input.text.text placeholder="ketua rw" id="leader-contact"
                    x-model="$store.SERVICE_NEIGHBORHOOD_UNIT_UPDATE_STORE.form.leaderContact" />
                <template x-if="'leaderContact' in $store.SERVICE_NEIGHBORHOOD_UNIT_UPDATE_STORE.formValidator">
                    <x-label.validator>
                        <span x-text="$store.SERVICE_NEIGHBORHOOD_UNIT_UPDATE_STORE.formValidator.leaderContact[0]"></span>
                    </x-label.validator>
                </template>
            </div>
        </div>
        <div class="w-full border-b border-neutral-300 my-3"></div>
        <div class="flex items-center justify-end">
            <button x-on:click="$store.SERVICE_NEIGHBORHOOD_UNIT_UPDATE_STORE.confirm()"
                class="px-3.5 py-2 gap-1 rounded-md flex items-center justify-center bg-accent-500 border border-accent-500 cursor-pointer">
                <span class="text-sm text-white">Simpan</span>
            </button>
        </div>
    </div>
    <x-alert.confirmation title="Konfirmasi Pembuatan Berita Baru"
        onAccept="$store.SERVICE_NEIGHBORHOOD_UNIT_UPDATE_STORE.onConfirm()" acceptText="Konfrimasi">
        <p class="text-sm text-neutral-700 text-justify">Anda akan mengkonfirmasi <span class="font-semibold">Perubahan
                RT baru</span>. Pastikan data yang anda isi sudah
            lengkap dan
            benar, jika sudah klik <span class="font-semibold">"Konfirmasi"</span> jika belum silahkan klik
            <span class="font-semibold">"Batal"</span> dan perbaiki data anda.
        </p>
    </x-alert.confirmation>
</section>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_NEIGHBORHOOD_UNIT_UPDATE_STORE';
            const STORE_PROPS = {
                component: null,
                alertStore: null,
                pageLoaderStore: null,
                toastStore: null,
                form: {
                    communityUnitId: '',
                    code: '',
                    leaderName: '',
                    leaderContact: '',
                },
                formValidator: {},
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="neighborhood-unit-update"]')?.getAttribute(
                            'wire:id');
                        if (component.id === componentID) {
                            this.component = component;
                            this.alertStore = Alpine.store('alertStore');
                            this.pageLoaderStore = Alpine.store('pageLoaderStore');
                            this.toastStore = Alpine.store('toastStore');
                            this.getDetail()
                        }
                    });
                },
                confirm() {
                    this.alertStore.show();
                },
                async onConfirm() {
                    this.alertStore.hide();
                    this.pageLoaderStore.show();

                    const response = await this.component.$wire.call('save', this.form);

                    const {
                        status,
                        data,
                        message
                    } = response;
                    switch (status) {
                        case 200:
                            this.toastStore.success("Berhasil merubah data RT", 2000,
                                function() {
                                    window.location.href = '/web-panel/rt';
                                });
                            break;
                        case 422:
                            this.formValidator = data;
                            this.toastStore.error('Harap mengisi data dengan lengkap dan benar',
                                2000);
                            break;
                        case 500:
                            this.toastStore.error(message, 2000);
                        default:
                            break;
                    }
                    this.pageLoaderStore.hide();
                },
                async getDetail() {
                    try {
                        this.pageLoaderStore.show();
                        const response = await this.component.$wire.call('getDetail');
                        const {
                            status,
                            data,
                            message
                        } = response;
                        console.log(response);

                        switch (status) {
                            case 200:
                                if (data) {
                                    const {
                                        community_unit_id,
                                        code,
                                        leader_contact,
                                        leader_name
                                    } = data;

                                    this.form.communityUnitId = community_unit_id;
                                    this.form.code = code;
                                    this.form.leaderName = leader_name;
                                    this.form.leaderContact = leader_contact;
                                }
                                break;
                            default:
                                break;
                        }
                    } catch (error) {
                        console.log(error);
                    } finally {
                        this.pageLoaderStore.hide();
                    }

                }
            }

            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
