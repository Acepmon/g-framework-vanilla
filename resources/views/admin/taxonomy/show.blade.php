@extends('themes.limitless.layouts.default')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">{{ ucfirst($term_taxonomy->taxonomy) }} Detail</span></h4>
    </div>

    <div class="header-elements">
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 mr-2"></i> Home</a>
            <a class="breadcrumb-item" href="{{ route('admin.taxonomy.index', ['taxonomy' => $term_taxonomy->taxonomy]) }}">{{ ucfirst($term_taxonomy->taxonomy) }} List</a>
            <span class="breadcrumb-item active">Detail</span>
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
    <div class="col-md-7">

        <!-- Horizontal form -->
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Name</label>
                    <div class="col-lg-10">
                        <label class="col-form-label col-lg-2">{{$term_taxonomy->term->name}}</label>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Slug</label>
                    <div class="col-lg-10">
                        <label class="col-form-label col-lg-2">{{$term_taxonomy->term->slug}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Description</label>
                    <div class="col-lg-10">
                        <label class="col-form-label col-lg-2">{{ $term_taxonomy->description}}&nbsp;</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Parent</label>
                    <div class="col-lg-10">
                        <label class="col-form-label col-lg-2">{{$term_taxonomy->parent_id}}&nbsp;</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Count</label>
                    <div class="col-lg-10">
                        <label class="col-form-label col-lg-2">{{$term_taxonomy->count}}</label>
                    </div>
                </div>
                <div class="text-right" style="padding-bottom: 5px">
                    <a href="{{ route('admin.taxonomy.index', ['taxonomy' => $term_taxonomy->taxonomy]) }}" class="btn btn-light">Back</a>
                    <a href="{{ route('admin.taxonomy.edit', ['id' => $term_taxonomy->id]) }}" class="btn btn-light">Edit</a>
                </div>
            </div>
        </div>
        <!-- /horizotal form -->
    </div>

    <div class="col-sm-5">
        <div class="text-right" style="padding-bottom: 5px">
            <a href="{{ route('admin.taxonomy.metas.create', ['id' => $term_taxonomy->id, 'taxonomy_type' => $term_taxonomy->taxonomy ]) }}" class="btn btn-primary">Create {{ ucfirst($term_taxonomy->taxonomy) }} Metas</a>
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
                                        <button type="submit" class="btn btn-light">Edit</button>
                                    </form>
                                    <button data-toggle="modal" data-target="#modal_theme_danger" class="btn btn-light" onclick="delete_meta( {{$meta->id}} , {{$term_taxonomy->id}})">Delete</button>
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
                <p>Are you sure you want to delete this {{ $term_taxonomy->taxonomy }} meta?</p>
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

@endsection

@section('script')

<script>
    window.delete_meta = function(id, taxonomyId) {
        $("#delete_form").attr('action', '/admin/taxonomy/' + taxonomyId + '/metas/'+id);
    }
</script>
@endsection
