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
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Menu</span> Edit Page</h4>
    </div>

    <div class="heading-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
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
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('menus.update', $menu -> id) }}">
                    @csrf
                    @method ('PUT')
                    <div class="form-group">
                        <label class="control-label col-lg-2">Menu Type</label>
                        <div class="col-lg-10">
                            <select class="selectbox" name="type" type="text" id="type" value="{{ $menu -> type }}" required autofocus>
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
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Menu name" value="{{ $menu -> name }}" required autocomplete="name" autofocus>
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
                            <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" placeholder="Menu url" value="{{ $menu -> url }}" required autocomplete="url" autofocus>
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
                            <select class="selectbox" name="parent_id" type="text" value="{{ $menu -> parent_id }}" id="type" required autofocus>
                                <option value=""></option>
                                @foreach($menus as $data)
                                <option value="{{$data -> id}}" {{$menu -> parent_id == $data -> id ? 'selected':''}}>{{$data -> name}}</option>
                                @endforeach
                            </select>

                            <!--                            <input id="parent_id" type="text" class="form-control @error('parent_id') is-invalid @enderror" name="parent_id" placeholder="Parent id" value="{{ old('parent_id') }}" autocomplete="parent_id" autofocus>-->
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
                                    <input id="published" type="checkbox" value="1" name="published" autocomplete="published" {{$menu -> published == 1 ? 'checked':''}} autofocus>
                                    Published
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Edit menu<i class="icon-arrow-right14 position-right"></i></button>
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
