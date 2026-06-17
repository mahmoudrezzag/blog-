@extends('layouts.app')
@section('title') Create @endsection
@section('content')
<!-- /resources/views/post/create.blade.php -->


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Create Post Form -->


<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div class="mb-4">
    <label for="exampleFormControlInput1" class="form-label" >Title</label>
    <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Post Title"  value="{{ old('title') }}">
    </div>
    <div class="mb-4">
    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Post Description"></textarea>
    </div>
    
    <div class="mb-3"> 
        <label class="form-label">Post Creator</label>
        <select name="post_creator" class="form-select" aria-label="Default select example">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
            
        </select>
    </div>

    <button  class="btn btn-success">Submit</button>
</form>
@endsection