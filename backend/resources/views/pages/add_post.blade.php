@extends('layout.app')

@section('title', 'post')
@section('navbar', true)

@section('main')


<div class="container mt-5">
    <form action="{{ route('post.add.submit') }}" class="w-50 m-auto" method="Post">
        @csrf
        @session('success')
        <p class="alert alert-success mt-2">{{$value}}</p>
        @endsession
        <div class="mb-3">
            <label for="Author" class="form-label">Author</label>
            <input type="text" class="form-control" name='author_name' value="{{ old('author_name')}}" id=" Author" aria-describedby="emailHelp">
            @error('author_name')
            <p class="alert alert-danger mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Title" class="form-label">Title</label>
            <input type="text" class="form-control" name='title' value="{{ old('title')}}" id=" Title" aria-describedby="emailHelp">
            @error('title')
            <p class="alert alert-danger mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Body" class="form-label">Body</label>
            <textarea rows="5" class="form-control" name='body' value="{{ old('body')}}" id=" Body" aria-describedby="emailHelp"></textarea>
            @error('body')
            <p class="alert alert-danger mt-2">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-success w-100">Add</button>
    </form>
</div>
@endsection