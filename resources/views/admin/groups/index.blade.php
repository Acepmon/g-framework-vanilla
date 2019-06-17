@extends('layouts.admin')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Starters</span> - 2 Columns</h4>
    </div>

    <div class="heading-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
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

<div class="text-right" style="padding-bottom: 5px">

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
                    <th>Parent id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach($groups as $group)
                    <tr>                    
                        <td>{{$group->id}}</td>
                        <td>{{$group->parent_id}}
                        </td>
                        <td>{{$group->title}}</td>
                        <td>{{$group->description}}</td>
                        <td width="250px">
                            <div class="btn-group">
                                <a href="{{ route('admin.groups.show', ['id' => $group->id]) }}" class="btn btn-default">View</a>
                                <a href="{{ route('admin.groups.edit', ['id' => $group->id]) }}" class="btn btn-default">Edit</a>
                                <button data-toggle="modal" data-target="#modal_theme_danger" type="button" class="btn btn-default" onclick="choose_group({{ $group->id }})">Delete</button>
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
                <p>Are you sure you want to delete this group?</p>
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
    window.choose_group = function(id) {
        $("#delete_form").attr('action', '/admin/groups/'+id);
    }

    setTimeout(function(){ document.getElementById("timer").remove() }, 10000);
</script>
@endsection

