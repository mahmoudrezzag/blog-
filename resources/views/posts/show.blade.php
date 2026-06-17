@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title mb-3">
                <strong>Title:</strong> {{ $post['title'] }}
            </h5>
            <p class="card-text mb-0">
                <strong>Description:</strong> {{ $post['description'] }}
            </p>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            Post Creator Info
        </div>
        <div class="card-body">
            <h5 class="card-title mb-3">
                <strong>Name:</strong> {{ $post->user ? $post->user->name : 'not found' }}
            </h5>
            <p class="card-text mb-2">
                <strong>Email:</strong> {{ $post->user ? $post->user->email : 'not found'   }}
            </p>
            <p class="card-text mb-0">
                <strong>Created at:</strong> {{ $post->user ? $post->user->created_at->format('Y-m-d H:i:s') : 'not found' }}
            </p>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('posts.index') }}" class="btn btn-secondary px-4">
            Back to Posts
        </a>
    </div>
@endsection