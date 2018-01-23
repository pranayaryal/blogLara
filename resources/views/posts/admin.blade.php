@extends('layouts.app')

@section('content')
<div class="container columns admin">
  <div class="column is-two-thirds posts">
    <h2 class="title">Edit Posts</h2>
    @each('posts.listItem', $posts, 'post', 'posts.empty')
  </div>

  <aside class="column is-one-thirds profiles">
    <h2 class="title">Edit Profiles</h2>
    @each('profile.list', $profiles, 'profile', 'profile.empty')
  </aside>
</div>
@endsection
