<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- seo tags --}}
    <title>@yield('title')</title>
    {{-- stylesheets --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
    @stack('styles')
</head>
<body class="@yield('body-class')">
    @yield('body')

    {{-- scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
    @include('ace::partials.notifications')
    @yield('scripts')
    @stack('scripts')
</body>
</html>
