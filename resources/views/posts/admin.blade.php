@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-primary" href="/post">Create</a>
        <hr>
    </div>
    <div class="container">
        <h2>Edit Posts</h2>
        @each('posts.listItem', $posts, 'post', 'posts.empty')
    </div>

@endsection
