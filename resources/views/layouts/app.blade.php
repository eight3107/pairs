<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>


    <div id="app">

      <header class="header">

        <div class="menu-trigger js-toggle-sp-menu">
          <span></span>
          <span></span>
          <span></span>
        </div>
          <nav class="nav-menu js-toggle-sp-menu-target ">
            <ul class="menu">
              <li class="menu-item"><a class="menu-link" href="http://localhost:8000/users/index/">さがす</a></li>
              <li class="menu-item"><a class="menu-link" href="http://localhost:8000/interests/">コミュニティ</a></li>
              <li class="menu-item"><a class="menu-link" href="http://localhost:8000/users/receive">相手から</a></li>
              <li class="menu-item"><a class="menu-link" href="http://localhost:8000/matching">メッセージ</a></li>
              <li class="menu-item"><a class="menu-link" href="http://localhost:8000/users/edit">プロフィール</a></li>
              <li class="menu-item"><a class="menu-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" id="logout" class="my-navbar-item">ログアウト</a></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </ul>
          </nav>

    </header>
        <main>
            @yield('content')
        </main>
        <footer>
          <p>avecs</p>
      	</footer>
    </div>
</body>
</html>
