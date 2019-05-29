@extends('layouts.admin')

@section('load')
<script type="text/javascript" src="/assets/js/core/libraries/jquery_ui/core.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/selects/selectboxit.min.js"></script>

<script type="text/javascript" src="/assets/js/core/app.js"></script>
<script type="text/javascript" src="/assets/js/pages/form_selectbox.js"></script>
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
        <li><a href="/menus/"><i class="icon-home2 position-left"></i> Home</a></li>
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
                <h5 class="panel-title">Horizontal form</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('menus.store') }}">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-lg-2">Menu Type</label>
                        <div class="col-lg-10">
                            <select class="selectbox" name="type" type="text" id="type" value="{{ old('type') }}" required>
                                <option value="admin">admin</option>
                                <option value="car">car</option>
                                <option value="tour">tour</option>
                                <option value="default">default</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Menu Name</label>
                        <div class="col-lg-10">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Menu name" value="{{ old('name') }}" required autocomplete="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Menu URL</label>
                        <div class="col-lg-10">
                            <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" placeholder="Menu url" value="{{ old('url') }}" required autocomplete="url">
                            @error('url')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Parent ID</label>
                        <div class="col-lg-10">
                            <select class="selectbox" name="parent_id" type="text" id="type">
                                <option value=""></option>
                                @foreach($menus as $data)
                                <option value="{{$data -> id}}">{{$data -> name}}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Is published</label>
                        <div class="col-lg-10">
                            <div class="checkbox">
                                <label>
                                    <input id="published" type="checkbox" value="1" name="published" autocomplete="published">
                                    Published
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <a type="button" class="btn btn-primary" href='/menus' type="btn btn-primary"><i class="icon-arrow-left13 position-left"></i>Back</a>
                        <button type="submit" class="btn btn-success">Create menu
                            <i class="icon-arrow-right14 position-right"></i></button>
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
