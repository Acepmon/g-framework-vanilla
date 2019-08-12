@extends('themes.limitless.layouts.default')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">{{ ucfirst(Request::get('type')) }}s</span></h4>
    </div>

    <div class="heading-elements">
        <a href="{{ route('admin.contents.create', ['type' => Request::get('type')]) }}" class="btn btn-primary">Create New {{ ucfirst(Request::get('type')) }}</a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li class="active">{{ ucfirst(Request::get('type')) }}s</li>
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
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Visibility</th>
                    <th>Author Id</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($contents as $content)
                <tr>
                    <td>{{$content->id}}</td>
                    <td>{{$content->title}}</td>
                    <td>
                        <a href="{{url($content->slug)}}" target="_blank">{{$content->slug}}</a>
                    </td>
                    <td>{{$content->type}}</td>
                    <td>{{$content->status}}</td>
                    <td>{{$content->visibility}}</td>
                    <td>{{$content->author_id}}</td>
                    <td width="250px">
                        <div class="btn-group">
                            <form action="{{ route('admin.contents.show', ['id' => $content->id]) }}" method="GET" style="float: left; margin-right: 5px">
                                <button type="submit" class="btn btn-default">View</button>
                            </form>
                            <form action="{{ route('admin.contents.edit', ['id' => $content->id]) }}" method="GET" style="float: left; margin-right: 5px">
                                <button type="submit" class="btn btn-default">Edit</button>
                            </form>
                            <button data-toggle="modal" data-target="#modal_theme_danger" class="btn btn-default" onclick="delete_content({{ $content->id }})">Delete</button>
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
                <p>Are you sure you want to delete this content?</p>
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
    window.delete_content = function(id) {
        $("#delete_form").attr('action', '/admin/contents/'+id+'?type={{ Request::get('type') }}');
    }

    setTimeout(function(){ document.getElementById("timer").remove() }, 10000);
</script>
@endsection

