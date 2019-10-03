<!-- Navigation -->
<header>
    <div class="navbar-top">
        <div class="container">
            <ul class="navbar-nav">
                @foreach ($topbarMenus as $menu)
                    <li class="nav-item"><a href="{{ $menu->link }}">{{ $menu->title }}</a></li>
                @endforeach

                @auth
                    <li class="nav-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <li class="nav-item"><a href="{{ url('/register-step-1') }}">Sign Up</a></li>
                @endauth

                <li class="nav-item"><a href="#"><img src="{{ asset('car-web/img/en.png') }}" alt=""></a></li>
            </ul>
        </div>
    </div>
    <nav id="maz-nav" class="navbar navbar-expand-lg navbar-light position-absolute">
        <div class="container">
            <a class="navbar-brand" href="#">Car dealer</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
                    aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    @foreach ($mainMenus as $menu)
                    <li class="nav-item {{ Request::is($menu->link) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ $menu->link }}">{{ $menu->title }}</a>
                    </li>
                    @endforeach
                </ul>
                @auth
                    <div class="dropdown">
                        <button class="btn btn-secondary btn-round dropdown-toggle px-4" type="button" id="headerProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (isset(Auth::user()->name))
                                <span>{{ Auth::user()->name }}</span>
                            @else
                                <span>{{ Auth::user()->username }}</span>
                            @endif
                        </button>
                        <div class="dropdown-menu" aria-labelledby="headerProfileDropdown">
                            @foreach ($dropdownMenus as $menu)
                                <a class="dropdown-item" href="{{ url($menu->link) }}">{{ $menu->title }}</a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a class="btn btn-danger btn-round my-2 my-sm-0 px-5" href="{{ url('/login') }}">Login</a>
                @endauth
            </div>
        </div>
    </nav>
</header>

<style>
.btn-main {
    color: #2B3651;
    background-color: #E0E5EB;
    border-color: #E0E5EB;
}
</style>
