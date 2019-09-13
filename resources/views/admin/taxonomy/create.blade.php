@extends('themes.limitless.layouts.default')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Create {{ ucfirst(Request::get('taxonomy')) }}</h4>
    </div>

    <div class="header-elements">
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 mr-2"></i> Home</a>
            <a class="breadcrumb-item"  href="{{ route('admin.taxonomy.index', ['taxonomy' => Request::get('taxonomy')]) }}">{{ ucfirst(Request::get('taxonomy')) }} List</a></li>
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
    <div class="col-md-6">

        <!-- Horizontal form -->
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.taxonomy.store') }}" method="POST">
                    @csrf

                    @if(Session::has('success'))
                    <div class="alert alert-success no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                        {{ session('success') }}
                    </div>
                    @endif
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

                    <input type="hidden" name="taxonomy" value="{{ Request::get('taxonomy') }}" />
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Name <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <input id="title" type="text" class="form-control" name="name" placeholder="Enter title..." required="required" aria-required="true" invalid="true">
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-default" onclick="create_slug()">Create Slug</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Slug <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input id="slug" type="text" class="form-control" name="slug" placeholder="Enter slug..." required="required" aria-required="true" invalid="true">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Description</label>
                        <div class="col-lg-10">
                            <textarea rows="5" cols="5" class="form-control" name="description" placeholder="Enter description..."></textarea>
                        </div>
                    </div>

                    @if(Request::get('taxonomy') != 'tag')
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Parent</label>
                        <div class="col-lg-10">
                            <select id="status" name="status" class="form-control">
                                <option value="">None</option>
                                @foreach(App\TermTaxonomy::where('taxonomy', Request::get('taxonomy'))->get() as $value)
                                <option value="{{ $value->term->name }}">{{ $value->term->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif

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
</script>
@endsection
