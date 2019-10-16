@extends('themes.limitless.layouts.default')

@section('title', 'Options')

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
                <h6 class="card-title">My Inbox (single line)</h6>
            </div>
        </div>

    </div>
    <!-- /right content -->

</div>
@endsection

@section('script')

@endsection

