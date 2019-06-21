@if($comment)
<div class="media">
    <div class="media-left">
        <a href="#"><img src="{{ $comment->author_avatar }}" class="img-circle img-sm" alt=""></a>
    </div>

    <div class="media-body">
        <div class="media-heading">
            <a href="#" class="text-semibold">{{ $comment->author_name }} {{$comment->id}}</a>
            <span class="media-annotation dotted">{{ $comment->created_at }} {{ ($comment->created_at != $comment->updated_at)?'*':'' }}</span>
        </div>

        <p>{{ $comment->content }}</p>

        <ul class="list-inline list-inline-separate text-size-small">
            <li><a href="#" data-toggle="modal" data-target="#modal_theme_danger_{{$comment->id}}">Delete</a></li>
        </ul>

        @each('admin.comments.includes.comment', $comment->children, 'comment')
    </div>
</div>

<!-- Danger modal -->
<div id="modal_theme_danger_{{$comment->id}}" class="modal fade">
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
                <form method="POST" id="delete_form" action="{{ route('admin.comments.destroy', ['id' => $comment->id]) }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}

                    <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
