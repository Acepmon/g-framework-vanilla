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
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="{{ route('admin.menus.index') }}"><i class="icon-home2 position-left"></i> Home</a></li>
    </ul>
</div>
@endsection

@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Create New Menu</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <form class="" method="POST" action="{{ route('admin.menus.store') }}">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title" class="control-label">Title</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Menu title" value="{{ old('title') }}" required autocomplete="title">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="link" class="control-label">Link</label>
                        <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" placeholder="Menu link" value="{{ old('link') }}" required autocomplete="link">
                        @error('link')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="icon" class="control-label">Icon</label>
                        <input id="icon" type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" placeholder="Menu icon" value="{{ old('icon') }}" required autocomplete="icon">
                        @error('icon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="parent_id" class="control-label">Parent ID</label>
                        <select class="selectbox" name="parent_id" type="text" id="parent_id">
                            <option value=""></option>
                            @foreach($menus as $data)
                            <option value="{{$data->id}}">{{$data->title}}</option>
                            @endforeach
                        </select>
                        @error('parent_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="type" class="control-label">Type</label>
                        <select class="selectbox" id="type" name="type" type="text" value="{{ old('type') }}" required>
                            @foreach(App\Menu::TYPE_ARRAY as $value)
                            <option value="{{ $value }}">{{ ucfirst($value) }}</option>
                            @endforeach
                        </select>
                        @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="order" class="control-label">Order</label>
                        <input id="order" type="text" class="form-control @error('order') is-invalid @enderror" name="order" placeholder="Menu order" value="{{ old('order') }}" required autocomplete="order">
                        @error('order')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sublevel" class="control-label">Sublevel</label>
                        <input id="sublevel" type="text" class="form-control @error('sublevel') is-invalid @enderror" name="sublevel" placeholder="Menu sublevel" value="{{ old('sublevel') }}" required autocomplete="sublevel">
                        @error('sublevel')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="text-right">
                <a class="btn btn-default" href="javascript:history.back()" type="btn btn-primary"><i class="icon-arrow-left13 position-left"></i>Back</a>
                <button type="submit" class="btn btn-success">Create menu
                    <i class="icon-arrow-right14 position-right"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
@endsection
