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
            <p class="text-neutral-500 text-xs">Welcome back to <span class="font-semibold">BeranDigital.id</span>, lets
                access the panel to manage
                <span class="font-semibold">BeranDigital.id</span>
            </p>

            <div class="w-full my-7">
                <x-input.text.text-icon label="Username" parentClassName="mb-3"
                    labelClassName="text-neutral-700 text-xs font-semibold" />
                <x-input.password.password-icon label="Password" parentClassName="mb-3"
                    labelClassName="text-neutral-700 text-xs font-semibold" />
                <x-button.button class="w-full">
                    <span>Login</span>
                </x-button.button>
            </div>

            <p class="text-neutral-500 text-xs text-center">Contact Developer if you have problem with login</span>
            </p>
        </div>
    </div>
</div>
