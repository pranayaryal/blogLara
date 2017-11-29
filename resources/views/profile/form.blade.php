@extends('layouts.app')
@section('content')
<form class="form-horizontal" role="form" action="/profile" method="POST">
    {{ csrf_field() }}

    @if (isset($profile->id) && !empty($profile->id))
        {{ method_field('PUT') }}
        <input type="hidden" name="user_id" value="{{ $profile->user->id }}">
    @endif


    <div class="form-group">
        <label class="col-md-3 control-label" for="name">Name</label>

        <div class="col-md-7">
            <input type="text" class="form-control" name="name" value="{{ $profile->user->name }}">

            <span class="help-block">
                Your name as it will appear on this site.
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="title">Title</label>

        <div class="col-md-7">
            <input type="text" class="form-control" name="title" value="{{ $profile->title }}">

            <span class="help-block">
                Your title here at Doe-Anderson
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="avatar">Avatar</label>

        <div class="col-md-7">
            <input disabled type="text" class="form-control" name="avatar" value="{{ $profile->avatar }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="bio">Bio</label>

        <div class="col-md-7">
            <textarea class="form-control" name="bio" rows="10">{{ $profile->bio }}</textarea>

            <span class="help-block">
                Tell us a bit about yourself
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="twitter">Twitter</label>

        <div class="col-md-7">
            <input type="text" class="form-control" name="twitter" value="{{ $profile->twitter }}">

            <span class="help-block">
                Username only
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="instagram">Instagram</label>

        <div class="col-md-7">
            <input type="text" class="form-control" name="instagram"  value="{{ $profile->instagram }}">

            <span class="help-block">
                Username only
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="github">GitHub</label>

        <div class="col-md-7">
            <input type="text" class="form-control" name="github" value="{{ $profile->github }}">

            <span class="help-block">
                Username only
            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="dribbble">Dribbble</label>

        <div class="col-md-7">
            <input type="text" class="form-control" name="dribbble" value="{{ $profile->dribbble }}">

            <span class="help-block">
                Username only
            </span>
        </div>
    </div>

    <div class="col-md-7 col-md-offset-3">
        <input type="submit" class="btn btn-primary" value="Submit">
    </div>
</form>
@endsection
@include('tinymce')
