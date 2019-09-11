@extends('themes.limitless.layouts.default')

@section('title', 'Edit ' . $banner->title)

@section('load')
<script src="{{ asset('limitless/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ asset('limitless/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script src="{{ asset('limitless/js/plugins/forms/styling/switch.min.js') }}"></script>
<script src="{{ asset('limitless/js/plugins/media/cropper.min.js') }}"></script>

<style>
    .image-cropper-container img {
        max-width: 100%;
    }
</style>
@endsection

@section('pageheader')
    @include('admin.banners.includes.pageheader')
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="panel">
                <div class="panel-heading">
                    <h6 class="panel-title">
                        Edit Banner
                    </h6>

                    <div class="heading-elements">
                        <a href="#modal_banner_remove" data-toggle="modal" data-id="{{ $banner->id }}" class="btn btn-default btn-sm"><span class="icon-trash position-left"></span> Remove</a>
                    </div>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {!! session('status') !!}
                        </div>
                    @endif

                    <fieldset class="content-group">
                        <legend class="text-bold">General</legend>

                        <div class="form-group @error('title') has-error @enderror">
                            <label for="title" class="control-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Winter season sale!... etc" required value="{{ $banner->title }}">
                            @error('title')
                                <div class="help-block text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="active" class="control-label">Active</label>
                            <select name="active" id="active" class="form-control">
                                <option value="0" {{ $banner->active ? '' : 'selected' }}>Not Active</option>
                                <option value="1" {{ $banner->active ? 'selected' : '' }}>Active</option>
                            </select>
                        </div>

                        <div class="form-group @error('order') has-error @enderror">
                            <label for="order" class="control-label">Order</label>
                            <input type="number" class="form-control" name="order" id="order" placeholder="0, 1, 2... etc" value="{{ $banner->order }}">
                            <span class="help-block">Set the showing order of multiple banners</span>
                            @error('order')
                                <div class="help-block text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </fieldset>

                    <fieldset class="content-group">
                        <legend class="text-bold">Action Button</legend>

                        <div class="form-group @error('btn_show') has-error @enderror">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="styled" name="btn_show" id="btn_show" onclick="toggleButtonFields(this)" value="{{ $banner->btn_show }}" {{ $banner->btn_show ? 'checked' : ''}}>
                                    Show button?
                                </label>
                                @error('btn_show')
                                    <div class="help-block text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group @error('btn_text') has-error @enderror" id="btn_text_group" style="display: {{ $banner->btn_show ? 'block' : 'none' }}">
                            <label for="btn_text" class="control-label">Button Text</label>
                            <input type="text" class="form-control" name="btn_text" id="btn_text" placeholder="Get Started, Sign up, Subscribe... etc" value="{{ $banner->btn_text }}">
                            @error('btn_text')
                                <div class="help-block text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('btn_link') has-error @enderror" id="btn_link_group" style="display: {{ $banner->btn_show ? 'block' : 'none' }}">
                            <label for="btn_link" class="control-label">Button Link</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="btn_link" id="btn_link" placeholder="https://..." value="{{ $banner->btn_link }}">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_choose_page">Choose From Pages</button>
                                </span>
                            </div>
                            @error('btn_link')
                                <div class="help-block text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </fieldset>

                    <fieldset class="content-group">
                        <legend class="text-bold">Banner Image</legend>

                        <div class="form-group @error('banner_img_mobile') has-error @enderror">
                            <label for="banner_img_mobile" class="control-label">Mobile Image</label>
                            <input type="file" class="file-styled" name="banner_img_mobile" id="banner_img_mobile" onchange="showMobileCropper(this)" accept="image/*">
                            <input type="text" name="banner_img_mobile_cropped" id="banner_img_mobile_cropped" hidden>
                            <input type="checkbox" name="banner_img_mobile_remove" id="banner_img_mobile_remove" hidden>
                            <div class="thumbnail mt-5" id="banner_img_mobile_preview_container" style="display: {{ $banner->banner_img_mobile ? 'block' : 'none' }}">
                                <div class="thumb">
                                    <img src="{{ $banner->banner_img_mobile }}" alt="" id="banner_img_mobile_preview">
                                    <div class="caption-overflow">
                                        <span>
                                            <button type="button" class="btn btn-info btn-sm" onclick="removeMobilePreview()">Remove</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @error('banner_img_mobile')
                                <div class="help-block text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group @error('banner_img_web') has-error @enderror">
                            <label for="banner_img_web" class="control-label">Web Image</label>
                            <input type="file" class="file-styled" name="banner_img_web" id="banner_img_web" onchange="showWebCropper(this)" accept="image/*">
                            <input type="text" name="banner_img_web_cropped" id="banner_img_web_cropped" hidden>
                            <input type="checkbox" name="banner_img_web_remove" id="banner_img_web_remove" hidden>
                            <div class="thumbnail mt-5" id="banner_img_web_preview_container" style="display: {{ $banner->banner_img_web ? 'block' : 'none' }}">
                                <div class="thumb">
                                    <img src="{{ $banner->banner_img_web }}" alt="" id="banner_img_web_preview">
                                    <div class="caption-overflow">
                                        <span>
                                            <button type="button" class="btn btn-info btn-sm" onclick="removeWebPreview()">Remove</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @error('banner_img_web')
                                <div class="help-block text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </fieldset>

                    <div class="form-group text-right">
                        <a href="{{ route('admin.banners.show', $banner->id) }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="modal_mobile_crop" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Crop Banner Image</h6>
            </div>

            <div class="modal-body">
                <div class="image-cropper-container">
                    <img src="{{ asset('limitless/images/placeholder.jpg') }}" alt="" class="crop-16-9" id="modal_mobile_crop_image">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="cropMobileImage()">Crop Image</button>
            </div>
        </div>
    </div>
