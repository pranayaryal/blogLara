@extends('layouts.app')
@section('content')
<div class="user">
    <div class="user_avatar" style="background-image: url( {{ $profile->avatar }} )"></div>

    <div class="user_details">
        <h2 class="user_name">{{ $profile->user->name }}</h2>
        <p class="user_title">{{ $profile->title }}</p>

        <ul class="user_social">
            <li><a target="_BLANK" href="http://instagram.com/{{ $profile->instagram }}"><i class="fab fa-instagram"></i></a></li>
            <li><a target="_BLANK" href="http://twitter.com/{{ $profile->twitter }}"><i class="fab fa-twitter"></i></a></li>
            <li><a target="_BLANK" href="http://github.com/{{ $profile->github }}"><i class="fab fa-github"></i></a></li>
            <li><a target="_BLANK" href="http://dribbble.com/{{ $profile->dribbble }}"><i class="fab fa-dribbble"></i></a></li>
        </ul>
    </div>

    <div class="user_bio">
        {!! $profile->bio !!}
    </div>
</div>

<div class="entries">
    @each('posts.listItem', $posts, 'post')
</div>
@endsection
