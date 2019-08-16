@extends('themes.limitless.layouts.default')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Edit {{ ucfirst($term_taxonomy->taxonomy) }} Detail</span></h4>
    </div>

    <div class="header-elements">
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 position-left"></i> Home</a>
            <a class="breadcrumb-item" href="{{ route('admin.taxonomy.index', ['taxonomy' => $term_taxonomy->taxonomy]) }}">{{ ucfirst($term_taxonomy->taxonomy) }} List</a>
            <a class="breadcrumb-item" href="{{ route('admin.taxonomy.show', ['id' => $term_taxonomy->id]) }}">Detail</a>
            <span class="breadcrumb-item active">Edit</li>
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
    <div class="col-sm-7">

        <!-- Horizontal form -->
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.taxonomy.update', ['id' => $term_taxonomy->id]) }}" method="POST">
                    @method('PUT')
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
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Name <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <input id="title" type="text" class="form-control" name="name" placeholder="Enter title..." required="required" aria-required="true" invalid="true" value="{{ $term_taxonomy->term->name }}">
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-default" onclick="create_slug()">Create Slug</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Slug <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input id="slug" type="text" class="form-control" name="slug" placeholder="Enter slug..." required="required" aria-required="true" invalid="true" value="{{ $term_taxonomy->term->slug }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Description</label>
                        <div class="col-lg-10">
                            <textarea rows="5" cols="5" class="form-control" name="description" placeholder="Enter description...">{{ $term_taxonomy->description }}</textarea>
                        </div>
                    </div>

                    @if($term_taxonomy->taxonomy != 'tag')
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Parent</label>
                        <div class="col-lg-10">
                            <select id="status" name="status" class="form-control">
                                <option value="">None</option>
                                @foreach(App\TermTaxonomy::all() as $value)
                                <option value="{{ $value->term->name }}" {{ $value->term->id==$term_taxonomy->term->id?'selected':'' }}>{{ $value->term->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif

                    <div class="text-right">
                        <a href="javascript:history.back()" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /horizotal form -->
    </div>
    <div class="col-sm-5">
        <div class="text-right" style="padding-bottom: 5px">
            <a href="{{ route('admin.taxonomy.metas.create', ['id' => $term_taxonomy->id, 'taxonomy_type' => $term_taxonomy->taxonomy]) }}" class="btn btn-primary">Create Content Metas</a>
        </div>
        <div class="card">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Key</th>
                            <th>Value</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($term_taxonomy->term->metas as $meta)
                        <tr>
                            <td>{{$meta->id}}</td>
                            <td>{{$meta->key}}</td>
                            <td>{{$meta->value}}</td>
                            <td width="250px">
                                <div class="btn-group">
                                    <form action="{{ route('admin.taxonomy.metas.edit', ['taxonomy' => $term_taxonomy->id, 'meta' => $meta->id, 'taxonomy_type' => $term_taxonomy->taxonomy]) }}" method="GET" style="float: left; margin-right: 5px">
                                        <button type="submit" class="btn btn-default">Edit</button>
                                    </form>
                                    <button data-toggle="modal" data-target="#modal_theme_danger" class="btn btn-default" onclick="delete_meta( {{$meta->id}} , {{$term_taxonomy->id}})">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /grid -->

<!-- Danger modal -->
<div id="modal_theme_danger" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Delete?</h6>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete this content meta?</p>
            </div>

            <div class="modal-footer">
                <form method="POST" id="delete_form">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}

                    <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /default modal -->

@endsection

@section('script')
<script>
    window.delete_meta = function(id, contentId) {
        $("#delete_form").attr('action', '/admin/contents/' + contentId + '/metas/'+id);
    }

    setTimeout(function(){ document.getElementById("timer").remove() }, 10000);

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
