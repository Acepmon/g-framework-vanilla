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
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 ml-2"></i> <span class="font-weight-semibold">Edit {{ ucfirst($content->type) }} Detail</span></h4>
    </div>

    <div class="header-elements">
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 position-left"></i> Home</a>
            <a class="breadcrumb-item" href="{{ route('admin.cars.index') }}">{{ ucfirst($content->type) }}s</a>
            <a class="breadcrumb-item" href="{{ route('admin.cars.show', ['id' => $content->id]) }}">Detail</a>
            <span class="breadcrumb-item active">Edit</span>
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
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-validate-jquery" action="{{ route('admin.cars.update', ['id' => $content->id]) }}" enctype="multipart/form-data" method="POST">
                    @method('PUT')
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
                        <label class="col-form-label col-lg-2">Title <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <input id="title" type="text" class="form-control" name="title" placeholder="Enter content title..." value="{{$content->title}}" required="required" aria-required="true" invalid="true" onfocusout="create_slug()">
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-light" onclick="create_slug()">Create Slug</button>
                        </div>
                    </div>
                    <input id="slug" type="hidden" class="form-control" name="slug" placeholder="Enter content slug..." value="{{$content->slug}}" required="required" aria-required="true" invalid="true">

                    <input type="hidden" name="type" value="car"/>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Status <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <select id="status" name="status" required="required" class="form-control">
                                @foreach(App\Content::STATUS_ARRAY as $value)
                                <option value="{{ $value }}" {{ ($value === $content->status)?'selected':'' }} >{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Visibility <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <select id="visibility" name="visibility" required="required" class="form-control">
                                @foreach(App\Content::VISIBILITY_ARRAY as $value)
                                <option value="{{ $value }}" {{ ($value === $content->visibility)?'selected':'' }} >{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <input name="author_id" type="text" id="author_id" value="{{ Auth::id() }}" hidden>

                    <h4 class="text-center">Car section /General information/</h4>

                    <div class="form-group row">
                        <label for="manufacturer" class="col-form-label col-lg-2">Manufacturer</label>
                        <div class="col-lg-4">
                            <select id="manufacturer" name="manufacturer" class="form-control text-capitalize">
                                @foreach(App\TermTaxonomy::where('taxonomy', 'manufacturer')->get() as $value)
                                    <option value="{{ $value->term->name }}" {{ $value->term->name==$content->metaValue('manufacturer')?'selected':'' }}>{{ $value->term->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="carCondition" class="col-form-label col-lg-2">Car condition</label>
                        <div class="col-lg-4">

                            @foreach(App\TermTaxonomy::where('taxonomy', 'car-condition')->get() as $key=>$value)
                                <label class="radio-inline">
                                    <input type="radio" name="carCondition" class="styled" value="{{$value->term->name}}" onchange="carConditionChanged('{{$value->term->name}}')"
                                    @if($key == 0) 
                                        checked
                                    @endif>
                                    {{ $value->term->name }}
                                </label>
                                @if($value->term->name == 'Used') 
                                <label class="radio-inline">
                                    <input id="plateNumber" type="text" class="form-control" name="plateNumber" placeholder="Enter number plate..." style="visibility: hidden" value="{{$content->metaValue('plateNumber')}}">
                                </label>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="modelName" class="col-form-label col-lg-2">Model</label>
                        <div class="col-lg-4">
                            <select id="modelName" name="modelName" class="select">
                                @foreach(App\TermTaxonomy::where('taxonomy', 'model')->get() as $value)
                                    <option value="{{ $value->term->name }}" {{ $value->term->name==$content->metaValue('model')?'selected':'' }}>{{ $value->term->name }}</option>
                                @endforeach
                                <option value="{{ $content->metaValue('modelName') }}" selected>{{ $content->metaValue('modelName') }}</option>
                            </select>
                        </div>
                        <label for="colorName" class="col-form-label col-lg-2">Color</label>
                        <div class="col-lg-4">
                            <select id="colorName" name="colorName" class="form-control text-capitalize">
                                @foreach(App\TermTaxonomy::where('taxonomy', 'color')->get() as $value)
                                    <option value="{{ $value->term->name }}" {{ $value->term->name==$content->metaValue('color')?'selected':'' }}>{{ $value->term->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="displacement" class="col-form-label col-lg-2">Displacement</label>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input value="{{ $content->metaValue('displacement') }}" id="displacement" type="number" class="form-control" name="displacement" placeholder="Enter displacement length..." invalid="true">
                                <span class="input-group-append">
                                    <span class="input-group-text">cc</span>
                                </span>
                            </div>
                        </div>
                        <label for="vin" class="col-form-label col-lg-2">VIN</label>
                        <div class="col-lg-4">
                            <input value="{{ $content->metaValue('vin') }}" id="vin" type="text" class="form-control" name="vin" placeholder="Enter car vin..." invalid="true">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="buildYear" class="col-form-label col-lg-2">Build Year</label>
                        <div class="col-lg-4">
                            <input id="buildYear" value="{{$content->metaValue('buildYear')}}" type="number" min="1769" max="2019" value="2019" class="form-control" name="buildYear" placeholder="Enter year of product..." invalid="true">
                        </div>
                        <label for="importDate" class="col-form-label col-lg-2">Import Date</label>
                        <div class="col-lg-4">
                            <input id="importDate" value="{{$content->metaValue('importDate')}}" type="number" min="1769" max="2019" value="2019" class="form-control" name="importDate" placeholder="Enter year of entry..." invalid="true">
                        </div>
                    </div>

                    <h4 class="text-center">Car section /More information/</h4>

                    <div class="form-group row">
                        <label for="mileage" class="col-form-label col-lg-2">Mileage</label>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input id="mileage" value="{{$content->metaValue('mileage')}}" type="number" class="form-control" name="mileage" placeholder="Enter mileage..." invalid="true" class="touchspin-postfix">
                                <span class="input-group-append">
                                    <span class="input-group-text">km</span>
                                </span>
                            </div>
                        </div>
                        <label for="transmission" class="col-form-label col-lg-2">Transmission</label>
                        <div class="col-lg-4">
                            <select id="transmission" name="transmission" class="form-control text-capitalize">
                                @foreach(App\TermTaxonomy::where('taxonomy', 'transmission')->get() as $value)
                                    <option value="{{ $value->term->name }}" {{ $value->term->name==$content->metaValue('transmission')?'selected':'' }}>{{ $value->term->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="wheelPosition" class="col-form-label col-lg-2">Steering wheel</label>
                        <div class="col-lg-4">
                            <select id="wheelPosition" name="wheelPosition" class="form-control text-capitalize">
                                @foreach(App\TermTaxonomy::where('taxonomy', 'steering-wheel')->get() as $value)
                                    <option value="{{ $value->term->name }}" {{ $value->term->name==$content->metaValue('steering-wheel')?'selected':'' }}>{{ $value->term->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="manCount" class="col-form-label col-lg-2">Seating</label>
                        <div class="col-lg-4">
                            <select id="manCount" name="manCount" class="form-control text-capitalize">
                                @foreach(App\TermTaxonomy::where('taxonomy', 'seating')->get() as $value)
                                    <option value="{{ $value->term->name }}" {{ $value->term->name==$content->metaValue('manCount')?'selected':'' }}>{{ $value->term->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fuelType" class="col-form-label col-lg-2">Type of fuel</label>
                        <div class="col-lg-4">
                            <select id="fuelType" name="fuelType" class="form-control text-capitalize">
                                @foreach(App\TermTaxonomy::where('taxonomy', 'type-of-fuel')->get() as $value)
                                    <option value="{{ $value->term->name }}" {{ $value->term->name==$content->metaValue('fuelType')?'selected':'' }}>{{ $value->term->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="wheelDrive" class="col-form-label col-lg-2">Wheel drive</label>
                        <div class="col-lg-4">
                            <select id="wheelDrive" name="wheelDrive" class="form-control text-capitalize">
                                @foreach(App\TermTaxonomy::where('taxonomy', 'wheel-drive')->get() as $value)
                                    <option value="{{ $value->term->name }}" {{ $value->term->name==$content->metaValue('wheelDrive')?'selected':'' }}>{{ $value->term->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="advantages" class="col-form-label col-lg-2">Advantages</label>
                        <div class="col-lg-10">
                            <input type="text" name="advantages" class="form-control tokenfield" value="
                            @foreach($content->metas->where('key', 'advantages') as $advantages)
                                {{ $advantages->value . ',' }}
                            @endforeach
                            " placeholder="Press Enter">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sellerDescription" class="col-form-label col-lg-2">Seller description</label>
                        <div class="col-lg-10">
                            <textarea id="sellerDescription" type="text" class="form-control" name="sellerDescription" placeholder="Enter seller description..." invalid="true">{{ $content->metaValue('sellerDescription') }}</textarea>
                        </div>
                    </div>

                    <h4 class="text-center">Car section /Media/</h4>

                    <div class="form-group row">
                        <label for="price" class="col-form-label col-lg-2">Price</label>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input value="{{ $content->metaValue('price') }}" id="price" type="number" min="0" class="form-control" name="price" placeholder="Enter price..." invalid="true" class="touchspin-postfix">
                                <span class="input-group-append">
                                    <span class="input-group-text">₮</span>
                                </span>
                            </div>
                        </div>
                        <label for="priceType" class="col-form-label col-lg-2">Price Type</label>
                        <div class="col-lg-4">
                            <select id="priceType" name="priceType" class="form-control text-capitalize">
                                @foreach(App\TermTaxonomy::where('taxonomy', 'price-type')->get() as $value)
                                    <option value="{{ $value->term->name }}" {{ $value->term->name==$content->metaValue('priceType')?'selected':'' }}>{{ $value->term->name }}</option>
                                @endforeach
                            </select>
                        </div>
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
                        <div class="col-lg-10" id="thumbnail-container">
                            <div class="col-lg-2 col-md-4 col-sm-6 px-0"> 
                                <img src="{{ App\Config::getStorage() . $content->metaValue('thumbnail') }}" class="img-thumbnail img-fluid full-width">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="medias" class="col-form-label col-lg-2">Images</label>
                        <div class="col-lg-10">
                            <div class="uniform-uploader">
                                <input id="media" type="file" class="form-control-uniform" name="medias[]" invalid="true" onchange="previewMedia(this, 'image-container')" multiple>
                                <span class="filename" style="user-select: none;">No file selected</span>
                                <span class="action btn btn-light" style="user-select: none;">Choose File</span>
                            </div>
                            <i class="text-muted">* You can choose multiple images</i>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10" id="image-container">
                            @foreach($content->medias() as $media)
                            <div class="col-lg-2 col-md-4 col-sm-6 px-0"> 
                                <img src="{{ $media }}" class="img-thumbnail img-fluid full-width">
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="link" class="col-form-label col-lg-2">Youtube Link</label>
                        <div class="col-lg-10">
                            <input id="link" type="text" class="form-control file-styled" name="youtubeLink" onchange="embedLink(this)">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div id="video-container"></div>
                    </div>

                    <h4 class="text-center">Auction section</h4>

                    <div class="form-group row">
                        <label for="buyout" class="col-form-label col-lg-2">Buyout</label>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input id="buyout" value="{{$content->metaValue('buyout')}}" type="number" min="0" class="form-control" name="buyout" placeholder="Enter buyout..." invalid="true" class="touchspin-postfix">
                                <span class="input-group-append">
                                    <span class="input-group-text">₮</span>
                                </span>
                            </div>
                        </div>
                        <label for="startPrice" class="col-form-label col-lg-2">Start Price</label>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input id="startPrice" value="{{$content->metaValue('startPrice')}}" type="number" min="0" class="form-control" name="startPrice" placeholder="Enter start price..." invalid="true" class="touchspin-postfix">
                                <span class="input-group-append">
                                    <span class="input-group-text">₮</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="maxBid" class="col-form-label col-lg-2">Max Bid</label>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input id="maxBid" value="{{$content->metaValue('maxBid')}}" type="number" min="0" class="form-control" name="maxBid" placeholder="Enter max bid..." invalid="true" class="touchspin-postfix">
                                <span class="input-group-append">
                                    <span class="input-group-text">₮</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="startsAt" class="col-form-label col-lg-2">Starts At</label>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <span class="input-group-prepend">	
                                    <button class="btn btn-light btn-icon" type="button" id="startsAtBut"><i class="icon-calendar3"></i></button>
                                </span>
                                <input type="text" value="{{$content->metaValue('startsAt')}}" class="form-control" id="startsAt" name="startsAt" placeholder="Start date">
                            </div>
                        </div>
                        <label for="endsAt" class="col-form-label col-lg-2">Ends At</label>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <span class="input-group-prepend">	
                                    <button class="btn btn-light btn-icon" type="button" id="endsAtBut"><i class="icon-calendar3"></i></button>
                                </span>
                                <input type="text" value="{{$content->metaValue('endsAt')}}" class="form-control" id="endsAt" name="endsAt" placeholder="End date">
                            </div>
                        </div>
                    </div>
                    {{--car section end--}}

                    <div class="text-right">
                        <a href="javascript:history.back()" class="btn btn-light">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
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
            <div class="modal-body cropper" id="cropBody">
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
<script>
    $(document).ready(function() {
        embedLink({"value": "{{ $content->metaValue('youtubeLink') }}"});
    });

    function cropImage() {
        var cropData = [];
        var container;
        $("#cropBody img[id^=cropImage]").each(function(index) {
            var image = $(this);

            container = image.attr('alt');
            var cropped = image.cropper('getCroppedCanvas', {});

            if (cropped) {
                if (container == 'thumbnail-container') {
                    $("#thumbnailCrop").val(JSON.stringify(image.cropper('getData')));
                } else if (index == 0) {
                    $("#" + container).empty();
                }
                cropData.push(image.cropper('getData'));
                $("#" + container).append(' \
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-10"> \
                        <img src="'+cropped.toDataURL('image/jpeg')+'" class="col-lg-12"> \
                    </div>');
                
                image.attr('src', '');
            }
        });
        if (container != 'thumbnail-container') {
            console.log(cropData);
            $("#imagesCrop").val(JSON.stringify(cropData));
        }
    }

    function previewMedia(input, container) {
        $("#cropBody").empty();
        $(input.files).each(function(index, value) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#cropBody").append(' \
                    <div class="col-lg-12 cropper-container content-group" style="height: 300px"> \
                        <img src="'+e.target.result+'" id="cropImage'+index+'" class="col-lg-12">\
                    </div>');

                $("#cropImage"+index).attr('src', e.target.result);
                $("#cropImage"+index).attr('alt', container);
                $('#cropImage'+index).cropper({
                    viewMode: 1,
                    dragMode: 'move',
                    aspectRatio: 16 / 9,
                    restore: false,
                    guides: false,
                    center: true,
                    highlight: false,
                    cropBoxMovable: false,
                    cropBoxResizable: false,
                    toggleDragModeOnDblclick: false
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

    $( "#slug" ).keyup(function( event ) {
            console.log(event.which);
        if ( event.which == 32) {
            var slug = document.getElementById("slug").value;
            slug = slug.toString().toLowerCase()
                .replace(' ', '-');
            document.getElementById("slug").value = slug;
        }
    });
</script>

<script>
    // Taken from assets/js/pages/form_validation.js
    $('.multiselect').multiselect({
        checkboxName: 'vali'
    });

    $('.select').select2({
        minimumResultsForSearch: Infinity
    });

    $(".styled, .multiselect-container input").uniform({ radioClass: 'choice' });
</script>
@endsection
