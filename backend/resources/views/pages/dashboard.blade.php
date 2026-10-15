@extends('layout.app')

@section('title', 'Dashboard')

@section('navbar', true)

@section('main')

<div class="container mt-5">
    <a href="{{ route('post.add') }}"
        class="btn btn-success w-100 mb-4">
        Create New Post
    </a>

    <div class="row">
        @foreach($posts as $post)
        <div class="col-lg-12 mb-3">
            <x-post :post="$post" :operations="true" />
        </div>
        @endforeach
    </div>
</div>

@endsection