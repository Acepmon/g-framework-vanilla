@extends('themes.limitless.layouts.default')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/pages/datatables_basic.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Comments</span></h4>
    </div>

    <div class="header-elements">
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 mr-2"></i> Home</a>
            <span class="breadcrumb-item active">Comments</span>
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

<div class="text-right" style="padding-bottom: 5px">
</div>

<div class="card">
    @if (session('status'))
        <div id="timer" class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="30%">Author</th>
                    <th width="30%">Comment</th>
                    <th>Type</th>
                    <th>Comment Of</th>
                    <th>Reply To</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>
                        <a href="#" class="media-left"><img src="{{ ($comment->author_avatar)?$comment->author_avatar:asset('placeholder.jpg')}}" class="img-sm img-circle" alt=""></a>
                        <div class="media-body">
                            <span class="media-heading font-weight-semibold">{{ $comment->author_name }}</span>
                            <span class="text-size-mini text-muted display-block">{{ $comment->author_id?'@'.$comment->author_id:$comment->author_email }}</span>
                        </div>
                    </td>
                    <td>{{$comment->content}}</td>
                    <td>{{$comment->type}}</td>
                    <td>
                        @if($comment->commentable)
                        <a href="{{ route('admin.contents.show', ['id' => $comment->commentable->id, 'type' => $comment->commentable->type]) }}">{{$comment->commentable->title}}</a></td>
                        @endif
                    <td>
                        @if($comment->parent_id)
                        <a href="{{ route('admin.comments.show', ['id' => $comment->parent_id]) }}">Comment {{$comment->parent_id}}
                        @endif
                    </td>
                    <td width="250px">
                        <div class="btn-group">
                            <a href="{{ route('admin.comments.show', ['id' => $comment->id]) }}" class="btn btn-light">Show</a>
                            <button data-toggle="modal" data-target="#modal_theme_danger" class="btn btn-light" onclick="delete_comment({{ $comment->id }})">Delete</button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
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
                <p>Are you sure you want to delete this comment?</p>
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
    window.delete_comment = function(id) {
        $("#delete_form").attr('action', '/admin/comments/'+id);
    }

    setTimeout(function(){ document.getElementById("timer").remove() }, 10000);
</script>
@endsection

