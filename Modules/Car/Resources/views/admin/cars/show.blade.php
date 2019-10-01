@extends('themes.limitless.layouts.default')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/sidebar_components.js') }}"></script>
<link href="{{ asset('limitless/bootstrap4/vendor/owl.carousel/assets/owl.theme.default.css') }}" rel="stylesheet">
<link href="{{ asset('limitless/bootstrap4/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 ml-2"></i> <span class="font-weight-semibold">{{ ucfirst($content->type) }} Detail</span></h4>
    </div>

    <div class="header-elements">
    </div>
</div>
<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 ml-2`"></i> Home</a>
            <a class="breadcrumb-item" href="{{ route('admin.cars.index') }}">{{ ucfirst($content->type) }}s</a>
            <span class="breadcrumb-item active">Detail</span>
        </div>
    </div>

    <div class="header-elements d-none">
        <div class="breadcrumb justify-content-center">
            <a href="#" class="breadcrumb-elements-item"><i class="icon-comment-discussion mr-2"></i>Link</a>
            <div class="breadcrumb-elements-item dropdown p-0">
                <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon-gear mr-2"></i>Dropdown</a>
                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-84px, 40px, 0px);">
                    <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
                    <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                    <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')

<!-- Grid -->


<div class="d-md-flex align-items-md-start">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if(Session::has('error'))
                <div class="alert alert-danger no-border">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                    {{ session('error') }}
                </div>
                @endif

                <div class="card" id="detail">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <div class="container row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <h4>{{ $content->title }}</h4>
                                <hr>
                                <div class="owl-carousel owl-theme" data-slider-id="1">
                                    @foreach ($content->metaArray('medias') as $media)
                                    <div class="vi-slider-item item">
                                        <img src="{{ $media }}" alt="">
                                    </div>
                                    @endforeach
                                </div>
                                <div class="owl-thumbs" data-slider-id="1"></div>
                            </div>
                            <div class="col-lg-2">
                                <div class="text-right">
                                    <a href="javascript:history.back()" class="btn btn-light">Back</a>
                                    <a href="{{ route('admin.cars.edit', ['id' => $content->id]) }}" class="btn btn-primary">Edit</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <h4 class="text-center info-header">/General Information/</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped" style="border: 1px solid #ddd">
                                        <tbody>
                                            <tr>
                                                <td>Manufacturer</td>
                                                <td class="text-right font-weight-bold">{{ $content->metaValue('markName') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Model</td>
                                                <td class="text-right font-weight-bold">{{ $content->metaValue('modelName') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Displacement</td>
                                                <td class="text-right font-weight-bold">{{ $content->metaValue('capacityAmount') . ' ' . $content->metaValue('capacityUnit') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Car Condition</td>
                                                <td class="text-right font-weight-bold">{{ ucfirst($content->metaValue('carCondition')) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Color</td>
                                                <td class="text-right font-weight-bold">{{ ucfirst($content->metaValue('colorName')) }}</td>
                                            </tr>
                                            <tr>
                                                <td>VIN</td>
                                                <td class="text-right font-weight-bold">{{ $content->metaValue('certificateNumber') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Build Year</td>
                                                <td class="text-right font-weight-bold">{{ $content->metaValue('buildYear') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Import Year</td>
                                                <td class="text-right font-weight-bold">{{ $content->metaValue('importDate') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <h4 class="text-center info-header">/More Information/</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped" style="border: 1px solid #ddd">
                                        <tbody>
                                            <tr>
                                                <td>Mileage</td>
                                                <td class="text-right font-weight-bold">{{ $content->metaValue('markName') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Steering Wheel</td>
                                                <td class="text-right font-weight-bold">{{ ucfirst($content->metaValue('wheelPosition')) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Fuel Type</td>
                                                <td class="text-right font-weight-bold">{{ ucfirst($content->metaValue('fuelType')) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Transmission</td>
                                                <td class="text-right font-weight-bold">{{ ucfirst($content->metaValue('transmission')) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Passenger</td>
                                                <td class="text-right font-weight-bold">{{ $content->metaValue('manCount') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Wheel Drive</td>
                                                <td class="text-right font-weight-bold">{{ $content->metaValue('axleCount') }}WD</td>
                                            </tr>
                                            <tr>
                                                <td class="align-top">Advantages</td>
                                                <td class="text-left">
                                                    <ul class="mb-0 pl-0" style="list-style-type: none">
                                                        @foreach($content->metas->where('key', 'advantages') as $advantage)
                                                        <li>{{ $advantage->value }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-top"">Seller Description</td>
                                                <td class=" text-justify">{{ $content->metaValue('sellerDescription') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <h4 class="text-center info-header">/Media/</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped" style="border: 1px solid #ddd">
                                        <tbody>
                                            <tr>
                                                <td>Price</td>
                                                <td class="text-right font-weight-bold">{{ $content->metaValue('priceAmount') . $content->metaValue('priceUnit')  }}</td>
                                            </tr>
                                            <tr>
                                                <td>Price Type</td>
                                                <td class="text-right font-weight-bold">{{ ucfirst($content->metaValue('priceType')) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Thumbnail</td>
                                                <td class="text-right font-weight-bold"><a href="{{ $content->metaValue('thumbnail') }}">{{ $content->metaValue('thumbnail') }}</a></td>
                                            </tr>
                                            <tr>
                                                <td>YouTube Link</td>
                                                <td class="text-right font-weight-bold"><a href="{{ $content->metaValue('link') }}">{{ $content->metaValue('link') }}</a></td>
                                            </tr>
                                            <tr>
                                                <td class="align-top">Images</td>
                                                <td class="text-left font-weight-bold">
                                                    <ul class="mb-0 pl-0" style="list-style-type: none">
                                                        @foreach($content->metas->where('key', 'medias') as $media)
                                                        <li><a href="{{ $media->value }}">{{ $media->value }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <h4 class="text-center info-header">/Auction Section/</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped" style="border: 1px solid #ddd">
                                        <tbody>
                                            <tr>
                                                <td>Buyout</td>
                                                <td class="text-right font-weight-bold">{{ $content->metaValue('buyoutAmount') . $content->metaValue('buyoutUnit') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Start Price</td>
                                                <td class="text-right font-weight-bold">{{ $content->metaValue('startPriceAmount') . $content->metaValue('startPriceUnit') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Max Bid</td>
                                                <td class="text-right font-weight-bold">{{ $content->metaValue('maxBidAmount') . $content->metaValue('maxBidUnit') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Starts At</td>
                                                <td class="text-right font-weight-bold">{{ $content->metaValue('startsAt') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Ends At</td>
                                                <td class="text-right font-weight-bold">{{ $content->metaValue('endsAt') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <h4 class="text-center info-header">/Additional Section/</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped" style="border: 1px solid #ddd">
                                        <tbody>
                                            <tr>
                                                <td>Cabin Number</td>
                                                <td class="text-right font-weight-bold">{{ $content->metaValue('cabinNumber') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Country Name</td>
                                                <td class="text-right font-weight-bold">{{ ucfirst($content->metaValue('countryName')) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <h3 class="card-title">Seller Description</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-12">
                                @include('themes.limitless.includes.user-media', ['user' => $content->author])
                                <label class="col-form-label">{{$content->metaValue('sellerDescription')}}&nbsp;</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Car Option</h4>
                                <div class="accordion" id="accordionExample" style="width: 100%">
                                    <div class="card">
                                        <div class="accordian-head" id="guts-accordian">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#guts" aria-expanded="false" aria-controls="guts">
                                                    Guts <i class="fab fa fa-angle-down"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="guts" class="collapse" aria-labelledby="guts-accordian" data-parent="#accordionExample">
                                            <div class="card-body bg-light">
                                                @foreach(App\TermTaxonomy::where('taxonomy', 'Guts')->get() as $taxonomy)
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="options" class="custom-control-input" {{ $content->metaValue($taxonomy->term->name)?'checked':'' }}>
                                                    <label class="custom-control-label  d-flex justify-content-between">{{ $taxonomy->term->name }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="accordian-head" id="safety-accordian">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#safety" aria-expanded="false" aria-controls="safety">
                                                    Safety <i class="fab fa fa-angle-down"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="safety" class="collapse" aria-labelledby="safety-accordian" data-parent="#accordionExample">
                                            <div class="card-body bg-light">
                                                @foreach(App\TermTaxonomy::where('taxonomy', 'Safety')->get() as $taxonomy)
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="options" class="custom-control-input">
                                                    <label class="custom-control-label  d-flex justify-content-between">{{ $taxonomy->term->name }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="accordian-head" id="exterior-accordian">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#exterior" aria-expanded="false" aria-controls="exterior">
                                                    Exterior <i class="fab fa fa-angle-down"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="exterior" class="collapse" aria-labelledby="exterior-accordian" data-parent="#accordionExample">
                                            <div class="card-body bg-light">
                                                @foreach(App\TermTaxonomy::where('taxonomy', 'Exterior')->get() as $taxonomy)
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="options" class="custom-control-input">
                                                    <label class="custom-control-label  d-flex justify-content-between">{{ $taxonomy->term->name }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="accordian-head" id="convenience-accordian">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#convenience" aria-expanded="false" aria-controls="convenience">
                                                    Convenience <i class="fab fa fa-angle-down"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="convenience" class="collapse" aria-labelledby="convenience-accordian" data-parent="#accordionExample">
                                            <div class="card-body bg-light">
                                                @foreach(App\TermTaxonomy::where('taxonomy', 'Convenience')->get() as $taxonomy)
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="options" class="custom-control-input">
                                                    <label class="custom-control-label  d-flex justify-content-between">{{ $taxonomy->term->name }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="accordian-head" id="clean-accordian">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#clean" aria-expanded="false" aria-controls="clean">
                                                    Clean <i class="fab fa fa-angle-down"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="clean" class="collapse" aria-labelledby="clean-accordian" data-parent="#accordionExample">
                                            <div class="card-body bg-light">
                                                @foreach(App\TermTaxonomy::where('taxonomy', 'Clean')->get() as $taxonomy)
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="options" class="custom-control-input">
                                                    <label class="custom-control-label  d-flex justify-content-between">{{ $taxonomy->term->name }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar sidebar-light sidebar-component sidebar-component-left sidebar-expand-md">
        <div class="sidebar-content">

            <div class="card-header bg-transparent header-elements-inline">
                <span class="text-uppercase font-size-sm font-weight-semibold">Sidebar</span>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item">
                            <i class="icon-menu7 pull-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                @include('themes.limitless.includes.user-media', ['user' => $content->author])
                <br>
                <p class="font-weight-bold">Status: {{ ucfirst($content->status) }}</p>
                <p class="font-weight-bold">Visiblity: {{ ucfirst($content->visibility) }}</p>
            </div>

            <div class="card card-sidebar-mobile">
                <ul class="nav nav-sidebar" data-nav-type="accordion">
                    <li class="nav-item-header"><i class="icon-history pull-right"></i> Revision history</li>
                    @foreach($content->metas->whereIn('key', ['initial', 'revision', 'revert'])->sortByDesc('id') as $key=>$revision)
                    <li class="nav-item"><a class="nav-link" href="#v_{{ $revision->id }}">{{ $key+1 }}. {{ ucfirst($revision->key) }}
                            <span class="text-muted font-weight-normal ml-auto">{{ date('Y-m-d', json_decode($revision->value)->datetime) }}</span>
                        </a></li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>
<!-- /grid -->


@endsection

@section('script')
<style>
.info-header {
    border-bottom: 2px solid #FF3939;
}

.owl-thumbs {
  white-space: nowrap;
  overflow: auto;
}

.owl-thumbs {
  display: flex;
  flex-wrap: wrap;
  justify-content: left;
}

.owl-thumbs .owl-thumb-item {
  opacity: .3;
}

.owl-thumbs .owl-thumb-item.active {
  opacity: 1;
}

.owl-thumbs button {
  text-align: left;
  background: transparent;
  border: 0;
  border-left: 1px solid #fff;
  margin: 0;
  padding: 0;
  width: calc(100% / 8);
  height: 60px;
  position: relative;
  overflow: hidden;
  display: flex;
  flex-wrap: wrap;
  justify-content: left;
}

.owl-thumbs img {
  min-width: 100%;
  width: auto;
  height: 100%;
  min-height: 100%;
}
</style>
<script src="{{ asset('limitless/bootstrap4/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('limitless/bootstrap4/vendor/owl.carousel.thumbs/owl.carousel2.thumbs.min.js') }}"></script>
<script>
    $(".owl-carousel").owlCarousel({
            autoplay: false,
            autoplayHoverPause: true,
            dots: false,
            nav: true,
            thumbs: true,
            thumbImage: true,
            thumbsPrerendered: true,
            thumbContainerClass: 'owl-thumbs',
            thumbItemClass: 'owl-thumb-item',
            loop: true,
            items: 1,
            responsive: {
                0: {
                items: 1,
                },
                768: {
                items: 1,
                },
                992: {
                items: 1,
                }
            }
        });

    window.delete_meta = function(id, contentId) {
        $("#delete_form").attr('action', '/admin/contents/' + contentId + '/metas/' + id);
    }
</script>
@endsection