@extends('themes.limitless.layouts.default')

@section('load')
<!-- Theme JS files -->
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/validation/validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/switch.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/uniform.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/form_validation.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">User Details</span></h4>
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
<div class="d-md-flex align-items-md-start">
    @include('admin.users.includes.sidebar')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">


					<!-- Form horizontal -->
					<div class="card">
						<div class="card-header header-elements-inline">
							<h5 class="card-title">Create new permission</h5>
							<div class="header-elements">
								<div class="list-icons">
			                		<a class="list-icons-item" data-action="collapse"></a>
			                		<a class="list-icons-item" data-action="reload"></a>
			                		<a class="list-icons-item" data-action="remove"></a>
			                	</div>
		                	</div>
						</div>

						<div class="card-body">
                            <form method="post" class="form-horizontal form-validate-jquery" action="{{ route('admin.users.permissions.store', ['user' => $user->id]) }}">
                                {{ csrf_field() }}

                                @if(Session::has('error'))
                                <div class="alert alert-danger no-border">
                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                                    {{ session('error') }}
                                </div>
                                @endif

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Title <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input name="title" type="text" class="form-control" required="true" placeholder="Permission Title...">
                                    </div>
                                </div>
                                            
                                <div class="form-group row">
                                    <label for="type" class="col-form-label col-lg-2">Type</label>
                                    <div class="col-lg-10">
                                        <select id="type" name="type" required="required" class="form-control text-capitalize">
                                            @foreach(App\Permission::TYPE_ARRAY as $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Description</label>
                                    <div class="col-lg-10">
                                        <input name="description" type="text" class="form-control" placeholder="Permission Value...">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="text-left">
                                            <a href="{{ route('admin.users.permissions.index', ['user' => $user->id]) }}" class="btn btn-light"><i class="icon-arrow-left52 position-left"></i> Back</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </div>
                                </div>
							</form>
						</div>
					</div>
            </div>
            <!-- /tab content -->

        </div>
    </div>
</div>

@endsection

@section('script')

<script>
</script>
@endsection
