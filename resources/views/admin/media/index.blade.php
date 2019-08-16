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
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Storage Overview
                </h5>
            </div>
            <div class="card-body"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Available Disks
                </h5>
            </div>
            <div class="card-body"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Public Directory List
                </h5>
            </div>
            <div class="card-body"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Plugin Assets
                </h5>
            </div>
            <div class="card-body"></div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
