@extends('themes.limitless.layouts.default')

@section('title', 'All Banners')

@section('load')
<script src="{{ asset('limitless/bootstrap4/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/select2.min.js') }}"></script>
@endsection

@section('pageheader')
    @include('admin.banners.includes.pageheader')
@endsection

@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">
            All Banners
        </h6>

        <div class="heading-elements">
            <a href="{{ route('admin.banners.create') }}" class="btn btn-primary btn-sm"><span class="icon-plus3 position-left"></span> Create Banner</a>
        </div>
    </div>

    @if (session('status'))
        <div class="card-body">
            <div class="alert alert-success">
                {!! session('status') !!}
            </div>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th style="width: 200px">Active</th>
                    <th>Mobile Banner</th>
                    <th>Web Banner</th>
                    <th>Button</th>
                    <th>Created At</th>
                    <th>Actions</th>
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
                        <select name="active" class="form-control" data-target="{{ $banner->id }}" onchange="changeBannerActive(this)">
                            <option value="0" {{ $banner->active ? '' : 'selected' }}>Not Active</option>
                            <option value="1" {{ $banner->active ? 'selected' : '' }}>Active</option>
                        </select>
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
                    <td class="text-center">
                        <a href="#" data-toggle="dropdown">
                            <i class="icon-menu9 text-secondary"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('admin.banners.edit', $banner->id) }}"><i class="icon-pencil"></i> Edit</a>
                            <a class="dropdown-item" href="#modal_banner_remove" data-toggle="modal" data-id="{{ $banner->id }}"><i class="icon-trash"></i> Remove</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="modal_banner_remove" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Remove Banner</h6>
            </div>

            <div class="modal-body">
                <p>
                    Are you sure you want to remove banner?
                </p>
            </div>

            <div class="modal-footer">
                <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
function changeBannerActive(event) {
    var targetId = $(event).data('target');
    var targetValue = parseInt($(event).val());

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'PUT',
        url: '{{ route('admin.banners.index') }}/' + targetId,
        data: {
            id: targetId,
            active: targetValue
        },
        success: function (data) {
            if (data.active == 1) {
                alert('Set to active!');
            } else {
                alert('Set to not active!');
            }
        }
    });
}

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

    $("#modal_banner_remove").on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        var url = '{{ route('admin.banners.index') }}/' + id;

        $("#modal_banner_remove").find('form').attr('action', url);
    });
});
</script>
@endsection
