@extends('themes.limitless.layouts.default')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content header-element-md-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Plugin</span> Show Page</h4>
        <a href="#" class="header-elements-toggle text-default d-md-none">
            <i class="icon-more"></i>
        </a>
    </div>

    <div class="heading-elements d-none">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a href="/plugins/"><i class="icon-home2 mr-2"></i> Home</a>
            <span class="breadcrumb-item active">Plugins</span>
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
            <div class="card-header header-elements-md-inline">
                <h5 class="card-title">Horizontal form</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form class="form-horizontal" method="POST" action="/plugins/{{ $plugin->id }}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Title</label>
                        <div class="col-lg-10">
                            {{$plugin->title}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Description</label>
                        <div class="col-lg-10">
                            {{$plugin->description}}
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="javascript:history.back()" class="btn btn-primary" ><i class="icon-arrow-left13 position-left"></i> Back</a>

                        <!-- <a type="submit" class="btn btn-danger">Delete form </i></a> -->
                        <a type="button" href="{{ route('admin.plugins.edit', ['id' => $plugin->id]) }}" class="btn btn-warning">Edit</i> <i class="icon-arrow-right14 position-left"></i> </a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /horizotal form -->

    </div>

    <div class="col-md-6">

        <!-- /vertical form -->

    </div>
</div>
<!-- /grid -->


@endsection

@section('script')
@endsection
