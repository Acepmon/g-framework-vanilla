@extends('layouts.admin')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Groups Management</span> - Index</h4>
    </div>

    <div class="heading-elements">
        <a href="{{ route('admin.groups.create') }}" class="btn btn-primary heading-btn">Create Static Group</a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Admin</a></li>
        <li><a href="2_col.html">Groups</a></li>
        <li class="active">Index</li>
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

<div class="row">
    <div class="col-lg-12">
        @if (session('status'))
        <div class="panel">
            <div class="panel-body">
                    <div id="timer" class="alert alert-success">
                        {{ session('status') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="panel panel-flat">
            <table class="table">
                <tr>
                    <th colspan="3" class="active">Group type definition</th>
                </tr>
                <tr>
                    <td style="width: 25%;">System Group</td>
                    <td style="width: 20%;"><span class="label label-primary">system</span></td>
                    <td>System user groups are in the system by default. They cannot be deleted, it is unchanging.</td>
                </tr>
                <tr>
                    <td style="width: 25%;">Dynamic Group</td>
                    <td style="width: 20%;"><span class="label label-warning">dynamic</span></td>
                    <td>Dynamic user groups are populated and maintained through either a query or a directory server.</td>
                </tr>
                <tr>
                    <td style="width: 25%;">Static Group</td>
                    <td style="width: 20%;"><span class="label label-info">static</span></td>
                    <td>Static user groups are those which are populated manually, that is added by the administrator.</td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <th colspan="4" class="active">System Groups ({{$systemGroups->count()}})</th>
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
                        <td>{{$group->title}}</td>
                        <td>{{$group->description}}</td>
                        <td>
                            <span class="label label-{{ $group->typeClass() }}">{{$group->type}}</span>
                        </td>
                    </tr>
                @endforeach
            </table>
            <table class="table">
                <tr>
                    <th colspan="4" class="active">Dynamic Groups ({{$dynamicGroups->count()}})</th>
                </tr>
                <tr>
                    <th style="width: 50px">#</th>
                    <th style="width: 150px">Title</th>
                    <th>Description</th>
                    <th style="width: 100px">Type</th>
                </tr>
                @foreach($dynamicGroups as $group)
                    <tr>
                        <td>{{$group->id}}</td>
                        <td>{{$group->title}}</td>
                        <td>{{$group->description}}</td>
                        <td>
                            <span class="label label-{{ $group->typeClass() }}">{{$group->type}}</span>
                        </td>
                    </tr>
                @endforeach
            </table>
            <table class="table">
                <tr>
                    <th colspan="5" class="active">
                        Static Groups ({{$staticGroups->count()}})
                    </th>
                </tr>
                <tr>
                    <th style="width: 50px">#</th>
                    <th style="width: 150px">Title</th>
                    <th>Description</th>
                    <th style="width: 100px">Type</th>
                </tr>
                @foreach($staticGroups as $group)
                    <tr>
                        <td>{{$group->id}}</td>
                        <td>{{$group->title}}</td>
                        <td>{{$group->description}}</td>
                        <td>
                            <span class="label label-{{ $group->typeClass() }}">{{$group->type}}</span>
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

