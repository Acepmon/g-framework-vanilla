@extends('themes.limitless.layouts.default')

@section('load')
{{--<!-- Theme JS files -->--}}
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/switch.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/pages/form_checkboxes_radios.js') }}"></script>
<!-- /theme JS files -->
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">theme</span> Edit Page</h4>
    </div>

    <div class="heading-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="/themes/"><i class="icon-home2 position-left"></i> Home</a></li>
    </ul>
</div>
<!-- /page header -->
@endsection

@section('content')

<div class="row">
    <div class="col-sm-2">
        @include('admin.themes.sidebar')
    </div>
    <div class="col-sm-10">
        <div class="panel">
            <div class="panel-heading">
                <h5 class="panel-title">Customize</h5>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection
