@extends('layouts.admin')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Starters</span> - 2 Columns</h4>
    </div>

    <div class="heading-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="2_col.html">Starters</a></li>
        <li class="active">2 columns</li>
    </ul>

    <ul class="breadcrumb-elements">
        <li><a href="#"><i class="icon-comment-discussion position-left"></i> Link</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-gear position-left"></i>
                Dropdown
                <span class="caret"></span>
            </a>

            <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
            </ul>
        </li>
    </ul>
</div>
<!-- /page header -->
@endsection

@section('content')

<h6 class="content-group text-semibold">
    <i class="icon-github"></i> <a href="https://github.com/Acepmon" target="_blank">Acepmon</a> / <a href="https://github.com/Acepmon/g-framework" target="_blank">G-Framework</a>
    <small class="display-block">Branch: <strong>Master</strong></small>
</h6>

<div class="panel panel-body border-top-teal">
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
