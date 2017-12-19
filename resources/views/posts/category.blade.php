@extends('layouts.app')

@section('content')
<div class="entries">
    @if(!empty($category_name))
        <h2>Showing posts in: {{ $category_name }}</h2>
    @endif

    @each('posts.listItem', $posts, 'post')

    <div class="subscribe">
        @include('mailing-list')
    </div>
</div>
@endsection
