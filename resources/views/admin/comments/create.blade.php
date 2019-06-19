@extends('layouts.admin')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Starters</span> - 2 Columns</h4>
    </div>

    <div class="heading-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="2_col.html">Starters</a></li>
        <li class="active">2 columns</li>
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

<!-- Grid -->
<div class="row">
    <div class="col-md-6">

        <!-- Horizontal form -->
        <div class="panel panel-flat">
            <div class="panel-body">
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

                    <div class="form-group">
                        <label class="control-label col-lg-2">Comment <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="content" placeholder="Enter comment..." required="required" aria-required="true" invalid="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Type <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="type" placeholder="Enter comment type..." required="required" aria-required="true" invalid="true" value="comment">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Author id <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="author_id" placeholder="Enter author ip..." required="required" aria-required="true" invalid="true" value="1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Author IP <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="author_ip" placeholder="Enter author ip..." required="required" aria-required="true" invalid="true" value="127.0.0.1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Author Name <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="author_name" placeholder="Enter author name..." required="required" aria-required="true" invalid="true" value="Author">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Author Avatar <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="author_avatar" placeholder="Enter author avatar..." required="required" aria-required="true" invalid="true" value="/assets/images/placeholder.jpg">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Author Email <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="author_email" placeholder="Enter author email..." required="required" aria-required="true" invalid="true" value="user@example.com">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Author User Agent <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="author_user_agent" placeholder="Enter author user agent..." required="required" aria-required="true" invalid="true" value="Firefox">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Commentable id <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="commentable_id" placeholder="Enter commentable id..." required="required" aria-required="true" invalid="true" value="1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Commentable Type <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="commentable_type" placeholder="Enter commentable type..." required="required" aria-required="true" invalid="true" value="App\Content">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Parent ID <span class="text-danger">*</span></label>
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