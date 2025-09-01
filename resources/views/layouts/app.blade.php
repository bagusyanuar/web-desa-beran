<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Desa Beran</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/css/datepicker.min.css" />
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    {{-- <livewire:layout.navbar.landing-top-navbar /> --}}
    {{-- <livewire:layout.navbar.landing-navbar /> --}}
    <div class="w-full h-16 fixed z-30 top-0 left-0">
        <x-container.landing-container class="h-full">
            <div class="w-full h-full flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('static/images/logo-image-white.png') }}" class="w-10 h-10" />
                    <span class="text-white font-semibold text-sm">Beran Digital</span>
                </div>
                <div class="flex items-center gap-5">
                    <span class="text-white text-sm">Beranda</span>
                    <span class="text-white text-sm">Layanan</span>
                    <span class="text-white text-sm">Profil</span>
                    <span class="text-white text-sm">Produk</span>
                </div>
                <div>
                    <a href="#" class="font-semibold flex items-center justify-center px-5 py-2.5 rounded-md text-sm text-white">
                        <span>Ajukan Surat</span>
                    </a>
                </div>
            </div>
        </x-container.landing-container>
    </div>
    {{ $slot }}
    {{-- <livewire:layout.footer.footer /> --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
    @livewireScripts
    @stack('scripts')
</body>

</html>
