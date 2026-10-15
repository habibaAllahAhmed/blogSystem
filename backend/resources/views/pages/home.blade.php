@extends('layout.app')

@section('title' , 'home')
@section('navbar', 'home')
@section('main')
<div class="container mt-5">
    <div class="row">
        @foreach($posts as $post)
        <div class="col-lg-12 mb-3">
            <x-post :post="$post" :operations="false" />
        </div>
        @endforeach
    </div>
</div>
@endsection