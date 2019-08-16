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
                <div class="tab-pane fade in active" id="contents">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">Contents</h6>
                        </div>

                        <table class="table datatable-basic">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="20%">Title</th>
                                    <th width="20%">Slug</th>
                                    <th width="10%">Type</th>
                                    <th width="10%">Status</th>
                                    <th width="10%">Visibility</th>
                                    <th width="15%">Created At</th>
                                    <th width="10%" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->contents->where('type', Session::get('type')) as $content)
                                <tr>
                                    <td>{{ $content->id }}</td>
                                    <td>{{ $content->title }}</td>
                                    <td>{{ $content->slug }}</td>
                                    <td>{{ $content->type }}</td>
                                    <td>{{ $content->status }}</td>
                                    <td>{{ $content->visibility }}</td>
                                    <td>{{ $content->created_at }}</td>
                                    <!---->
                                    <td class="text-center">
                                        <a href="{{ route('admin.users.contents.show', ['user' => $user->id, 'content' => $content->id]) }}" class="btn btn-default">Show more</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
