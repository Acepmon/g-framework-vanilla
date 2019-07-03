@extends('themes.limitless.layouts.default')

@section('title', 'User Avatars')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/js/plugins/media/fancybox.min.js') }}"></script>
<style>
    .thumbnail {
        height: 110px;
    }
    .thumbnail .thumb > img {
        width: auto;
        max-height: 100px;
    }
</style>
@endsection

@section('pageheader')
    @include('admin.media.includes.pageheader')
@endsection

@section('content')
<!-- Image grid -->
<h6 class="content-group text-semibold">
    Users Avatars
    <small class="display-block">There are about <strong>{{ number_format(count($avatars)) }}</strong> avatar files stored.</small>
</h6>

<div class="row">
    @foreach ($avatars as $avatar)
    <div class="col-lg-2 col-sm-3 col-xs-4">
        <div class="thumbnail {{ $avatar['user'] != null ? '' : 'border-warning' }}">
            <div class="thumb">
                <img src="{{ $avatar['url'] }}" alt="">
                <div class="caption-overflow">
                    <span>
                        <a href="{{ $avatar['url'] }}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-enlarge"></i></a>
                        @if ($avatar['user'] != null)
                        <a href="{{ route('admin.users.show', ['id' => $avatar['user']->id]) }}" title="Goto User" class="btn border-white text-white btn-flat btn-icon btn-rounded ml-5"><i class="icon-user"></i></a>
                        @else
                        <button type="button" data-toggle="modal" data-target="#modal_theme_danger" onclick="choose_avatar('{{ $avatar['file'] }}')" title="Remove Avatar" class="btn border-white text-white btn-flat btn-icon btn-rounded ml-5"><i class="icon-cross2"></i></button>
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Danger modal -->
<div id="modal_theme_danger" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Delete?</h6>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete this avatar file?</p>
            </div>

            <div class="modal-footer">
                <form method="post" id="delete_form" action="{{ route('admin.media.delete') }}">
                    @csrf
                    @method('DELETE')

                    <input type="text" name="file" value="" id="delete_form_avatar" hidden>
                    <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /default modal -->
@endsection

@section('script')
<script>
window.choose_avatar = function(avatar) {
    $("#delete_form_avatar").val(avatar);
}
$(function() {
    // Initialize lightbox
    $('[data-popup="lightbox"]').fancybox({
        padding: 3
    });
});
</script>
@endsection

