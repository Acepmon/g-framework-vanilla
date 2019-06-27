@extends('admin.layouts.default')

@section('load')
<!-- Theme JS files -->
<script type="text/javascript" src="/assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="/assets/js/pages/datatables_basic.js"></script>
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
        <li><a href="{{ route('admin.profile.index') }}">profile</a></li>
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
                <li><a href="#"><i class="icon-gear"></i> All pages</a></li>
            </ul>
        </li>
    </ul>
</div>
@endsection

@section('content')
<div class="has-detached-left">
    @include('admin.profile.admin.includes.sidebar')

    <!-- Detached content -->
    <div class="container-detached">
        <div class="content-detached">

            <!-- Tab content -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="contents">
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Page Detail</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
                            <div class="form-group">
                                <b class="control-label col-lg-1 text-right">Title</b>
                                <div class="col-lg-11">
                                    <label>{{ $content->title }}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <b class="control-label col-lg-1 text-right">Slug</b>
                                <div class="col-lg-11">
                                    <label>{{ $content->slug }}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <b class="control-label col-lg-1 text-right">Author</b>
                                <div class="col-lg-11">
                                    <a href="{{ route('admin.profile.show', ['id' => $user->id]) }}">{{ $user->name }}</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <b class="control-label col-lg-1 text-right">Type</b>
                                <div class="col-lg-11">
                                    <label>{{ $content->type }}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <b class="control-label col-lg-1 text-right">Status</b>
                                <div class="col-lg-11">
                                    <label>{{ $content->status }}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <b class="control-label col-lg-1 text-right">Visibility</b>
                                <div class="col-lg-11">
                                    <label>{{ $content->visibility }}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <b class="control-label col-lg-1 text-right">Created At</b>
                                <div class="col-lg-11">
                                    <label>{{ $content->created_at }}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <b class="control-label col-lg-1 text-right">Updated At</b>
                                <div class="col-lg-11">
                                    <label>{{ $content->updated_at }}</label>
                                </div>
                            </div>

                            <br/>
                            <div class="text-left">
                                <a href="{{ route('admin.profile.contents.index', ['user' => $user->id]) }}" class="btn btn-default"><i class="icon-arrow-left52 position-left"></i> Back</a>
                            </div>
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
