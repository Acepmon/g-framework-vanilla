@extends('layouts.admin')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">{{ ucfirst(Session::get('type')) }} Detail</span></h4>
    </div>

    <div class="heading-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="{{ route('admin.contents.index') }}">{{ ucfirst(Session::get('type')) }}s</a></li>
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
    <div class="col-md-7">

        <!-- Horizontal form -->
        <div class="panel panel-flat">
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-lg-2">Title</label>
                    <div class="col-lg-10">
                        <label class="control-label col-lg-2">{{$content->title}}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Slug</label>
                    <div class="col-lg-10">
                        <label class="control-label col-lg-2">{{$content->slug}}</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Type</label>
                    <div class="col-lg-10">
                        <label class="control-label col-lg-2">{{$content->type}}</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Status</label>
                    <div class="col-lg-10">
                        <label class="control-label col-lg-2">{{$content->status}}</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Visibility</label>
                    <div class="col-lg-10">
                        <label class="control-label col-lg-2">{{$content->visibility}}</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Author id</label>
                    <div class="col-lg-10">
                        <label class="control-label col-lg-2">{{$content->author_id}}</label>
                    </div>
                </div>
                <div class="text-right" style="padding-bottom: 5px">
                    <a href="{{ route('admin.contents.index') }}" class="btn btn-default">Back</a>
                    <a href="{{ route('admin.contents.edit', ['id' => $content->id]) }}" class="btn btn-default">Edit</a>
                </div>
            </div>
        </div>
        <!-- /horizotal form -->

        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title text-semiold">Comments</h6>
                <div class="heading-elements">
                    <ul class="list-inline list-inline-separate heading-text text-muted">
                        <li>{{ count($content->comments) }} comments</li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <ul class="media-list stack-media-on-mobile">
                    @foreach($content->comments->where('parent_id', NULL) as $comment)
                    <li class="media">
                        @include('admin.comments.includes.comment', ['comment' => $comment])
                    </li>
                    @endforeach()
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="text-right" style="padding-bottom: 5px">
            <a href="{{ route('admin.contents.metas.create', ['id' => $content->id]) }}" class="btn btn-primary">Create Content Metas</a>
        </div>
        <div class="panel panel-flat">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Key</th>
                            <th>Value</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($content->metas as $meta)
                        <tr>
                            <td>{{$meta->id}}</td>
                            <td>{{$meta->key}}</td>
                            <td>{{$meta->value}}</td>
                            <td width="250px">
                                <div class="btn-group">
                                    <form action="{{ route('admin.contents.metas.edit', ['content' => $content->id, 'meta' => $meta->id]) }}" method="GET" style="float: left; margin-right: 5px">
                                        <button type="submit" class="btn btn-default">Edit</button>
                                    </form>
                                    <button data-toggle="modal" data-target="#modal_theme_danger" class="btn btn-default" onclick="delete_meta( {{$meta->id}} , {{$content->id}})">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /grid -->


@endsection

@section('script')
@endsection