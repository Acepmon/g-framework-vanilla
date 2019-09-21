@extends('themes.limitless.layouts.default')

@section('title', 'Base Configuration')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/editors/ace/ace.js') }}"></script>
@endsection

@section('pageheader')
    @include('admin.configs.includes.pageheader')
@endsection

@section('content')
<div class="card-group-control card-group-control-left" id="accordion-control">
    @foreach ($configs as $config)
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">
                <a data-toggle="collapse" class="text-default text-capitalize collapsed" href="#accordion-control-group-{{$config}}">{{$config}}</a>
            </h6>

            <div class="header-elements">
                <button type="button" data-target="{{$config}}" data-initial-text="<span class='icon-floppy-disk mr-2'></span> Save" data-loading-text="<span class='icon-spinner4 spinner mr-2'></span> Saving" class="btn btn-light btn-sm btn-save">
                    <span class='icon-floppy-disk mr-2'></span> Save
                </button>
            </div>
        </div>

        <div id="accordion-control-group-{{$config}}" class="collapse" data-parent="#accordion-control">
            <div class="card-body">
                <div id="{{$config}}_editor">{{ Storage::disk('config')->get($config . '.php') }}</div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        var str = '{!! json_encode($configs) !!}';
        var list = JSON.parse(str);
        var objects = {};
        list.forEach(config => {
            var php_editor = ace.edit(config + "_editor");
                php_editor.setTheme("ace/theme/monokai");
                php_editor.getSession().setMode("ace/mode/php");
                php_editor.setShowPrintMargin(false);
            objects[config] = php_editor;
        });

        // Buttons with progress/spinner
        // ------------------------------

        // Initialize on button click
        $('.btn-save').click(function () {
            var btn = $(this);
            var target = $(this).data("target");
            var content = objects[target].getSession().getValue();
            var initialText = btn.data('initial-text');
            var loadingText = btn.data('loading-text');
            btn.html(loadingText).addClass('disabled');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{route("admin.configs.base.update")}}',
                type: "PUT",
                data: {
                    config: target,
                    content: content
                },
                success: function () {
                    btn.html(initialText).removeClass('disabled');
                }
            });
        });
    });
</script>
@endsection

