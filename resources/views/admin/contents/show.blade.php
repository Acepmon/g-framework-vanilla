@extends('themes.limitless.layouts.default')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/sidebar_components.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/sidebar_secondary.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">{{ ucfirst($content->type) }} Detail</span></h4>
    </div>

    <div class="header-elements">
    </div>
</div>

<div class="breadcrumb-line">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 mr-2"></i> Home</a>
            <a class="breadcrumb-item" href="{{ route('admin.contents.index', ['type' => $content->type]) }}">{{ ucfirst($content->type) }}s</a>
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
                                @endforeach
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Tags</label>
                        <div class="col-lg-10">
                            <label class="col-form-label col-lg-2">
                                @foreach($content->terms->where('taxonomy', 'tag') as $rel)
                                    {{ $rel->term->name }},
                                @endforeach
                            </label>
                        </div>
                    </div>
                    <div class="text-right" style="padding-bottom: 5px">
                        <a href="{{ route('admin.contents.index', ['type' => $content->type]) }}" class="btn btn-light">Back</a>
                        <a href="{{ route('admin.contents.edit', ['id' => $content->id]) }}" class="btn btn-light">Edit</a>
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

            <!-- Revisions -->
            @foreach($content->metas->whereIn('key', ['initial', 'revision', 'revert'])->sortByDesc('id') as $key=>$revision)
            <div class="card" id="v_{{ $revision->id }}">
                <div class="card-header">
                    <h5 class="card-title">{{ $key+1 }}. {{ ucfirst($revision->key) }}</h5>
                    <span class="badge bg-blue heading-text">{{ date('Y-m-d H:i:s', json_decode($revision->value)->datetime) }}</span>
                    <div class="header-elements">
                        @if($key < count($content->metas->whereIn('key', ['initial', 'revision', 'revert']))-1)
                        <a href="{{ route('admin.contents.revisions.revert', ['id' => $content->id, 'revision' => $revision->id]) }}" class="btn btn-light"><i class="icon-reload-alt position-left"></i> Revert</a>
                        @endif
                        <a href="{{ route('admin.contents.revisions.show', ['id' => $content->id, 'revision' => $revision->id]) }}" class="btn btn-light"><i class="icon-eye position-left"></i> View in Editor</a>
                    </div>
                </div>

                <div class="card-body">
                    <pre class="language-javascript"><code>{{ var_dump(json_decode($revision->value)) }}</code></pre>
                </div>
            </div>
            @endforeach
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
