@extends('layouts.app')
@section('content')
<div class="user">
    <div class="user_details">
        <div class="user_avatar" style="background-image: url( {{ $profile->avatar }} )"></div>
        <h2 class="user_name">{{ $profile->user->name }}</h2>
        <p class="user_title">{{ $profile->title }}</p>

        <ul class="user_social">
            <li><a target="_BLANK" href="http://instagram.com/{{ $profile->instagram }}"><i class="icon-instagram"></i></a></li>
            <li><a target="_BLANK" href="http://twitter.com/{{ $profile->twitter }}"><i class="icon-twitter"></i></a></li>
            <li><a target="_BLANK" href="http://github.com/{{ $profile->github }}"><i class="icon-github"></i></a></li>
            <li><a target="_BLANK" href="http://dribbble.com/{{ $profile->dribbble }}"><i class="icon-dribbble"></i></a></li>
        </ul>
    </div>

    <div class="user_bio">
        {!! $profile->bio !!}
    </div>
</div>

<div class="entries">
    <h2>Posts</h2>
    @each('posts.listItem', $posts, 'post')
</div>
@endsection
