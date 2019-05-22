@extends('layouts.login')
@section('content')


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

            <!-- Content area -->
            <div class="content">

                <!-- Form horizontal -->
                <div class="panel panel-flat">

                    <div class="panel-body">

                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            @csrf
                            <fieldset class="content-group">
                                <legend class="text-bold">Register</legend>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Username</label>
                                    <div class="col-lg-10">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">E-mail</label>
                                    <div class="col-lg-10">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Password</label>
                                    <div class="col-lg-10">
                                        <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Repeat Password</label>
                                    <div class="col-lg-10">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" autofocus>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /form horizontal -->


                <!-- Footer -->
                <div class="footer text-muted">
                    &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->
@endsection
