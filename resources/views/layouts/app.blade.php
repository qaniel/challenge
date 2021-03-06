<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @auth
        <!-- API Token -->
        <meta name="api_token" content="{{ Auth::user()->api_token }}">
    @endauth
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
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm nav">
        <div class="container nav__container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse nav__list-container" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto nav__list-container">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link nav__link {{ Route::currentRouteName() === 'index' ? 'nav__link--active' : '' }}" href="{{ route('index') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav__link {{ Route::currentRouteName() === 'login' ? 'nav__link--active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link nav__link {{ Route::currentRouteName() === 'register' ? 'nav__link--active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link nav__link {{ Route::currentRouteName() === 'dashboard' ? 'nav__link--active' : '' }}" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav__link {{ Route::currentRouteName() === 'showEntryForm' ? 'nav__link--active' : '' }}" href="{{ route('showEntryForm') }}">{{ __('Create Entry') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav__link {{ Route::currentRouteName() === 'showUserEntries' ? 'nav__link--active' : '' }}" href="{{ route('showUserEntries', [Auth::user()->id]) }}">{{ __('My Page') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown " class="nav-link dropdown-toggle nav__link" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @include('components.flash-messages')
        @yield('content')
    </main>
</div>
</body>
</html>
