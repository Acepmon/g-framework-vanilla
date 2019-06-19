@extends('layouts.admin')

@section('title', 'Base Configuration')

@section('load')

@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Configurations</span> - Base Configuration</h4>
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
@endsection

@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h1 class="panel-title">Base configurations list</h1>
    </div>

    <div class="panel-body">

    </div>

    <table class="table">
        @foreach ($configs as $config => $arr)
            <tr>
                <th colspan="2" class="active text-capitalize text-primary">{{$config}} Configuration</th>
            </tr>
            @include('admin.configs.includes.tableRow', ['arr' => $arr, 'level' => 1])
        @endforeach
    </table>
</div>
@endsection

@section('script')

@endsection

