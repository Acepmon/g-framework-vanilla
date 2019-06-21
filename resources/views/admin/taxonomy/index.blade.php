@extends('layouts.admin')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">{{ ucfirst(Request::get('taxonomy')) }}</span></h4>
    </div>

    <div class="heading-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li class="active">{{ ucfirst(Request::get('taxonomy')) }} List</li>
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

<div class="text-right" style="padding-bottom: 5px">
    <a href="{{ route('admin.taxonomy.create', ['taxonomy' => Request::get('taxonomy')]) }}" class="btn btn-primary">Create New {{ ucfirst(Request::get('taxonomy')) }}</a>
</div>

<div class="panel panel-flat">
    @if (session('status'))
        <div id="timer" class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($term_taxonomies as $term_taxonomy)
                <tr>
                    <td>{{$term_taxonomy->id}}</td>
                    <td>{{$term_taxonomy->term->name}}</td>
                    <td>{{$term_taxonomy->term->slug}}</td>
                    <td>{{$term_taxonomy->description}}</td>
                    <td>{{$term_taxonomy->count}}</td>
                    <td width="250px">
                        <div class="btn-group">
                            <form action="{{ route('admin.taxonomy.show', ['id' => $term_taxonomy->id]) }}" method="GET" style="float: left; margin-right: 5px">
                                <button type="submit" class="btn btn-default">View</button>
                            </form>
                            <form action="{{ route('admin.taxonomy.edit', ['id' => $term_taxonomy->id]) }}" method="GET" style="float: left; margin-right: 5px">
                                <button type="submit" class="btn btn-default">Edit</button>
                            </form>
                            <button data-toggle="modal" data-target="#modal_theme_danger" class="btn btn-default" onclick="delete_term_taxonomy({{ $term_taxonomy->id }})">Delete</button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Danger modal -->
<div id="modal_theme_danger" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Delete?</h6>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete this {{ Session::get('type') }}?</p>
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
    window.delete_term_taxonomy = function(id) {
        $("#delete_form").attr('action', '/admin/taxonomy/'+id);
    }

    setTimeout(function(){ document.getElementById("timer").remove() }, 10000);
</script>
@endsection

