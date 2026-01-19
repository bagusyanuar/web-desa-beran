<section id="staff-create" data-component-id="staff-create" class="w-full">
    <div class="mb-5 flex items-start gap-2">
        <a href="{{ route('web-panel.staff') }}"
            class="w-8 h-8 flex items-center justify-center rounded-lg border border-neutral-300 cursor-pointer shadow-md hover:bg-neutral-200 transition-all ease-in-out duration-200"
            wire:ignore>
            <i data-lucide="arrow-left" class="text-neutral-700 h-3 w-3"></i>
        </a>
        <div>
            <p class="text-lg text-neutral-700 font-semibold leading-[1.2]">Perangkat Desa</p>
            <p class="text-sm text-neutral-500">Halaman ini digunakan untuk mengelola perangkat desa beran.</p>
        </div>
    </div>
    <div class="w-full p-6 bg-white shadow-2xl rounded-lg border-t-4 border-accent-500 mb-6">
        <p class="text-sm font-bold text-neutral-700 mb-0">Informasi Perangkat Desa</p>
        <div class="w-full border-b border-neutral-300 my-3"></div>
        <div class="w-full grid grid-cols-2 gap-x-6 gap-y-6">
            <div class="w-full col-span-2">
                <x-label.label for="name">
                    <span>Nama</span>
                    <span class="text-red-500 text-sm italic">*</span>
                </x-label.label>
                <x-input.text.text placeholder="nama" id="name"
                    x-model="$store.SERVICE_STAFF_CREATE_STORE.form.name" />
                <template x-if="'name' in $store.SERVICE_STAFF_CREATE_STORE.formValidator">
                    <x-label.validator>
                        <span x-text="$store.SERVICE_STAFF_CREATE_STORE.formValidator.name[0]"></span>
                    </x-label.validator>
                </template>
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="position">
                    <span>Jabatan</span>
                    <span class="text-red-500 text-sm italic">*</span>
                </x-label.label>
                <x-input.text.text placeholder="jabatan" id="position"
                    x-model="$store.SERVICE_STAFF_CREATE_STORE.form.position" />
                <template x-if="'position' in $store.SERVICE_STAFF_CREATE_STORE.formValidator">
                    <x-label.validator>
                        <span x-text="$store.SERVICE_STAFF_CREATE_STORE.formValidator.position[0]"></span>
                    </x-label.validator>
                </template>
            </div>
            <div class="w-full col-span-2" wire:ignore>
                <label for="position-group" class="text-sm text-neutral-700 block mb-1">
                    <span>Kelompok Jabatan</span>
                    <span class="text-red-500 text-sm italic">*</span>
                </label>
                <x-select.select2 id="position-group" x-init="initSelect({ placeholder: 'pilih kelompok kelamin' })"
                    x-model="$store.SERVICE_STAFF_CREATE_STORE.form.positionGroup">
                    <option></option>
                    <option value="head">Kepala Desa</option>
                    <option value="secretary">Sekertaris</option>
                    <option value="member">Anggota</option>
                </x-select.select2>
                <template x-if="'positionGroup' in $store.SERVICE_STAFF_CREATE_STORE.formValidator">
                    <x-label.validator>
                        <span x-text="$store.SERVICE_STAFF_CREATE_STORE.formValidator.positionGroup[0]"></span>
                    </x-label.validator>
                </template>
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="thumbnail-image">
                    <span>Foto</span>
                    <span class="text-red-500 text-sm italic">*</span>
                </x-label.label>
                <x-input.file.dropzone store="SERVICE_STAFF_CREATE_STORE" stateComponent="imageDropper"
                    class="!h-12"></x-input.file.dropzone>
                <template x-if="'image' in $store.SERVICE_STAFF_CREATE_STORE.formValidator">
                    <x-label.validator>
                        <span x-text="$store.SERVICE_STAFF_CREATE_STORE.formValidator.image[0]"></span>
                    </x-label.validator>
                </template>
            </div>
        </div>
        <div class="w-full border-b border-neutral-300 my-3"></div>
        <div class="flex items-center justify-end">
            <button x-on:click="$store.SERVICE_STAFF_CREATE_STORE.confirm()"
                class="px-3.5 py-2 gap-1 rounded-md flex items-center justify-center bg-accent-500 border border-accent-500 cursor-pointer">
                <span class="text-sm text-white">Simpan</span>
            </button>
        </div>
    </div>
    <x-alert.confirmation title="Konfirmasi Pembuatan Berita Baru"
        onAccept="$store.SERVICE_STAFF_CREATE_STORE.onConfirm()" acceptText="Konfrimasi">
        <p class="text-sm text-neutral-700 text-justify">Anda akan mengkonfirmasi <span class="font-semibold">Penambahan
                Perangkat Desa Baru</span>. Pastikan data yang anda isi sudah
            lengkap dan
            benar, jika sudah klik <span class="font-semibold">"Konfirmasi"</span> jika belum silahkan klik
            <span class="font-semibold">"Batal"</span> dan perbaiki data anda.
        </p>
    </x-alert.confirmation>
</section>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_STAFF_CREATE_STORE';
            const STORE_PROPS = {
                component: null,
                alertStore: null,
                pageLoaderStore: null,
                toastStore: null,
                form: {
                    name: '',
                    position: '',
                    positionGroup: '',
                },
                imageDropper: null,
                formValidator: {},
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="staff-create"]')?.getAttribute(
                            'wire:id');
                        if (component.id === componentID) {
                            this.component = component;
                            this.alertStore = Alpine.store('alertStore');
                            this.pageLoaderStore = Alpine.store('pageLoaderStore');
                            this.toastStore = Alpine.store('toastStore');
                        }
                    });
                },
                confirm() {
                    this.alertStore.show();
                },
                async onConfirm() {
                    this.alertStore.hide();
                    this.pageLoaderStore.show();
                    const uploadImage = this.imageDropper.files.map(file => {
                        return new Promise((resolve, reject) => {
                            this.component.$wire.upload('image', file, resolve,
                                reject);
                        });
                    })
                    await Promise.all(uploadImage);
                    const response = await this.component.$wire.call('save', this.form);

                    const {
                        status,
                        data,
                        message
                    } = response;
                    switch (status) {
                        case 201:
                            this.toastStore.success("Berhasil menambahkan perangkat desa", 2000,
                                function() {
                                    window.location.reload();
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
                }
            }

            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
