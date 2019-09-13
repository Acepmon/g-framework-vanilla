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
            <span class="breadcrumb-item active">Detail</span>
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
                    </div>

                    <div class="card-header">
                        <h5 class="card-title">Car Information</h5>
                    </div>
                    <br>

                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Manufacturer</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('manufacturer')}}&nbsp;</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Car Condition</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('carCondition')}}</label>
                            </div>
                            <label class="col-form-label col-lg-2">Model</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('model')}}&nbsp;</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Color</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('color')}}&nbsp;</label>
                            </div>
                            <label class="col-form-label col-lg-2">Displacement</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('displacement')}}cc</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">VIN</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('vin')}}&nbsp;</label>
                            </div>
                            <label class="col-form-label col-lg-2">Year of Product</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('buildYear')}}&nbsp;</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Year of Entry</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('importDate')}}&nbsp;</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Transmission</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('transmission')}}&nbsp;</label>
                            </div>
                            <label class="col-form-label col-lg-2">Steering Wheel</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('steeringWheel')}}&nbsp;</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Seating</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('manCount')}}&nbsp;</label>
                            </div>
                            <label class="col-form-label col-lg-2">Type of Fuel</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('fuelType')}}&nbsp;</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Wheel Drive</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('wheelPosition')}}&nbsp;</label>
                            </div>
                            <label class="col-form-label col-lg-2">Mileage</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('mileage')}}&nbsp;</label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Price</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('price')}}&nbsp;</label>
                            </div>
                            <label class="col-form-label col-lg-2">Price Type</label>
                            <div class="col-lg-4">
                                <label class="col-form-label">{{$content->metaValue('priceType')}}&nbsp;</label>
                            </div>
                        </div>
                    </div>
                
                </div>

                <div class="card">
                    <div class="card-body">
                        @foreach($content->medias() as $media)
                        <div class="col-lg-2 col-md-4 col-sm-6 px-0">
                            <img src="{{ $media }}" class="img-thumbnail img-fluid full-width">
                        </div>
                        <label class="col-form-label col-lg-2">Seller Description</label>
                        <div class="col-lg-4">
                            <label class="col-form-label">{{$content->metaValue('sellerDescription')}}&nbsp;</label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-6 px-0">
                            <img src="{{ App\Config::getStorage() . $content->metaValue('thumbnail') }}" class="img-thumbnail img-fluid full-width">
                        </div>
                        @foreach($content->medias() as $media)
                        <div class="col-lg-2 col-md-4 col-sm-6 px-0">
                            <img src="{{ $media }}" class="img-thumbnail img-fluid full-width">
                        </div>
                        @endforeach()
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
        </div>
    </div>

    <div class="sidebar sidebar-light sidebar-component sidebar-component-left sidebar-expand-md">
        <div class="sidebar-content">

            <div class="card-header bg-transparent header-elements-inline">
                <span class="text-uppercase font-size-sm font-weight-semibold">Sidebar</span>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item">
                            <i class="icon-menu7 pull-right"></i>
                        </a>
                    </div>
                </div>
            </div>
                            
            <div class="card-body">
                <a href="#" class="btn bg-danger-400 btn-block" target="_blank"><i class="icon-lifebuoy position-left"></i> Item support</a>
            </div>
            <!-- /support -->


            <!-- Navigation -->
            
            <div class="card card-sidebar-mobile">
                <ul class="nav nav-sidebar" data-nav-type="accordion">
                    <li class="nav-divider no-margin-top"></li>
                    <li class="nav-item-header"><i class="icon-history pull-right"></i> Detail</li>
                    <li class="nav-item"><a class="nav-link" href="#detail">Detail</a></li>
                    <li class="nav-item"><a class="nav-link" href="#comments">Comments <span class="text-muted font-weight-normal ml-auto">{{ count($content->comments) }} comments</span></a></li>
                    
                    <!-- Navigation History -->
                    <li class="nav-item-header"><i class="icon-history pull-right"></i> Revision history</li>
                    @foreach($content->metas->whereIn('key', ['initial', 'revision', 'revert'])->sortByDesc('id') as $key=>$revision)
                    <li class="nav-item"><a class="nav-link" href="#v_{{ $revision->id }}">{{ $key+1 }}. {{ ucfirst($revision->key) }}
                        <span class="text-muted font-weight-normal ml-auto">{{ date('Y-m-d', json_decode($revision->value)->datetime) }}</span>
                    </a></li>
                    @endforeach

                    <li class="nav-divider"></li>
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
<!-- /grid -->


@endsection

@section('script')

<script>
    window.delete_meta = function(id, contentId) {
        $("#delete_form").attr('action', '/admin/contents/' + contentId + '/metas/'+id);
    }
</script>
@endsection
