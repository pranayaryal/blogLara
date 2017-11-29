@extends('layouts.app')
@section('content')
<form class="form-horizontal" role="form" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    <!-- title -->
    {{ csrf_field() }}

    @if (!empty($post->id))
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{ $post->id }}">
    @endif
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <div class="form-group">
        <label class="col-md-3 control-label">Title</label>

        <div class="col-md-7">
            <input id="create-post-title" type="text" class="form-control" name="title" value="{{ $post->title }}">

            <span class="help-block">
                The title of your post. Ex.) How we kick ass
            </span>
        </div>
    </div>

    <!-- title -->
    <div class="form-group">
        <label class="col-md-3 control-label">Featured Image</label>

        <div class="col-md-7">
            <input id="create-post-title" type="file" name="featured_image">
        </div>

        @if (!empty($post->featured_image))
            <img src="{{ $post->featured_image }}" alt="">
        @endif
    </div>

    <!-- Category -->
    <div class="form-group">
        <label class="col-md-3 control-label">Category</label>
        <div class="col-md-7">
            <select class="form-control" name="category_id">
                @foreach ($categoryOptions as $category)
                <option value="{{ $category->id }}" @if (isset($post->category->id) && !empty($post->category->id)) {{ $post->category->id === $category->id ? 'selected' : '' }} @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            <div class="help-block">Select your posts category</div>
        </div>
    </div>

    <!-- post content -->
    <div class="form-group">
        <label class="col-md-3 control-label">Content</label>

        <div class="col-md-7">
            <textarea class="form-control" name="content" rows="15">{{ $post->content }}</textarea>

            <span class="help-block">
                Content of your post. Ex.) We began kicking ass by &hellip;
            </span>
        </div>
    </div>

    <!-- Category -->
    <div class="form-group">
        <label class="col-md-3 control-label">Status</label>
        <div class="col-md-7">
            <select class="form-control" name="status_id">
                @foreach ($statusOptions as $status)
                <option value="{{ $status->id }}" @if (isset($post->status->id) && !empty($post->status->id)){{ $post->status->id === $status->id ? 'selected' : '' }} @endif>{{ $status->name }}</option>
                @endforeach
            </select>
            <div class="help-block">Select your posts status</div>
        </div>
    </div>

    <div class="col-md-7 col-md-offset-3">
        <input class="btn btn-primary" type="submit" value="{{ $action === '/post' ? 'Create' : 'Edit' }} ">
    </div>
</form>
@endsection
@include('tinymce');
