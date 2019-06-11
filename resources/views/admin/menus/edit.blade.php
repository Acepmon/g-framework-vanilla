@extends('layouts.admin')

@section('load')

<script type="text/javascript" src="/assets/js/core/libraries/jquery_ui/core.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/selects/selectboxit.min.js"></script>

<script type="text/javascript" src="/assets/js/core/app.js"></script>
<script type="text/javascript" src="/assets/js/pages/form_selectbox.js"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Menu</span> Edit Page</h4>
    </div>

    <div class="heading-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="{{ route('admin.menus.index') }}"><i class="icon-home2 position-left"></i> Home</a></li>
    </ul>
</div>
<!-- /page header -->
@endsection

@section('content')



<!-- Grid -->
<div class="row">
    <div class="col-md-12">

        <!-- Horizontal form -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Horizontal form</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <!-- <form method="put" action="" class="form-horizontal"> -->
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('admin.menus.update', ['id' => $menu->id]) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-lg-2">Type</label>
                        <div class="col-lg-10">
                            <select class="selectbox" name="type" type="text" id="type" value="{{ $menu->type }}" required autofocus>
                                <option value="admin">admin</option>
                                <option value="car">car</option>
                                <option value="tour">tour</option>
                                <option value="default">default</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Title</label>
                        <div class="col-lg-10">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Menu title" value="{{ $menu->title }}" required autocomplete="title" autofocus>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Subtitle</label>
                        <div class="col-lg-10">
                            <input id="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" placeholder="Menu subtitle" value="{{ $menu->subtitle }}" required autocomplete="subtitle" autofocus>
                            @error('subtitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Link</label>
                        <div class="col-lg-10">
                            <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" placeholder="Menu link" value="{{ $menu->link }}" required autocomplete="link" autofocus>
                            @error('link')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Icon</label>
                        <div class="col-lg-10">
                            <input id="icon" type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" placeholder="Menu icon" value="{{ $menu->icon }}" required autocomplete="icon" autofocus>
                            @error('icon')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Status</label>
                        <div class="col-lg-10">
                            <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" placeholder="Menu status" value="{{ $menu->status }}" required autocomplete="status" autofocus>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Visibility</label>
                        <div class="col-lg-10">
                            <input id="visibility" type="text" class="form-control @error('visibility') is-invalid @enderror" name="visibility" placeholder="Menu visibility" value="{{ $menu->visibility }}" required autocomplete="visibility" autofocus>
                            @error('visibility')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Order</label>
                        <div class="col-lg-10">
                            <input id="order" type="text" class="form-control @error('order') is-invalid @enderror" name="order" placeholder="Menu order" value="{{ $menu->order }}" required autocomplete="order" autofocus>
                            @error('order')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Sublevel</label>
                        <div class="col-lg-10">
                            <input id="sublevel" type="text" class="form-control @error('sublevel') is-invalid @enderror" name="sublevel" placeholder="Menu sublevel" value="{{ $menu->sublevel }}" required autocomplete="sublevel" autofocus>
                            @error('sublevel')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Parent ID</label>
                        <div class="col-lg-10">
                            <select class="selectbox" name="parent_id" type="text" value="{{ $menu->parent_id }}" id="type">
                                <option value=""></option>
                                @foreach($menus as $data)
                                <option value="{{$data->id}}" {{$menu->parent_id == $data->id ? 'selected':''}}>{{$data->name}}</option>
                                @endforeach
                            </select>

                            <!--                            <input id="parent_id" type="text" class="form-control @error('parent_id') is-invalid @enderror" name="parent_id" placeholder="Parent id" value="{{ old('parent_id') }}" autocomplete="parent_id" autofocus>-->
                            @error('parent_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="text-right">
                        <a class="btn btn-default" href='javascript:history.back()'><i class="icon-arrow-left13 position-left"></i>Back</a>
                        <button type="submit" class="btn btn-primary">Edit menu<i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /horizotal form -->

    </div>

</div>
<!-- /grid -->


@endsection

@section('script')
@endsection
