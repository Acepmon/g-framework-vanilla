@extends('themes.limitless.layouts.default')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 ml-2"></i> <span class="font-weight-semibold">Cars</span></h4>
    </div>

    <div class="header-elements d-none">
        <a href="{{ route('admin.cars.create', ['type' => Request::get('type')]) }}" class="btn btn-labeled bg-blue heading-btn">Create New Car</a>
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a href="index.html" class="breadcrumb-item"><i class="icon-home2 position-left"></i> Home</a></li>
            <span class="breadcrumb-item active">Cars</span>
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

<div class="card">
    @if (session('status'))
        <div id="timer" class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Visibility</th>
                    <th>Author Id</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($contents as $content)
                <tr>
                    <td>{{$content->id}}</td>
                    <td>{{$content->title}}</td>
                    <td>
                        <a href="{{url($content->slug)}}" target="_blank">{{$content->slug}}</a>
                    </td>
                    <td>{{$content->type}}</td>
                    <td>{{$content->status}}</td>
                    <td>{{$content->visibility}}</td>
                    <td>{{$content->author_id}}</td>
                    <td width="250px">
                        <div class="btn-group">
                            <form action="{{ route('admin.cars.show', ['id' => $content->id]) }}" method="GET" style="float: left; margin-right: 5px">
                                <button type="submit" class="btn btn-default">View</button>
                            </form>
                            <form action="{{ route('admin.cars.edit', ['id' => $content->id]) }}" method="GET" style="float: left; margin-right: 5px">
                                <button type="submit" class="btn btn-default">Edit</button>
                            </form>
                            <button data-toggle="modal" data-target="#modal_theme_danger" class="btn btn-default" onclick="delete_content({{ $content->id }})">Delete</button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
@endsection

