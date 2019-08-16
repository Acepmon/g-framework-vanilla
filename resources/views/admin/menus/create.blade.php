@extends('themes.limitless.layouts.default')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/extensions/jquery_ui/core.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>

<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/multiselect.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/form_select2.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Menu</span> Create Page</h4>
        <a href="#" class="header-elements-toggle text-default d-md-none">
            <i class="icon-more"></i>
        </a>
    </div>

    <div class="header-elements">
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a href="{{ route('admin.menus.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a></li>
            <span class="breadcrumb-item active">Menu</span>
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
@endsection

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Create New Menu</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form class="" method="POST" action="{{ route('admin.menus.store') }}">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title" class="col-form-label">Title</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Menu title" value="{{ old('title') }}" required autocomplete="title">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="subtitle" class="col-form-label">Subtitle</label>
                        <input id="subtitle" type="text" class="form-control @error('title') is-invalid @enderror" name="subtitle" placeholder="Menu subtitle" value="{{ old('subtitle') }}" required autocomplete="subtitle">
                        @error('subtitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="link" class="col-form-label">Link</label>
                        <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" placeholder="Menu link" value="{{ old('link') }}" required autocomplete="link">
                        @error('link')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="icon" class="col-form-label">Icon</label>
                        <input id="icon" type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" placeholder="Menu icon" value="{{ old('icon') }}" required autocomplete="icon">
                        @error('icon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="parent_id" class="col-form-label">Parent ID</label>
                        <select class="form-control" name="parent_id" type="text" id="parent_id">
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
                        <label for="type" class="col-form-label">Type</label>
                        <select class="form-control" id="type" name="type" type="text" value="{{ old('type') }}" required>
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
                        <label for="status" class="col-form-label">Status</label>
                        <select id="status" name="status" type="text" value="{{ old('status') }}" required class="form-control">
                            @foreach(App\Menu::STATUS_ARRAY as $value)
                            <option value="{{ $value }}">{{ ucfirst($value) }}</option>
                            @endforeach
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="visibility" class="col-form-label">Visibility</label>
                        <select id="visibility" name="visibility" type="text" value="{{ old('visibility') }}" required class="form-control">
                            @foreach(App\Menu::VISIBILITY_ARRAY as $value)
                            <option value="{{ $value }}">{{ ucfirst($value) }}</option>
                            @endforeach
                        </select>
                        @error('visibility')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="order" class="col-form-label">Order</label>
                        <input id="order" type="text" class="form-control @error('order') is-invalid @enderror" name="order" placeholder="Menu order" value="{{ old('order') }}" required autocomplete="order">
                        @error('order')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sublevel" class="col-form-label">Sublevel</label>
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
                <a class="btn btn-default" href="javascript:history.back()" type="btn btn-primary"><i class="icon-arrow-left13 mr-1"></i>Back</a>
                <button type="submit" class="btn btn-success">Create menu
                    <i class="icon-arrow-right14 mr-2"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
@endsection
