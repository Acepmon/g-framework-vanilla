@extends('themes.limitless.layouts.default')

@section('load')
<!-- Theme JS files -->
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/datatables_basic.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="text-semibold">User Details</span></h4>
    </div>

    <div class="header-elements">
        <div class="heading-btn-group">
            <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
            <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
            <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
        </div>
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a href="{{ route('admin.menus.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a></li>
            <a href="{{ route('admin.users.index') }}" class="breadcrumb-item">Users</a>
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
@endsection

@section('content')
<div class="has-detached-left">
    @include('admin.users.includes.sidebar')

    <!-- Detached content -->
    <div class="container-detached">
        <div class="content-detached">

            <!-- Tab content -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="permissions">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h6 class="card-title">User Permissions</h6>
                            <div class="header-elements">
                                <a href="{{ route('admin.users.permissions.create', ['id' => $user->id]) }}" class="text-white btn btn-primary">New Permission <i class="icon-add position-right"></i></a>
                            </div>
                        </div>

                        <table class="table datatable-basic">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->allPermissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->title }}</td>
                                    <td>{{ $permission->type }}</td>
                                    <td>{{ $permission->description }}</td>
                                    <!---->
                                    <td class="text-center">
                                        <a href="#" data-toggle="dropdown">
                                            <i class="icon-menu9 text-secondary"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('admin.users.permissions.edit', ['user' => $user->id, 'permission' => $permission->id]) }}"><i class="icon-pencil"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_theme_danger" onclick="choose_permission({{ $permission->id }})"><i class="icon-trash"></i> Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

					<div class="card">
						<div class="card-header header-elements-inline">
							<h5 class="card-title">Add permission</h5>
							<div class="header-elements">
								<div class="list-icons">
			                		<a class="list-icons-item" data-action="collapse"></a></li>
			                		<a class="list-icons-item" data-action="reload"></a></li>
			                		<a class="list-icons-item" data-action="remove"></a></li>
			                	</div>
		                	</div>
						</div>

						<div class="card-body">
                            <form method="post" class="form-horizontal form-validate-jquery" action="{{ route('admin.users.permissions.store', ['user' => $user->id]) }}">
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Permission</label>
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
