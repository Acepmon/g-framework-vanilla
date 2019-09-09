@extends('themes.limitless.layouts.default')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/js/pages/sidebar_detached_sticky_native.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 ml-2"></i> <span class="font-weight-semibold">{{ ucfirst($content->type) }} Detail</span></h4>
    </div>

    <div class="header-elements">
    </div>
</div>
<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 ml-2`"></i> Home</a>
            <a class="breadcrumb-item" href="{{ route('admin.cars.index') }}">{{ ucfirst($content->type) }}s</a>
            <span class="active">Detail</span>
        </div>
    </div>

    <div class="header-elements d-none">
        <div class="breadcrumb justify-content-center">
            <a href="#" class="breadcrumb-elements-item"><i class="icon-comment-discussion mr-2"></i>Link</a>
            <div class="breadcrumb-elements-item dropdown p-0">
                <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon-gear mr-2"></i>Dropdown</a>
                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" 
                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-84px, 40px, 0px);">
                    <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
                    <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                    <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')

<!-- Grid -->

<div class="d-md-flex align-items-md-start">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            @if(Session::has('error'))
                <div class="alert alert-danger no-border">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                    {{ session('error') }}
                </div>
                @endif

                <div class="card" id="detail">
                    <div class="card-header">
                        <h5 class="card-title">Detail</h5>
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Title</label>
                            <div class="col-lg-10">
                                <label class="col-form-label col-lg-2">{{$content->title}}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Slug</label>
                            <div class="col-lg-10">
                                <label class="col-form-label col-lg-2"><a href="{{url($content->slug)}}" target="_blank">{{$content->slug}}</a></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Type</label>
                            <div class="col-lg-10">
                                <label class="col-form-label col-lg-2">{{$content->type}}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Status</label>
                            <div class="col-lg-10">
                                <label class="col-form-label col-lg-2">{{$content->status}}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Visibility</label>
                            <div class="col-lg-10">
                                <label class="col-form-label col-lg-2">{{$content->visibility}}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Author id</label>
                            <div class="col-lg-10">
                                <label class="col-form-label col-lg-2">{{$content->author_id}}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Cateogry</label>
                            <div class="col-lg-10">
                                <label class="col-form-label col-lg-2">
                                    @foreach($content->terms->where('taxonomy', 'category') as $rel)
                                        {{ $rel->term->name }},
                                    @endforeach&nbsp;
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Tags</label>
                            <div class="col-lg-10">
                                <label class="col-form-label col-lg-2">
                                    @foreach($content->terms->where('taxonomy', 'tag') as $rel)
                                        {{ $rel->term->name }},
                                    @endforeach&nbsp;
                                </label>
                            </div>
                        </div>

                        <h5 class="card-title">Car Information</h5>
                        <br>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Car Title</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('carTitle')}}</label>
                            </div>
                            <label class="col-form-label col-lg-2">Manufacturer</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('manufacturer')}}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Car Title</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('carTitle')}}</label>
                            </div>
                            <label class="col-form-label col-lg-2">Manufacturer</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('manufacturer')}}</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Car Condition</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('carCondition')}}</label>
                            </div>
                            <label class="col-form-label col-lg-2">Model</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('model')}}</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Color</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('color')}}</label>
                            </div>
                            <label class="col-form-label col-lg-2">Displacement</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('displacement')}}km</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">VIN</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('vin')}}</label>
                            </div>
                            <label class="col-form-label col-lg-2">Year of Product</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('yearOfProduct')}}</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Year of Entry</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('yearOfEntry')}}</label>
                            </div>
                            <label class="col-form-label col-lg-2">Last Check</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('lastCheck')}}</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Transmission</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('transmission')}}</label>
                            </div>
                            <label class="col-form-label col-lg-2">Steering Wheel</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('steeringWheel')}}</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Seating</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('seating')}}</label>
                            </div>
                            <label class="col-form-label col-lg-2">Type of Fuel</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('typeOfFuel')}}</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Wheel Drive</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('wheelDrive')}}</label>
                            </div>
                            <label class="col-form-label col-lg-2">Mileage</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('mileage')}}</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Price</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('price')}}</label>
                            </div>
                            <label class="col-form-label col-lg-2">Price Type</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('priceType')}}</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Advantages</label>
                            <div class="col-lg-4">
                                @if($content->metas->where('key', 'advantages'))
                                    @foreach($content->metas->where('key', 'advantages') as $advantage)
                                        <label class="col-form-label">{{$advantage->value}}</label>
                                    @endforeach
                                @else
                                    No advantages listed
                                @endif
                            </div>
                            <label class="col-form-label col-lg-2">Seller Description</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('sellerDescription')}}</label>
                            </div>
                        </div>

                        <div class="text-right" style="padding-bottom: 5px">
                            <a href="{{ route('admin.cars.index', ['type' => $content->type]) }}" class="btn btn-default">Back</a>
                            <a href="{{ route('admin.cars.edit', ['id' => $content->id]) }}" class="btn btn-default">Edit</a>
                        </div>
                    </div>
                </div>

                <div class="card" id="comments">
                    <div class="card-header">
                        <h6 class="card-title font-weight-semibold">Medias</h6>
                        <div class="header-elements">
                            <ul class="list-inline list-inline-separate heading-text text-muted">
                                <li>{{ count($content->comments) }} comments</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                        @foreach($content->medias() as $media)
                        <div class="col-lg-2 col-md-4 col-sm-6 px-0">
                            <img src="{{ $media }}" class="img-thumbnail img-fluid full-width">
                        </div>
                        @endforeach()
                        </div>
                    </div>
                </div>

                <div class="card" id="comments">
                    <div class="card-header">
                        <h6 class="card-title font-weight-semibold">Comments</h6>
                        <div class="header-elements">
                            <ul class="list-inline list-inline-separate heading-text text-muted">
                                <li>{{ count($content->comments) }} comments</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body">
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


        <div class="sidebar sidebar-light sidebar-component sidebar-component-left sidebar-expand-md">
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
                <div class="card card-sidebar-mobile">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">
                        <li class="navigation-divider no-margin-top"></li>
                        <li class="nav-item-header"><i class="icon-history pull-right"></i> Detail</li>
                        <li class="nav-item"><a class="nav-link" href="#detail">Detail</a></li>
                        <li class="nav-item"><a class="nav-link" href="#comments">Comments <span class="text-muted text-regular pull-right">{{ count($content->comments) }} comments</span></a></li>

                        <!-- Navigation History -->
                        <li class="nav-item-header"><i class="icon-history pull-right"></i> Revision history</li>
                        @foreach($content->metas->whereIn('key', ['initial', 'revision', 'revert'])->sortByDesc('id') as $key=>$revision)
                        <li class="nav-item"><a class="nav-link" href="#v_{{ $revision->id }}">{{ $key+1 }}. {{ ucfirst($revision->key) }}
                            <span class="text-muted text-regular pull-right">{{ date('Y-m-d', json_decode($revision->value)->datetime) }}</span>
                        </a></li>
                        @endforeach

                        <li class="navigation-divider"></li>
                        <li class="nav-item-header"><i class="icon-gear pull-right"></i> Extras</li>
                        <li class="nav-item"><a class="nav-link" href="http://themeforest.net/user/kopyov" target="_blank"><i class="icon-bubbles4 text-slate-400"></i> Contact me</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://kopyov.ticksy.com" target="_blank"><i class="icon-lifebuoy text-slate-400"></i> Support</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://themeforest.net/user/kopyov/portfolio?ref=Kopyov" target="_blank"><i class="icon-rocket text-slate-400"></i> Other templates</a></li>
                    </ul>
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
