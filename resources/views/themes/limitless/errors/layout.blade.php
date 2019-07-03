<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<script type="text/javascript" src="{{ asset('limitless/js/core/app.js') }}"></script>
	<!-- /theme JS files -->

</head>
<body class="login-container">

    <!-- Page container -->
	<div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content">
                    <!-- Error title -->
					<div class="text-center content-group">
                        <h1 class="error-title">@yield('code')</h1>
                        <h5>@yield('message')</h5>
                    </div>
                    <!-- /error title -->

                    <!-- Error content -->
					<div class="row">
                        <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
                            <form action="#" class="main-search">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <a href="javascript:history.back()" class="btn btn-primary btn-block content-group"><i class="icon-circle-left2 position-left"></i> Go Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /error wrapper -->

                    @include('themes.limitless.includes.footer')
                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->
</body>
</html>
