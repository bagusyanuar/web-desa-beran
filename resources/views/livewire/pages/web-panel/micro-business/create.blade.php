<section id="micro-business-create" data-component-id="micro-business-create" class="w-full">
    <div class="mb-5 flex items-start gap-2">
        <a href="{{ route('web-panel.micro-business') }}"
            class="w-8 h-8 flex items-center justify-center rounded-lg border border-neutral-300 cursor-pointer shadow-md hover:bg-neutral-200 transition-all ease-in-out duration-200"
            wire:ignore>
            <i data-lucide="arrow-left" class="text-neutral-700 h-3 w-3"></i>
        </a>
        <div>
            <p class="text-lg text-neutral-700 font-semibold leading-[1.2]">Produk UMKM</p>
            <p class="text-sm text-neutral-500">Halaman ini digunakan untuk mengelola produk UMKM desa beran.</p>
        </div>
    </div>
    <div class="w-full p-6 bg-white shadow-2xl rounded-lg border-t-4 border-accent-500 mb-6">
        <p class="text-sm font-bold text-neutral-700 mb-0">Informasi Produk</p>
        <div class="w-full border-b border-neutral-300 my-3"></div>
        <div class="w-full grid grid-cols-2 gap-x-6 gap-y-6">
            <div class="w-full col-span-2">
                <x-label.label for="name">
                    <span>Nama Produk</span>
                    <span class="text-red-500 text-sm italic">*</span>
                </x-label.label>
                <x-input.text.text placeholder="nama produk umkm" id="name" x-model="$store.SERVICE_MICRO_BUSINESS_CREATE_STORE.form.title" />
                <template x-if="'title' in $store.SERVICE_MICRO_BUSINESS_CREATE_STORE.formValidator">
                    <x-label.validator>
                        <span x-text="$store.SERVICE_MICRO_BUSINESS_CREATE_STORE.formValidator.title[0]"></span>
                    </x-label.validator>
                </template>
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="price">
                    <span>Hara Produk(Rp)</span>
                    <span class="text-red-500 text-sm italic">*</span>
                </x-label.label>
                <x-input.text.text type="number" placeholder="harga produk umkm" id="name" x-model="$store.SERVICE_MICRO_BUSINESS_CREATE_STORE.form.price" />
                <template x-if="'price' in $store.SERVICE_MICRO_BUSINESS_CREATE_STORE.formValidator">
                    <x-label.validator>
                        <span x-text="$store.SERVICE_MICRO_BUSINESS_CREATE_STORE.formValidator.price[0]"></span>
                    </x-label.validator>
                </template>
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="description">
                    <span>Deskrpsi Produk</span>
                </x-label.label>
                <x-input.text.summernote id="description" placeholder="deskripsi produk"
                    x-model="$store.SERVICE_MICRO_BUSINESS_CREATE_STORE.form.description" />
            </div>
        </div>
        <p class="text-sm font-bold text-neutral-700 mb-0 mt-5">Informasi Pemilik</p>
        <div class="w-full border-b border-neutral-300 my-3"></div>
        <div class="w-full grid grid-cols-2 gap-x-6 gap-y-6">
            <div class="w-full col-span-2">
                <x-label.label for="owner-name">
                    <span>Nama Pemilik</span>
                    <span class="text-red-500 text-sm italic">*</span>
                </x-label.label>
                <x-input.text.text id="owner-name" placeholder="nama pemilik produk umkm"
                    x-model="$store.SERVICE_MICRO_BUSINESS_CREATE_STORE.form.ownerName" />
                <template x-if="'ownerName' in $store.SERVICE_MICRO_BUSINESS_CREATE_STORE.formValidator">
                    <x-label.validator>
                        <span x-text="$store.SERVICE_MICRO_BUSINESS_CREATE_STORE.formValidator.ownerName[0]"></span>
                    </x-label.validator>
                </template>
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="owner-image">
                    <span>Foto</span>
                </x-label.label>
                <x-input.file.dropzone store="SERVICE_MICRO_BUSINESS_CREATE_STORE" stateComponent="ownerPictureDropper"
                    class="!h-12"></x-input.file.dropzone>
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="owner-description">
                    <span>Deskrpsi Pemilik</span>
                </x-label.label>
                <x-input.text.summernote id="owner-description" placeholder="nama pemilik produk umkm"
                    x-model="$store.SERVICE_MICRO_BUSINESS_CREATE_STORE.form.ownerDescription" />
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="owner-contact">
                    <span>Kontak Pemilik</span>
                </x-label.label>
                <x-input.text.text id="owner-contact" placeholder="no. hp / no. whatsapp pemilik umkm"
                    x-model="$store.SERVICE_MICRO_BUSINESS_CREATE_STORE.form.ownerContact" />
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="owner-contact">
                    <span>Alamat</span>
                </x-label.label>
                <x-input.text.textarea id="address" rows="4" class=""
                    x-model="$store.SERVICE_MICRO_BUSINESS_CREATE_STORE.form.ownerAddress" />
            </div>
        </div>
        <p class="text-sm font-bold text-neutral-700 mb-0 mt-5">Gambar Produk</p>
        <div class="w-full border-b border-neutral-300 my-3"></div>
        <div class="w-full grid grid-cols-2 gap-x-6 gap-y-6">
            <div class="w-full col-span-2">
                <x-label.label for="owner-image">
                    <span>Foto Produk</span>
                </x-label.label>
                <x-input.file.dropzone store="SERVICE_MICRO_BUSINESS_CREATE_STORE"
                    stateComponent="productPictureDropper" class="!h-12"></x-input.file.dropzone>
            </div>
        </div>
        <div class="w-full border-b border-neutral-300 my-3"></div>
        <div class="flex items-center justify-end">
            <button x-on:click="$store.SERVICE_MICRO_BUSINESS_CREATE_STORE.confirm()"
                class="px-3.5 py-2 gap-1 rounded-md flex items-center justify-center bg-accent-500 border border-accent-500 cursor-pointer">
                <span class="text-sm text-white">Simpan</span>
            </button>
        </div>
    </div>
    <x-alert.confirmation title="Konfirmasi Produk UMKM"
        onAccept="$store.SERVICE_MICRO_BUSINESS_CREATE_STORE.onConfirm()" acceptText="Konfrimasi">
        <p class="text-sm text-neutral-700 text-justify">Anda akan mengkonfirmasi <span class="font-semibold">Pembuatan
                Produk UMKM Baru</span>. Pastikan data yang anda isi sudah
            lengkap dan
            benar, jika sudah klik <span class="font-semibold">"Konfirmasi"</span> jika belum silahkan klik
            <span class="font-semibold">"Batal"</span> dan perbaiki data anda.
        </p>
    </x-alert.confirmation>
    <x-loader.page-loader />
    <x-alert.toast />
