<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="uk-background-primary uk-light">
        <nav class="uk-navbar-container uk-navbar-transparent">
            <div class="uk-container">
                <div class="uk-navbar" data-uk-navbar>
                    <div class="uk-navbar-left">
                        <a class="uk-navbar-item uk-logo" href="/">{{ config('app.name', 'Hoteles') }}</a>
                        <ul class="uk-navbar-nav">
                            @auth
                            {{-- <li>
                                <a href="{{ route('home') }}">Usuarios</a>
                            </li>
                            <li>
                                <a href="{{ route('user.profile',Auth::id()) }}">Perfil</a>
                            </li> --}}
                            @endauth
                        </ul>
                    </div>
                    <div class="uk-navbar-right">
                        <ul class="uk-navbar-nav">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li>
                                        <a href="{{ route('login') }}">Iniciar Sesión</a>
                                    </li>
                                @endif
                                @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('register') }}">Crear Cuenta</a>
                                    </li>
                                @endif
                            @else
                                <li>
                                    <a href="#">
                                        {{ Auth::user()->email }}
                                    </a>
                                    <div class="uk-navbar-dropdown">
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Cerrar Sesión
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                      style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <main data-uk-height-viewport="expand: true">
        @yield('content')
    </main>

    {{-- <footer class="uk-section uk-section-xsmall uk-section-secondary">
        <div class="uk-container">
            <div class="uk-grid uk-text-center uk-text-left@s uk-flex-middle" data-uk-grid>
                <div class="uk-text-small uk-text-muted uk-width-1-3@s">
                    Lovingly cobbled together by
                    <a target="_blank" href="https://torrix.uk/">Matt Fletcher at Torrix</a>
                </div>
                <div class="uk-text-center uk-width-1-3@s">
                    <a target="_blank" href="https://twitter.com/mattfletcher"
                       class="uk-icon-button uk-margin-small-right" data-uk-icon="twitter"></a>
                    <a target="_blank" href="https://github.com/Torrix"
                       class="uk-icon-button" data-uk-icon="github"></a>
                </div>
                <div class="uk-text-small uk-text-muted uk-text-center uk-text-right@s uk-width-1-3@s">
                    Built with <a target="_blank" href="http://getuikit.com"><span data-uk-icon="uikit"></span></a>
                </div>
            </div>
        </div>
    </footer> --}}
</div>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
