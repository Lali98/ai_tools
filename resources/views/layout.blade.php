<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AI Eszközök listája</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{--    <link rel="stylesheet" href="{{ asset('style.css') }}">--}}
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Főoldal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aitools.index') }}">AI eszközök</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aitools.create') }}">Új AI eszközök</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Kategóriák</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.create') }}">Új kategóra</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tags.index') }}">Címke</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tags.create') }}">Új címke</a>
                    </li>
                    @if(auth()->check())
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); this.closest('form').submit();">Kijelentkezés</a>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Bejelenkezés</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="container">
        @yield('content')
    </div>
</main>

{{-- JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
