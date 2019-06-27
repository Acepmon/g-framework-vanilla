@extends('layouts.admin')

@section('load')
<script type="text/javascript" src="/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/inputs/touchspin.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/styling/switch.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/editors/ace/ace.js"></script>
<script>
</script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Edit {{ ucfirst($content->type) }} Detail</span></h4>
    </div>

    <div class="heading-elements">
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="{{ route('admin.contents.index') }}">{{ ucfirst($content->type) }}s</a></li>
        <li><a href="{{ route('admin.contents.show', ['id' => $content->id]) }}">Detail</a></li>
        <li class="active">Edit</li>
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
<div class="row">
    <div class="col-sm-7">

        <div class="panel panel-flat">
            <div class="panel-body">
                <form class="form-horizontal form-validate-jquery" action="{{ route('admin.contents.update', ['id' => $content->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    @if(Session::has('error'))
                    <div class="alert alert-danger no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                        {{ session('error') }}
                    </div>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger no-border">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                            {{ $error }}
                        </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label class="control-label col-lg-2">Title <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <input id="title" type="text" class="form-control" name="title" placeholder="Enter content title..." value="{{$content->title}}" required="required" aria-required="true" invalid="true">
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-default" onclick="create_slug()">Create Slug</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Slug <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input id="slug" type="text" class="form-control" name="slug" placeholder="Enter content slug..." value="{{$content->slug}}" required="required" aria-required="true" invalid="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Type <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <select id="type" name="type" required="required" class="form-control">
                                @foreach(App\Content::TYPE_ARRAY as $value)
                                <option value="{{ $value }}" {{ ($value === $content->type)?'selected':'' }} >{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Status <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <select id="status" name="status" required="required" class="form-control">
                                @foreach(App\Content::STATUS_ARRAY as $value)
                                <option value="{{ $value }}" {{ ($value === $content->status)?'selected':'' }} >{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Visibility <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <select id="visibility" name="visibility" required="required" class="form-control">
                                @foreach(App\Content::VISIBILITY_ARRAY as $value)
                                <option value="{{ $value }}" {{ ($value === $content->visibility)?'selected':'' }} >{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Author ID</label>
                        <div class="col-lg-10">
                            <select name="author_id" type="text" id="author_id" class="form-control">
                                @foreach($users as $user)
                                <option {{$content->author_id == $user->id?'selected':''}} value="{{$user->id}}">{{$user->username}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Category</label>
                        <div class="col-lg-10">
                            <select name="category" type="text" class="form-control">
                                @foreach(App\TermTaxonomy::where('taxonomy', 'category')->get() as $taxonomy)
                                    <option value="{{$taxonomy->id}}" {{ count($content->terms->where('id', $taxonomy->id))>0?'selected':'' }}>{{$taxonomy->term->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Tags</label>
                        <div class="col-lg-10">
                            <select name="tags[]" id="tags" data-placeholder="Select Tags..." multiple="multiple" class="select">
                                @foreach(App\TermTaxonomy::where('taxonomy', 'tag')->get() as $tag)
                                    @php $selected = False @endphp
                                    @foreach($content->terms as $term)
                                        @php $selected = ($selected || $term->id == $tag->id) @endphp
                                    @endforeach
                                    <option value="{{ $tag->id }}" {{ $selected?'selected':'' }}>{{ $tag->term->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="text-right">
                        <a href="javascript:history.back()" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="panel panel-flat">
            @if (session('status'))
                <div id="timer" class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form action="route('admin.contents.revisions.update')">
                @method('PUT')
                @csrf
                <div class="panel-heading">
                    <h5 class="panel-title">
                        <span class="text-semibold">Edit content</span>
                    </h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><button type="button" data-target="{{ $revision_path }}" data-loading-text="<i class='icon-spinner4 spinner position-left'></i> Saving" class="btn btn-primary btn-sm btn-loading">Update</button></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <div id="php_editor">{{ file_get_contents(base_path($revision_path)) }}</div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="text-right" style="padding-bottom: 5px">
            <a href="{{ route('admin.contents.metas.create', ['id' => $content->id]) }}" class="btn btn-primary">Create Content Metas</a>
        </div>
        <div class="panel panel-flat">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Key</th>
                            <th>Value</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($metas as $meta)
                        <tr>
                            <td>{{$meta->id}}</td>
                            <td>{{$meta->key}}</td>
                            <td>{{$meta->value}}</td>
                            <td width="250px">
                                <div class="btn-group">
                                    <form action="{{ route('admin.contents.metas.edit', ['content' => $content->id, 'meta' => $meta->id]) }}" method="GET" style="float: left; margin-right: 5px">
                                        <button type="submit" class="btn btn-default">Edit</button>
                                    </form>
                                    <button data-toggle="modal" data-target="#modal_theme_danger" class="btn btn-default" onclick="delete_meta( {{$meta->id}} , {{$content->id}})">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /grid -->

<!-- Danger modal -->
<div id="modal_theme_danger" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Delete?</h6>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete this content meta?</p>
            </div>

            <div class="modal-footer">
                <form method="POST" id="delete_form">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    
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
    window.delete_meta = function(id, contentId) {
        $("#delete_form").attr('action', '/admin/contents/' + contentId + '/metas/'+id);
    }

    function create_slug() {
        var title = document.getElementById("title").value;
        title = title.toString().toLowerCase()
            .replace(/\s+/g, '-')
            .replace(/[\s\W-]+/g, '-')
            .replace(/\-\-+/g, '-')
            .replace(/^-+/, '')
            .replace(/-+$/, '');
        document.getElementById("slug").value = title;
    }

    $( "#slug" ).keyup(function( event ) {
            console.log(event.which);
        if ( event.which == 32) {
            var slug = document.getElementById("slug").value;
            slug = slug.toString().toLowerCase()
                .replace(' ', '-');
            document.getElementById("slug").value = slug;
        }
    });

    $(document).ready(function () {
        var php_editor = ace.edit("php_editor");
            php_editor.setTheme("ace/theme/monokai");
            php_editor.getSession().setMode("ace/mode/php");
            php_editor.setShowPrintMargin(false);

        $('.btn-loading').click(function () {
            var btn = $(this);
            var target = $(this).data("target");
            var content = php_editor.getSession().getValue();
            btn.button('loading');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route("admin.contents.revisions.update", ['id' => $content->id]) }}',
                type: "PUT",
                data: {
                    revision_path: target,
                    content: content
                },
                success: function () {
                    btn.button('reset');
                }
            });
        });
    });
</script>

<script>
    // Taken from assets/js/pages/form_validation.js
    $('.multiselect').multiselect({
        checkboxName: 'vali'
    });

    $('.select').select2({
        minimumResultsForSearch: Infinity
    });
    
    $(".styled, .multiselect-container input").uniform({ radioClass: 'choice' });
</script>
@endsection
