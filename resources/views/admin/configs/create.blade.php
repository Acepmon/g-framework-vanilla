@extends('themes.limitless.layouts.default')

@section('title', 'Register New Configuration')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/switch.min.js') }}"></script>
@endsection

@section('pageheader')
    @include('admin.configs.includes.pageheader')
@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <form action="{{ route('admin.configs.store') }}" method="POST">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">
                        Register New Configuration
                    </h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @csrf

                    <div class="form-group @error('title') has-error has-feedback @enderror">
                        <label for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Configuration title here...">
                        @error('title')
                            <div class="form-control-feedback">
                                <i class="icon-notification2"></i>
                            </div>
                            <div class="help-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group @error('description') has-error has-feedback @enderror">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" value="{{ old('description') }}" placeholder="Configuration description here..." maxlength="255"></textarea>
                        @error('description')
                            <div class="form-control-feedback">
                                <i class="icon-notification2"></i>
                            </div>
                            <div class="help-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group @error('key_module') has-error has-feedback @enderror @error('key_component') has-error has-feedback @enderror @error('key_function') has-error has-feedback @enderror">
                        <label for="key">Unique keyword <span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col-md-4">
                                <select name="key_module" id="key_module" class="form-control text-capitalize" required>
                                    @foreach (\App\Config::MODULE_ARRAY as $module)
                                        <option value="{{$module}}">{{$module}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="key_component" id="key_component" value="{{ old('key_component') }}" placeholder="Key component here...">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="key_function" id="key_function" value="{{ old('key_function') }}" placeholder="Key function here...">
                            </div>
                        </div>
                        @error('key_module')
                            <div class="form-control-feedback">
                                <i class="icon-notification2"></i>
                            </div>
                            <div class="help-block">{{ $message }}</div>
                        @enderror
                        @error('key_component')
                            <div class="form-control-feedback">
                                <i class="icon-notification2"></i>
                            </div>
                            <div class="help-block">{{ $message }}</div>
                        @enderror
                        @error('key_function')
                            <div class="form-control-feedback">
                                <i class="icon-notification2"></i>
                            </div>
                            <div class="help-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group @error('value') has-error has-feedback @enderror">
                        <label for="value">Keyword Value <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="value" id="value" value="{{ old('value') }}" placeholder="Keyword value here...">
                        @error('value')
                            <div class="form-control-feedback">
                                <i class="icon-notification2"></i>
                            </div>
                            <div class="help-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group @error('autoload') has-error has-feedback @enderror">
                        <label for="autoload" class="display-block">Autoload:</label>

                        <div class="checkbox checkbox-switch">
                            <label>
                                <input type="checkbox" value="1" name="autoload" id="autoload" class="switch" data-on-text="On" data-off-text="Off" checked="checked">
                            </label>
                        </div>
                        @error('autoload')
                            <div class="help-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="javascript:history.back()" class="btn btn-default">Back</a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        // Bootstrap switch
        // ------------------------------

        $(".switch").bootstrapSwitch();
    });
</script>
@endsection
