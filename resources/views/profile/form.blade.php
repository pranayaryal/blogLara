@extends('layouts.app')
@section('content')

@include('errors')
<form class="form" role="form" action="/profile" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    @if (isset($profile->id) && !empty($profile->id))
        {{ method_field('PUT') }}
        <input type="hidden" name="user_id" value="{{ $profile->user->id }}">
    @endif
    <div class="columns">
        <div class="column is-one-half">
            <div class="field">
                <label class="label control-label" for="name">Name</label>

                <div class="control">
                    <input type="text" class="input" name="name" value="{{ $profile->user->name }}">
                </div>
            </div>
        </div>
        <div class="column is-one-half">
            <div class="field">
                <label class="label control-label" for="title">Title</label>

                <div class="control">
                    <input type="text" class="input" name="title" value="{{ $profile->title }}">
                </div>
            </div>
        </div>
    </div>

    <div class="field">
        <label class="label control-label" for="avatar">Avatar</label>

        <div class="control">
            <input type="file" class="input" name="avatar">
        </div>

        @if (!empty($post->featured_image))
            <img src="{{ $post->featured_image }}" alt="">
        @endif
    </div>

    <div class="field">
        <label class="label control-label" for="bio">Bio</label>

        <div class="control">
            <textarea class="textarea tiny-mce" name="bio" rows="10">{{ $profile->bio }}</textarea>
        </div>
    </div>

    <div class="columns">
        <div class="column is-one-quarter">
            <div class="field">
                <label class="label control-label" for="twitter">Twitter</label>

                <div class="control">
                    <input type="text" class="input" name="twitter" value="{{ $profile->twitter }}">
                </div>
            </div>
        </div>

        <div class="column is-one-quarter">
            <div class="field">
                <label class="label control-label" for="instagram">Instagram</label>

                <div class="control">
                    <input type="text" class="input" name="instagram"  value="{{ $profile->instagram }}">
                </div>
            </div>
        </div>

        <div class="column is-one-quarter">
            <div class="field">
                <label class="label control-label" for="github">GitHub</label>

                <div class="control">
                    <input type="text" class="input" name="github" value="{{ $profile->github }}">
                </div>
            </div>
        </div>

        <div class="column is-one-quarter">
            <div class="field">
                <label class="label control-label" for="dribbble">Dribbble</label>

                <div class="control">
                    <input type="text" class="input" name="dribbble" value="{{ $profile->dribbble }}">
                </div>
            </div>
        </div>
    </div>

    <div class="control">
        <input type="submit" class="button is-primary" value="Save Profile">
    </div>
</form>
@endsection
@include('tinymce')
