@extends('themes.limitless.layouts.default')

@section('title', 'User Groups List')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/js/plugins/tables/datatables/datatables.min.js') }}"></script>
@endsection

@section('pageheader')
    @include('admin.users.includes.pageheader')
@endsection

@section('content')
<div class="has-detached-left">
    @include('admin.users.includes.sidebar')

    <!-- Detached content -->
    <div class="container-detached">
        <div class="content-detached">

            <!-- Tab content -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="groups">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title">User Groups</h6>
                            <div class="heading-elements">
                                <a href="{{ route('admin.users.groups.create', ['id' => $user->id]) }}" class="text-white btn btn-primary btn-sm">Add To Group</a>
                            </div>
                        </div>

                        <table class="table table-condensed datatable-basic">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->groups as $index => $group)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $group->title }}</td>
                                    <td>{{ $group->description }}</td>
                                    <td>
                                        <a href="#" class="btn btn-link btn-xs">Detach</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /tab content -->

        </div>
    </div>
</div>
@endsection

@section('script')
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

