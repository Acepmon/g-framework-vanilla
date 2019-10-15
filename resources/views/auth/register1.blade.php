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
                            <div class='progress_inner_step step-1 active'>
                                <label for='step-1'>Agreement</label>
                            </div>
                            <div class='progress_inner_step step-2'>
                                <label for='step-2'>Create username & password</label>
                            </div>
                            <div class='progress_inner_step step-3'>
                                <label for='step-3'>Add your information</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-5">

                    <form class="maz-form" id="register-form" method="POST" action="register-step-2">
                        @csrf
                        <div class="form-title"><span>Terms of Condition </span></div>
                        
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" name="termsOfCondition" id="termsOfCondition" class="custom-control-input @error('termsOfCondition') is-invalid @enderror" required>
                            <label class="custom-control-label" for="termsOfCondition">Terms of condition</label>
                            @error('termsOfCondition')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="terms-text">
                            <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam officia commodi mollitia culpa ad explicabo facere. Obcaecati dignissimos nulla, esse labore culpa sint impedit dicta magni maxime velit, doloribus soluta, commodi vitae porro reprehenderit necessitatibus ad corporis! Mollitia maiores incidunt aut quos quod deleniti quaerat eius beatae tempora repellendus dolores sunt, fugit suscipit. Voluptate natus quaerat consequuntur alias iste sed animi nisi, cumque aliquam enim dolorum quas amet ullam rerum dignissimos dicta soluta repellat, non voluptas laborum minus fugit sunt omnis neque! Accusamus odio maiores maxime nemo dolorem neque molestiae aliquid delectus! Beatae accusamus tenetur architecto ipsum quidem error quibusdam.
                            </p>
                        </div>

                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" name="onlineUseTerm" id="onlineUseTerm" class="custom-control-input @error('onlineUseTerm') is-invalid @enderror" required>
                            <label class="custom-control-label" for="onlineUseTerm">Online use terms</label>
                            @error('onlineUseTerm')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="terms-text">
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam officia commodi mollitia culpa ad explicabo facere. Obcaecati dignissimos nulla, esse labore culpa sint impedit dicta magni maxime velit, doloribus soluta, commodi vitae porro reprehenderit necessitatibus ad corporis! Mollitia maiores incidunt aut quos quod deleniti quaerat eius beatae tempora repellendus dolores sunt, fugit suscipit. Voluptate natus quaerat consequuntur alias iste sed animi nisi, cumque aliquam enim dolorum quas amet ullam rerum dignissimos dicta soluta repellat, non voluptas laborum minus fugit sunt omnis neque! Accusamus odio maiores maxime nemo dolorem neque molestiae aliquid delectus! Beatae accusamus tenetur architecto ipsum quidem error quibusdam.
                            </p>
                        </div>

                        <!-- NEXT PREV BUTTON START -->
                        <div style="float:right;">
                            <button class="btn btn-danger btn-round shadow-red px-5 py-2" type="submit" id="nextBtn">Next</button>
                        </div>
                        

                    </form>
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
@endsection

