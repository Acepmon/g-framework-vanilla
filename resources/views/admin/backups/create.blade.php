@extends('themes.limitless.layouts.default')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/js/core/libraries/jquery_ui/core.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/selects/selectboxit.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/pages/form_selectbox.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Menu</span> Create Page</h4>
    </div>

    <div class="heading-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i
                    class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="/backups/"><i class="icon-home2 position-left"></i> Home</a></li>
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
            <div class="panel-heading">
                <h5 class="panel-title">Create backup</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('admin.backups.store') }}">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-lg-2">Title</label>
                        <div class="col-lg-10">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" value="{{ old('title') }}" required autocomplete="title">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Description</label>
                        <div class="col-lg-10">
                            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description" value="{{ old('description') }}" required autocomplete="description"></textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label class="control-label col-lg-2">Repository</label>--}}
                        {{--<div class="col-lg-10">--}}
                            {{--<input id="repository" type="text" class="form-control @error('repository') is-invalid @enderror" name="repository" placeholder="Repository" value="{{ old('repository') }}" required autocomplete="repository">--}}
                            {{--@error('repository')--}}
                            {{--<span class="invalid-feedback" role="alert">--}}
                                {{--<strong>{{ $message }}</strong>--}}
                            {{--</span>--}}
                            {{--@enderror--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="text-right">
                        <a class="btn btn-primary" href="javascript:history.back()" type="btn btn-primary"><i class="icon-arrow-left13 position-left"></i>Back</a>
                        <button type="submit" class="btn btn-success">Create backup</button>
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