<header>
    <a class="maz-mobile-brand" href="#">MAZ.MN</a>
    <div class="maz-burger-menu">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <nav class="maz-navbar position-absolute" id="maz-nav">
        <div class="container">
            <div class="maz-menu">
                <a class="maz-brand" href="#">MAZ.MN</a>
                <ul class="maz-menu-list">
                    @foreach ($mainMenus as $menu)
                        <li class="maz-menu-item {{ Request::is(\Str::startsWith($menu->link, '/') ? substr($menu->link, 1) : $menu->link) ? 'active' : '' }}">
                            <a class="maz-menu-link" href="{{ $menu->link }}">{{ $menu->title }}
                                @if(Request::is($menu->link))
                                    <span class="sr-only">(current)</span>
                                @endif
                            </a>
                        </li>
                    @endforeach
                    <li class="maz-menu-item">
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
                    </li>
                </ul>

            </div>
            <div class="maz-menu-top">
                <ul class="maz-menu">
                    @foreach ($topbarMenus as $menu)
                        <li class="maz-menu-item"><a href="{{ $menu->link }}">/ {{ $menu->title }} /</a></li>
                    @endforeach

                    @auth
                        <li class="maz-menu-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <li class="maz-menu-item"><a href="{{ url('/register-step-1') }}">Sign Up</a></li>
                    @endauth
                </ul>
            </div>
        </div>
        </div>
    </nav>






    {{--<nav class="maz-navbar position-absolute" id="maz-nav">--}}
        {{--<div class="container">--}}
            {{--<a class="maz-brand" href="#">Car dealer</a>--}}
            {{--<div class="maz-burger-menu">--}}
                {{--<span></span>--}}
                {{--<span></span>--}}
                {{--<span></span>--}}
            {{--</div>--}}
            {{--<div class="maz-menu">--}}
                {{--<ul class="maz-menu-list">--}}
                    {{--@foreach ($mainMenus as $menu)--}}
                        {{--<li class="maz-menu-item {{ Request::is($menu->link) ? 'active' : '' }}">--}}
                            {{--<a class="maz-menu-link" href="{{ $menu->link }}">{{ $menu->title }}--}}
                                {{--@if(Request::is($menu->link))--}}
                                    {{--<span class="sr-only">(current)</span>--}}
                                {{--@endif--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
                {{--@auth--}}
                    {{--<div class="dropdown">--}}
                        {{--<button class="btn btn-secondary btn-round dropdown-toggle px-4" type="button" id="headerProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                            {{--@if (isset(Auth::user()->name))--}}
                                {{--<span>{{ Auth::user()->name }}</span>--}}
                            {{--@else--}}
                                {{--<span>{{ Auth::user()->username }}</span>--}}
                            {{--@endif--}}
                        {{--</button>--}}
                        {{--<div class="dropdown-menu" aria-labelledby="headerProfileDropdown">--}}
                            {{--@foreach ($dropdownMenus as $menu)--}}
                                {{--<a class="dropdown-item" href="{{ url($menu->link) }}">{{ $menu->title }}</a>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@else--}}
                    {{--<a class="btn btn-danger btn-round my-2 my-sm-0 px-5" href="{{ url('/login') }}">Login</a>--}}
                {{--@endauth--}}
            {{--</div>--}}

            {{--<div class="maz-menu-top">--}}
                {{--<div class="container">--}}
                    {{--<ul class="maz-menu">--}}
                        {{--@foreach ($topbarMenus as $menu)--}}
                            {{--<li class="maz-menu-item"><a href="{{ $menu->link }}">/ {{ $menu->title }} /</a></li>--}}
                        {{--@endforeach--}}

                        {{--@auth--}}
                            {{--<li class="maz-menu-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>--}}
                            {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                {{--@csrf--}}
                            {{--</form>--}}
                        {{--@else--}}
                            {{--<li class="maz-menu-item"><a href="{{ url('/register-step-1') }}">Sign Up</a></li>--}}
                        {{--@endauth--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</nav>--}}
</header>








<style>
    .btn-main {
        color: #2B3651;
        background-color: #E0E5EB;
        border-color: #E0E5EB;
    }
</style>
