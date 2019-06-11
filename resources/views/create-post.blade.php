@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Post</div>
                <div class="card-body">
                    {{ Form::open(['route' => 'store', 'class' => 'form-horizontal form-group', 'method' => 'post', 'id' => 'add-post']) }}                    
                        <div class="form-group">
                            @csrf
                            <label class="label">Post Title: </label>
                            {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => 'Enter Post Title', 'required' => 'required']) }}                           
                        </div>
                        <div class="form-group">
                            <label class="label">Post Description: </label>
                            {{ Form::textarea('body', null,['class' => 'form-control box-size', 'placeholder' => 'Eneter Post Description']) }}                            
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Save', ['class' => 'btn btn-success']) }}                           
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection