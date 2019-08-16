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
            <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
            <span class="breadcrumb-item active">Changelog</span>
        </div>
    </div>

    <div class="header-elements d-none">
        <div class="breadcrumb justify-content-center">
            <a href="#" class="breadcrumb-elements-item"><i class="icon-comment-discussion mr-2"></i>Link</a>
            <div class="breadcrumb-elements-item dropdown p-0">
                <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon-gear mr-2"></i>Dropdown</a>
                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" 
                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-84px, 40px, 0px);">
                    <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
                    <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                    <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')

<div>
    <h6 class="content-group font-weight-semibold">
        <i class="icon-github"></i> <a href="https://github.com/Acepmon" target="_blank">Acepmon</a> / <a href="https://github.com/Acepmon/g-framework" target="_blank">G-Framework</a>
        <small class="text-muted">Branch: <strong>Master</strong></small>
    </h6>
</div>

<div class="card card-body border-top-teal">
    <ul class="list-feed">

        @foreach ($commits as $item)
        <li>
            <div class="text-muted">{{ date('Y-m-d', strtotime($item['commit']['author']['date'])) }}</div>
            <strong>{{$item['commit']['author']['name']}}</strong>: {{$item['commit']['message']}}
        </li>
        @endforeach
    </ul>
</div>

@endsection

@section('script')
@endsection
