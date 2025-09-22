<section id="login" data-component-id="login" class="w-full">
    <div class="flex">
        <div class="flex-1 h-dvh relative">
            <img src="{{ asset('static/images/hero/main-hero.png') }}" class="h-dvh w-full object-cover object-center"
                alt="main-hero" />
            <div class="w-full h-dvh absolute flex flex-col justify-center top-0 left-0 bg-black/50 px-16">
                <img src="{{ asset('static/images/logo-image.png') }}" alt="img-login" class="h-24 w-24" />
                <span class="font-extrabold text-accent-500 text-[2.25rem] mb-10"><span
                        class="text-brand-500">Beran</span>Digital.id</span>
                <h1 class="text-white font-semibold text-[2.25rem] w-2/3 leading-normal mb-7">Portal Data,
                    Layanan Dan Informasi
                    Desa Beran</h1>
                <h2 class="text-white text-[0.875rem] w-2/3">
                    Platform digital terpadu yang mendukung berbagai layanan pengajuan surat, produk UMKM, aduan
                    masyarakat dan berbagai informasi yang
                    ada di Desa
                    Beran, untuk mewujudkan Desa Beran sebagai desa digital.
                </h2>
            </div>
        </div>
        <div class="px-16 py-8 h-dvh bg-white w-[25rem] flex flex-col">
            <div class="w-full flex items-end gap-1">
                <img src="{{ asset('static/images/logo-image.png') }}" alt="img-login" class="h-12" />
                <span class="font-extrabold mb-0 text-accent-500 text-lg"><span
                        class="text-brand-500">Beran</span>Digital.id</span>
            </div>
            <div class="flex-1 flex flex-col justify-center">
                <p class="text-brand-500 text-lg font-bold mb-7">Login</p>
                <p class="text-neutral-700 font-semibold mb-3">Login to your account</p>
                <p class="text-neutral-500 text-xs">Welcome back to <span class="font-semibold">BeranDigital.id</span>,
                    lets
                    access the panel to manage
                    <span class="font-semibold">BeranDigital.id</span>
                </p>

                <div class="w-full my-7">
                    <div class="w-full mb-3">
                        <x-label.label for="username">
                            <span>Username</span>
                        </x-label.label>
                        <x-input.text.text-icon id="username" icon="user" placeholder="username"
                            x-model="$store.SERVICE_LOGIN_STORE.form.username" />
                        <template x-if="'username' in $store.SERVICE_LOGIN_STORE.formValidator">
                            <x-label.validator>
                                <span x-text="$store.SERVICE_LOGIN_STORE.formValidator.username[0]"></span>
                            </x-label.validator>
                        </template>
                    </div>
                    <div class="w-full mb-5">
                        <x-label.label for="password">
                            <span>Password</span>
                        </x-label.label>
                        <x-input.password.password-icon id="password" placeholder="username"
                            x-model="$store.SERVICE_LOGIN_STORE.form.password" />
                        <template x-if="'password' in $store.SERVICE_LOGIN_STORE.formValidator">
                            <x-label.validator>
                                <span x-text="$store.SERVICE_LOGIN_STORE.formValidator.password[0]"></span>
                            </x-label.validator>
                        </template>
                    </div>
                    <x-button.button x-on:click="$store.SERVICE_LOGIN_STORE.login()" class="w-full">
                        <span>Login</span>
                    </x-button.button>
                </div>

                <p class="text-neutral-500 text-xs text-center">Contact Developer if you have problem with login</span>
                </p>
            </div>
        </div>
    </div>
    <x-loader.page-loader />
    <x-alert.toast />
</section>
@push('scripts')
    @vite(['resources/js/util/alert.js', 'resources/js/util/loader.js'])
    <script>
        document.addEventListener('alpine:init', () => {
            const STORE_NAME = 'SERVICE_LOGIN_STORE';
            const STORE_PROPS = {
                component: null,
                pageLoaderStore: null,
                toastStore: null,
                form: {
                    username: '',
                    password: ''
                },
                formValidator: {},
                init: function() {
                    Livewire.hook('component.init', ({
                        component
                    }) => {
                        const componentID = document.querySelector(
                            '[data-component-id="login"]')?.getAttribute(
                            'wire:id');
                        if (component.id === componentID) {
                            this.component = component;
                            this.pageLoaderStore = Alpine.store('pageLoaderStore');
                            this.toastStore = Alpine.store('toastStore');
                        }
                    });
                },
                login() {
                    this.pageLoaderStore.show();
                    this.component.$wire.call('login', this.form)
                        .then(response => {
                            const {
                                status,
                                message,
                                data
                            } = response;
                            console.log(response);

                            switch (status) {
                                case 200:
                                    this.toastStore.success("Login Berhasil", 2000,
                                        function() {
                                            window.location.href = '/web-panel/dashboard';
                                        });
                                    break;
                                case 404:
                                    this.toastStore.error(message,
                                        2000);
                                    break;
                                case 401:
                                    this.toastStore.error(message,
                                        2000);
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
                        })
                        .finally(() => {
                            this.pageLoaderStore.hide();
                        });
                }
            };
            Alpine.store(STORE_NAME, STORE_PROPS);
        });
    </script>
@endpush
