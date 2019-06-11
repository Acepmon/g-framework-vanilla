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
                <form class="form-horizontal" action="/pages/{{$page->id}}" method="POST">
                @method('PUT')
                {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-lg-2">Title<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="title" placeholder="Enter page title..." value="{{$page->title}}" required="required" aria-required="true" invalid="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Slug<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="slug" placeholder="Enter page slug..." value="{{$page->slug}}" required="required" aria-required="true" invalid="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Content</label>
                        <div class="col-lg-10">
                            <textarea rows="5" cols="5" class="form-control" placeholder="Enter page content..." name="content">{{$page->content}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Status<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input id="status" type="text" class="form-control" name="status" placeholder="Enter page status..." value="{{$page->status}}" required aria-required="true" invalid="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Visibility<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input id="visibility" type="text" class="form-control" name="visibility" placeholder="Enter page visibility..." value="{{$page->visibility}}" required aria-required="true" invalid="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Author ID</label>
                        <div class="control-label col-lg-2">
                            <select class="selectbox" name="author_id" type="text" id="author_id" class="control-label" selected="{{$page->author_id}}">
                                <option value=""></option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->username}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="text-right">
                        <a href="javascript:history.back()" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
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
