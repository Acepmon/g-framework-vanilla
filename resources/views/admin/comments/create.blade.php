@extends('themes.limitless.layouts.default')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Create Comment</span></h4>
    </div>

    <div class="header-elements">
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 mr-2"></i> Home</a>
            <a class="breadcrumb-item" href="{{ route('admin.comments.index') }}"><i class="icon-home2 mr-2"></i> Comments</a>
            <span class="breadcrumb-item active">Create</span>
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
<!-- /page header -->
@endsection

@section('content')

<!-- Grid -->
<div class="row">
    <div class="col-md-6">

        <!-- Horizontal form -->
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.comments.store') }}" method="POST">
                    @csrf

                    @if(Session::has('error'))
                    <div class="alert alert-danger no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                        {{ session('error') }}
                    </div>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger no-border">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                            {{ $error }}
                        </div>
                        @endforeach
                    @endif

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Comment <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="content" placeholder="Enter comment..." required="required" aria-required="true" invalid="true">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Type <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="type" placeholder="Enter comment type..." required="required" aria-required="true" invalid="true" value="comment">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Author id <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="author_id" placeholder="Enter author ip..." required="required" aria-required="true" invalid="true" value="1">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Author IP <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="author_ip" placeholder="Enter author ip..." required="required" aria-required="true" invalid="true" value="127.0.0.1">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Author Name <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="author_name" placeholder="Enter author name..." required="required" aria-required="true" invalid="true" value="Author">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Author Avatar <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="author_avatar" placeholder="Enter author avatar..." required="required" aria-required="true" invalid="true" value="{{ asset('limitless/images/placeholder.jpg') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Author Email <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="author_email" placeholder="Enter author email..." required="required" aria-required="true" invalid="true" value="user@example.com">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Author User Agent <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="author_user_agent" placeholder="Enter author user agent..." required="required" aria-required="true" invalid="true" value="Firefox">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Commentable id <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="commentable_id" placeholder="Enter commentable id..." required="required" aria-required="true" invalid="true" value="1">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Commentable Type <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="commentable_type" placeholder="Enter commentable type..." required="required" aria-required="true" invalid="true" value="App\Content">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Parent ID</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="parent_id" placeholder="Enter parent id..."  aria-required="true" invalid="true">
                        </div>
                    </div>

                    <div class="text-right">
                        <a href="javascript:history.back()" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /horizotal form -->

    </div>
</div>
<!-- /grid -->
@endsection

@section('script')
@endsection
