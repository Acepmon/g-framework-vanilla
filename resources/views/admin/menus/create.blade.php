@extends('themes.limitless.layouts.default')

@section('title', 'Create Menu')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/js/core/libraries/jquery_ui/core.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/selects/selectboxit.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('limitless/js/pages/form_selectbox.js') }}"></script>
@endsection

@section('pageheader')
    @include('admin.menus.includes.pageheader')
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Create New Menu</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <form method="POST" action="{{ route('admin.menus.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="title" class="control-label">Title <span class="text-danger">*</span></label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Menu title" value="{{ old('title') }}" required autocomplete="title">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="link" class="control-label">Link</label>
                        <div class="input-group">
                            <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" placeholder="https://..." value="{{ old('link') }}" required autocomplete="link">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_choose_page">Choose From Pages</button>
                            </span>
                        </div>
                        @error('link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="icon" class="control-label">Icon</label>
                        <div class="input-group">
                            <input id="icon" type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" placeholder="Menu icon" value="{{ old('icon') }}" required autocomplete="icon">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_choose_icon">Choose Icon</button>
                            </span>
                        </div>
                        @error('icon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="text-right">
                        <a class="btn btn-default" href="javascript:history.back()" type="btn btn-primary"><i class="icon-arrow-left13 position-left"></i>Back</a>
                        <button type="submit" class="btn btn-success">Submit
                            <i class="icon-arrow-right14 position-right"></i>
                        </button>
                    </div>
                </form>
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

<div id="modal_choose_icon" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Icomoon icon set</h6>
            </div>

            <div class="modal-body">
                <p class="content-group">Icomoon is a custom icon set, includes 1145 icon glyphs based on 16px grid. This set is a <code>default</code> icon set of the template, majority of components are using Icomoon font family for UI elements instead of images, so all of them are retina-ready. <code>Glyphicon</code> and <code>FontAwesome</code> icon sets are also added, but as optional choice. In order to get the best look of UI elements, I recommend to include this icon set only as you can find perfectly crafted icons according to most of your common needs.</p>

                <div class="row glyphs">
                    @foreach ($icons as $icon)
                    <div class="col-md-3 col-sm-4" onclick="chooseIcon('{{$icon}}')"><i class="{{$icon}}"></i> {{$icon}}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal_choose_parent" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Choose Parent Menu</h6>
            </div>

            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function choosePage(url) {
        document.getElementById('link').value = url;

        $('#modal_choose_page').modal('hide');
    }

    function chooseIcon(icon) {
        document.getElementById('icon').value = icon;

        $('#modal_choose_icon').modal('hide');
    }

    function chooseParent(parentId) {
        document.getElementById('parent_id').value = parentId;

        $('#modal_choose_parent').modal('hide');
    }
</script>
@endsection
