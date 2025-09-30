<section id="micro-business" data-component-id="micro-business" class="w-full">
    <div class="mb-7 flex items-start gap-3">
        <a href="{{ route('web-panel.micro-business') }}"
            class="w-10 h-10 flex items-center justify-center rounded-lg border border-neutral-300 cursor-pointer hover:bg-neutral-100 transition-all ease-in-out duration-200"
            wire:ignore>
            <i data-lucide="arrow-left" class="text-neutral-700 h-4 w-4"></i>
        </a>
        <div>
            <p class="text-xl text-neutral-700 font-bold">Produk UMKM</p>
            <p class="text-md text-neutral-500">Halaman ini digunakan untuk mengelola produk UMKM desa beran.</p>
        </div>
    </div>
    <div class="w-full p-6 bg-white border border-neutral-300 shadow-xl rounded-lg mb-6">
        <p class="text-sm font-bold text-neutral-700 mb-0">Informasi Produk</p>
        <div class="w-full border-b border-neutral-300 my-3"></div>
        <div class="w-full grid grid-cols-2 gap-x-6 gap-y-6">
            <div class="w-full col-span-2">
                <x-label.label for="name">
                    <span>Nama Produk</span>
                    <span class="text-red-500 text-sm italic">*</span>
                </x-label.label>
                <x-input.text.text id="name" x-model="$store.SERVICE_MICRO_BUSINESS_DETAIL_STORE.form.title" />
                <template x-if="'title' in $store.SERVICE_MICRO_BUSINESS_DETAIL_STORE.formValidator">
                    <x-label.validator>
                        <span x-text="$store.SERVICE_MICRO_BUSINESS_DETAIL_STORE.formValidator.title[0]"></span>
                    </x-label.validator>
                </template>
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="description">
                    <span>Deskrpsi Produk</span>
                </x-label.label>
                <x-input.text.summernote id="description"
                    x-model="$store.SERVICE_MICRO_BUSINESS_DETAIL_STORE.form.description" />
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
                <x-input.text.text id="owner-name"
                    x-model="$store.SERVICE_MICRO_BUSINESS_DETAIL_STORE.form.ownerName" />
                <template x-if="'ownerName' in $store.SERVICE_MICRO_BUSINESS_DETAIL_STORE.formValidator">
                    <x-label.validator>
                        <span x-text="$store.SERVICE_MICRO_BUSINESS_DETAIL_STORE.formValidator.ownerName[0]"></span>
                    </x-label.validator>
                </template>
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="owner-image">
                    <span>Foto</span>
                </x-label.label>
                <x-input.file.dropzone store="SERVICE_MICRO_BUSINESS_DETAIL_STORE" stateComponent="ownerPictureDropper"
                    class="!h-12"></x-input.file.dropzone>
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="owner-description">
                    <span>Deskrpsi Pemilik</span>
                </x-label.label>
                <x-input.text.summernote id="owner-description"
                    x-model="$store.SERVICE_MICRO_BUSINESS_DETAIL_STORE.form.ownerDescription" />
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="owner-contact">
                    <span>Kontak Pemilik</span>
                </x-label.label>
                <x-input.text.text id="owner-contact"
                    x-model="$store.SERVICE_MICRO_BUSINESS_DETAIL_STORE.form.ownerContact" />
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="owner-contact">
                    <span>Alamat</span>
                </x-label.label>
                <x-input.text.textarea id="address" rows="4" class=""
                    x-model="$store.SERVICE_MICRO_BUSINESS_DETAIL_STORE.form.ownerAddress" />
            </div>
        </div>
        <p class="text-sm font-bold text-neutral-700 mb-0 mt-5">Gambar Produk</p>
        <div class="w-full border-b border-neutral-300 my-3"></div>
        <div class="w-full grid grid-cols-2 gap-x-6 gap-y-6">
            <div class="w-full col-span-2">
                <x-label.label for="owner-image">
                    <span>Foto Produk</span>
                </x-label.label>
                <x-input.file.dropzone store="SERVICE_MICRO_BUSINESS_DETAIL_STORE"
                    stateComponent="productPictureDropper" class="!h-12"></x-input.file.dropzone>
            </div>
        </div>
        <div class="w-full border-b border-neutral-300 my-3"></div>
        <div class="flex items-center justify-end">
            <button x-on:click="$store.SERVICE_MICRO_BUSINESS_DETAIL_STORE.onConfirm()"
                class="px-3.5 py-2 gap-1 rounded-md flex items-center justify-center bg-accent-500 border border-accent-500 cursor-pointer">
                <span class="text-sm text-white">Simpan</span>
            </button>
        </div>
    </div>
</section>

@push('scripts')
    @vite(['resources/js/util/table.js', 'resources/js/util/summernote.js', 'resources/js/util/dropzone.js'])
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_MICRO_BUSINESS_DETAIL_STORE';
            const STORE_PROPS = {
                component: null,
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
                            '[data-component-id="micro-business"]')?.getAttribute(
                            'wire:id');
                        if (component.id === componentID) {
                            this.component = component;

                        }
                    });
                },
                async onConfirm() {
                    const uploadOwnerImage = this.ownerPictureDropper.files.map(file => {
                        return new Promise((resolve, reject) => {
                            this.component.$wire.upload('ownerImage', file, resolve, reject);
                        });
                    })
                    await Promise.all(uploadOwnerImage);
                    const uploadProductImage = this.productPictureDropper.files.map(file => {
                        return new Promise((resolve, reject) => {
                            this.component.$wire.upload('productImage', file, resolve, reject);
                        });
                    })

                    await Promise.all(uploadProductImage);
                    const response = await this.component.$wire.call('save', this.form);
                    console.log(response);


                }
            }

            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
