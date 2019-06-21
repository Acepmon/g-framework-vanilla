@extends('layouts.admin')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Create {{ ucfirst(Request::get('taxonomy')) }}</h4>
    </div>

    <div class="heading-elements">
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="{{ route('admin.taxonomy.index', ['taxonomy' => Request::get('taxonomy')]) }}">{{ ucfirst(Request::get('taxonomy')) }} List</a></li>
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
    <div class="col-md-6">

        <!-- Horizontal form -->
        <div class="panel panel-flat">
            <div class="panel-body">
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
                    <div class="form-group">
                        <label class="control-label col-lg-2">Name <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <input id="title" type="text" class="form-control" name="name" placeholder="Enter title..." required="required" aria-required="true" invalid="true">
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-default" onclick="create_slug()">Create Slug</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Slug <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input id="slug" type="text" class="form-control" name="slug" placeholder="Enter slug..." required="required" aria-required="true" invalid="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Description</label>
                        <div class="col-lg-10">
                            <textarea rows="5" cols="5" class="form-control" name="description" placeholder="Enter description..."></textarea>
                        </div>
                    </div>

                    @if(Request::get('taxonomy') != 'tag')
                    <div class="form-group">
                        <label class="control-label col-lg-2">Parent</label>
                        <div class="col-lg-10">
                            <select id="status" name="status" class="form-control">
                                <option value="">None</option>
                                @foreach(App\TermTaxonomy::all() as $value)
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