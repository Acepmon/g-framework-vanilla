@extends('themes.limitless.layouts.default')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content header-element-md-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Starters</span> - 2 Columns</h4>
    </div>

    <div class="header-elements d-none">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
            <span class="breadcrumb-item active">Changelog</span>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')

<div>
    <h5 class="content-group font-weight-semibold">
        <i class="icon-github"></i> <a href="https://github.com/Acepmon" target="_blank">Acepmon</a> / <a href="https://github.com/Acepmon/g-framework" target="_blank">G-Framework</a>
        <br><small class="text-muted">Branch: <strong>Master</strong></small>
    </h5>
</div>

<div class="card card-body border-top-teal">
    <div class="list-feed">

        @foreach ($commits as $item)
        <div class="list-feed-item">
            <div class="text-muted">{{ date('Y-m-d', strtotime($item['commit']['author']['date'])) }}</div>
            <strong>{{$item['commit']['author']['name']}}</strong>: {{$item['commit']['message']}}
        </div>
        @endforeach
    </div>
</div>

@endsection

@section('script')
@endsection
