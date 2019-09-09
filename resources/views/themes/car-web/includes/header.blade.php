
<!-- Navigation -->
<div class="navbar-top">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="#">About us</a></li>
            <li class="nav-item"><a href="#">Customer support</a></li>
            <li class="nav-item"><a href="#">Foreigner support</a></li>
            <li class="nav-item"><a href="#">Sign up</a></li>
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
                <li class="nav-item {{ Request::is('car-web')?'active':'' }}">
                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ Request::is('car-list')?'active':'' }}">
                    <a class="nav-link" href="/car-list">Buy</a>
                    
                </li>
                <li class="nav-item {{ Request::is('car-sell')?'active':'' }}">
                    <a class="nav-link" href="#">Sell</a>
                </li>
                <li class="nav-item {{ Request::is('car-finance')?'active':'' }}">
                    <a class="nav-link" href="finance.html">Finance</a>
                </li>
                <li class="nav-item {{ Request::is('car-auction')?'active':'' }}">
                    <a class="nav-link" href="#">Auction</a>
                </li>
            </ul>
            <a class="btn btn-danger btn-round my-2 my-sm-0" href="#">Login</a>
        </div>
    </div>
</nav>
