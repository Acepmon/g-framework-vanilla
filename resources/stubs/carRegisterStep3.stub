@extends('themes.car-web.layouts.default')

@section('title', 'Car')

@section('load')

@endsection

@section('content')
<!-- Masthead -->
<div class="bg-page-header"> </div>

<section class="bg-transparent">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card sell-car shadow-soft-blue">
                    <div class="card-header">
                        <div class="step-process sp-3">
                            <div class='progress_inner_step step-1 done'>
                                <label for='step-1'>Agreement</label>
                            </div>
                            <div class='progress_inner_step step-2 done'>
                                <label for='step-2'>Create username & password</label>
                            </div>
                            <div class='progress_inner_step step-3 active'>
                                <label for='step-3'>Add your information</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-5">

                        <form class="maz-form" id="register-form">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="profile-upload">
                                            <div class="circle">
                                                <img class="profile-pic" src="{{ Auth::user()->avatar }}">
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

                        </form>

                        <!-- NEXT PREV BUTTON START -->
                        <div style="float:right;">
                            <a href="{{ url('/register-step-2') }}" class="btn btn-light btn-round px-5 py-2 mr-3" id="prevBtn">Previous</a>
                            <button class="btn btn-danger btn-round shadow-red px-5 py-2" type="button" id="nextBtn" onclick="document.getElementById('register-form').submit()">Finish</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pageType-footer">
    <div class="container">
        <div class="row">
            <div class="sell-type-img reg-car">
                <img src="{{ asset('car-web/img/sell-car.png') }}" alt="">
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
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