</section>

@push('scripts')
    @vite(['resources/js/util/table.js', 'resources/js/util/summernote.js', 'resources/js/util/dropzone.js', 'resources/js/util/alert.js', 'resources/js/util/loader.js'])
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_MICRO_BUSINESS_CREATE_STORE';
            const STORE_PROPS = {
                component: null,
                alertStore: null,
                pageLoaderStore: null,
                toastStore: null,
                form: {
                    title: '',
                    description: '',
                    ownerName: '',
                    ownerDescription: '',
                    ownerContact: '',
                    ownerAddress: ''
                },
                ownerPictureDropper: null,
                productPictureDropper: null,
                formValidator: {},
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="micro-business-create"]')?.getAttribute(
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
                    const uploadOwnerImage = this.ownerPictureDropper.files.map(file => {
                        return new Promise((resolve, reject) => {
                            this.component.$wire.upload('ownerImage', file, resolve,
                                reject);
                        });
                    })
                    await Promise.all(uploadOwnerImage);
                    const uploadProductImage = this.productPictureDropper.files.map(file => {
                        return new Promise((resolve, reject) => {
                            this.component.$wire.upload('productImage', file, resolve,
                                reject);
                        });
                    })
                    await Promise.all(uploadProductImage);
                    const response = await this.component.$wire.call('save', this.form);


                    const {
                        status,
                        data,
                        message
                    } = response;
                    switch (status) {
                        case 201:
                            this.toastStore.success("Berhasil menambahkan produk UMKM", 2000,
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
