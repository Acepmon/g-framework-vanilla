@extends('themes.limitless.layouts.default')

@section('load')
    <script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/velocity/velocity.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/velocity/velocity.ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/buttons/spin.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/buttons/ladda.min.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content header-elements-md-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Menu</span> Index Page</h4>
    </div>

    <div class="header-elements d-none">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
            <span class="breadcrumb-item active">Plugins</span>
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
<!-- Table -->
<div class="card">
    <div class="card-header  header-elements-md-inline">
        <h5 class="card-title">
            Plugin
        </h5>
        <div class="header-elements">
            <div class="list-icons">
                <a href="{{ route('admin.plugins.create') }}" class="btn btn-primary text-white">Create plugin<i class="icon-arrow-right14 ml-2"></i></a>
            </div>
        </div>
    </div>

    @if (session('status'))
        <div class="card-body">
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
                @foreach($plugins as $data)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $data->title}}</td>
                    <td>{{ $data->description}}</td>
                    <td>{{ $data->version }}</td>
                    @if($data->status=='available')
                    <td><button data-target="{{ $data->id  }}" data-loading-text="<i class='icon-spinner4 spinner'></i> Downloading..." class="btn btn-light plugin-install">Install</button></td>

                    @else
                    <td><button data-target="{{ $data->id  }}" data-loading-text="<i class='icon-spinner4 spinner'></i> Downloading..." disabled class="btn btn-light plugin-install">Install</button></td>

                    @endif

                    <td>{{ $data->status }}</td>
                    @if($data->status =='deactivated')

                        <td><button type="button" data-target="{{ $data->id  }}" class="btn btn-success plugin-activate">Activate</button></td>

                    @elseif($data->status =='activated')
                    <td><button type="button" data-target="{{ $data->id  }}" class="btn btn-danger plugin-deactivate">Deactivate</button></td>

                    @else{
                    <td></td>

                    @endif
                    <td><a href='{{ route('admin.plugins.edit', ['id' => $data->id]) }}' type="btn btn-light">Edit</a></td>
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
                <p>Are you sure you want to delete this plugin?</p>
            </div>

            <div class="modal-footer">
                <form method="post" id="delete_form" action="/plugins/0">
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
        $("#delete_form").attr('action', '/admin/plugins/'+id);
    }
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".plugin-install").click(function () {
        var id = $(this).data('target');
        var btn = $(this);
        btn.button('loading');
        $.ajax({
            type: 'GET',
            url: '/admin/install',
            data: {id: id},
            success: function (data) {
                alert(data.success);
                btn.button('reset');
            }
        });
    });


    $(".plugin-activate").click(function () {
        var id = $(this).data('target');
        $.ajax({
            type: 'POST',
            url: '/admin/plugins/' + id + '/activate',
            success: function (data) {
                if (data.status === 'Success') {
                    window.location.reload();
                }
            }
        });
    });

    $(".plugin-deactivate").click(function () {
        var id = $(this).data('target');
        $.ajax({
            type: 'POST',
            url: '/admin/plugins/' + id + '/deactivate',
            success: function (data) {
                if (data.status === 'Success') {
                    window.location.reload();
                }
            }
        });
    });

</script>
@endsection
