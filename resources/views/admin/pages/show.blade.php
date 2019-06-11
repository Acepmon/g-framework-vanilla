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
                <div class="form-group">
                    <label class="control-label col-lg-2">Title</label>
                    <div class="col-lg-10">
                        <label class="control-label col-lg-2">{{$page->title}}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Slug</label>
                    <div class="col-lg-10">
                        <label class="control-label col-lg-2">{{$page->slug}}</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Content</label>
                    <div class="col-lg-10">
                        <label class="control-label col-lg-2">{{$page->content}}</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Status</label>
                    <div class="col-lg-10">
                        <label class="control-label col-lg-2">{{$page->status}}</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Visibility</label>
                    <div class="col-lg-10">
                        <label class="control-label col-lg-2">{{$page->visibility}}</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Author id</label>
                    <div class="col-lg-10">
                        <label class="control-label col-lg-2">{{$page->author_id}}</label>
                    </div>
                </div>
                <div class="text-right" style="padding-bottom: 5px">
                    <a href="javascript:history.back()" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
        <!-- /horizotal form -->

    </div>
</div>
<!-- /grid -->


@endsection

@section('script')
@endsection
