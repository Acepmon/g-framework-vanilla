@extends('themes.limitless.layouts.default')

@section('title', 'Media Management')

@section('load')

@endsection

@section('pageheader')
    @include('admin.media.includes.pageheader')
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">
                    Storage Overview
                </h5>
            </div>
            <div class="panel-body"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">
                    Available Disks
                </h5>
            </div>
            <div class="panel-body"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">
                    Public Directory List
                </h5>
            </div>
            <div class="panel-body"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">
                    Plugin Assets
                </h5>
            </div>
            <div class="panel-body"></div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
