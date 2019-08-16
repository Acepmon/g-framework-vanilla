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
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Backups</span></h4>
        <a href="#" class="header-elements-toggle text-default d-md-none">
            <i class="icon-more"></i>
        </a>
    </div>

    <div class="header-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a></li>
            <span class="breadcrumb-item active">Backups</li>
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
    <div class="card-header header-elements-inline">
        <h5 class="card-title">
            Backup
        </h5>
        <div class="header-elements">
            <a href="{{ route('admin.backups.create') }}" class="btn btn-primary text-white">Create backup<i class="icon-arrow-right14 ml-2"></i></a>
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
                    <th>filename</th>
                    <th>filetype</th>
                    <th>Status</th>
                    <th>Restore</th>
                    {{--<th>Activate</th>--}}
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($backups as $data)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $data->title}}</td>
                    <td>{{ $data->description}}</td>
                    <td>{{ $data->filename }}</td>
                    <td>{{ $data->filetype }}</td>
                    <td>{{ $data->status }}</td>
                    @if($data->status=='completed')
                    <td><button data-target="{{ $data->id  }}" data-loading-text="<i class='icon-spinner4 spinner'></i> Restoring..." class="btn btn-primary db-restore">Restore</button></td>

                    @else
                    <td><button data-target="{{ $data->id  }}" data-loading-text="<i class='icon-spinner4 spinner'></i> Restoring..." disabled class="btn btn-default">Restore</button></td>

                    @endif


                    {{--@if($data->status =='deactivated')--}}

                        {{--<td><button type="button" data-target="{{ $data->id  }}" class="btn btn-success backup-activate">Activate</button></td>--}}

                    {{--@elseif($data->status =='activated')--}}
                    {{--<td><button type="button" data-target="{{ $data->id  }}" class="btn btn-danger backup-deactivate">Deactivate</button></td>--}}

                    {{--@else--}}
                    {{--<td></td>--}}

                    {{--@endif--}}
                    <td><a href='{{ route('admin.backups.edit', ['id' => $data->id]) }}' type="btn btn-default">Edit</a></td>
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
                <p>Are you sure you want to delete this backup?</p>
            </div>

            <div class="modal-footer">
                <form method="post" id="delete_form" action="/backups/0">
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
        $("#delete_form").attr('action', '/admin/backups/'+id);
    }
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".db-restore").click(function () {
        var id = $(this).data('target');
        var btn = $(this);
        btn.button('loading');
        $.ajax({
            type: 'GET',
            url: '/admin/databaseRestore',
            data: {id: id},
            success: function (data) {
                btn.button('reset');
                //console.log(data);
                window.location.reload();
            }
        });
    });

</script>
@endsection
