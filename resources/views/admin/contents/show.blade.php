@extends('admin.layouts.default')

@section('load')
<script type="text/javascript" src="/assets/js/pages/sidebar_detached_sticky_native.js"></script>
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
        <li><a href="{{ route('admin.contents.index', ['type' => $content->type]) }}">{{ ucfirst($content->type) }}s</a></li>
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
                                @endforeach
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Tags</label>
                        <div class="col-lg-10">
                            <label class="control-label col-lg-2">
                                @foreach($content->terms->where('taxonomy', 'tag') as $rel)
                                    {{ $rel->term->name }},
                                @endforeach
                            </label>
                        </div>
                    </div>
                    <div class="text-right" style="padding-bottom: 5px">
                        <a href="{{ route('admin.contents.index', ['type' => $content->type]) }}" class="btn btn-default">Back</a>
                        <a href="{{ route('admin.contents.edit', ['id' => $content->id]) }}" class="btn btn-default">Edit</a>
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

            <!-- Revisions -->
            @foreach($content->metas->whereIn('key', ['initial', 'revision', 'revert'])->sortByDesc('id') as $key=>$revision)
            <div class="panel panel-flat" id="v_{{ $revision->id }}">
                <div class="panel-heading">
                    <h5 class="panel-title">{{ $key+1 }}. {{ ucfirst($revision->key) }}</h5>
                    <span class="label bg-blue heading-text">{{ date('Y-m-d H:i:s', json_decode($revision->value)->datetime) }}</span>
                    <div class="heading-elements">
                        @if($key < count($content->metas->whereIn('key', ['initial', 'revision', 'revert']))-1)
                        <a href="{{ route('admin.contents.revisions.revert', ['id' => $content->id, 'revision' => $revision->id]) }}" class="btn btn-default"><i class="icon-reload-alt position-left"></i> Revert</a>
                        @endif
                        <a href="{{ route('admin.contents.revisions.show', ['id' => $content->id, 'revision' => $revision->id]) }}" class="btn btn-default"><i class="icon-eye position-left"></i> View in Editor</a>
                    </div>
                </div>

                <div class="panel-body">
                    <pre class="language-javascript"><code>{{ var_dump(json_decode($revision->value)) }}</code></pre>
                </div>
            </div>
            @endforeach
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
