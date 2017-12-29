@if(Auth::user())
    <div class="col-md-12">
        <form action="{{ route('content.post', ['id' => $post->id]) }}" method="post">
            <div class="form-group">
                <label for="content">@lang('general.commentVerb')</label>
                <input type="text" class="form-control" id="content" name="content">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="user_id" name="post_id" value="{{ $post->id }}">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="user_id" name="user_id"
                       value="{{ Auth::user()->id }}">
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">@lang('general.submit')</button>
        </form>
    </div>
@endif

<div class="col-md-12">
    @foreach($comments as $comment)
        @if($comment->post_id == $post->id)
            <p>{{ $comment->user->name }}</p>
            <p>{{ $comment->created_at }}</p>
            <p>{{ $comment->content }}</p>
            @if(Auth::user() && Auth::user()->type == 1 || Auth::user() && Auth::user()->id == $comment->user_id)
                <a href="{{ route('content.post.deleteComment', ['postId' => $post->id, 'commentId' => $comment->id]) }}">@lang('general.delete')</a>
            @endif
        @endif
    @endforeach
</div>