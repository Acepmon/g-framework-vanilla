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
	<link href="{{ asset('limitless/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless/css/core.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless/css/components.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless/css/colors.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/loaders/pace.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/core/libraries/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/core/libraries/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/uniform.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('limitless/js/core/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/pages/login.js') }}"></script>
    <!-- /theme JS files -->

	@yield('load')
</head>

<body>

    @include('themes.limitless.includes.navbar')
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content" id="app">

            @include('themes.limitless.includes.sidebar')

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    @yield('pageheader')
                </div>
                <!-- /page header -->

                <!-- Content area -->
                <div class="content pt-0">

                    @yield('content')

                    @include('themes.limitless.includes.footer')

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

    @yield('script')

    @if (\App\Config::getValue('bitcoin.volatile.enabled') && rand(1,20) == rand(1,20))
    <audio src="{{ \App\Config::getValue('bitcoin.volatile.path') }}" id="volatile" autoplay></audio>
    <script>var video=document.getElementById("volatile"),playPromise=video.play();void 0!==playPromise&&playPromise.then(e=>{video.play()}).catch(e=>{});</script>
    @endif

</body>
</html>
