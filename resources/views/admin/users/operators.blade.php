@extends('themes.limitless.layouts.default')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/js/plugins/tables/datatables/datatables.min.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Operators</span></h4>
    </div>

    <div class="heading-elements">
        <a href="{{ route('admin.users.create') }}" class="text-white btn btn-primary">Register New <i class="icon-add position-right"></i></a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li class="active">Operators</li>
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
        <h5 class="panel-title">Operators datatable</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

    <table class="table table-condensed table-hover datatable-basic">
        <thead>
            <tr>
                <th style="width: 50px;">#</th>
                <th>User</th>
                <th style="width: 150px;">Groups</th>
                <th style="width: 150px;">Registered</th>
                <th style="width: 50px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @include('themes.limitless.includes.user-media', $user)
                </td>
                <td>
                    @if ($user->groups->count() > 1)
                        <a href="{{ route('admin.users.groups.index', [$user->id]) }}"><strong>{{ $user->groups->count() }}</strong> groups</a>
                    @else
                        @foreach ($user->groups as $group)
                            <a href="{{ route('admin.groups.show', [$group->id]) }}" class="label label-flat border-grey text-grey-600">
                                {{ $group->title }}
                            </a>
                        @endforeach
                    @endif
                </td>
                <td>{{ $user->created_at_carbon()->diffForHumans() }}</td>
                <td>
                    <ul class="icons-list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="{{ route('admin.users.show', ['id' => $user->id]) }}"><i class="icon-eye"></i> View</a></li>
                                <li><a href="{{ route('admin.users.edit', ['id' => $user->id]) }}"><i class="icon-pencil"></i> Edit</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#modal_theme_danger" onclick="choose_user({{ $user->id }})"><i class="icon-trash"></i> Delete</a></li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
                <p>Are you sure you want to delete this user?</p>
            </div>

            <div class="modal-footer">
                <form method="post" id="delete_form" action="/admin/users/0">
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
    window.choose_user = function(id) {
        $("#delete_form").attr('action', '/admin/users/'+id+'/');
    }
</script>
<script>
    $(function() {
        // Table setup
        // ------------------------------

        // Setting datatable defaults
        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            columnDefs: [{
                orderable: false,
                width: '100px'
            }],
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
            },
            drawCallback: function () {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
            },
            preDrawCallback: function() {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
            }
        });


        // Basic datatable
        $('.datatable-basic').DataTable();
    });
</script>
@endsection
