@extends('themes.limitless.layouts.default')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/picker_date.js')}}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/tags/tagsinput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/tags/tokenfield.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/form_tags_input.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/form_checkboxes_radios.js') }}"></script>
@endsection
@section('load-before')
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/loaders/pace.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/validation/validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/switch.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/form_validation.js') }}"></script>

<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/ui/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/pickers/anytime.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/pickers/daterangepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/pickers/pickadate/picker.js')}}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/pickers/pickadate/picker.time.js')}}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/pickers/pickadate/legacy.js')}}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/media/cropper.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/uploaders/fileinput/plugins/purify.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/uploaders/fileinput/fileinput.min.js') }}"></script>

@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 ml-2"></i> <span class="font-weight-semibold">Create Car</span></h4>
    </div>

    <div class="header-elements">
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 ml-2"></i> Home</a>
            <a class="breadcrumb-item" href="{{ route('admin.cars.index', ['type' => 'car']) }}">Cars</a>
            <span class="breadcrumb-item active">Create</span>
        </div>
    </div>

    <div class="header-elements d-none">
        <div class="breadcrumb justify-content-center">
            <a href="#" class="breadcrumb-elements-item"><i class="icon-comment-discussion mr-2"></i>Link</a>
            <div class="breadcrumb-elements-item dropdown p-0">
                <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon-gear mr-2"></i>Dropdown</a>
                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" 
                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-84px, 40px, 0px);">
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
<div class="row">
    <div class="col-md-12">

        <!-- Horizontal form -->
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.cars.store') }}" enctype="multipart/form-data" method="POST" id="form">
                    @csrf

                    @if(Session::has('error'))
                    <div class="alert alert-danger no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                        {{ session('error') }}
                    </div>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger no-border">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                            {{ $error }}
                        </div>
                        @endforeach
                    @endif

                    <div class="form-group row">
                        <label for="title" class="col-form-label col-lg-2">Title <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input id="title" type="text" class="form-control" name="title" placeholder="Enter car title..." required="required" aria-required="true" invalid="true" onfocusout="create_slug()">
                        </div>
                    </div>
                    <input id="slug" type="hidden" class="form-control" name="slug" placeholder="Enter content slug..." required="required" aria-required="true" invalid="true">

                    <input type="hidden" name="type" value="car"/>

                    <div class="form-group row">
                        <label for="status" class="col-form-label col-lg-2">Status <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <select id="status" name="status" required="required" class="form-control text-capitalize">
                                @foreach(App\Content::STATUS_ARRAY as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="visibility" class="col-form-label col-lg-2">Visibility <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <select id="visibility" name="visibility" required="required" class="form-control text-capitalize">
                                @foreach(App\Content::VISIBILITY_ARRAY as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <input name="author_id" type="text" id="author_id" value="{{ Auth::id() }}" hidden>
                    <hr>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <h4>General information</h4>

                            <div class="form-group row">
                                <label for="manufacturer" class="col-form-label col-lg-2">Manufacturer</label>
                                <div class="col-lg-10">
                                    <select id="manufacturer" name="manufacturer" class="form-control text-capitalize">
                                        @foreach(App\TermTaxonomy::where('taxonomy', 'manufacturer')->get() as $value)
                                            <option value="{{ $value->term->name }}">{{ $value->term->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="modelName" class="col-form-label col-lg-2">Model</label>
                                <div class="col-lg-10">
                                    <select id="modelName" name="modelName" class="select text-capitalize">
                                        @foreach(App\TermTaxonomy::where('taxonomy', 'model')->get() as $value)
                                            <option value="{{ $value->term->name }}">{{ $value->term->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="displacement" class="col-form-label col-lg-2">Displacement</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input id="displacement" type="number" class="form-control" name="displacement" placeholder="Enter displacement volume..." invalid="true">
                                        <span class="input-group-append">
                                            <span class="input-group-text">cc</span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="buildYear" class="col-form-label col-lg-2">Build Year</label>
                                <div class="col-lg-10">
                                    <input id="buildYear" type="number" min="1769" max="2019" value="2019" class="form-control" name="buildYear" placeholder="Enter year of product..." invalid="true">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="importDate" class="col-form-label col-lg-2">Import Date</label>
                                <div class="col-lg-10">
                                    <input id="importDate" type="number" min="1769" max="2019" value="2019" class="form-control" name="importDate" placeholder="Enter year of entry..." invalid="true">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="colorName" class="col-form-label col-lg-2">Color</label>
                                <div class="col-lg-10">
                                    <select id="colorName" name="colorName" class="select text-capitalize">
                                        @foreach(App\TermTaxonomy::where('taxonomy', 'color')->get() as $value)
                                            <option value="{{ $value->term->name }}">{{ $value->term->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="vin" class="col-form-label col-lg-2">VIN</label>
                                <div class="col-lg-10">
                                    <input id="vin" type="text" class="form-control" name="vin" placeholder="Enter car vin..." invalid="true">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <h4>More information</h4>

                            <div class="form-group row">
                                <label for="mileage" class="col-form-label col-lg-2">Mileage</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input id="mileage" type="number" class="form-control" name="mileage" placeholder="Enter mileage..." invalid="true" class="touchspin-postfix">
                                        <span class="input-group-append">
                                            <span class="input-group-text">km</span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="wheelPosition" class="col-form-label col-lg-2">Steering wheel</label>
                                <div class="col-lg-10">
                                    <select id="wheelPosition" name="wheelPosition" class="form-control text-capitalize">
                                        @foreach(App\TermTaxonomy::where('taxonomy', 'steering-wheel')->get() as $value)
                                            <option value="{{ $value->term->name }}">{{ $value->term->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fuel" class="col-form-label col-lg-2">Type of fuel</label>
                                <div class="col-lg-10">
                                    <select id="fuel" name="fuel" class="form-control text-capitalize">
                                        @foreach(App\TermTaxonomy::where('taxonomy', 'Fuel')->get() as $value)
                                            <option value="{{ $value->term->name }}">{{ $value->term->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="transmission" class="col-form-label col-lg-2">Transmission</label>
                                <div class="col-lg-10">
                                    <select id="transmission" name="transmission" class="form-control text-capitalize">
                                        @foreach(App\TermTaxonomy::where('taxonomy', 'transmission')->get() as $value)
                                            <option value="{{ $value->term->name }}">{{ $value->term->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="manCount" class="col-form-label col-lg-2">Seating</label>
                                <div class="col-lg-10">
                                    <select id="manCount" name="manCount" class="form-control text-capitalize">
                                        @foreach(App\TermTaxonomy::where('taxonomy', 'seating')->get() as $value)
                                            <option value="{{ $value->term->name }}">{{ $value->term->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="wheelDrive" class="col-form-label col-lg-2">Wheel drive</label>
                                <div class="col-lg-10">
                                    <select id="wheelDrive" name="wheelDrive" class="form-control text-capitalize">
                                        @foreach(App\TermTaxonomy::where('taxonomy', 'wheel-drive')->get() as $value)
                                            <option value="{{ $value->term->name }}">{{ $value->term->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="advantages" class="col-form-label col-lg-2">Advantages</label>
                                <div class="col-lg-10">
                                    <input type="text" name="advantages" id="advantages" class="form-control tokenfield" value="" placeholder="Press Enter">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sellerDescription" class="col-form-label col-lg-2">Seller description</label>
                                <div class="col-lg-10">
                                    <textarea id="sellerDescription" type="text" class="form-control" name="sellerDescription" placeholder="Enter seller description..." invalid="true"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <h4>Media</h4>

                            <div class="form-group row">
                                <label for="price" class="col-form-label col-lg-2">Price</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input id="price" type="number" min="0" value="0" class="form-control" name="price" placeholder="Enter price..." invalid="true" class="touchspin-postfix">
                                        <span class="input-group-append">
                                            <span class="input-group-text">₮</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="priceType" class="col-form-label col-lg-2">Price Type</label>
                                <div class="col-lg-10">
                                    <select id="priceType" name="priceType" class="form-control text-capitalize">
                                        @foreach(App\TermTaxonomy::where('taxonomy', 'price-type')->get() as $value)
                                            <option value="{{ $value->term->name }}">{{ $value->term->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                    
                            <div class="form-group row">
                                <label for="link" class="col-form-label col-lg-2">YouTube Link</label>
                                <div class="col-lg-10">
                                    <input id="link" type="text" class="form-control file-styled" name="youtubeLink" onchange="embedLink(this)">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div id="video-container"></div>
                            </div>

                            <div class="form-group row">
                                <label for="thumbnail" class="col-form-label col-lg-2">Thumbnail</label>
                                <div class="col-lg-10">
                                    <div class="uniform-uploader">
                                        <input id="thumbnail" type="file" name="thumbnail" class="form-control-uniform" invalid="true" onchange="previewMedia(this, 'thumbnail-container')" data-fouc="">
                                        <span class="filename" style="user-select: none;">No file selected</span>
                                        <span class="action btn btn-light" style="user-select: none;">Choose File</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10" id="thumbnail-container"></div>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <h4>Auction Section</h4>

                            <div class="form-group row">
                                <label for="buyout" class="col-form-label col-lg-2">Buyout</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input id="buyout" type="number" min="0" class="form-control" name="buyout" placeholder="Enter buyout..." invalid="true" class="touchspin-postfix">
                                        <span class="input-group-append">
                                            <span class="input-group-text">₮</span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="startPrice" class="col-form-label col-lg-2">Bid Starting Price</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input id="startPrice" type="number" min="0" class="form-control" name="startPrice" placeholder="Enter start price..." invalid="true" class="touchspin-postfix">
                                        <span class="input-group-append">
                                            <span class="input-group-text">₮</span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="maxBid" class="col-form-label col-lg-2">Max Bid</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input id="maxBid" type="number" min="0" class="form-control" name="maxBid" placeholder="Enter max bid..." invalid="true" class="touchspin-postfix">
                                        <span class="input-group-append">
                                            <span class="input-group-text">₮</span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="startsAt" class="col-form-label col-lg-2">Starts At</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <span class="input-group-prepend">	
                                            <button class="btn btn-light btn-icon" type="button" id="startsAtBut"><i class="icon-calendar3"></i></button>
                                        </span>
                                        <input type="text" class="form-control" id="startsAt" name="startsAt" placeholder="Start date">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="endsAt" class="col-form-label col-lg-2">Ends At</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <span class="input-group-prepend">	
                                            <button class="btn btn-light btn-icon" type="button" id="endsAtBut"><i class="icon-calendar3"></i></button>
                                        </span>
                                        <input type="text" class="form-control" id="endsAt" name="endsAt" placeholder="End date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="medias" class="col-form-label col-lg-2">Images</label>
                                <div class="col-lg-10">
                                    <div class="uniform-uploader">
                                        <input id="media" type="file" name="medias[]" class="form-control-uniform" invalid="true" onchange="previewMedia(this, 'image-container')" multiple data-fouc="">
                                        <span class="filename" style="user-select: none;">No file selected</span>
                                        <span class="action btn btn-light" style="user-select: none;">Choose File</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-10" id="image-container"></div>
                    </div>
                    <input type="file" class="file-input-ajax" multiple="multiple">

                    <div class="row">
                        <div class="col-lg-6">
                            <h4>Car Option</h4>
                            <div class="form-group row">
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
                                                    <input type="checkbox" id="sedan" name="options" class="custom-control-input">
                                                    <label class="custom-control-label  d-flex justify-content-between" for="sedan">{{ $taxonomy->term->name }}</label>
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
                                                    <input type="checkbox" id="sedan" name="options" class="custom-control-input">
                                                    <label class="custom-control-label  d-flex justify-content-between" for="sedan">{{ $taxonomy->term->name }}</label>
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
                                                    <input type="checkbox" id="sedan" name="options" class="custom-control-input">
                                                    <label class="custom-control-label  d-flex justify-content-between" for="sedan">{{ $taxonomy->term->name }}</label>
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
                                                    <input type="checkbox" id="sedan" name="options" class="custom-control-input">
                                                    <label class="custom-control-label  d-flex justify-content-between" for="sedan">{{ $taxonomy->term->name }}</label>
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
                                                    <input type="checkbox" id="sedan" name="options" class="custom-control-input">
                                                    <label class="custom-control-label  d-flex justify-content-between" for="sedan">{{ $taxonomy->term->name }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="best-premium" name="premium" class="custom-control-input">
                                <label class="custom-control-label h4 d-flex justify-content-between" for="best-premium">Best Premium</label>
                            </div>
                            <select id="best-premium-choice" name="best-premium-choice" class="form-control select text-capitalize">
                                <option value="1-day">1 Day, 25,000</option>
                            </select>
                            <p class="text-muted">5 дахин хурдан худалдана.</p>
                            <p class="text-muted">Нүүр хуудасны хамгийн эхэнд харагдана.</p>
                            <p class="text-muted">Бүх энгийн зарын дээр.</p>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="premium" name="premium" class="custom-control-input">
                                <label class="custom-control-label h4 d-flex justify-content-between" for="premium">Premium</label>
                            </div>
                            <select id="premium-choice" name="premium-choice" class="form-control select text-capitalize">
                                <option value="1-day">1 Day, 25,000</option>
                            </select>
                            <p class="text-muted">5 дахин хурдан худалдана.</p>
                            <p class="text-muted">Нүүр хуудасны хамгийн эхэнд харагдана.</p>
                            <p class="text-muted">Бүх энгийн зарын дээр.</p>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="free" name="premium" class="custom-control-input">
                                <label class="custom-control-label h4 d-flex justify-content-between" for="free">Free</label>
                            </div>
                            <p class="text-muted">5 дахин хурдан худалдана.</p>
                            <p class="text-muted">Нүүр хуудасны хамгийн эхэнд харагдана.</p>
                            <p class="text-muted">Бүх энгийн зарын дээр.</p>

                        </div>
                        <div class="col-lg-6">
                        </div>
                    </div>

                    <div class="text-right">
                        <a href="javascript:history.back()" class="btn btn-light">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /horizotal form -->

    </div>
</div>
<!-- /grid -->

<div class="modal fade docs-cropped" id="getCroppedCanvasModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title" id="getCroppedCanvasTitle">Crop your image</h6>
            </div>
            <div class="modal-body" id="cropBody">
                <div class="img-cropper-container" class="col-lg-12">
                    <img id="cropImage" class="croppable">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="cropImage()">Done</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        var theme_layouts = [{
            "text": "default",
            "theme_id": "0",
            "value": "layouts.app"
        }];
        @foreach ($themes as $theme)
            @if(File::exists(resource_path('views/themes/'.$theme->package.'/layouts')))
            @foreach(File::files(resource_path('views/themes/'.$theme->package.'/layouts')) as $path)
                theme_layouts.push({
                    "text": "{{ str_replace('.blade.php', '', $path->getFilename()) }}",
                    "theme_id": "{{ $theme->id }}",
                    "value": "{{ 'themes.' . $theme->package . '.layouts.' . str_replace('.blade.php', '', $path->getFilename()) }}"
                });
            @endforeach
            @endif
        @endforeach
        
        $("#theme").change(function() {
            $("#layout").children().remove();
            var selected_value = $(this).val();
            $.each(theme_layouts, function(index, option) {
                if (selected_value === option.theme_id) {
                    $("#layout").append(new Option(option.text, option.value));
                }
            });
        });
        $("#theme").prop('selectedIndex', 0).trigger('change');

        $(".file-input-ajax").fileinput({
            uploadUrl: "http://localhost", // server upload action
            uploadAsync: true,
            maxFileCount: 5,
            initialPreview: [],
            fileActionSettings: {
                removeIcon: '<i class="icon-bin"></i>',
                removeClass: 'btn btn-link btn-xs btn-icon',
                uploadIcon: '<i class="icon-upload"></i>',
                uploadClass: 'btn btn-link btn-xs btn-icon',
                zoomIcon: '<i class="icon-zoomin3"></i>',
                zoomClass: 'btn btn-link btn-xs btn-icon',
                indicatorNew: '<i class="icon-file-plus text-slate"></i>',
                indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
                indicatorError: '<i class="icon-cross2 text-danger"></i>',
                indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>',
            },
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },
            initialCaption: "No file selected",
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons
        });
    });

    function cropImage() {
        var cropData = [];
        var container;
        $("#cropBody img").each(function() {
            var image = $(this);

            container = image.attr('alt');
            var cropped = image.cropper('getCroppedCanvas', {});

            if (cropped) {
                if (container == 'thumbnail-container') {
                    $("#" + container).empty();
                    $("#thumbnailCrop").val(JSON.stringify(image.cropper('getData')));
                } else {
                    cropData.push(image.cropper('getData'));
                }
                $("#" + container).append(' \
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-10"> \
                        <img src="'+cropped.toDataURL('image/jpeg')+'" class="col-lg-12"> \
                    </div>');
                    
                    image.attr('src', '');
                }
        });
        if (container != 'thumbnail-container') {
            $("#imagesCrop").val(JSON.stringify(cropData));
        }
    }

    function previewMedia(input, container) {
        $("#cropBody").empty();
        $(input.files).each(function(index, value) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#cropBody").append(' \
                    <div class="image-cropper-container" class="col-lg-12""> \
                        <img src="'+e.target.result+'" id="cropImage'+index+'" class="col-lg-12">\
                    </div>');

                $("#cropImage"+index).attr('src', e.target.result);
                $("#cropImage"+index).attr('alt', container);
                $('#cropImage'+index).cropper({
                    dragMode: 'move',
                    aspectRatio: 16 / 9,
                    autoCropArea: 0.8,
                    restore: false,
                    guides: false,
                    center: true,
                    highlight: false,
                    cropBoxMovable: false,
                    cropBoxResizable: false,
                    toggleDragModeOnDblclick: false,
                });

                $("#getCroppedCanvasModal").modal('show');
            };
            reader.readAsDataURL(value);
        });
    }

    function embedLink(input) {
        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        var match = input.value.match(regExp);

        if (match && match[2].length == 11) {
            $("#video-container").empty().append(' \
            <iframe width="560" height="315" src="//www.youtube.com/embed/' + match[2]
            +'" frameborder="0" allowfullscreen></iframe>');
        }
    }
    
    function create_slug() {
        var title = document.getElementById("title").value;
        title = title.toString().toLowerCase()
            .replace(/\s+/g, '-')
            .replace(/[\s\W-]+/g, '-')
            .replace(/\-\-+/g, '-')
            .replace(/^-+/, '')
            .replace(/-+$/, '');
        document.getElementById("slug").value = title;

    }

    function carConditionChanged(value) {
        if (value == 'Used') {
            $("#plateNumber").css('visibility', 'visible');
        } else {
            $("#plateNumber").css('visibility', 'hidden');
        }
    }

    $("#modelName").select2({
        tags: true,
        //maximumSelectionLength: 1
    });

    $('#endsAtBut').click(function (e) {
        $('#endsAt').AnyTime_noPicker().AnyTime_picker().focus();
        e.preventDefault();
    });

    $('#startsAtBut').click(function (e) {
        $('#startsAt').AnyTime_noPicker().AnyTime_picker().focus();
        e.preventDefault();
    });

    $("#type").change(function () {
        if ($(this).val() == 'page') {
            $("#theme_options").css('display', 'block');
        } else {
            $("#theme_options").css('display', 'none');
        }
    });

</script>
@endsection
