@extends('admin.layouts.default')

@section('load')
<script type="text/javascript" src="/assets/js/plugins/editors/ace/ace.js"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">{{ ucfirst($content->type) }}s</span></h4>
    </div>

    <div class="heading-elements">
        <a href="{{ route('admin.contents.create', ['type' => $content->type]) }}" class="btn btn-primary">Create New {{ ucfirst($content->type) }}</a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="{{ route('admin.contents.index', ['type' => $content->type]) }}">{{ ucfirst($content->type) }}s</a></li>
        <li><a href="{{ route('admin.contents.show', ['id' => $content->id]) }}">Detail</a></li>
        <li class="active">Revision</li>
    </ul>

    <ul class="breadcrumb-elements">
        <li><a href="#"><i class="icon-comment-discussion position-left"></i> Link</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-gear position-left"></i>
                Dropdown
                <span class="caret"></span>
            </a>

            <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
            </ul>
        </li>
    </ul>
</div>
<!-- /page header -->
@endsection

@section('content')

<div class="panel panel-flat">
    @if (session('status'))
        <div id="timer" class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form action="route('admin.contents.revisions.update')">
        @method('PUT')
        @csrf
        <div class="panel-heading">
            <h5 class="panel-title">
                <span class="text-semibold">{{ $content->title }}</span>
            </h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><button type="button" data-target="{{ $revision_path }}" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> Saving" class="btn btn-primary btn-sm btn-loading">Update</button></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <div id="php_editor">{{ file_get_contents(base_path($revision_path)) }}</div>
        </div>
    </form>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
        var php_editor = ace.edit("php_editor");
            php_editor.setTheme("ace/theme/monokai");
            php_editor.getSession().setMode("ace/mode/php");
            php_editor.setShowPrintMargin(false);

        $('.btn-loading').click(function () {
            var btn = $(this);
            var target = $(this).data("target");
            var content = php_editor.getSession().getValue();
            btn.button('loading');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route("admin.contents.revisions.update", ['id' => $content->id, 'revision' => $revision->id]) }}',
                type: "PUT",
                data: {
                    revision_path: target,
                    content: content
                },
                success: function () {
                    btn.button('reset');
                }
            });
        });
    });
</script>
@endsection

