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
	<link href="{{ admin_asset('css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ admin_asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ admin_asset('css/core.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ admin_asset('css/components.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ admin_asset('css/colors.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{ admin_asset('js/plugins/loaders/pace.min.js') }}"></script>
	<script type="text/javascript" src="{{ admin_asset('js/core/libraries/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ admin_asset('js/core/libraries/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ admin_asset('js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ admin_asset('js/plugins/forms/styling/uniform.min.js') }}"></script>

	<script type="text/javascript" src="{{ admin_asset('js/core/app.js') }}"></script>
	<script type="text/javascript" src="{{ admin_asset('js/pages/login.js') }}"></script>
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

</body>
</html>
