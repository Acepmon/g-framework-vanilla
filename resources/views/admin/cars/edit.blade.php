@extends('themes.limitless.layouts.default')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/switch.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/editors/ace/ace.js') }}"></script>
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
</script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Edit {{ ucfirst($content->type) }} Detail</span></h4>
    </div>

    <div class="heading-elements">
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="{{ route('admin.cars.index') }}">{{ ucfirst($content->type) }}s</a></li>
        <li><a href="{{ route('admin.cars.show', ['id' => $content->id]) }}">Detail</a></li>
        <li class="active">Edit</li>
    </ul>

    <ul class="breadcrumb-elements">
        <li><a href="#"><i class="icon-comment-discussion position-left"></i> Link</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-gear position-left"></i>
                Dropdown
                <span class="caret"></span>
            </a>

            <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
            </ul>
        </li>
    </ul>
</div>
<!-- /page header -->
@endsection

@section('content')

<!-- Grid -->
<div class="row">
    <div class="panel panel-flat">
        <div class="panel-body">
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
                <div class="form-group">
                    <label class="control-label col-lg-2">Title <span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <input id="title" type="text" class="form-control" name="title" placeholder="Enter content title..." value="{{$content->title}}" required="required" aria-required="true" invalid="true">
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-default" onclick="create_slug()">Create Slug</button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Slug <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input id="slug" type="text" class="form-control" name="slug" placeholder="Enter content slug..." value="{{$content->slug}}" required="required" aria-required="true" invalid="true">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Type <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <select id="type" name="type" required="required" class="form-control">
                            @foreach(App\Content::TYPE_ARRAY as $value)
                            <option value="{{ $value }}" {{ ($value === $content->type)?'selected':'' }} >{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Status <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <select id="status" name="status" required="required" class="form-control">
                            @foreach(App\Content::STATUS_ARRAY as $value)
                            <option value="{{ $value }}" {{ ($value === $content->status)?'selected':'' }} >{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Visibility <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <select id="visibility" name="visibility" required="required" class="form-control">
                            @foreach(App\Content::VISIBILITY_ARRAY as $value)
                            <option value="{{ $value }}" {{ ($value === $content->visibility)?'selected':'' }} >{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Author ID</label>
                    <div class="col-lg-10">
                        <select name="author_id" type="text" id="author_id" class="form-control">
                            @foreach($users as $user)
                            <option {{$content->author_id == $user->id?'selected':''}} value="{{$user->id}}">{{$user->username}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Category</label>
                    <div class="col-lg-10">
                        <select name="category" type="text" class="form-control">
                            @foreach(App\TermTaxonomy::where('taxonomy', 'category')->get() as $taxonomy)
                                <option value="{{$taxonomy->id}}" {{ count($content->terms->where('id', $taxonomy->id))>0?'selected':'' }}>{{$taxonomy->term->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Tags</label>
                    <div class="col-lg-10">
                        <select name="tags[]" id="tags" data-placeholder="Select Tags..." multiple="multiple" class="select">
                            @foreach(App\TermTaxonomy::where('taxonomy', 'tag')->get() as $tag)
                                @php $selected = False @endphp
                                @foreach($content->terms as $term)
                                    @php $selected = ($selected || $term->id == $tag->id) @endphp
                                @endforeach
                                <option value="{{ $tag->id }}" {{ $selected?'selected':'' }}>{{ $tag->term->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                {{--car section--}}
                <h4 class="text-center">Car section /General information/</h4>

                <div class="form-group">
                    <label for="title" class="control-label col-lg-2">Title <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input value="{{ $info->carTitle }}" id="carTitle" type="text" class="form-control" name="carTitle" placeholder="Enter car title..." required="required" aria-required="true" invalid="true">
                    </div>
                </div>

                <div class="form-group">
                    <label for="manufacturer" class="control-label col-lg-2">Manufacturer <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <select id="manufacturer" name="manufacturer" required="required" class="form-control text-capitalize">
                            @foreach(App\TermTaxonomy::where('taxonomy', 'manufacturer')->get() as $value)
                                <option value="{{ $value->term->name }}" {{ $value->term->name==$info->manufacturer?'selected':'' }}>{{ $value->term->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="carCondition" class="control-label col-lg-2">Car condition <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <select id="carCondition" name="carCondition" required="required" class="form-control text-capitalize">
                            @foreach(App\TermTaxonomy::where('taxonomy', 'car-condition')->get() as $value)
                                <option value="{{ $value->term->name }}" {{ $value->term->name==$info->carCondition?'selected':'' }}>{{ $value->term->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="model" class="control-label col-lg-2">Model <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input value="{{ $info->model }}" id="model" type="text" class="form-control" name="model" placeholder="Enter car model..." required="required" aria-required="true" invalid="true">
                        {{--<select id="model" name="model" required="required" class="form-control text-capitalize">--}}
                            {{--@foreach(App\Content::VISIBILITY_ARRAY as $value)--}}
                                {{--<option value="{{ $value }}">{{ $value }}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    </div>
                    <label for="color" class="control-label col-lg-2">Color <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <select id="color" name="color" required="required" class="form-control text-capitalize">
                            @foreach(App\TermTaxonomy::where('taxonomy', 'color')->get() as $value)
                                <option value="{{ $value->term->name }}" {{ $value->term->name==$info->color?'selected':'' }}>{{ $value->term->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="displacement" class="control-label col-lg-2">Displacement /km/ <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <input value="{{ $info->displacement }}" id="displacement" type="number" class="form-control" name="displacement" placeholder="Enter displacement length..." required="required" aria-required="true" invalid="true">
                            <span class="input-group-addon">km</span>
                        </div>
                    </div>
                    <label for="vin" class="control-label col-lg-2">VIN <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input value="{{ $info->vin }}" id="vin" type="text" class="form-control" name="vin" placeholder="Enter car vin..." required="required" aria-required="true" invalid="true">
                    </div>
                </div>

                <div class="form-group">
                    <label for="yearOfProduct" class="control-label col-lg-2">Year of product <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input value="{{ $info->yearOfProduct }}" id="yearOfProduct" type="number" min="1769" max="2019" value="2019" class="form-control" name="yearOfProduct" placeholder="Enter year of product..." required="required" aria-required="true" invalid="true">
                    </div>
                    <label for="yearOfEntry" class="control-label col-lg-2">Year of entry <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input value="{{ $info->yearOfEntry }}" id="yearOfEntry" type="number" min="1769" max="2019" value="2019" class="form-control" name="yearOfEntry" placeholder="Enter year of entry..." required="required" aria-required="true" invalid="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastCheck" class="control-label col-lg-2">Last check <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <input value="{{ $info->lastCheck }}" id="lastCheck" type="month" class="form-control" name="lastCheck" placeholder="Enter last check date..." required="required" aria-required="true" invalid="true">
                    </div>
                </div>

                <h4 class="text-center">Car section /More information/</h4>

                <div class="form-group">
                    <label for="manufacturer" class="control-label col-lg-2">Manufacturer <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <select id="manufacturer" name="manufacturer" required="required" class="form-control text-capitalize">
                            @foreach(App\TermTaxonomy::where('taxonomy', 'manufacturer')->get() as $value)
                                <option value="{{ $value->term->name }}" {{ $value->term->name==$info->manufacturer?'selected':'' }}>{{ $value->term->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="transmission" class="control-label col-lg-2">Transmission <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <select id="transmission" name="transmission" required="required" class="form-control text-capitalize">
                            @foreach(App\TermTaxonomy::where('taxonomy', 'transmission')->get() as $value)
                                <option value="{{ $value->term->name }} {{ $value->term->name==$info->transmission?'selected':'' }}">{{ $value->term->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="steeringWheel" class="control-label col-lg-2">Steering wheel <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <select id="steeringWheel" name="steeringWheel" required="required" class="form-control text-capitalize">
                            @foreach(App\TermTaxonomy::where('taxonomy', 'steering-wheel')->get() as $value)
                                <option value="{{ $value->term->name }}" {{ $value->term->name==$info->steeringWheel?'selected':'' }}>{{ $value->term->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="seating" class="control-label col-lg-2">Seating <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <select id="seating" name="seating" required="required" class="form-control text-capitalize">
                            @foreach(App\TermTaxonomy::where('taxonomy', 'seating')->get() as $value)
                                <option value="{{ $value->term->name }}" {{ $value->term->name==$info->seating?'selected':'' }}>{{ $value->term->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="typeOfFuel" class="control-label col-lg-2">Type of fuel <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <select id="typeOfFuel" name="typeOfFuel" required="required" class="form-control text-capitalize">
                            @foreach(App\TermTaxonomy::where('taxonomy', 'type-of-fuel')->get() as $value)
                                <option value="{{ $value->term->name }}" {{ $value->term->name==$info->typeOfFuel?'selected':'' }}>{{ $value->term->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="wheelDrive" class="control-label col-lg-2">Wheel drive <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <select id="wheelDrive" name="wheelDrive" required="required" class="form-control text-capitalize">
                            @foreach(App\TermTaxonomy::where('taxonomy', 'wheel-drive')->get() as $value)
                                <option value="{{ $value->term->name }}" {{ $value->term->name==$info->wheelDrive?'selected':'' }}>{{ $value->term->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="mileage" class="control-label col-lg-2">Mileage <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <input value="{{ $info->mileage }}" id="mileage" type="number" class="form-control" name="mileage" placeholder="Enter mileage..." required="required" aria-required="true" invalid="true" class="touchspin-postfix">
                            <span class="input-group-addon">km</span>
                        </div>
                    </div>
                    <label for="manufacturer1" class="control-label col-lg-2">Manufacturer <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <select id="manufacturer1" name="manufacturer1" required="required" class="form-control text-capitalize">
                            @foreach(App\TermTaxonomy::where('taxonomy', 'manufacturer')->get() as $value)
                                <option value="{{ $value->term->name }}" {{ $value->term->name==$info->manufacturer?'selected':'' }}>{{ $value->term->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="advantages" class="control-label col-lg-2">Advantages</label>
                    <div class="col-lg-10">
                        <select name="advantages[]" id="advantages" data-placeholder="Select advantages..." multiple="multiple" class="select">
                            @foreach(App\TermTaxonomy::where('taxonomy', 'advantages')->get() as $advantages)
                                @php $selected = False @endphp
                                @if($info->advantages)
                                    @foreach($info->advantages as $advantages_id)
                                        @php $selected = ($selected || $advantages_id == $advantages->term->name) @endphp
                                    @endforeach
                                @endif
                                <option value="{{ $advantages->term->name }}" {{ $selected?'selected':'' }}>{{ $advantages->term->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="sellerDescription" class="control-label col-lg-2">Seller description <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <textarea id="sellerDescription" type="text" class="form-control" name="sellerDescription" placeholder="Enter seller description..." required="required" aria-required="true" invalid="true">{{ $info->sellerDescription }}</textarea>
                    </div>
                </div>

                <h4 class="text-center">Car section /Media/</h4>

                <div class="form-group">
                    <label for="price" class="control-label col-lg-2">Price <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <input value="{{ $info->price }}" id="price" type="number" min="0" value="0" class="form-control" name="price" placeholder="Enter price..." required="required" aria-required="true" invalid="true" class="touchspin-postfix">
                            <span class="input-group-addon">₮</span>
                        </div>
                    </div>
                    <label for="priceType" class="control-label col-lg-2">Price Type <span class="text-danger">*</span></label>
                    <div class="col-lg-4">
                        <select id="priceType" name="priceType" required="required" class="form-control text-capitalize">
                            @foreach(App\TermTaxonomy::where('taxonomy', 'price-type')->get() as $value)
                                <option value="{{ $value->term->name }}" {{ $value->term->name==$info->priceType?'selected':'' }}>{{ $value->term->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="control-label col-lg-2">Images</label>
                    <div class="col-lg-10">
                        <input id="media" type="file" class="form-control file-styled" name="medias[]" invalid="true" onchange="previewMedia(this)" multiple>
                    </div>
                </div>

                <div class="row" id="image-container">
                    <div class="col-lg-2"></div>
                    @foreach($content->medias() as $media)
                    <div class="col-lg-2 col-md-4 col-sm-6 px-0"> 
                        <img src="{{ $media }}" class="img-thumbnail img-fluid full-width">
                    </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="link" class="control-label col-lg-2">Youtube Link</label>
                    <div class="col-lg-10">
                        <input value="{{ $info->youtubeLink }}" id="link" type="text" class="form-control file-styled" name="youtubeLink" onchange="embedLink(this)">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2"></div>
                    <div id="video-container"></div>
                </div>

                {{--<div class="form-group">--}}
                    {{--<label for="slug" class="control-label col-lg-2">Slug <span class="text-danger">*</span></label>--}}
                    {{--<div class="col-lg-10">--}}
                        {{--<input id="slug" type="text" class="form-control" name="slug" placeholder="Enter content slug..." required="required" aria-required="true" invalid="true">--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--car section end--}}

                <div class="text-right">
                    <a href="javascript:history.back()" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /grid -->

@endsection

@section('script')
<script>
    $(document).ready(function() {
        embedLink({"value": "{{ $info->youtubeLink }}"});
    });

    function previewMedia(input) {
        $(input.files).each(function(index, value) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#image-container").append(' \
                    <div class="col-lg-2 col-md-4 col-sm-6 px-0"> \
                        <img src="'+e.target.result+'" class="img-thumbnail img-fluid full-width">\
                    </div>');
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
