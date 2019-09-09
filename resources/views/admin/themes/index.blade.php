@extends('themes.limitless.layouts.default')

@section('load')
    <script type="text/javascript" src="{{ asset('limitless/js/plugins/velocity/velocity.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('limitless/js/plugins/velocity/velocity.ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('limitless/js/plugins/buttons/spin.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('limitless/js/plugins/buttons/ladda.min.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Themes</span> - Installed Themes</h4>
    </div>

    <div class="heading-elements">
        <a href="{{ route('admin.themes.create') }}" class="btn bg-blue heading-btn">Add New <b><i class="icon-arrow-right14 position-right"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="2_col.html">Starters</a></li>
        <li class="active">2 columns</li>
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

@if (session('status'))
    <div class="panel-body">
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    </div>
@endif

<div class="row">
    @foreach ($themes as $theme)
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
            <div class="panel">
                <div class="panel-body panel-body-accent">
                    <h4 class="text-semibold no-margin">
                        <a href="{{ route('admin.themes.show', $theme->id) }}" class="text-default">{{ $theme->title }}</a>
                    </h4>

                    <p>
                        {{ $theme->description }}
                    </p>

                    @if($theme->status == \App\Theme::AVAILABLE)
                        <button type="button" data-target="{{ $theme->id  }}" data-loading-text="<i class='icon-spinner4 spinner'></i> Downloading..." class="btn btn-default theme-install">Install</button>
                    @elseif($theme->status == \App\Theme::DEACTIVATED)
                        <button type="button" data-target="{{ $theme->id  }}" class="btn btn-success theme-activate">Activate</button>
                    @elseif($theme->status == \App\Theme::ACTIVATED)
                        <button type="button" data-target="{{ $theme->id  }}" class="btn btn-danger theme-deactivate">Deactivate</button>
                    @elseif($theme->status == \App\Theme::INSTALLED)
                        <a href="{{ route('admin.themes.edit', $theme->id) }}" class="btn btn-default theme-customize">Customize</a>
                    @else
                        <button data-target="{{ $theme->id  }}" data-loading-text="<i class='icon-spinner4 spinner'></i> Downloading..." disabled class="btn btn-default theme-install">Install</button>
                    @endif

                    <small class="text-muted pull-right">v{{ $theme->version }}</small>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Danger modal -->
<div id="modal_theme_danger" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Delete?</h6>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete this theme?</p>
            </div>

            <div class="modal-footer">
                <form method="post" id="delete_form" action="/themes/0">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}

                    <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /default modal -->
@endsection

@section('script')
<script>
    window.delete_confirm = function(id) {
        $("#delete_form").attr('action', '/admin/themes/'+id);
    }
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".theme-install").click(function () {
        var id = $(this).data('target');
        var btn = $(this);
        btn.button('loading');
        $.ajax({
            type: 'GET',
            url: '/admin/installTheme',
            data: {id: id},
            success: function (data) {
                btn.button('reset');
                window.location.reload();
            }
        });
    });


    $(".theme-activate").click(function () {
        var id = $(this).data('target');
        $.ajax({
            type: 'POST',
            url: '/admin/themes/' + id + '/activate',
            success: function (data) {
                if (data.status === 'Success') {
                    window.location.reload();
                }
            }
        });
    });

    $(".theme-deactivate").click(function () {
        var id = $(this).data('target');
        $.ajax({
            type: 'POST',
            url: '/admin/themes/' + id + '/deactivate',
            success: function (data) {
                if (data.status === 'Success') {
                    window.location.reload();
                }
            }
        });
    });

</script>
@endsection
