@extends('themes.limitless.layouts.default')

@section('title', 'Base Configuration')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/editors/ace/ace.js') }}"></script>
@endsection

@section('pageheader')
    @include('admin.configs.includes.pageheader')
@endsection

@section('content')
    <div class="row">
        @foreach ($configs as $config)
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">
                        <span class="font-weight-semibold">{{$config}}.php</span>
                    </h5>
                    <div class="header-elements">
                        <button type="button" data-target="{{$config}}" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> Saving" class="btn btn-primary btn-sm btn-loading">Save Configuration</button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="content-group">
                        <div id="{{$config}}_editor">
                            {{ Storage::disk('config')->get($config . '.php') }}
                        </div>
                    </div>
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
        $('.btn-loading').click(function () {
            var btn = $(this);
            var target = $(this).data("target");
            var content = objects[target].getSession().getValue();
            btn.button('loading');
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
                    btn.button('reset');
                }
            });
        });
    });
</script>
@endsection

