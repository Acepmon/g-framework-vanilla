@extends('themes.limitless.layouts.default')

@section('load')
<!-- Theme JS files -->
<script type="text/javascript" src="{{ asset('limitless/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/pages/datatables_basic.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">User Details</span></h4>
    </div>

    <div class="heading-elements">
        <div class="heading-btn-group">
            <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
            <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
            <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
        </div>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="/"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="{{ route('admin.users.index') }}">Users</a></li>
        <li class="active">Detail</li>
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
                <li><a href="#"><i class="icon-gear"></i> All Settings</a></li>
            </ul>
        </li>
    </ul>
</div>
@endsection

@section('content')
<div class="has-detached-left">
    @include('admin.users.admin.includes.sidebar')

    <!-- Detached content -->
    <div class="container-detached">
        <div class="content-detached">

            <!-- Tab content -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="permissions">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title">User Permissions</h6>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li>
                                        <a href="{{ route('admin.users.permissions.create', ['id' => $user->id]) }}" class="text-white btn btn-primary">New Permission <i class="icon-add position-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <table class="table datatable-basic">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->title }}</td>
                                    <td>{{ $permission->description }}</td>
                                    <!---->
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="{{ route('admin.users.permissions.edit', ['user' => $user->id, 'permission' => $permission->id]) }}"><i class="icon-pencil"></i> Edit</a></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#modal_theme_danger" onclick="choose_permission({{ $permission->id }})"><i class="icon-trash"></i> Delete</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Add permission</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
                            <form method="post" class="form-horizontal form-validate-jquery" action="{{ route('admin.users.permissions.store', ['user' => $user->id]) }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Permission</label>
                                    <div class="col-lg-10">
                                        <select name="permission" type="text" class="form-control">
                                            @foreach($permissions as $permission)
                                            <option value="{{ $permission->id }}">{{ $permission->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </div>
                                </div>
							</form>
						</div>
					</div>
                </div>
            </div>
            <!-- /tab content -->

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
                <p>Are you sure you want to remove this permission?</p>
            </div>

            <div class="modal-footer">
                <form method="post" id="delete_form" action="{{ route('admin.users.index') }}">
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
    window.choose_permission = function(id) {
        $("#delete_form").attr('action', "/admin/users/{{ $user-> id}}/permissions/"+id);
    }
</script>
@endsection