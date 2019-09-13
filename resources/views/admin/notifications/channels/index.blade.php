@extends('themes.limitless.layouts.default')

@section('title', 'Channels')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/select2.min.js') }}"></script>
@endsection

@section('pageheader')
    @include('admin.notifications.includes.pageheader')
@endsection

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">All Notification Channels</h5>

        <div class="header-elements">
            <a href="{{ route('admin.notifications.channels.create') }}" class="btn btn-primary btn-sm"><span class="icon-plus3 position-left"></span> New Channel</a>
        </div>
    </div>

    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Job Title</th>
                <th>DOB</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Marth</td>
                <td><a href="#">Enright</a></td>
                <td>Traffic Court Referee</td>
                <td>22 Jun 1972</td>
                <td><span class="label label-success">Active</span></td>
                <td class="text-center">
                    <div class="dropdown">
                        <a href="#" data-toggle="dropdown">
                            <i class="icon-menu9 text-secondary"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="icon-file-pdf"></i> Export to .pdf</a>
                            <a class="dropdown-item" href="#"><i class="icon-file-excel"></i> Export to .csv</a>
                            <a class="dropdown-item" href="#"><i class="icon-file-word"></i> Export to .doc</a>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
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
                width: '100px',
                targets: [ 5 ]
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

