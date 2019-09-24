<!-- Navigation -->
<div class="navbar-top">
    <div class="container">
        <ul class="navbar-nav">
            @foreach ($topbarMenus as $menu)
            <li class="nav-item"><a href="{{ $menu->link }}">{{ $menu->title }}</a></li>
            @endforeach
            <li class="nav-item"><a href="#"><img src="{{ asset('car-web/img/en.png') }}" alt=""></a></li>
        </ul>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top">
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
            @if(Auth::user())
            <a class="btn btn-main btn-round my-2 my-sm-0 shadow" href="#">My Page</a>
            @else
            <a class="btn btn-danger btn-round my-2 my-sm-0" href="#">Login</a>
            @endif
        </div>
    </div>
</nav>
<style>
.btn-main {
color: #2B3651;
background-color: #E0E5EB;
border-color: #E0E5EB;
}
</style>