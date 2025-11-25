{{-- Layout és navigáció kialakítása - Németh Ildikó --}}


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>@yield('title', 'Foodieblog')</title>


    <link rel="stylesheet" href="/editorial/assets/css/main.css" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="is-preload">


    <div id="wrapper">


        <div id="main">
            <div class="inner">


                <header id="header">
                    <a href="{{ route('home') }}" class="logo"><strong>Foodieblog</strong> by Laravel</a>
                    <ul class="icons">
                        <li><a href="#" class="icon brands fa-twitter"></a></li>
                        <li><a href="#" class="icon brands fa-facebook-f"></a></li>
                    </ul>
                </header>


                @yield('content')

            </div>
        </div>


        <div id="sidebar">
            <div class="inner">


                <nav id="menu">
    <header class="major">
        <h2>Menü</h2>
    </header>
    <ul>

        <li><a href="{{ route('home') }}">Főoldal</a></li>
        <li><a href="{{ route('etelek.index') }}">Adatbázis</a></li>
        <li><a href="{{ route('kapcsolat') }}">Kapcsolat</a></li>
        <li><a href="{{ route('diagram.index') }}">Diagram</a></li>
        <li><a href="{{ route('crud.index') }}">CRUD</a></li>


        @auth
            {{-- USER menü (nem admin) --}}
            @if(auth()->user()->role === 'user')
                <li><a href="{{ route('uzenetek.index') }}">Üzenetek</a></li>
            @endif

            {{-- ADMIN menü --}}
            @if(auth()->user()->role === 'admin')
                <li><a href="{{ route('admin.index') }}">Admin</a></li>
            @endif

            {{-- Kijelentkezés --}}
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button style="background:none;border:none;color:#fff;padding:0;margin:0;">
                        Kijelentkezés
                    </button>
                </form>
            </li>

        @endauth


        {{-- 🔓 Vendég (nincs bejelentkezve) --}}
        @guest
            <li><a href="{{ route('login') }}">Bejelentkezés</a></li>
            <li><a href="{{ route('register') }}">Regisztráció</a></li>
        @endguest

    </ul>
</nav>


            </div>
        </div>

    </div>


    <script src="/editorial/assets/js/jquery.min.js"></script>
    <script src="/editorial/assets/js/browser.min.js"></script>
    <script src="/editorial/assets/js/breakpoints.min.js"></script>
    <script src="/editorial/assets/js/util.js"></script>
    <script src="/editorial/assets/js/main.js"></script>

</body>

</html>
