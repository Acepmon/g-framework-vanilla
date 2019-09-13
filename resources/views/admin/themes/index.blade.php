@extends('themes.limitless.layouts.default')

@section('load')
    <script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/velocity/velocity.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/velocity/velocity.ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/buttons/spin.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/buttons/ladda.min.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 ml-2"></i> <span class="font-weight-semibold">Themes</span> - Installed Themes</h4>
    </div>

    <div class="header-elements d-none">
        <a href="{{ route('admin.themes.create') }}" class="btn bg-blue heading-btn">Add New <b><i class="icon-arrow-right14 mr-2"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 position-left"></i> Home</a>
            <a class="breadcrumb-item" href="2_col.html">Themes</a>
            <span class="breadcrumb-item active">Installed themes</span>
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
<<<<<<< HEAD
<!-- Table -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">
            Theme
        </h5>
        <div class="header-elements">
                <a href="{{ route('admin.themes.create') }}" class="btn btn-primary text-white">Create theme<i class="icon-arrow-right14 ml-2"></i></a>
        </div>
    </div>

    @if (session('status'))
        <div class="card-body">
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
=======

@if (session('status'))
    <div class="panel-body">
        <div class="alert alert-success">
            {{ session('status') }}
>>>>>>> f429e6bc88c8a4c98c7e0c725184258197970ac4
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
