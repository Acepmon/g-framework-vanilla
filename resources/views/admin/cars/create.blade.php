@extends('themes.limitless.layouts.default')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/validation/validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/switch.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/pages/form_validation.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Create Car</h4>
    </div>

    <div class="heading-elements">
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="{{ route('admin.contents.index', ['type' => 'car']) }}">Cars</a></li>
        <li class="active">Create</li>
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
    <div class="col-md-12">

        <!-- Horizontal form -->
        <div class="panel panel-flat">
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('admin.contents.store') }}" method="POST">
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
                        <label for="title" class="control-label col-lg-2">Title <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <input id="title" type="text" class="form-control" name="title" placeholder="Enter car title..." required="required" aria-required="true" invalid="true">
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-default btn-block" onclick="create_slug()">Create Slug</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slug" class="control-label col-lg-2">Slug <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input id="slug" type="text" class="form-control" name="slug" placeholder="Enter content slug..." required="required" aria-required="true" invalid="true">
                        </div>
                    </div>

                    <input type="hidden" name="type" value="car"/>

                    <div class="form-group">
                        <label for="status" class="control-label col-lg-2">Status <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <select id="status" name="status" required="required" class="form-control text-capitalize">
                                @foreach(App\Content::STATUS_ARRAY as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="visibility" class="control-label col-lg-2">Visibility <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <select id="visibility" name="visibility" required="required" class="form-control text-capitalize">
                                @foreach(App\Content::VISIBILITY_ARRAY as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <input name="author_id" type="text" id="author_id" value="{{ Auth::id() }}" hidden>

                    <div class="form-group">
                        <label for="category" class="control-label col-lg-2">Category</label>
                        <div class="col-lg-10">
                            <select name="category" type="text" class="form-control">
                                @foreach(App\TermTaxonomy::where('taxonomy', 'category')->get() as $taxonomy)
                                    <option value="{{$taxonomy->id}}">{{$taxonomy->term->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">Tags</label>
                        <div class="col-lg-10">
                            <select name="tags[]" id="tags" data-placeholder="Select Tags..." multiple="multiple" class="select">
                                @foreach(App\TermTaxonomy::where('taxonomy', 'tag')->get() as $tag)
                                    @php $selected = False @endphp
                                    @if(Request::old('tags'))
                                        @foreach(Request::old('tags') as $tag_id)
                                            @php $selected = ($selected || $tag_id == $tag->id) @endphp
                                        @endforeach
                                    @endif
                                    <option value="{{ $tag->id }}" {{ $selected?'selected':'' }}>{{ $tag->term->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{--car section--}}
                    <h4 class="text-center">Car section /General information/</h4>
                    {{--<div class="form-group">--}}
                        {{--<label for="tags" class="control-label col-lg-2">Tags</label>--}}
                        {{--<div class="col-lg-10">--}}
                            {{--<select name="tags[]" id="tags" data-placeholder="Select Tags..." multiple="multiple" class="select">--}}
                                {{--@foreach(App\TermTaxonomy::where('taxonomy', 'tag')->get() as $tag)--}}
                                    {{--@php $selected = False @endphp--}}
                                    {{--@if(Request::old('tags'))--}}
                                        {{--@foreach(Request::old('tags') as $tag_id)--}}
                                            {{--@php $selected = ($selected || $tag_id == $tag->id) @endphp--}}
                                        {{--@endforeach--}}
                                    {{--@endif--}}
                                    {{--<option value="{{ $tag->id }}" {{ $selected?'selected':'' }}>{{ $tag->term->name }}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <label for="title" class="control-label col-lg-2">Title <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input id="car-title" type="text" class="form-control" name="car-title" placeholder="Enter car title..." required="required" aria-required="true" invalid="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="manufacturer" class="control-label col-lg-2">Manufacturer <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select id="manufacturer" name="manufacturer" required="required" class="form-control text-capitalize">
                                @foreach(App\Content::VISIBILITY_ARRAY as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="carCondition" class="control-label col-lg-2">Car condition <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select id="carCondition" name="carCondition" required="required" class="form-control text-capitalize">
                                @foreach(App\Content::VISIBILITY_ARRAY as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="model" class="control-label col-lg-2">Model <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input id="model" type="text" class="form-control" name="model" placeholder="Enter car model..." required="required" aria-required="true" invalid="true">
                            {{--<select id="model" name="model" required="required" class="form-control text-capitalize">--}}
                                {{--@foreach(App\Content::VISIBILITY_ARRAY as $value)--}}
                                    {{--<option value="{{ $value }}">{{ $value }}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        </div>
                        <label for="color" class="control-label col-lg-2">Color <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select id="color" name="color" required="required" class="form-control text-capitalize">
                                @foreach(App\Content::VISIBILITY_ARRAY as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="displacement" class="control-label col-lg-2">Displacement /km/ <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input id="displacement" type="number" class="form-control" name="model" placeholder="Enter displacement length..." required="required" aria-required="true" invalid="true">
                        </div>
                        <label for="vin" class="control-label col-lg-2">Vin <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input id="vin" type="text" class="form-control" name="vin" placeholder="Enter car vin..." required="required" aria-required="true" invalid="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="yearOfProduct" class="control-label col-lg-2">Year of product <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input id="yearOfProduct" type="number" class="form-control" name="yearOfProduct" placeholder="Enter year of product..." required="required" aria-required="true" invalid="true">
                        </div>
                        <label for="yearOfEntry" class="control-label col-lg-2">Year of entry <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input id="yearOfEntry" type="text" class="form-control" name="yearOfEntry" placeholder="Enter car vin..." required="required" aria-required="true" invalid="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastCheck" class="control-label col-lg-2">Last check <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input id="lastCheck" type="number" class="form-control" name="lastCheck" placeholder="Enter last check date..." required="required" aria-required="true" invalid="true">
                        </div>
                    </div>

                    <h4 class="text-center">Car section /More information/</h4>

                    <div class="form-group">
                        <label for="manufacturer" class="control-label col-lg-2">Manufacturer <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select id="manufacturer" name="manufacturer" required="required" class="form-control text-capitalize">
                                @foreach(App\Content::VISIBILITY_ARRAY as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="transmission" class="control-label col-lg-2">Transmission <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select id="transmission" name="transmission" required="required" class="form-control text-capitalize">
                                @foreach(App\Content::VISIBILITY_ARRAY as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="steeringWheel" class="control-label col-lg-2">Steering wheel <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select id="steeringWheel" name="steeringWheel" required="required" class="form-control text-capitalize">
                                @foreach(App\Content::VISIBILITY_ARRAY as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="seating" class="control-label col-lg-2">Seating <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select id="seating" name="seating" required="required" class="form-control text-capitalize">
                                @foreach(App\Content::VISIBILITY_ARRAY as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="typeOfFuel" class="control-label col-lg-2">Type of fuel <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select id="typeOfFuel" name="typeOfFuel" required="required" class="form-control text-capitalize">
                                @foreach(App\Content::VISIBILITY_ARRAY as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="wheelDrive" class="control-label col-lg-2">Wheel drive <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select id="wheelDrive" name="wheelDrive" required="required" class="form-control text-capitalize">
                                @foreach(App\Content::VISIBILITY_ARRAY as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="millage" class="control-label col-lg-2">Millage <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select id="millage" name="millage" required="required" class="form-control text-capitalize">
                                @foreach(App\Content::VISIBILITY_ARRAY as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="manufacturer1" class="control-label col-lg-2">Manufacturer <span class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <select id="manufacturer1" name="manufacturer1" required="required" class="form-control text-capitalize">
                                @foreach(App\TermTaxonomy::where('taxonomy', 'manufacturer')->get() as $value)
                                    <option value="{{ $value->term->name }}">{{ $value->term->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">Advantages</label>
                        <div class="col-lg-10">
                            <select name="tags[]" id="tags" data-placeholder="Select advantages..." multiple="multiple" class="select">
                                @foreach(App\TermTaxonomy::where('taxonomy', 'tag')->get() as $tag)
                                    @php $selected = False @endphp
                                    @if(Request::old('tags'))
                                        @foreach(Request::old('tags') as $tag_id)
                                            @php $selected = ($selected || $tag_id == $tag->id) @endphp
                                        @endforeach
                                    @endif
                                    <option value="{{ $tag->id }}" {{ $selected?'selected':'' }}>{{ $tag->term->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sellerDescription" class="control-label col-lg-2">Seller description <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <textarea id="sellerDescription" type="text" class="form-control" name="sellerDescription" placeholder="Enter seller description..." required="required" aria-required="true" invalid="true"></textarea>
                        </div>
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
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /horizotal form -->

    </div>
</div>
<!-- /grid -->


@endsection

@section('script')
<script>
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
    });

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
        if ( event.which == 32) {
            var slug = document.getElementById("slug").value;
            slug = slug.toString().toLowerCase()
                .replace(' ', '-');
            document.getElementById("slug").value = slug;
        }
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
