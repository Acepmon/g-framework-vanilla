@extends('themes.limitless.layouts.default')

@section('title', 'All Banners')

@section('load')
<script src="{{ asset('limitless/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('limitless/js/plugins/forms/selects/select2.min.js') }}"></script>
@endsection

@section('pageheader')
    @include('admin.banners.includes.pageheader')
@endsection

@section('content')

<div class="panel">
    <div class="panel-heading">
        <h6 class="panel-title">
            All Banners
        </h6>

        <div class="heading-elements">
            <a href="{{ route('admin.banners.create') }}" class="btn btn-primary btn-sm">Create Banner</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Active</th>
                    <th>Mobile Banner</th>
                    <th>Web Banner</th>
                    <th>Button</th>
                    <th>Created At</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($banners as $index => $banner)
                <tr>
                    <td>
                        {{ $index + 1 }}
                    </td>
                    <td>
                        <a href="{{ route('admin.banners.show', $banner->id) }}">
                            {{ $banner->title }}
                        </a>
                    </td>
                    <td>
                        @if ($banner->active)
                        <span class="text-success icon-checkmark3"></span>
                        @else
                        <span class="text-danger icon-cross2"></span>
                        @endif
                    </td>
                    <td>
                        @if ($banner->banner_img_mobile)
                        <a href="{{ $banner->banner_img_mobile }}" target="_blank">
                            <span class="icon-image2"></span>
                        </a>
                        @else
                        <span class="text-danger icon-cross2"></span>
                        @endif
                    </td>
                    <td>
                        @if ($banner->banner_img_web)
                        <a href="{{ $banner->banner_img_web }}" target="_blank">
                            <span class="icon-image2"></span>
                        </a>
                        @else
                        <span class="text-danger icon-cross2"></span>
                        @endif
                    </td>
                    <td>
                        @if ($banner->btn_show)
                        <span class="text-success icon-checkmark3"></span>
                        @else
                        <span class="text-danger icon-cross2"></span>
                        @endif
                    </td>
                    <td>
                        {{ $banner->created_at->diffForHumans() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {

    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: true,
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
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
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

