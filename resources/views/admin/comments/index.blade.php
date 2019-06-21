@extends('layouts.admin')

@section('load')
<script type="text/javascript" src="/assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="/assets/js/pages/datatables_basic.js"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Comments</span></h4>
    </div>

    <div class="heading-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li class="active">Comments</li>
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

<div class="text-right" style="padding-bottom: 5px">
</div>

<div class="panel panel-flat">
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
                        <a href="#" class="media-left"><img src="{{ ($comment->author_avatar)?$comment->author_avatar:'/assets/images/placeholder.jpg'}}" class="img-sm img-circle" alt=""></a>
                        <div class="media-body">
                            <span class="media-heading text-semibold">{{ $comment->author_name }}</span>
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
                            <a href="{{ route('admin.comments.show', ['id' => $comment->id]) }}" class="btn btn-default">Show</a>
                            <button data-toggle="modal" data-target="#modal_theme_danger" class="btn btn-default" onclick="delete_comment({{ $comment->id }})">Delete</button>
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

