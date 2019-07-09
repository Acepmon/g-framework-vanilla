@extends('themes.limitless.layouts.default')

@section('title', 'Logs Reader')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<style>
    .align-top {
        vertical-align: top !important;
    }
    .px-0 {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }
</style>
@endsection

@section('pageheader')
    @include('admin.logs.includes.pageheader')
@endsection

@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">
            System Logs
        </h5>
        <div class="heading-elements">
            <a href="{{ route('admin.logs.downloadAll') }}" class="btn btn-primary btn-xs" target="_blank"><span class="icon-download position-left"></span> Download</a>
            <a href="#modal_theme_danger" data-toggle="modal" class="btn btn-danger btn-xs"><span class="icon-trash position-left"></span> Remove All</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-condensed datatable-ajax">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Header</th>
                    <th>Environment</th>
                    <th>Level</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div id="modal_theme_danger" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Remove All?</h6>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to remove all logs?</p>
            </div>

            <div class="modal-footer">
                <form method="post" id="delete_form" action="{{ route('admin.logs.deleteAll') }}">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function format (data) {
        // `d` is the original data object for the row

        var traces = '<ul class="media-list media-list-bordered">';
        data.stack.forEach((element, index) => {
            traces += '<li class="media"><div class="media-body">' + (index + 1) + '. ' + element + '</div></li>'
        });
        traces += '</ul>';

        var exception = '<tr><th style="width: 200px;" class="text-left align-top">Exception</th><td>' + data.header + '</td></tr>';
        var caught_at = '<tr><th style="width: 200px;" class="text-left align-top">Caught At</th><td>' + data.caught_at + '</td></tr>';
        var logfile = '<tr><th style="width: 200px;" class="text-left align-top">Log File</th><td>' + data.filePath + '</td></tr>';
        var stacktrace = '<tr><th style="width: 200px;" class="text-left align-top">Stack Trace</th><td>' + traces + '</td></tr>';

        return '<table class="table table-condensed">' + exception + caught_at + logfile + stacktrace + '</table>';
    }
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


        // AJAX sourced data
        var groupColumn = 4;
        var table = $('.datatable-ajax').DataTable({
            ajax: {
                url: '/admin/ajax/logs/list',
                dataSrc: function (json) {
                    return json;
                }
            },
            columns: [
                {
                    "className": 'details-control cursor-pointer',
                    "orderable": false,
                    "data": 'id',
                    "defaultContent": ''
                },
                { 'data': 'header_limit' },
                { 'data': 'environment' },
                { 'data': 'level' },
                { 'data': 'date' },
                { 'data': 'time' }
            ],
            columnDefs: [
                {
                    "render": function (id) {
                        return '<span class="icon-plus-circle2 text-muted position-left"></span> ' + id;
                    },
                    "targets": 0
                },
                {
                    "render": function (level) {
                        if (level == 'error') {
                            return '<span class="label label-danger">' + level + '</span>';
                        } else if (level == 'debug') {
                            return '<span class="label label-info">' + level + '</span>';
                        } else if (level == 'warning') {
                            return '<span class="label label-warning">' + level + '</span>';
                        } else {
                            return '<span class="label label-default">' + level + '</span>';
                        }
                    },
                    "targets": 3
                },
                { "visible": false, "targets": groupColumn }
            ],
            drawCallback: function () {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;

                api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                    if ( last !== group ) {
                        $(rows).eq( i ).before(
                            '<tr class="active border-double text-semibold"><td colspan="6"><span class="icon-circle-small"></span> Date: '+group+'</td></tr>'
                        );

                        last = group;
                    }
                } );
            }
        });

        // Add event listener for opening and closing details
        $('.datatable-ajax tbody').on('click', '.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var icon = $(this).find('span');

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                icon.removeClass('icon-minus-circle2');
                icon.addClass('icon-plus-circle2');
            }
            else {
                // Open this row
                row.child( format(row.data()), 'px-0' ).show();
                icon.removeClass('icon-plus-circle2');
                icon.addClass('icon-minus-circle2');
            }
        } );
    });
</script>
@endsection
