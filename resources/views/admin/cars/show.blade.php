@extends('themes.limitless.layouts.default')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/js/pages/sidebar_detached_sticky_native.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">{{ ucfirst($content->type) }} Detail</span></h4>
    </div>

    <div class="heading-elements">
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="{{ route('admin.cars.index') }}">{{ ucfirst($content->type) }}s</a></li>
        <li class="active">Detail</li>
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

<!-- Grid -->

<div class="has-detached-right">
    <div class="container-detached">
        <div class="content-detached">
            @if(Session::has('error'))
            <div class="alert alert-danger no-border">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                {{ session('error') }}
            </div>
            @endif

            <div class="panel panel-flat" id="detail">
                <div class="panel-heading">
                    <h5 class="panel-title">Detail</h5>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-lg-2">Title</label>
                        <div class="col-lg-10">
                            <label class="control-label col-lg-2">{{$content->title}}</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Slug</label>
                        <div class="col-lg-10">
                            <label class="control-label col-lg-2"><a href="{{url($content->slug)}}" target="_blank">{{$content->slug}}</a></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Type</label>
                        <div class="col-lg-10">
                            <label class="control-label col-lg-2">{{$content->type}}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Status</label>
                        <div class="col-lg-10">
                            <label class="control-label col-lg-2">{{$content->status}}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Visibility</label>
                        <div class="col-lg-10">
                            <label class="control-label col-lg-2">{{$content->visibility}}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Author id</label>
                        <div class="col-lg-10">
                            <label class="control-label col-lg-2">{{$content->author_id}}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Cateogry</label>
                        <div class="col-lg-10">
                            <label class="control-label col-lg-2">
                                @foreach($content->terms->where('taxonomy', 'category') as $rel)
                                    {{ $rel->term->name }},
                                @endforeach&nbsp;
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Tags</label>
                        <div class="col-lg-10">
                            <label class="control-label col-lg-2">
                                @foreach($content->terms->where('taxonomy', 'tag') as $rel)
                                    {{ $rel->term->name }},
                                @endforeach&nbsp;
                            </label>
                        </div>
                    </div>

                    <h5 class="panel-title">Car Information</h5>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Car Title</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('carTitle')}}</label>
                        </div>
                        <label class="control-label col-lg-2">Manufacturer</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('manufacturer')}}</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Car Title</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('carTitle')}}</label>
                        </div>
                        <label class="control-label col-lg-2">Manufacturer</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('manufacturer')}}</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Car Condition</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('carCondition')}}</label>
                        </div>
                        <label class="control-label col-lg-2">Model</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('model')}}</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Color</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('color')}}</label>
                        </div>
                        <label class="control-label col-lg-2">Displacement</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('displacement')}}km</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">VIN</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('vin')}}</label>
                        </div>
                        <label class="control-label col-lg-2">Year of Product</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('yearOfProduct')}}</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Year of Entry</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('yearOfEntry')}}</label>
                        </div>
                        <label class="control-label col-lg-2">Last Check</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('lastCheck')}}</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Transmission</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('transmission')}}</label>
                        </div>
                        <label class="control-label col-lg-2">Steering Wheel</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('steeringWheel')}}</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Seating</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('seating')}}</label>
                        </div>
                        <label class="control-label col-lg-2">Type of Fuel</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('typeOfFuel')}}</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Wheel Drive</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('wheelDrive')}}</label>
                        </div>
                        <label class="control-label col-lg-2">Mileage</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('mileage')}}</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Price</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('price')}}</label>
                        </div>
                        <label class="control-label col-lg-2">Price Type</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('priceType')}}</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-2">Advantages</label>
                        <div class="col-lg-4">
                            @if($content->metas->where('key', 'advantages'))
                                @foreach($content->metas->where('key', 'advantages') as $advantage)
                                    <label class="control-label">{{$advantage->value}}</label>
                                @endforeach
                            @else
                                No advantages listed
                            @endif
                        </div>
                        <label class="control-label col-lg-2">Seller Description</label>
                        <div class="col-lg-4">
                            <label class="control-label">{{$content->metaValue('sellerDescription')}}</label>
                        </div>
                    </div>

                    <div class="text-right" style="padding-bottom: 5px">
                        <a href="{{ route('admin.cars.index', ['type' => $content->type]) }}" class="btn btn-default">Back</a>
                        <a href="{{ route('admin.cars.edit', ['id' => $content->id]) }}" class="btn btn-default">Edit</a>
                    </div>
                </div>
            </div>

            <div class="panel panel-flat" id="comments">
                <div class="panel-heading">
                    <h6 class="panel-title text-semiold">Medias</h6>
                    <div class="heading-elements">
                        <ul class="list-inline list-inline-separate heading-text text-muted">
                            <li>{{ count($content->comments) }} comments</li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                    @foreach($content->medias() as $media)
                    <div class="col-lg-2 col-md-4 col-sm-6 px-0">
                        <img src="{{ $media }}" class="img-thumbnail img-fluid full-width">
                    </div>
                    @endforeach()
                    </div>
                </div>
            </div>

            <div class="panel panel-flat" id="comments">
                <div class="panel-heading">
                    <h6 class="panel-title text-semiold">Comments</h6>
                    <div class="heading-elements">
                        <ul class="list-inline list-inline-separate heading-text text-muted">
                            <li>{{ count($content->comments) }} comments</li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <ul class="media-list stack-media-on-mobile">
                        @foreach($content->comments->where('parent_id', NULL) as $comment)
                        <li class="media">
                            @include('admin.comments.includes.comment', ['comment' => $comment])
                        </li>
                        @endforeach()
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="sidebar-detached">
        <div class="sidebar sidebar-default">
            <div class="sidebar-content">

                <!-- Support -->
                <div class="sidebar-category no-margin">
                    <div class="category-title">
                        <span>Sidebar</span>
                        <i class="icon-menu7 pull-right"></i>
                    </div>

                    <div class="category-content">
                        <a href="#" class="btn bg-danger-400 btn-block" target="_blank"><i class="icon-lifebuoy position-left"></i> Item support</a>
                    </div>
                </div>
                <!-- /support -->


                <!-- Navigation -->
                <div class="sidebar-category">
                    <div class="category-content no-padding">
                        <ul class="nav navigation">
                            <li class="navigation-divider no-margin-top"></li>
                            <li class="navigation-header"><i class="icon-history pull-right"></i> Detail</li>
                            <li><a href="#detail">Detail</a></li>
                            <li><a href="#comments">Comments <span class="text-muted text-regular pull-right">{{ count($content->comments) }} comments</span></a></li>

                            <!-- Navigation History -->
                            <li class="navigation-header"><i class="icon-history pull-right"></i> Revision history</li>
                            @foreach($content->metas->whereIn('key', ['initial', 'revision', 'revert'])->sortByDesc('id') as $key=>$revision)
                            <li><a href="#v_{{ $revision->id }}">{{ $key+1 }}. {{ ucfirst($revision->key) }}
                                <span class="text-muted text-regular pull-right">{{ date('Y-m-d', json_decode($revision->value)->datetime) }}</span>
                            </a></li>
                            @endforeach

                            <li class="navigation-divider"></li>
                            <li class="navigation-header"><i class="icon-gear pull-right"></i> Extras</li>
                            <li><a href="http://themeforest.net/user/kopyov" target="_blank"><i class="icon-bubbles4 text-slate-400"></i> Contact me</a></li>
                            <li><a href="http://kopyov.ticksy.com" target="_blank"><i class="icon-lifebuoy text-slate-400"></i> Support</a></li>
                            <li><a href="http://themeforest.net/user/kopyov/portfolio?ref=Kopyov" target="_blank"><i class="icon-rocket text-slate-400"></i> Other templates</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /navigation -->

            </div>
        </div>
    </div>
</div>
<!-- /grid -->


@endsection

@section('script')

<script>
    window.delete_meta = function(id, contentId) {
        $("#delete_form").attr('action', '/admin/contents/' + contentId + '/metas/'+id);
    }
</script>
@endsection
