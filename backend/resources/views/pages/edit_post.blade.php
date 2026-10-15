@extends('layout.app')

@section('title' , 'post')
@section('navbar', true)

@section('main')


<div class="container mt-5">
    <form action="{{ route('post.edit.submit',['id' => $post->id] ) }}" class="w-50 m-auto" method="Post">
        @csrf
        @session('success')
        <p class="alert alert-success mt-2">{{$value}}</p>
        @endsession
        <div class="mb-3">
            <label for="Author" class="form-label">Author</label>
            <input type="text" class="form-control" id="Author" name="author_name" value="{{ old('author_name', $post->author_name) }}">
            @error('author_name')
            <p class="alert alert-danger mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Title" class="form-label">Title</label>
            <input type="text" class="form-control" name='title' id="Title" value="{{ old('title', $post->title) }}">
            @error('title')
            <p class="alert alert-danger mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Body" class="form-label">Body</label>
            <textarea rows="5" class="form-control" name='body' id="Body" value="{{ $post->body}}">{{ old('body', $post->body) }}</textarea>
            @error('body')
            <p class="alert alert-danger mt-2">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-info w-100">Edit</button>
    </form>
</div>
@endsection