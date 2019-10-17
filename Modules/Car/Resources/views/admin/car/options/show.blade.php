@extends('themes.limitless.layouts.default')

@section('title')

@endsection

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
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach ($taxonomies as $index => $taxonomy)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $taxonomy->term->name }}</td>
                        <td>{{ $taxonomy->term->slug }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.modules.car.options.edit', $taxonomy->id) }}" class="btn btn-light btn-icon btn-sm">
                                    <span class="icon-pencil"></span>
                                </a>
                                <a href="{{ route('admin.modules.car.options.edit', $taxonomy->id) }}" class="btn btn-light btn-icon btn-sm">
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

