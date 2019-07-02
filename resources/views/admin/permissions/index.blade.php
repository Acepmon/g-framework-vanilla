@extends('themes.limitless.layouts.default')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Menu</span> Index Page</h4>
    </div>

    <div class="heading-elements">
        <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary text-white">Create permission<i class="icon-arrow-right14 position-right"></i></a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="2_col.html">Starters</a></li>
        <li class="active">2 columns</li>
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
<!-- Table -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">
            Permissions
        </h5>
    </div>

    @if (session('status'))
        <div class="panel-body">
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <div style="display: none">{{$i=1}}</div>
                @foreach($permissions as $data)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $data->title}}</td>
                    <td>{{ $data->description}}</td>
                    <td><a href='{{ route('admin.permissions.show', ['id' => $data->id]) }}' type="btn btn-default">Show</a></td>
                    <td><a href='{{ route('admin.permissions.edit', ['id' => $data->id]) }}' type="btn btn-default">Edit</a></td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#modal_theme_danger" onclick="delete_confirm({{ $data->id }})"><i class="icon-trash"></i> Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- /table -->

<!-- Danger modal -->
<div id="modal_theme_danger" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Delete?</h6>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete this record?</p>
            </div>

            <div class="modal-footer">
                <form method="post" id="delete_form" action="/permissions/0">
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
    window.delete_confirm = function(id) {
        $("#delete_form").attr('action', '/admin/permissions/'+id);
    }
</script>
@endsection
