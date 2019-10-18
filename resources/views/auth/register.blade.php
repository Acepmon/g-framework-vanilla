@extends('themes.car-web.layouts.default')

@section('title', 'Register')

@section('load')
@endsection

@section('content')
<div class="bg-page-header"></div>

<section class="bg-transparent">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card sell-car shadow-soft-blue">
                    <div class="card-header">
                        <div class="step-process sp-3">
                            <div class='progress_inner_step active'>
                                <a class="nav-link" for='step-1' data-toggle="tab" href="#step-1" id="tab-step-1" role="tab">Agreement</a>
                            </div>
                            <div class='progress_inner_step'>
                                <a class="nav-link" for='step-2' data-toggle="tab" href="#step-2" id="tab-step-2" role="tab">Username & Password</a>
                            </div>
                            <div class='progress_inner_step'>
                                <a class="nav-link" for='step-3' data-toggle="tab" href="#step-3" id="tab-step-3" role="tab">More Information</a>
                            </div>
                        </div>
                    </div>
                    <form class="maz-form" id="register-form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body pb-5 tab-content" id="steps">
                            <div id="step-1" class="tab-pane active show">

                                <div class="form-title"><span>Terms of Condition</span></div>

                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                    <input type="checkbox" name="termsOfCondition" id="termsOfCondition" class="custom-control-input" required>
                                    <label class="custom-control-label" for="termsOfCondition">Terms of condition</label>
                                </div>

                                <div class="terms-text">
                                    <p>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam officia commodi mollitia culpa ad explicabo facere. Obcaecati dignissimos nulla, esse labore culpa sint impedit dicta magni maxime velit, doloribus soluta, commodi vitae porro reprehenderit necessitatibus ad corporis! Mollitia maiores incidunt aut quos quod deleniti quaerat eius beatae tempora repellendus dolores sunt, fugit suscipit. Voluptate natus quaerat consequuntur alias iste sed animi nisi, cumque aliquam enim dolorum quas amet ullam rerum dignissimos dicta soluta repellat, non voluptas laborum minus fugit sunt omnis neque! Accusamus odio maiores maxime nemo dolorem neque molestiae aliquid delectus! Beatae accusamus tenetur architecto ipsum quidem error quibusdam.
                                    </p>
                                </div>

                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                    <input type="checkbox" name="onlineUseTerm" id="onlineUseTerm" class="custom-control-input" required>
                                    <label class="custom-control-label" for="onlineUseTerm">Online use terms</label>
                                </div>

                                <div class="terms-text">
                                    <p>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam officia commodi mollitia culpa ad explicabo facere. Obcaecati dignissimos nulla, esse labore culpa sint impedit dicta magni maxime velit, doloribus soluta, commodi vitae porro reprehenderit necessitatibus ad corporis! Mollitia maiores incidunt aut quos quod deleniti quaerat eius beatae tempora repellendus dolores sunt, fugit suscipit. Voluptate natus quaerat consequuntur alias iste sed animi nisi, cumque aliquam enim dolorum quas amet ullam rerum dignissimos dicta soluta repellat, non voluptas laborum minus fugit sunt omnis neque! Accusamus odio maiores maxime nemo dolorem neque molestiae aliquid delectus! Beatae accusamus tenetur architecto ipsum quidem error quibusdam.
                                    </p>
                                </div>

                                <!-- NEXT PREV BUTTON START -->
                                <div style="float:right;">
                                    <button id="step1Next" class="btn btn-danger btn-round shadow-red px-5 py-2" type="button" disabled>Next</button>
                                </div>
                            </div>
                            <div id="step-2" class="tab-pane">
                                <input type="text" name="username" id="username" value="" hidden>

                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="text" name="email" id="email" maxlength="191" class="form-control @error('email') is-invalid @enderror" placeholder="example@mail.com" value="{{ old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" name="name" id="name" maxlength="191" class="form-control @error('name') is-invalid @enderror" placeholder="Dorj Pagam" value="{{ old('name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Type your password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm password:</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" id="millage" placeholder="Confirm your password">
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="social-login">
                                            <div class="social-login-title">
                                                Login with Social network
                                            </div>
                                            <a href="{{ route('login.provider', 'facebook') }}" class="btn btn-facebook btn-round btn-block my-2 py-3 shadow-soft-blue btn-icon-left"><i class="icon-social-facebook"></i> Facebook</a>
                                            <a href="{{ route('login.provider', 'google') }}" class="btn btn-light btn-round btn-block my-2 py-3 shadow-soft-blue btn-icon-left"><i class="icon-social-google"></i> Gmail</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- NEXT PREV BUTTON START -->
                                <div style="float:right;">
                                    <button class="btn btn-light btn-round px-5 py-2 mr-3" type="button" id="step2Prev">Previous</button>
                                    <button class="btn btn-danger btn-round shadow-red px-5 py-2" type="button" id="step2Next">Next</button>
                                </div>
                            </div>
                            <div id="step-3" class="tab-pane">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="profile-upload">
                                                <div class="circle">
                                                    <img class="profile-pic" src="">
                                                </div>
                                                <div class="upload-image">
                                                    <div class="btn btn-sm btn-primary upload-button">Upload profile</div>
                                                    <input class="btn btn-primary file-upload" type="file" name="avatar" id="avatar" accept="image/*"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="address" id="meta_address" placeholder="Машины зогсоолын хаяг">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone number</label>
                                            <div class="input-group">
                                                <input type="phone" class="form-control" name="phone" id="meta_phone" placeholder="Утасны дугаар">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- NEXT PREV BUTTON START -->
                                <div style="float:right;">
                                    <button class="btn btn-light btn-round px-5 py-2 mr-3" type="button" id="step3Prev">Previous</a>
                                    <button class="btn btn-danger btn-round shadow-red px-5 py-2" type="submit">Finish</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $(".step-process a").each(function(index) {
            $(this).on('click', function () {
                console.log("ON CLICK!" + index);
                for (var i = index; i>=1; i--) {
                    $('#tab-step-'+i).parent().removeClass('active');
                    $('#tab-step-'+i).parent().addClass('done');
                }
                for (var i = index+1; i<=3; i++) {
                    $('#tab-step-'+i).parent().removeClass('active');
                    $('#tab-step-'+i).parent().removeClass('done');
                }
                $(this).parent().addClass('active');

                $('#steps > .active').removeClass('active').removeClass('show');
                $("#step-"+(index+1)).addClass('active').addClass('show');
            });
        });

        $("#step1Next").click(function () {
            $("#tab-step-2").trigger('click');
        });
        $("#step2Prev").click(function () {
            $("#tab-step-1").trigger('click');
        });
        $("#step2Next").click(function () {
            $("#tab-step-3").trigger('click');
        });
        $("#step3Prev").click(function () {
            $("#tab-step-2").trigger('click');
        });
    });
</script>
<script>
    $(document).ready(function () {
        var termsOfCondition = $("#termsOfCondition");
        var onlineUseTerm = $("#onlineUseTerm");

        var validate = function () {
            if (termsOfCondition.prop('checked') && onlineUseTerm.prop('checked')) {
                $("#step1Next").prop('disabled', false);
            } else {
                $("#step1Next").prop('disabled', true);
            }
        }

        termsOfCondition.change(validate);
        onlineUseTerm.change(validate);
    });
</script>
<script>
    $(document).ready(function () {
        var $emailField = $('#email');
        var $usernameField = $('#username');
        function onChange() {
            $usernameField.val($emailField.val());
        };
        $('#email')
            .change(onChange)
            .keyup(onChange);
    });
</script>
<script>
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function(){
        readURL(this);
    });

    $(".upload-button").on('click', function() {
        $(".file-upload").click();
    });
</script>
@endsection
