<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>

	<!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('car-web/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Owl Carousel core CSS -->
    <link href="{{ asset('car-web/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('car-web/vendor/owl.carousel/assets/owl.theme.default.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('car-web/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('car-web/css/car-icons/style.css') }}" rel="stylesheet">
    <link href="{{ asset('car-web/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">

    <!-- Animation style for this template -->
    <link href="{{ asset('car-web/css/animate.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('car-web/css/style.min.css') }}" rel="stylesheet">

	<!-- /global stylesheets -->

    <script src="{{ asset('car-web/vendor/jquery/jquery.min.js') }}"></script>
    @yield('load')

    @stack('styles')
</head>

<body>

    @include('themes.car-web.includes.header')

    @yield('content')

    @include('themes.car-web.includes.footer')

    @stack('modals')
    <script src="{{ asset('car-web/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('car-web/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('car-web/vendor/owl.carousel.thumbs/owl.carousel2.thumbs.min.js') }}"></script>
    <script src="{{ asset('car-web/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('car-web/vendor/lottie-web/player/lottie.min.js') }}"></script>
    <script src="{{ asset('car-web/js/script.min.js') }}"></script>
    <script src="{{ asset('inputmask/jquery.inputmask.min.js') }}"></script>
    <script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    </script>
    @yield('script')

    @stack('scripts')

</body>
</html>
