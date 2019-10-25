@if (Auth::check())
    <div class="my-profile">
        <div class="pro-img">
            <img src="{{ Auth::user()->avatar_url() }}" alt="">
        </div>
        <div class="pro-detail">
            <div class="username">{{ Auth::user()->name }}</div>
            <div class="edit"> <a href="{{ url('/home?edit=true') }}">Edit profile</a></div>
        </div>
    </div>
@endif
