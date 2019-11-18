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

    <div class="card-body">
        <form action="" method="GET">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="markName">Manufacturer</label>
                        <select name="markName" id="markName" class="form-control">
                            @foreach ($manufacturers as $manufacturer)
                                <option value="{{ $manufacturer->term->name }}" {{ $manufacturer->term->name == request()->input('markName') ? 'selected' : '' }}>{{ $manufacturer->term->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="modelName">Model</label>
                        <select name="modelName" id="modelName" class="form-control">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="priceAmount">Minimum Price</label>
                        <select name="priceAmount" id="priceAmount" class="form-control">
                            @for($i=100000; $i<=10000000; $i+=100000)
                                <option value="{{ $i }}" {{ $i == request()->input('priceAmount') ? 'selected' : '' }}>{{ numerizePrice($i) }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">&nbsp;</label>
                        <button type="submit" class="btn btn-primary btn-block">
                            <span class="icon-search4 mr-2"></span>
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <table class="table datatable-basic table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Wanna Buy</th>
                <th>Price Range</th>
                <th>User</th>
                <th>Phone</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($contents as $content)
                <tr>
                    <td>{{ $content->id }}</td>
                    <td>{{ $content->title }}</td>
                    <td>
                        <strong>Starts At:</strong> {{ number_format($content->metaValue('priceAmountStart')) }} {{ $content->metaValue('priceUnit') }}
                        <br>
                        <strong>Ends At:</strong> {{ number_format($content->metaValue('priceAmountEnd')) }} {{ $content->metaValue('priceUnit') }}
                    </td>
                    <td>
                        @include('themes.limitless.includes.user-media', ['user' => $content->author])
                    </td>
                    <td>{{ $content->author->metaValue('phone') }}</td>
                    <td>
                        {{ $content->created_at->diffForHumans() }}
                    </td>
                    <td>
                        <a href="{{ route('admin.modules.car.wishlist.show', $content->id) }}" class="btn btn-light btn-sm">Search Similar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('script')
<script>
    const toKebabCase = str =>
        str &&
        str
            .match(/[A-Z][0-9]{2,}(?=[A-Z][a-z]+ [0-9]*|\b)|[A-Z]?[a-z]+[0-9]*|[A-Z]| [0-9]+/g)
            .map(x => x.toLowerCase())
            .join('-').replace('- ', '');


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

        var onChange = function () {
            var markName = $("#markName").val();
            var requestModelName = '{{ request()->input("modelName") }}'
            $.ajax({
                type: 'Get',
                url: '/api/v1/taxonomies/car-' + toKebabCase(markName),
            }).done(function(data) {
                var modelList=data;
                $('#modelName')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value=""></option>')
                    .val('')
                ;
                for (var i = 0; i < modelList.data.length; i++) {
                    var option = new Option(modelList.data[i].term.name, modelList.data[i].term.name);
                    if (modelList.data[i].term.name == requestModelName) {
                        option.selected = true;
                    }
                    $("#modelName").append(option);
                }
            }).fail(function(err) {
                // $("#demo-spinner").css({'display': 'none'});
                console.error("FAIL!");
                console.error(err);
            });
        }

        $("#markName").change(onChange);

        onChange();
    });
</script>
@endsection

