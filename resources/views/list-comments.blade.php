 @foreach($comments as $comment)
    <div class="display-comment">
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->comment }}</p>
        <a href="" id="reply"></a>
        {{ Form::open(['route' => 'comment.add', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'add-comment']) }}        
            @csrf
            <div class="form-group">
                {{ Form::text('comment_body', null, ['class' => 'form-control box-size', 'placeholder' => 'Enter your comment', 'required' => 'required']) }}                
                {{ Form::hidden('post_id', $post_id) }}                
                {{ Form::hidden('comment_id', $comment->id) }}                
            </div>
            <div class="form-group">
                {{ Form::submit('Reply', ['class' => 'btn btn-warning']) }}                
            </div>        
        {{ Form::close() }}
        @include('list-comments', ['comments' => $comment->reply])
    </div>
@endforeach