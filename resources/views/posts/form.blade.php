@extends('layouts.app')
@section('content')

@include('errors')

<form class="" role="form" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    <!-- title -->
    {{ csrf_field() }}

    @if (!empty($post->id))
        {{ method_field('PUT') }}
        <input class="input" type="hidden" name="id" value="{{ $post->id }}">
    @endif
    <input class="input" type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    
    {{--  Title  --}}
    <div class="field">
        <label class="label control-label">Title</label>

        <div class="control">
            <input class="input" id="create-post-title" type="text" name="title" value="{{ $post->title }}">
        </div>
    </div>

    <!-- Featured Image -->
    <div class="field">
        <label class="label control-label">Featured Image</label>

        <div class="control">
            <input class="input" id="create-post-title" type="file" name="featured_image">
        </div>

        @if (!empty($post->featured_image))
            <img src="{{ $post->featured_image }}" alt="">
        @endif
    </div>

    <div class="columns">
        <!-- Category -->
        <div class="field column is-one-half">
            <label class="label control-label">Category</label>
            <div class="control">
                <div class="select">
                    <select name="category_id">
                        @foreach ($categoryOptions as $category)
                        <option value="{{ $category->id }}" @if (isset($post->category->id) && !empty($post->category->id)) {{ $post->category->id === $category->id ? 'selected' : '' }} @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Status -->
        <div class="field column is-one-half">
            <label class="label control-label">Status</label>
            <div class="control">
                <div class="select">
                    <select name="status_id">
                        @foreach ($statusOptions as $status)
                        <option value="{{ $status->id }}" @if (isset($post->status->id) && !empty($post->status->id)){{ $post->status->id === $status->id ? 'selected' : '' }} @endif>{{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- post content -->
    <div class="field">
        <label class="label control-label">Content</label>

        <div class="control">
            <textarea class="textarea" name="content" rows="15">{{ $post->content }}</textarea>
        </div>
    </div>

    <!-- post excerpt -->
    <div class="field">
        <label class="label control-label">Excerpt</label>

        <div class="control">
            <textarea name="excerpt" rows="15">{{ $post->excerpt }}</textarea>
        </div>
    </div>

    <div class="control col-md-offset-3">
        <input class="button is-primary" type="submit" value="{{ $action === '/post' ? 'Create' : 'Edit' }} ">
    </div>
</form>
@endsection
@include('tinymce');
