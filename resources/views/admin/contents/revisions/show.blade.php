@extends('themes.limitless.layouts.default')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/editors/ace/ace.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">{{ ucfirst($content->type) }}s</span></h4>
    </div>

    <div class="header-elements">
        <a href="{{ route('admin.contents.create', ['type' => $content->type]) }}" class="btn btn-primary">Create New {{ ucfirst($content->type) }}</a>
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 mr-2"></i> Home</a>
            <a class="breadcrumb-item" href="{{ route('admin.contents.index', ['type' => $content->type]) }}">{{ ucfirst($content->type) }}s</a>
            <a class="breadcrumb-item" href="{{ route('admin.contents.show', ['id' => $content->id]) }}">Detail</a>
            <span class="breadcrumb-item active">Revision</span>
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
<!-- /page header -->
@endsection

@section('content')

<div class="card">
    @if (session('status'))
        <div id="timer" class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form action="route('admin.contents.revisions.update')">
        @method('PUT')
        @csrf
        <div class="card-header">
            <h5 class="card-title">
                <span class="text-semibold">{{ $content->title }}</span>
            </h5>
        </div>

        <div class="card-body">
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
            php_editor.setReadOnly(true);

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

