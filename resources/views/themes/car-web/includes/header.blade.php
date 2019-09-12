<!-- Navigation -->
<div class="navbar-top">
    <div class="container">
        <ul class="navbar-nav">
            @foreach ($topbarMenus as $menu)
            <li class="nav-item"><a href="{{ $menu->link }}">{{ $menu->title }}</a></li>
            @endforeach
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
            <a class="btn btn-danger btn-round my-2 my-sm-0" href="#">Login</a>
        </div>
    </div>
</nav>
