<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Desa Beran | Login Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('static/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('static/css/datepicker.min.css') }}" />
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>

    {{ $slot }}
    <script src="{{ asset('static/js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('static/js/select2.min.js') }}"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
    @livewireScripts
    @stack('scripts')
</body>

</html>
