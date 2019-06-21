@extends('layouts.admin')

@section('title', 'Base Configuration')

@section('load')
<script type="text/javascript" src="/assets/js/plugins/editors/ace/ace.js"></script>
@endsection

@section('pageheader')
    @include('admin.configs.includes.pageheader')
@endsection

@section('content')
    <div class="row">
        @foreach ($configs as $config)
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">
                        <span class="text-semibold">{{$config}}.php</span>
                    </h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><button type="button" data-target="{{$config}}" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> Saving" class="btn btn-primary btn-sm btn-loading">Save Configuration</button></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
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

