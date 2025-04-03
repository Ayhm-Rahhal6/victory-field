<nav class="navbar navbar-expand-md navbar-fixed-top navigation-clean-button navbar-light"
    style="background: #1a1a1a; border-radius: 0px; border-style: none; padding-top: 0; padding-bottom: 10px; position: relative; overflow: visible;"
    data-bs-smooth-scroll="true" data-bs-target="#navcol-1">
    <div class="container">
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
            <span class="visually-hidden">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="me-5">
            <a class="navbar-brand me-5" href="/">
                <img src="assets/img/logo-vic1.png" alt="" style="width: 100px; height: 50px;">
            </a>
        </div>
        <div class="collapse navbar-collapse ms-5" id="navcol-1">
            <ul class="navbar-nav nav-right">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('sports') ? 'active' : '' }}" href="/sports">Sports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('reservation') ? 'active' : '' }}" href="/reservation">Reservation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">About Us</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" style="color: #22b14c; font-weight: bold;">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light action-button" role="button" href="{{ route('register') }}"
                            style="color: rgb(255,255,255); background: #22b14c; border-radius: 10px; font-size: 16px; padding: 5px 8px; border-style: solid; border-color: #22b14c;">
                            {{ __('Sign Up') }}
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-success" href="{{ route('profile.show') }}">
                                <i class="fas fa-user-circle me-2"></i> {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item text-success" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
