<section id="library-create" data-component-id="library-create" class="w-full">
    <div class="mb-5 flex items-start gap-2">
        <a href="{{ route('web-panel.library') }}"
            class="w-8 h-8 flex items-center justify-center rounded-lg border border-neutral-300 cursor-pointer shadow-md hover:bg-neutral-200 transition-all ease-in-out duration-200"
            wire:ignore>
            <i data-lucide="arrow-left" class="text-neutral-700 h-3 w-3"></i>
        </a>
        <div>
            <p class="text-lg text-neutral-700 font-semibold leading-[1.2]">Perpustakaan Online</p>
            <p class="text-sm text-neutral-500">Halaman ini digunakan untuk mengelola perpustakaan online desa beran.</p>
        </div>
    </div>
    <div class="w-full p-6 bg-white shadow-2xl rounded-lg border-t-4 border-accent-500 mb-6">
        <p class="text-sm font-bold text-neutral-700 mb-0">Informasi Perpustakaan Online</p>
        <div class="w-full border-b border-neutral-300 my-3"></div>
        <div class="w-full grid grid-cols-2 gap-x-6 gap-y-6">
            <div class="w-full col-span-2">
                <x-label.label for="title">
                    <span>Judul</span>
                    <span class="text-red-500 text-sm italic">*</span>
                </x-label.label>
                <x-input.text.text placeholder="judul" id="title"
                    x-model="$store.SERVICE_LIBRARY_CREATE_STORE.form.title" />
                <template x-if="'title' in $store.SERVICE_LIBRARY_CREATE_STORE.formValidator">
                    <x-label.validator>
                        <span x-text="$store.SERVICE_LIBRARY_CREATE_STORE.formValidator.title[0]"></span>
                    </x-label.validator>
                </template>
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="author-name">
                    <span>Nama Pengarang</span>
                    <span class="text-red-500 text-sm italic">*</span>
                </x-label.label>
                <x-input.text.text placeholder="nama pengarang" id="author-name"
                    x-model="$store.SERVICE_LIBRARY_CREATE_STORE.form.authorName" />
                <template x-if="'authorName' in $store.SERVICE_LIBRARY_CREATE_STORE.formValidator">
                    <x-label.validator>
                        <span x-text="$store.SERVICE_LIBRARY_CREATE_STORE.formValidator.authorName[0]"></span>
                    </x-label.validator>
                </template>
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="cover-image">
                    <span>Cover / Sampul</span>
                    <span class="text-red-500 text-sm italic">*</span>
                </x-label.label>
                <x-input.file.dropzone store="SERVICE_LIBRARY_CREATE_STORE" stateComponent="imageDropper"
                    class="!h-12"></x-input.file.dropzone>
                <template x-if="'image' in $store.SERVICE_LIBRARY_CREATE_STORE.formValidator">
                    <x-label.validator>
                        <span x-text="$store.SERVICE_LIBRARY_CREATE_STORE.formValidator.image[0]"></span>
                    </x-label.validator>
                </template>
            </div>
            <div class="w-full col-span-2">
                <x-label.label for="file">
                    <span>File</span>
                    <span class="text-red-500 text-sm italic">*</span>
                </x-label.label>
                <x-input.file.dropzone store="SERVICE_LIBRARY_CREATE_STORE" stateComponent="fileDropper"
                    class="!h-12"></x-input.file.dropzone>
                <template x-if="'file' in $store.SERVICE_LIBRARY_CREATE_STORE.formValidator">
                    <x-label.validator>
                        <span x-text="$store.SERVICE_LIBRARY_CREATE_STORE.formValidator.file[0]"></span>
                    </x-label.validator>
                </template>
            </div>
        </div>
        <div class="w-full border-b border-neutral-300 my-3"></div>
        <div class="flex items-center justify-end">
            <button x-on:click="$store.SERVICE_LIBRARY_CREATE_STORE.confirm()"
                class="px-3.5 py-2 gap-1 rounded-md flex items-center justify-center bg-accent-500 border border-accent-500 cursor-pointer">
                <span class="text-sm text-white">Simpan</span>
            </button>
        </div>
    </div>
    <x-alert.confirmation title="Konfirmasi Pembuatan Berita Baru"
        onAccept="$store.SERVICE_LIBRARY_CREATE_STORE.onConfirm()" acceptText="Konfrimasi">
        <p class="text-sm text-neutral-700 text-justify">Anda akan mengkonfirmasi <span class="font-semibold">Penambahan
                Perpustakaan Online Baru</span>. Pastikan data yang anda isi sudah
            lengkap dan
            benar, jika sudah klik <span class="font-semibold">"Konfirmasi"</span> jika belum silahkan klik
            <span class="font-semibold">"Batal"</span> dan perbaiki data anda.
        </p>
    </x-alert.confirmation>
</section>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_LIBRARY_CREATE_STORE';
            const STORE_PROPS = {
                component: null,
                alertStore: null,
                pageLoaderStore: null,
                toastStore: null,
                form: {
                    title: '',
                    authorName: '',
                },
                imageDropper: null,
                fileDropper: null,
                formValidator: {},
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="library-create"]')?.getAttribute(
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
                    const uploadImage = this.imageDropper.files
                        .filter(file => file instanceof File)
                        .map(file => {
                            return new Promise((resolve, reject) => {
                                this.component.$wire.upload('image', file, resolve,
                                    reject);
                            });
                        })
                    await Promise.all(uploadImage);

                    const uploadFile = this.fileDropper.files
                        .filter(file => file instanceof File)
                        .map(file => {
                            return new Promise((resolve, reject) => {
                                this.component.$wire.upload('file', file, resolve,
                                    reject);
                            });
                        })
                    await Promise.all(uploadFile);
                    const response = await this.component.$wire.call('save', this.form);

                    const {
                        status,
                        data,
                        message
                    } = response;
                    switch (status) {
                        case 201:
                            this.toastStore.success("Berhasil menambahkan perpustakaan online", 2000,
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
