@extends('layouts.app')
@section('content')
<div class="author">
  <div class="user">
    <div class="user_avatar" style="background-image: url( '{{ $profile->avatar }}' )"></div>

    <div class="user_details">
    <h2 class="user_name">{{ $profile->user->name }}</h2>
    <p class="user_title">{{ $profile->title }}</p>

    @if(!empty($profile->instagram) || !empty($profile->twitter) || !empty($profile->github) || !empty($profile->dribbble))
      <ul class="user_social">
        @if(!empty($profile->instagram))
        <li><a target="_blank" href="http://instagram.com/{{ $profile->instagram }}"><i class="fab fa-instagram"></i></a></li>
        @endif
        @if(!empty($profile->twitter))
        <li><a target="_blank" href="http://twitter.com/{{ $profile->twitter }}"><i class="fab fa-twitter"></i></a></li>
        @endif
        @if(!empty($profile->github))
        <li><a target="_blank" href="http://github.com/{{ $profile->github }}"><i class="fab fa-github"></i></a></li>
        @endif
        @if(!empty($profile->dribbble))
        <li><a target="_blank" href="http://dribbble.com/{{ $profile->dribbble }}"><i class="fab fa-dribbble"></i></a></li>
        @endif
      </ul>
    @endif
    </div>

    <div class="user_bio">
    {!! $profile->bio !!}
    </div>
  </div>
</div>

<div class="posts">
    @each('posts.listItem', $posts, 'post')
</div>

<div class="subscribe" id="mailing_list">
    @include('mailing-list')
</div>
@endsection
