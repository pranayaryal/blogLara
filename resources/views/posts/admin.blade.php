@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Edit Posts</h2>
  @each('posts.listItem', $posts, 'post', 'posts.empty')
</div>
@endsection
