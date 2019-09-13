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
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="text-semibold">Backups</span></h4>
    </div>

    <div class="header-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i
                    class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a></li>
            <a href="#" class="breadcrumb-item active">Backups</a>
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
            <div class="card-header header-elements-inline">
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
                <form class="form-horizontal" method="POST" action="{{ route('admin.backups.update', $backup->id) }}">
                    @csrf
                    @method ('PUT')
                    <div class="col-lg-9">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Title</label>
                            <div class="col-lg-10">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" value="{{ $backup->title }}" required autocomplete="title" autofocus>
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
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description" value="{{ $backup->description }}" required autocomplete="description" autofocus>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Edit backup<i class="icon-arrow-right14 position-right"></i></button>
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
