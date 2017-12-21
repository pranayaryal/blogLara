@extends('layouts.app')
@section('content')
<div class="posts">
    <h2>Search for: {{ $query }}</h2>

    @each('posts.single', $results, 'post', 'search.empty')
</div>
@endsection
