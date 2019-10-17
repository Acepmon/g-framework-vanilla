@extends('themes.limitless.layouts.default')

@section('title', 'New Term')

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

        @if (isset($taxonomy))
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <h6 class="card-title">New term for taxonomy: <strong>{{ $taxonomy }}</strong></h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.modules.car.options.store') }}">
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <h6 class="card-title">New Term</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.modules.car.options.store') }}">
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        @endif

    </div>
    <!-- /right content -->

</div>
@endsection

@section('script')

@endsection

