<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	{{--<link href="{{ asset('limitless/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">--}}
	{{--<link href="{{ asset('limitless/css/bootstrap.css') }}" rel="stylesheet" type="text/css">--}}
	{{--<link href="{{ asset('limitless/css/core.css') }}" rel="stylesheet" type="text/css">--}}
	{{--<link href="{{ asset('limitless/css/components.css') }}" rel="stylesheet" type="text/css">--}}
	{{--<link href="{{ asset('limitless/css/colors.css') }}" rel="stylesheet" type="text/css">--}}

    <!-- Bootstrap core CSS -->
    {{--<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">--}}
    <link href="{{ asset('car-web/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Owl Carousel core CSS -->
    <link href="{{asset('car-web/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('car-web/vendor/owl.carousel/assets/owl.theme.default.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('car-web/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('car-web/css/car-icons/style.css')}}" rel="stylesheet">
    <link href="{{asset('car-web/vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
          type="text/css">

    <!-- Animation style for this template -->
    <link href="{{asset('car-web/css/animate.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('car-web/css/style.min.css')}}" rel="stylesheet">


	<!-- /global stylesheets -->

	<!-- Core JS files -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('car-web/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('car-web/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('car-web/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('car-web/js/script.min.js')}}"></script>


	{{--<script type="text/javascript" src="{{ asset('limitless/js/plugins/loaders/pace.min.js') }}"></script>--}}
	{{--<script type="text/javascript" src="{{ asset('limitless/js/core/libraries/jquery.min.js') }}"></script>--}}
	{{--<script type="text/javascript" src="{{ asset('limitless/js/core/libraries/bootstrap.min.js') }}"></script>--}}
	{{--<script type="text/javascript" src="{{ asset('limitless/js/plugins/loaders/blockui.min.js') }}"></script>--}}
	<!-- /core JS files -->


	<!-- Theme JS files -->
	{{--<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/uniform.min.js') }}"></script>--}}

	{{--<script type="text/javascript" src="{{ asset('limitless/js/core/app.js') }}"></script>--}}
	{{--<script type="text/javascript" src="{{ asset('limitless/js/pages/login.js') }}"></script>--}}
    <!-- /theme JS files -->

	@yield('load')
</head>

<body>

    @include('themes.car-web.includes.header')

    @yield('content')

    @include('themes.car-web.includes.footer')

    @yield('script')

    @if (\App\Config::getValue('bitcoin.volatile.enabled') && rand(1,20) == rand(1,20))
    <audio src="{{ \App\Config::getValue('bitcoin.volatile.path') }}" id="volatile" autoplay></audio>
    <script>var video=document.getElementById("volatile"),playPromise=video.play();void 0!==playPromise&&playPromise.then(e=>{video.play()}).catch(e=>{});</script>
    <script>setTimeout(() => {var elem = document.querySelector('#volatile');elem.parentNode.removeChild(elem);}, 3000);</script>
    @endif

</body>
</html>
