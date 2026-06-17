@extends('layouts.app')
@section('title') Edit @endsection
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('posts.update', $post->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-4">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $post->title }}" >

    </div>
    <div class="mb-4">
    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" >
        {{ $post->description }}
    </textarea>
    </div>

    <div class="mb-3"> 
        <label class="form-label">Post Creator</label>
        <select name="post_creator" class="form-select" aria-label="Default select example">
            @foreach ($users as $user )
                <!-- <option value="{{ $user->id }}" {{ $post->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option> -->
                <option @selected($post->user_id == $user->id) value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        
        </select>
    </div>

    <button  class="btn btn-primary">Update</button>
</form>
@endsection 