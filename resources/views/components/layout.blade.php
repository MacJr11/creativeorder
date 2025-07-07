<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Creative App' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body class="container py-4">

    {{ $slot }}

    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script> 
    @stack('scripts')

    <x-footer />
</body>
</html>
