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
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/css/datepicker.min.css" />
    @vite(['resources/css/app.css', 'resources/sass/app.scss'])
    @livewireStyles
</head>

<body>
    <nav class="w-full h-16">
        <x-container.landing-container class="h-full">
            <div class="w-full flex items-center justify-between h-full">
                <!-- navbar brand -->
                <div class="flex items-center gap-1">
                    {{-- <div
                        class="h-14 aspect-[1/1] rounded-lg border-brand-500 border-[3px] flex items-center justify-center"> --}}
                    <img src="{{ asset('static/images/logo-image.png') }}" class="h-10" alt="brand-image" />
                    {{-- </div> --}}
                    <div class="flex flex-col">
                        <span class="font-extrabold mb-0 text-accent-500 text-md"><span
                                class="text-brand-500">Beran</span>Digital.id</span>
                        <span class="text-neutral-700 text-xs leading-none mb-0">
                            Platform Digital Desa Beran
                        </span>
                    </div>
                </div>
                <!-- navbar menu -->

                <div class="flex items-center gap-5">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-0.5">
                            <i data-lucide="phone"
                                class="text-neutral-500 group-focus-within:text-neutral-700 h-4 aspect-[1/1]"></i>
                            <span class="text-xs text-neutral-500">
                                (0812) 1234 5678
                            </span>
                        </div>
                        <div class="flex items-center gap-0.5">
                            <i data-lucide="mail"
                                class="text-neutral-500 group-focus-within:text-neutral-700 h-4 aspect-[1/1]"></i>
                            <span class="text-xs text-neutral-500">
                                beran@gmail.com
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center gap-1">
                        <a href="#" class="h-6 w-6 flex items-center justify-center">
                            <i data-lucide="facebook"
                                class="text-neutral-700 group-focus-within:text-neutral-700 h-5 aspect-[1/1]"></i>
                        </a>
                        <a href="#" class="h-6 w-6 flex items-center justify-center">
                            <i data-lucide="youtube"
                                class="text-neutral-700 group-focus-within:text-neutral-700 h-5 aspect-[1/1]"></i>
                        </a>
                        <a href="#" class="h-6 w-6 flex items-center justify-center">
                            <i data-lucide="instagram"
                                class="text-neutral-700 group-focus-within:text-neutral-700 h-5 aspect-[1/1]"></i>
                        </a>

                    </div>
                </div>
            </div>
        </x-container.landing-container>
    </nav>
    <div class="w-full h-10 bg-brand-500">
        <x-container.landing-container class="h-full">
            <div class="flex items-center gap-1 h-full">
                <a href="/" class="text-white text-xs rounded-sm leading-none mb-0 bg-transparent px-1 py-2 hover:bg-white hover:text-brand-500 transition-all ease-in duration-200">
                    <span>Beranda</span>
                </a>
                <a href="/" class="text-white text-xs rounded-sm leading-none mb-0 bg-transparent px-1 py-2 hover:bg-white hover:text-brand-500 transition-all ease-in duration-200">
                    <span>Profil</span>
                </a>
                <a href="/" class="text-white text-xs rounded-sm leading-none mb-0 bg-transparent px-1 py-2 hover:bg-white hover:text-brand-500 transition-all ease-in duration-200">
                    <span>UMKM</span>
                </a>
            </div>
        </x-container.landing-container>
    </div>
    {{ $slot }}
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
