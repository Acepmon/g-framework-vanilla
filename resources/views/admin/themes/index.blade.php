@extends('themes.limitless.layouts.default')

@section('load')
    <script type="text/javascript" src="{{ admin_asset('js/plugins/velocity/velocity.min.js') }}"></script>
    <script type="text/javascript" src="{{ admin_asset('js/plugins/velocity/velocity.ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ admin_asset('js/plugins/buttons/spin.min.js') }}"></script>
    <script type="text/javascript" src="{{ admin_asset('js/plugins/buttons/ladda.min.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Menu</span> Index Page</h4>
    </div>

    <div class="heading-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
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
<!-- Table -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">
            Theme
        </h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a href="{{ route('admin.themes.create') }}" class="btn btn-primary text-white">Create theme<i class="icon-arrow-right14 position-right"></i></a></li>
            </ul>
        </div>
    </div>

    @if (session('status'))
        <div class="panel-body">
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        </div>
    @endif

    <div class="table-responsive">
        <div style="display: none">{{$i=1}}</div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Version</th>
                    <th>install/update</th>
                    <th>Status</th>
                    <th>Activate</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($themes as $data)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $data->title}}</td>
                    <td>{{ $data->description}}</td>
                    <td>{{ $data->version }}</td>
                    @if($data->status=='available')
                    <td><button data-target="{{ $data->id  }}" data-loading-text="<i class='icon-spinner4 spinner'></i> Downloading..." class="btn btn-default theme-install">Install</button></td>

                    @else
                    <td><button data-target="{{ $data->id  }}" data-loading-text="<i class='icon-spinner4 spinner'></i> Downloading..." disabled class="btn btn-default theme-install">Install</button></td>

                    @endif

                    <td>{{ $data->status }}</td>
                    @if($data->status =='deactivated')

                        <td><button type="button" data-target="{{ $data->id  }}" class="btn btn-success theme-activate">Activate</button></td>

                    @elseif($data->status =='activated')
                    <td><button type="button" data-target="{{ $data->id  }}" class="btn btn-danger theme-deactivate">Deactivate</button></td>

                    @else
                    <td></td>

                    @endif
                    <td><a href='{{ route('admin.themes.edit', ['id' => $data->id]) }}' type="btn btn-default">Edit</a></td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#modal_theme_danger" onclick="delete_confirm({{ $data->id }})"><i class="icon-trash"></i> Delete</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- /table -->

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
