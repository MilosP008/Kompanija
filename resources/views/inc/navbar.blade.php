<nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{isset($pocetnaActive) ? $pocetnaActive : ''}}">
                    <a class="nav-link" href="/">Pocetna</a>
                </li>
                <li class="nav-item {{isset($poslodavciActive) ? $poslodavciActive : ''}}">
                    <a class="nav-link" href="/poslodavci/">Poslodavci</a>
                </li>
                <li class="nav-item {{isset($radniciActive) ? $radniciActive : ''}}">
                    <a class="nav-link" href="/radnici/">Radnici</a>
                </li>
                <li class="nav-item {{isset($radnaMestaActive) ? $radnaMestaActive : ''}}">
                    <a class="nav-link" href="/radnamesta/">Radna mesta</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item {{isset($loginActive) ? $loginActive : ''}}">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Prijava') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item {{isset($registerActive) ? $registerActive : ''}}">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registracija') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/home">Komandna tabla</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Odjava') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>