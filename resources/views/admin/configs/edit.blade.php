@extends('themes.limitless.layouts.default')

@section('title', 'Edit Configuration')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/switch.min.js') }}"></script>
@endsection

@section('pageheader')
    @include('admin.configs.includes.pageheader')
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <form action="{{ route('admin.configs.update', ['id' => $config->id]) }}" method="POST">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">
                        Update Configuration
                    </h5>

                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    @method('PUT')
                    @csrf

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group @error('title') has-error has-feedback @enderror">
                        <label for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $config->title }}" placeholder="Configuration title here...">
                        @error('title')
                            <div class="form-control-feedback">
                                <i class="icon-notification2"></i>
                            </div>
                            <div class="help-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group @error('description') has-error has-feedback @enderror">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" value="{{ $config->description }}" placeholder="Configuration description here..." maxlength="255"></textarea>
                        @error('description')
                            <div class="form-control-feedback">
                                <i class="icon-notification2"></i>
                            </div>
                            <div class="help-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group @error('key') has-error has-feedback @enderror">
                        <label for="key">Unique keyword <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="key" id="key" value="{{ $config->key }}" placeholder="Unique keyword here..." disabled>
                        @error('key')
                            <div class="form-control-feedback">
                                <i class="icon-notification2"></i>
                            </div>
                            <div class="help-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group @error('value') has-error has-feedback @enderror">
                        <label for="value">Keyword Value <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="value" id="value" value="{{ $config->value }}" placeholder="Keyword value here...">
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
                                <input type="checkbox" value="1" name="autoload" id="autoload" class="switch" data-on-text="On" data-off-text="Off" {{ $config->autoload ? 'checked="checked"' : '' }}>
                            </label>
                        </div>
                        @error('autoload')
                            <div class="help-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            @if (\Str::startsWith($config->key, 'system'))
                            <a href="{{ route('admin.configs.system') }}" class="btn btn-default">List</a>
                            @elseif (\Str::startsWith($config->key, 'themes'))
                            <a href="{{ route('admin.configs.themes') }}" class="btn btn-default">List</a>
                            @elseif (\Str::startsWith($config->key, 'plugins'))
                            <a href="{{ route('admin.configs.plugins') }}" class="btn btn-default">List</a>
                            @elseif (\Str::startsWith($config->key, 'security'))
                            <a href="{{ route('admin.configs.security') }}" class="btn btn-default">List</a>
                            @elseif (\Str::startsWith($config->key, 'content'))
                            <a href="{{ route('admin.configs.contents') }}" class="btn btn-default">List</a>
                            @else
                            <a href="javascript:history.back()" class="btn btn-default">Back</a>
                            @endif
                        </div>
                        <div class="col-xs-6">
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

