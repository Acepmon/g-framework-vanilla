@extends('themes.limitless.layouts.default')

@section('load')
{{--<!-- Theme JS files -->--}}
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/switch.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/form_checkboxes_radios.js') }}"></script>
<!-- /theme JS files -->
@endsection

@section('pageheader')
<div class="page-header-content header-elements-md-inline">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="font-weight-semibold">Menu</span> Create Page</h4>
    </div>

    <div class="header-elements d-none">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i
                    class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a href="/plugin/" class="breadcrumb-item"><i class="icon-home2 ml-2"></i> Home</a>
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
    <div class="col-md-12">

        <!-- Horizontal form -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Horizontal form</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <!-- <form method="put" action="" class="form-horizontal"> -->
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('admin.plugins.update', $plugin->id) }}">
                    @csrf
                    @method ('PUT')
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Title</label>
                            <div class="col-lg-10">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" value="{{ $plugin->title }}" required autocomplete="title" autofocus>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Description</label>
                            <div class="col-lg-10">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description" value="{{ $plugin->description }}" required autocomplete="description" autofocus>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Repository</label>
                            <div class="col-lg-10">
                                <input id="repository" type="text" class="form-control @error('repository') is-invalid @enderror" name="repository" placeholder="Repository" value="{{ $plugin->repository }}" required autocomplete="repository">
                                @error('repository')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Edit plugin<i class="icon-arrow-right14 position-right"></i></button>
                        </div>
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
