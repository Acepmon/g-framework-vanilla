@extends('themes.limitless.layouts.default')

@section('title', $banner->title)

@section('load')

@endsection

@section('pageheader')
    @include('admin.banners.includes.pageheader')
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h6 class="panel-title">{{ $banner->title }}</h6>
                @if ($banner->active)
                <small class="text-success">Active</small>
                @else
                <small class="text-muted">Not Active</small>
                @endif

                <div class="heading-elements">
                    <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-default btn-sm"><span class="icon-pencil position-left"></span> Edit</a>
                </div>
            </div>

            <div class="panel-body">
                @if ($banner->btn_show)
                <fieldset class="content-group">
                    <legend class="text-bold">Action button preview</legend>

                    <div class="form-group">
                        <a href="{{ $banner->btn_link }}" class="btn btn-primary btn-lg">{{ $banner->btn_text }}</a>
                        <br><small><a href="{{ $banner->btn_link }}">{{ $banner->btn_link }}</a></small>
                    </div>
                </fieldset>
                @endif

                @if ($banner->banner_img_mobile)
                <fieldset class="content-group">
                    <legend class="text-bold">Mobile Banner Image</legend>

                    <div class="thumbnail">
                        <img src="{{ $banner->banner_img_mobile }}" alt="Mobile Banner">
                    </div>
                </fieldset>
                @endif

                @if ($banner->banner_img_web)
                <fieldset class="content-group">
                    <legend class="text-bold">Web Banner Image</legend>

                    <div class="thumbnail">
                        <img src="{{ $banner->banner_img_web }}" alt="Web Banner">
                    </div>
                </fieldset>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection

