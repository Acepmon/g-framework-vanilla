@extends('themes.limitless.layouts.default')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Groups Management</span> - Index</h4>
    </div>

    <div class="header-elements">
        <a href="{{ route('admin.groups.create') }}" class="btn btn-primary heading-btn">Create Static Group</a>
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 mr-2"></i> Admin</a>
            <span class="breadcrumb-item active">Groups</span>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')


<div class="row">
    <div class="col-lg-12">
        @if (session('status'))
        <div class="card">
            <div class="card-body">
                    <div id="timer" class="alert alert-success">
                        {{ session('status') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Group type definition</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <h6 class="font-weight-semibold">System Group</h6>
                <p class="content-group">System user groups are in the system by default. They cannot be deleted, it is unchanging.</p>

                <h6 class="font-weight-semibold">Dynamic Group</h6>
                <p class="content-group">Dynamic user groups are populated and maintained through either a query or a directory server.</p>

                <h6 class="font-weight-semibold">Static Group</h6>
                <p>Static user groups are those which are populated manually, that is added by the administrator.</p>
            </div>
        </div>
        <div class="card">
            <table class="table table-condensed">
                <tr>
                    <th colspan="4" class="table-border-double table-active">System Groups ({{$systemGroups->count()}})</th>
                </tr>
                <tr>
                    <th style="width: 50px">#</th>
                    <th style="width: 150px;">Title</th>
                    <th>Description</th>
                    <th style="width: 100px">Type</th>
                </tr>
                @foreach($systemGroups as $group)
                    <tr>
                        <td>{{$group->id}}</td>
                        <td>
                            <a href="{{ route('admin.groups.show', ['id' => $group->id]) }}">
                                {{$group->title}}
                            </a>
                        </td>
                        <td>{{$group->description}}</td>
                        <td>
                            <span class="badge badge-{{ $group->typeClass() }}">{{$group->type}}</span>
                        </td>
                    </tr>
                @endforeach
            </table>
            <table class="table table-condensed">
                <tr>
                    <th colspan="6" class="table-border-double table-active border-top">Dynamic Groups ({{$dynamicGroups->count()}})</th>
                </tr>
                <tr>
                    <th style="width: 50px">#</th>
                    <th style="width: 150px">Parent Group</th>
                    <th style="width: 150px">Title</th>
                    <th>Description</th>
                    <th style="width: 100px">Type</th>
                </tr>
                @foreach($dynamicGroups as $group)
                    <tr>
                        <td>{{$group->id}}</td>
                        <td>
                            @if ($group->parent_id)
                                <a href="{{ route('admin.groups.show', $group->parent_id) }}">
                                    {{$group->parent->title}}
                                </a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.groups.show', ['id' => $group->id]) }}">
                                {{$group->title}}
                            </a>
                        </td>
                        <td>{{$group->description}}</td>
                        <td>
                            <span class="badge badge-{{ $group->typeClass() }}">{{$group->type}}</span>
                        </td>
                    </tr>
                @endforeach
            </table>
            <table class="table table-condensed">
                <tr>
                    <th colspan="7" class="table-border-double table-active border-top">
                        Static Groups ({{$staticGroups->count()}})
                    </th>
                </tr>
                <tr>
                    <th style="width: 50px">#</th>
                    <th style="width: 150px">Title</th>
                    <th>Description</th>
                    <th style="width: 100px">Type</th>
                    <th style="width: 150px">Actions</th>
                </tr>
                @foreach($staticGroups as $group)
                    <tr>
                        <td>{{$group->id}}</td>
                        <td>
                            <a href="{{ route('admin.groups.show', ['id' => $group->id]) }}">
                                {{$group->title}}
                            </a>
                        </td>
                        <td>{{$group->description}}</td>
                        <td>
                            <span class="badge badge-{{ $group->typeClass() }}">{{$group->type}}</span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href='{{ route('admin.groups.edit', ['id' => $group->id]) }}' class="btn btn-light btn-sm">Edit</a>
                                <button data-toggle="modal" data-target="#modal_theme_danger" class="btn btn-light btn-sm" onclick="choose_group({{ $group->id }})">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
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

