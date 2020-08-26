<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel en minutos ... </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    Menu
    <nav class="menu-container">
        <ul class="menu">
            <li class="menu__item"><a class="menu__link" href="{{route('about')}}">About</a></li>
            <li class="menu__item"><a class="menu__link" href="{{route('blog.index')}}">Blog</a></li>
            <li class="menu__item"><a class="menu__link" href="{{route('home')}}">Home</a></li>
            <li class="menu__item"><a class="menu__link" href="{{route('contacts')}}">Contacts</a></li>
        </ul>
    </nav>

    <div class="content">
        @yield('content')
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
