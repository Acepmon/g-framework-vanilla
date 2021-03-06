@extends('themes.limitless.layouts.default')

@section('title', 'System Configuration')

@section('load')

@endsection

@section('pageheader')
    @include('admin.configs.includes.pageheader')
@endsection

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">@yield('title')</h5>
    </div>

    <div class="table-responsive">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Configuration</th>
                    <th>Key</th>
                    <th>Value</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($configs as $index => $config)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <strong>{{ $config->title }}</strong>
                        @if (!empty($config->description))
                        <p>{{ $config->description }}</p>
                        @endif
                    </td>
                    <td>{{ $config->key }}</td>
                    <td>{{ $config->value }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('admin.configs.edit', ['id' => $config->id]) }}" class="btn btn-light btn-xs" title="Edit Configuration"><span class="icon-pencil"></span></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')

@endsection
