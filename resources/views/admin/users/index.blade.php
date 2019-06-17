@extends('layouts.admin')

@section('load')
<script type="text/javascript" src="/assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="/assets/js/pages/datatables_basic.js"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Users</span></h4>
    </div>

    <div class="heading-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li class="active">Users</li>
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
        <h5 class="panel-title">Users datatable</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a href="{{ route('admin.users.create') }}" class="text-white btn btn-primary">Register New <i class="icon-add position-right"></i></a></li>
                <li> </li>
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>#</th>
                <th width="50%">User</th>
                <th>Email</th>
                <th>Groups</th>
                <th>Created Date</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>
                    <a href="#" class="media-left"><img src="{{ ($user->avatar)?'/storage/'.$user->avatar:'/assets/images/placeholder.jpg'}}" class="img-sm img-circle" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{ $user->name }}</span>
                        <span class="text-size-mini text-muted display-block">{{ '@'.$user->username }}</span>
                    </div>
                </td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach($user->groups as $group)
                        {{ $group->title }}, 
                    @endforeach
                </td>
                <td>{{ $user->created_at }}</td>
                <!---->
                <td class="text-center">
                    <ul class="icons-list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="{{ route('admin.users.show', ['id' => $user->id]) }}"><i class="icon-eye"></i> View</a></li>
                                <li><a href="{{ route('admin.users.edit', ['id' => $user->id]) }}"><i class="icon-pencil"></i> Edit</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#modal_theme_danger" onclick="choose_user({{ $user->id }})"><i class="icon-trash"></i> Delete</a></li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
                <p>Are you sure you want to delete this user?</p>
            </div>

            <div class="modal-footer">
                <form method="post" id="delete_form" action="/users/0">
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
    window.choose_user = function(id) {
        $("#delete_form").attr('action', '/users/'+id+'/');
    }
</script>
@endsection
