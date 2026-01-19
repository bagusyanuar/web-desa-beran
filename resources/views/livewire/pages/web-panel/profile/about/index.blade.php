<section id="about" data-component-id="about" class="w-full">
    <div class="mb-5">
        <p class="text-lg text-neutral-700 font-semibold leading-[1.2]">Tentang Desa</p>
        <p class="text-sm text-neutral-500">Halaman ini digunakan untuk mengelola profil atau sejarah singkat desa beran.</p>
    </div>
    <div class="w-full bg-white shadow-2xl p-6 rounded-lg border-t-4 border-accent-500">
        <div class="w-full mb-6" wire:ignore>
            <x-label.label for="about-description">
                <span>Deskripsi Tentang Desa Beran</span>
            </x-label.label>
            <x-input.text.summernote id="about-description" height="350"
                x-model="$store.SERVICE_ABOUT_STORE.form.description" />
            <template x-if="'description' in $store.SERVICE_ABOUT_STORE.formValidator">
                <x-label.validator>
                    <span x-text="$store.SERVICE_ABOUT_STORE.formValidator.description[0]"></span>
                </x-label.validator>
            </template>
        </div>
        <div class="w-full">
            <x-label.label for="image">
                <span>Foto Desa</span>
            </x-label.label>
            <x-input.file.dropzone store="SERVICE_ABOUT_STORE" stateComponent="imageDropper"
                class="!h-12"></x-input.file.dropzone>
        </div>
        <div class="w-full border-b border-neutral-300 my-3"></div>
        <div class="flex items-center justify-end">
            <button x-on:click="$store.SERVICE_ABOUT_STORE.confirm()"
                class="px-3.5 py-2 gap-1 rounded-md flex items-center justify-center bg-accent-500 border border-accent-500 cursor-pointer">
                <span class="text-sm text-white">Simpan</span>
            </button>
        </div>
    </div>
    <x-alert.confirmation title="Konfirmasi Perubahan Profil" onAccept="$store.SERVICE_ABOUT_STORE.onConfirm()"
        acceptText="Konfrimasi">
        <p class="text-sm text-neutral-700 text-justify">Anda akan mengkonfirmasi <span class="font-semibold">Perubahan
                Profil DESA BERAN</span>. Pastikan data yang anda isi sudah
            lengkap dan
            benar, jika sudah klik <span class="font-semibold">"Konfirmasi"</span> jika belum silahkan klik
            <span class="font-semibold">"Batal"</span> dan perbaiki data anda.
        </p>
    </x-alert.confirmation>
    <x-loader.page-loader />
    <x-alert.toast />
</section>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_ABOUT_STORE';
            const STORE_PROPS = {
                component: null,
                alertStore: null,
                pageLoaderStore: null,
                toastStore: null,
                imageDropper: null,
                imageDropperUrl: null,
                form: {
                    description: ''
                },
                formValidator: {},
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="about"]')?.getAttribute(
                            'wire:id');
                        if (component.id === componentID) {
                            this.component = component;
                            this.alertStore = Alpine.store('alertStore');
                            this.pageLoaderStore = Alpine.store('pageLoaderStore');
                            this.toastStore = Alpine.store('toastStore');
                            this.getCurrentProfile();
                        }
                    });
                },
                confirm() {
                    this.alertStore.show();
                },
                async onConfirm() {
                    this.alertStore.hide();
                    this.pageLoaderStore.show();
                    const uploadImage = this.imageDropper.files
                    .filter(file => file instanceof File)
                    .map(file => {
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
                        case 200:
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
                },
                getCurrentProfile() {
                    this.pageLoaderStore.show();
                    this.component.$wire.call('getAbout').then(response => {
                        const {
                            status,
                            data,
                            message
                        } = response;
                        if (data) {
                            const {
                                description,
                                image,
                            } = data;
                            this.form.description = description;
                            this.imageDropperUrl = image;
                            let mockFile = {
                                name: "gambar-lama.jpg",
                                size: 12345
                            };
                            this.imageDropper.emit("addedfile", mockFile);
                            this.imageDropper.emit("thumbnail", mockFile, this.imageDropperUrl);
                            this.imageDropper.emit("complete", mockFile);
                            this.imageDropper.files.push(mockFile);

                        } else {
                            this.form.description = '';
                        }

                    }).finally(() => {
                        this.pageLoaderStore.hide();
                    })
                }
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
