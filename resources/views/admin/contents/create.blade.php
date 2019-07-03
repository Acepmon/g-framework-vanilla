@extends('themes.limitless.layouts.default')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/switch.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/pages/form_validation.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Create {{ ucfirst(Request::get('type')) }}</h4>
    </div>

    <div class="heading-elements">
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="{{ route('admin.contents.index', ['type' => Request::get('type')]) }}">{{ ucfirst(Request::get('type')) }}s</a></li>
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
                            <input id="title" type="text" class="form-control" name="title" placeholder="Enter content title..." required="required" aria-required="true" invalid="true">
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

                    <div class="form-group">
                        <label for="type" class="control-label col-lg-2">Type <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <select id="type" name="type" required="required" class="form-control text-capitalize">
                                @foreach(App\Content::TYPE_ARRAY as $value)
                                <option value="{{ $value }}" {{ ($value === Request::get('type'))?'selected':'' }} >{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

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

                    <div id="theme_options" style="display: {{Request::get('type') == 'page' ? 'block' : 'none'}}">

                        <hr>

                        <h5>Theme Options</h5>

                        <div class="form-group">
                            <label for="theme" class="control-label col-lg-2">Theme</label>
                            <div class="col-lg-10">
                                <select name="theme" id="theme" class="form-control">
                                    @foreach ($themes as $theme)
                                        <option value="{{ $theme->id }}">{{ $theme->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="layout" class="control-label col-lg-2">Theme Layout</label>
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

    $("#type").change(function () {
        if ($(this).val() == 'page') {
            $("#theme_options").css('display', 'block');
        } else {
            $("#theme_options").css('display', 'none');
        }
    });
</script>
@endsection