</div>

<div id="modal_web_crop" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Crop Banner Image</h6>
            </div>

            <div class="modal-body">
                <div class="image-cropper-container">
                    <img src="{{ asset('limitless/images/placeholder.jpg') }}" alt="" id="modal_web_crop_image">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="cropWebImage()">Crop Image</button>
            </div>
        </div>
    </div>
</div>

<div id="modal_choose_page" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Choose from Pages</h6>
            </div>

            <div class="modal-body">
                <ul class="media-list media-list-bordered">
                    @foreach ($pages as $index => $page)
                    <li class="media">
                        <div class="media-left">
                            <h5 class="text-center">{{ $index + 1 }}</h5>
                        </div>

                        <div class="media-body">
                            <h6 class="media-heading">{{ $page->title }}</h6>
                            <small><a href="{{ url($page->slug) }}" target="_blank">{{ url($page->slug) }}</a></small>
                        </div>

                        <div class="media-right">
                            <button type="button" class="btn btn-default" onclick="choosePage('{{ url($page->slug) }}')">Choose</button>
                        </div>
                    </li>
                    @endforeach
                </ul>
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
    var mobileElement = $("#modal_mobile_crop_image");
    var webElement = $("#modal_web_crop_image");
    var options = {
        responsive: true,
        center: true,
        aspectRatio: 16/9
    };

    mobileElement.cropper(options);
    webElement.cropper(options);

    var mobileCropper = mobileElement.data('cropper');
    var webCropper = webElement.data('cropper');

    function showMobileCropper(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                mobileElement.attr('src', e.target.result);
                mobileCropper.replace(e.target.result);
            }

            reader.readAsDataURL(input.files[0]);

            $("#modal_mobile_crop").modal('toggle');
        }
    }

    function cropMobileImage() {
        var canvas = mobileCropper.getCroppedCanvas().toBlob((blob) => {
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                $("#modal_mobile_crop").modal('toggle');
                $("#banner_img_mobile_preview_container").show();
                $("#banner_img_mobile_preview").attr('src', base64data);
                $("#banner_img_mobile_cropped").val(base64data);
                $("#banner_img_mobile_remove").prop('checked', false);
            }
        });
    }

    function removeMobilePreview() {
        $("#banner_img_mobile_preview_container").hide();
        $("#banner_img_mobile").val('');
        $("#banner_img_mobile_remove").prop('checked', true);

        $(".file-styled").uniform({
            fileButtonClass: 'action btn btn-default'
        });
    }

    function showWebCropper(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                webElement.attr('src', e.target.result);
                webCropper.replace(e.target.result);
            }

            reader.readAsDataURL(input.files[0]);

            $("#modal_web_crop").modal('toggle');
        }
    }

    function cropWebImage() {
        var canvas = webCropper.getCroppedCanvas().toBlob((blob) => {
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                $("#modal_web_crop").modal('toggle');
                $("#banner_img_web_preview_container").show();
                $("#banner_img_web_preview").attr('src', base64data);
                $("#banner_img_web_cropped").val(base64data);
                $("#banner_img_web_remove").prop('checked', false);
            }
        });
    }

    function removeWebPreview() {
        $("#banner_img_web_preview_container").hide();
        $("#banner_img_web").val('');
        $("#banner_img_web_remove").prop('checked', true);

        $(".file-styled").uniform({
            fileButtonClass: 'action btn btn-default'
        });
    }

    function toggleButtonFields(event) {
        $("#btn_text_group").toggle(event.checked);
        $("#btn_link_group").toggle(event.checked);
    }

    function choosePage(url) {
        document.getElementById('btn_link').value = url;

        $('#modal_choose_page').modal('hide');
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Checkboxes/radios (Uniform)
        // ------------------------------

        // Default initialization
        $(".styled").uniform();

        // File input
        $(".file-styled").uniform({
            fileButtonClass: 'action btn btn-default'
        });

        $("#modal_banner_remove").on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            var url = '{{ route('admin.banners.index') }}/' + id;

            $("#modal_banner_remove").find('form').attr('action', url);
        });
    });
</script>
@endsection

