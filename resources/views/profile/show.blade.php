@extends('layouts.app')
@section('content')
<div class="author">
  <div class="user">
    @if(!empty($profile->avatar))
    <div class="user_avatar" style="background-image: url( '{{ $profile->avatar }}' )"></div>
    @else
    <div class="user_avatar"></div>
    @endif

    <div class="user_details">
    <h1 class="user_name">{{ $profile->full_name }}</h1>
    <p class="user_title">{{ $profile->title }}</p>
    @if(Auth::check())
    <div class="post_control">
      <a class="button is-small" href="/profiles/{{ $profile->id }}/edit">Edit</a>
      <a href="/profiles/{{ $profile->id }}/delete"
          onclick="event.preventDefault();
          document.getElementById('delete-form-{{ $profile->id }}').submit();"
          class="button is-danger is-small">
          Delete
      </a>
      <form id="delete-form-{{ $profile->id }}" action="/profiles/{{ $profile->id }}/delete" method="POST" style="display: none;">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
      </form>
    </div>
    @endif

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

    <div class="user_bio content">
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
