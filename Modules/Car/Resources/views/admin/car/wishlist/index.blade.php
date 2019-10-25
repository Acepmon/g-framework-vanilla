@extends('themes.limitless.layouts.default')

@section('title', 'Wishlist')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/tables/datatables/datatables.min.js') }}"></script>
@endsection

@section('pageheader')
    @include('car::admin.car.includes.pageheader')
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h6 class="card-title">Wishlist Datatable</h6>
    </div>

    <table class="table datatable-basic table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Wanna Buy</th>
                <th>Price Range</th>
                <th>User</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($contents as $index => $content)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $content->title }}</td>
                    <td>
                        <strong>Starts At:</strong> {{ number_format($content->metaValue('priceAmountStart')) }} {{ $content->metaValue('priceUnit') }}
                        <br>
                        <strong>Ends At:</strong> {{ number_format($content->metaValue('priceAmountEnd')) }} {{ $content->metaValue('priceUnit') }}
                    </td>
                    <td>
                        @include('themes.limitless.includes.user-media', ['user' => $content->author])
                    </td>
                    <td>
                        {{ $content->created_at->diffForHumans() }}
                    </td>
                    <td>
                        <a href="{{ route('admin.modules.car.wishlist.show', $content->id) }}" class="btn btn-light btn-sm">Search Related</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
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

