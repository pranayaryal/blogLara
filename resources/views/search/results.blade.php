@extends('layouts.app')
@section('content')
<div class="entries">
    <h2>Showing results for search on: {{ $query }}</h2>

    @each('posts.listItem', $results, 'post', 'search.empty')
</div>
@endsection