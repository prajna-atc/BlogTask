@extends('layouts.app')
<style>
    .display-comment {
        margin-left: 40px
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p>{{ $post->title }}</p>
                    <p>
                        {{ $post->body }}
                    </p>
                    <hr />                  
                    <h4>Comments</h4>
                    @include('list-comments', ['comments' => $post->comments, 'post_id' => $post->id])
                    <hr />
                    <h4>Add comment</h4>
                    {{ Form::open(['route' => 'comment.add', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'add-comment']) }}                     
                        @csrf
                        <div class="form-group">
                            {{ Form::text('comment_body', null, ['class' => 'form-control box-size', 'placeholder' => 'Enter your comment', 'required' => 'required']) }}
                            {{ Form::hidden('post_id', $post->id) }}                            
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Add Comment', ['class' => 'btn btn-warning']) }}                            
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection