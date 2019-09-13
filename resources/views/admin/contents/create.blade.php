@extends('themes.limitless.layouts.default')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/validation/validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/switch.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/form_validation.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Create {{ ucfirst(Request::get('type')) }}</h4>
    </div>

    <div class="header-elements">
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 mr-2"></i> Home</a>
            <a class="breadcrumb-item" href="{{ route('admin.contents.index', ['type' => Request::get('type')]) }}">{{ ucfirst(Request::get('type')) }}s</a>
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

                    <div class="form-group row">
                        <label for="title" class="col-form-label col-lg-2">Title <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <input id="title" type="text" class="form-control" name="title" placeholder="Enter content title..." required="required" aria-required="true" invalid="true">
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-primary btn-block" onclick="create_slug()">Create Slug</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="slug" class="col-form-label col-lg-2">Slug <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input id="slug" type="text" class="form-control" name="slug" placeholder="Enter content slug..." required="required" aria-required="true" invalid="true">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="type" class="col-form-label col-lg-2">Type <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <select id="type" name="type" required="required" class="form-control text-capitalize">
                                @foreach(App\Content::TYPE_ARRAY as $value)
                                <option value="{{ $value }}" {{ ($value === Request::get('type'))?'selected':'' }} >{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

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

                    <div class="form-group row">
                        <label for="category" class="col-form-label col-lg-2">Category</label>
                        <div class="col-lg-10">
                            <select name="category" type="text" class="form-control">
                                @foreach(App\TermTaxonomy::where('taxonomy', 'category')->get() as $taxonomy)
                                    <option value="{{$taxonomy->id}}">{{$taxonomy->term->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tags" class="col-form-label col-lg-2">Tags</label>
                        <div class="col-lg-10">
                            <select name="tags[]" id="tags" data-placeholder="Select Tags..." multiple="multiple" class="form-control">
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

                    <div id="theme_options" style="display: {{Request::get('type') == 'page' ? 'block' : 'none'}}">

                        <hr>

                        <h5>Theme Options</h5>

                        <div class="form-group row">
                            <label for="theme" class="col-form-label col-lg-2">Theme</label>
                            <div class="col-lg-10">
                                <select name="theme" id="theme" class="form-control">
                                    <option value="0">Default</option>
                                    @foreach ($themes as $theme)
                                        <option value="{{ $theme->id }}">{{ $theme->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="layout" class="col-form-label col-lg-2">Theme Layout</label>
                            <div class="col-lg-10">
                                <select name="layout" id="layout" class="form-control"></select>
                            </div>
                        </div>

                    </div>

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
