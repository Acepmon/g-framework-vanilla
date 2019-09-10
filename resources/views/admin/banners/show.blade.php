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
                    <a href="#modal_banner_remove" data-toggle="modal" data-id="{{ $banner->id }}" class="btn btn-default btn-sm"><span class="icon-trash position-left"></span> Remove</a>
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
<div id="modal_banner_remove" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Remove Banner</h6>
            </div>

            <div class="modal-body">
                <p>
                    Are you sure you want to remove banner?
                </p>
            </div>

            <div class="modal-footer">
                <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $("#modal_banner_remove").on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            var url = '{{ route('admin.banners.index') }}/' + id;

            $("#modal_banner_remove").find('form').attr('action', url);
        });
    });
</script>
@endsection

