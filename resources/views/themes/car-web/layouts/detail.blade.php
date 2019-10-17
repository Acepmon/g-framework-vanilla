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

        @yield('load')

        @stack('styles')
    </head>

    <body class="detail-page">

        <!-- Header -->
        @include('themes.car-web.includes.header')

        <div class="bg-page-header"></div>

        <!-- Sticky Sidebar -->
        @include('themes.car-web.includes.fixed-right-sidebar', ['sideBanners' => \App\Banner::where('location_id', 4)->get(), 'premium' => \App\Content::where('type', \App\Content::TYPE_CAR)->limit(5)->get()])

        @include('themes.car-web.includes.section-title', ['content', $content])

        <!-- Detail page Grid -->
        <section class="detail-items bg-white">
            <div class="container">

                <div class="row">
                    <div class="col-md-8">
                        @include('themes.car-web.includes.detail-slide-gallery', ['content', $content])
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                @include('themes.car-web.includes.detail-seller', ['user' => $content->author])
                            </div>
                            <div class="col-md-12 mb-2">
                                @include('themes.car-web.includes.detail-car-stats', ['content' => $content])
                            </div>
                            <div class="col-md-12 px-5">
                                <a class="btn btn-danger btn-round btn-block my-4 shadow-red p-3" href="#section-finance">Зээлийн боломжийг шалгах</a>

                                @include('themes.car-web.includes.save-to-interested-btn', ['content' => $content])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Basic information -->
        @include('themes.car-web.includes.section-basic-info', ['content' => $content])

        <!-- Finance section -->
        @include('themes.car-web.includes.section-finance', ['content' => $content])

        <!-- Option information -->
        @include('themes.car-web.includes.section-options', ['content' => $content])

        <!-- Seller Description -->
        @include('themes.car-web.includes.section-seller-description', ['content' => $content])

        <!-- Retail Store -->
        @include('themes.car-web.includes.section-retail', ['content' => $content])

        <!-- Hot deals -->
        @include('themes.car-web.includes.section-slider', ['title' => 'Hot Deals', 'contents' => \App\Content::getByMetas('publishType', 'premium')->where('status', \App\Content::STATUS_PUBLISHED)->get(), 'morelink'=> url('/search?best_premium=true&premium=true')])

        <!-- Similar Price -->
        @include('themes.car-web.includes.section-slider', ['title' => 'Similar Price', 'contents' => \App\Content::inRangeMetas('priceAmount', intval($content->metaValue('priceAmount')) - 1000000, $content->metaValue('priceAmount') + 1000000)->where('status', \App\Content::STATUS_PUBLISHED)->get(), 'morelink'=> url('/search?priceAmount[ge]='.$content->metaValue('priceAmount') - 1000000.'&priceAmount[le]='.$content->metaValue('priceAmount') + 1000000)])

         <!-- Footer -->
        @include('themes.car-web.includes.footer')

        @stack('modals')

        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('car-web/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('car-web/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('car-web/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('car-web/vendor/owl.carousel.thumbs/owl.carousel2.thumbs.min.js') }}"></script>
        <script src="{{ asset('car-web/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('car-web/vendor/lottie-web/player/lottie.min.js') }}"></script>
        <script src="{{ asset('car-web/js/script.min.js') }}"></script>
        @yield('script')

        @stack('scripts')
    </body>

</html>
