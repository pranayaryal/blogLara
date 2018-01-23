@extends('layouts.app')

@section('content')
<div class="container">
  <div class="column">
    <h2>Edit Posts</h2>
    @each('posts.listItem', $posts, 'post', 'posts.empty')
  </div>

  <aside class="column">
    <h2>Edit Profiles</h2>
    @each('profile.list', $profiles, 'profile', 'profile.empty')
  </aside>
</div>
@endsection
