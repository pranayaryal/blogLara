@extends('layouts.app')

@section('content')
<div class="posts">
    @if(!empty($category_name))
        <h2>{{ $category_name }}</h2>
    @endif

    @each('posts.single', $posts, 'post')
</div>
@endsection
