<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <meta content="Page description" name="description">
    <meta name="google" content="notranslate" />
    <meta content="" name="author">

    <title>@yield('title')</title>

    <link href={{ asset('css/app.css') }} rel="stylesheet">
</head>

<body>
    @if(isset($categories))
        @include('partials.header', ['categories' => $categories])
    @else
        @include('partials.header', ['categories' => []])
    @endif

    @yield('content')

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            navbarToggleSidebar();
            navActivePage();
        });
    </script>
    <script type="text/javascript" src={{ asset('js/app.js') }}></script>
</body>

</html>
