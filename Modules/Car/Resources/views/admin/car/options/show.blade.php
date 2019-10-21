@extends('themes.limitless.layouts.default')

@section('title', 'Taxonomy Terms')

@section('load-before')

@endsection

@section('load')

@endsection

@section('pageheader')
    @include('car::admin.car.includes.pageheader')
@endsection

@section('content')
<div class="d-md-flex align-items-md-start">

    @include('car::admin.car.options.includes.sidebar')

    <!-- Right content -->
    <div class="flex-fill overflow-auto">

        <div class="card">
            <div class="card-header bg-transparent header-elements-inline">
                <h6 class="card-title">Terms</h6>

                <div class="header-elements">
                    <a href="{{ route('admin.modules.car.options.create') }}?taxonomy={{ $taxonomy }}" class="btn btn-primary">
                        <span class="icon-plus3 mr-2"></span>
                        New Term
                    </a>
                </div>
            </div>

            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach ($taxonomies as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->term->name }}</td>
                        <td>{{ $item->term->slug }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.modules.car.options.edit', $item->id) }}?taxonomy={{ $taxonomy }}" class="btn btn-icon btn-sm">
                                    <span class="icon-pencil"></span>
                                </a>
                                <a href="{{ route('admin.modules.car.options.edit', $item->id) }}?taxonomy={{ $taxonomy }}" class="btn btn-icon btn-sm">
                                    <span class="icon-trash"></span>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
    <!-- /right content -->

</div>
@endsection

@section('script')

@endsection

