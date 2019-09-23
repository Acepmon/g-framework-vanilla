@extends('themes.limitless.layouts.default')

@section('load')
<!-- Theme JS files -->
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/datatables_basic.js') }}"></script>
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
            <a href="{{ route('admin.profile.index') }}" class="breadcrumb-item">Users</a>
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
    @include('admin.profile.includes.sidebar')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
					<div class="card">
						<div class="card-header header-elements-inline">
							<h5 class="card-title">Page Detail</h5>
							<div class="header-elements">
								<div class="list-icons">
			                		<a class="list-icons-item" data-action="collapse"></a>
			                		<a class="list-icons-item" data-action="reload"></a>
			                		<a class="list-icons-item" data-action="close"></a>
			                	</div>
		                	</div>
						</div>

						<div class="card-body">
                            <div class="form-group row">
                                <b class="col-form-label col-lg-1 text-right">Title</b>
                                <div class="col-lg-11">
                                    <label>{{ $content->title }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <b class="col-form-label col-lg-1 text-right">Slug</b>
                                <div class="col-lg-11">
                                    <label>{{ $content->slug }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <b class="col-form-label col-lg-1 text-right">Author</b>
                                <div class="col-lg-11">
                                    <a href="{{ route('admin.profile.show', ['id' => $user->id]) }}">{{ $user->name }}</a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <b class="col-form-label col-lg-1 text-right">Type</b>
                                <div class="col-lg-11">
                                    <label>{{ $content->type }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <b class="col-form-label col-lg-1 text-right">Status</b>
                                <div class="col-lg-11">
                                    <label>{{ $content->status }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <b class="col-form-label col-lg-1 text-right">Visibility</b>
                                <div class="col-lg-11">
                                    <label>{{ $content->visibility }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <b class="col-form-label col-lg-1 text-right">Created At</b>
                                <div class="col-lg-11">
                                    <label>{{ $content->created_at }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <b class="col-form-label col-lg-1 text-right">Updated At</b>
                                <div class="col-lg-11">
                                    <label>{{ $content->updated_at }}</label>
                                </div>
                            </div>

                            <br/>
                            <div class="text-left">
                                <a href="{{ route('admin.profile.contents.index', ['user' => $user->id]) }}" class="btn btn-light"><i class="icon-arrow-left52 position-left"></i> Back</a>
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
                <p>Are you sure you want to remove this content?</p>
            </div>

            <div class="modal-footer">
                <form method="post" id="delete_form" action="{{ route('admin.profile.index') }}">
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
    window.choose_content = function(id) {
        $("#delete_form").attr('action', "/admin/profile/{{ $user-> id}}/contents/"+id);
    }
</script>
@endsection
