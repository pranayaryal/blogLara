@extends('layouts.app')
@section('content')
<div class="posts">
    <h1>Search for: {{ $query }}</h1>

    @each('posts.single', $results, 'post', 'search.empty')
</div>

<div class="subscribe" id="mailing_list">
    @include('mailing-list')
</div>
@endsection
