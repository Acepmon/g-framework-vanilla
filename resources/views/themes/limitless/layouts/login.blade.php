<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>G-Framework</title>

	<!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<!-- <link href="{{ asset('limitless/bootstrap4/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css"> -->
	<link href="{{ asset('limitless/bootstrap4/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless/bootstrap4/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless/bootstrap4/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<!-- <link href="{{ asset('limitless/bootstrap4/css/core.css') }}" rel="stylesheet" type="text/css"> -->
	<link href="{{ asset('limitless/bootstrap4/css/components.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless/bootstrap4/css/colors.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless/bootstrap4/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/loaders/pace.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/main/jquery.min.js') }}"></script>
	<!-- <script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/extensions/bootstrap.min.js') }}"></script> -->
	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/uniform.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/login.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/app.js') }}"></script>
    <!-- /theme JS files -->

</head>

<body>

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                    @yield('content')

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    @yield('script')

</body>
</html>
