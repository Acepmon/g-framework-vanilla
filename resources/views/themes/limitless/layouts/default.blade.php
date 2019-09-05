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
	<link href="{{ asset('limitless/bootstrap4/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless/bootstrap4/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless/bootstrap4/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless/bootstrap4/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless/bootstrap4/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless/bootstrap4/css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/main/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/main/bootstrap.bundle.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/login.js') }}"></script>
    
    
	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/select2.min.js') }}"></script>
    <!-- /theme JS files -->

	@yield('load')
</head>

<body>

    @include('themes.limitless.includes.navbar')

    <!-- Page content -->
    <div class="page-content" id="app">

        @include('themes.limitless.includes.sidebar')

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header page-header-light">
                @yield('pageheader')
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">

                @yield('content')

            </div>
            
            @include('themes.limitless.includes.footer')
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

    @yield('script')

    @if (\App\Config::getValue('bitcoin.volatile.enabled') && rand(1,20) == rand(1,20))
    <audio src="{{ \App\Config::getValue('bitcoin.volatile.path') }}" id="volatile" autoplay></audio>
    <script>var video=document.getElementById("volatile"),playPromise=video.play();void 0!==playPromise&&playPromise.then(e=>{video.play()}).catch(e=>{});</script>
    <script>setTimeout(() => {var elem = document.querySelector('#volatile');elem.parentNode.removeChild(elem);}, 3000);</script>
    @endif

</body>
</html>
