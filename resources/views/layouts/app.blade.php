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
    <link rel="stylesheet" href="{{ asset('static/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('static/css/datepicker.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    @vite(['s', 'resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    {{-- <livewire:layout.navbar.landing-top-navbar /> --}}
    <livewire:layout.navbar.landing-navbar />
    {{ $slot }}
    <livewire:layout.footer.footer />
    <script src="{{ asset('static/js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('static/js/select2.min.js') }}"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        lucide.createIcons();
    </script>
    @livewireScripts
    @stack('scripts')
</body>

</html>
