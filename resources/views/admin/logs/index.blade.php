@extends('layouts.admin')

@section('title', $exists ? $filename : 'Error Logs')

@section('load')

@endsection

@section('pageheader')
    @include('admin.logs.includes.pageheader')
@endsection

@section('content')
<div class="sidebar-detached">
    <div class="sidebar sidebar-default">
        <div class="sidebar-content">
            <div class="sidebar-category">
                <div class="category-title">
                    <span>Laravel Logs</span>
                    <ul class="icons-list">
                        <li><a href="#" data-action="collapse"></a></li>
                    </ul>
                </div>

                <div class="category-content no-padding">
                    <ul class="navigation navigation-alt navigation-accordion">
                        @foreach ($logs as $index => $log)
                        <li class="{{ $filename == $log['filename'] ? 'active' : '' }}">
                            <a href="{{ route('admin.logs.index', ['file' => $log['filename']]) }}">
                                {{ $log['filename'] }}
                                @if ($log['is_today']) <span class="label label-primary">today</span> @endif
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-detached">
    <div class="content-detached">
        @if ($exists)
            <pre><code>{!! $file_contents !!}</code></pre>
        @else
            <div class="alert alert-danger">
                <p><strong>Error!</strong> Log file doesn't exist.</p>
            </div>
        @endif
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $("body").addClass('has-detached-left');
    });
</script>
@endsection

