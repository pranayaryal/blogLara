@extends('layouts.app')
@section('content')

@include('errors')

<a href="/{{ $post->slug }}" class="button" target="_BLANK">View Post</a>
<br>
<hr>

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
            <input class="input" id="create-post-title" type="file" name="featured_image" value="{{ $post->featured_image }}">
        </div>

        @if (!empty($post->featured_image))
            <img src="{{ $post->featured_image }}">
        @endif
    </div>

    <div class="columns">
        <!-- Category -->
        <div class="field column is-one-third">
            <label class="label control-label">Category</label>
            <div class="control">
                <div class="select">
                    <select name="category_id">
                        @foreach ($categoryOptions as $category)
                        <option value="{{ $category->id }}" @if (isset($post->category->id) && !empty($post->category->id)) {{ $post->category->id === $category->id ? 'selected' : '' }} @endif>{{ ucfirst($category->name) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Status -->
        <div class="field column is-one-third">
            <label class="label control-label">Status</label>
            <div class="control">
                <div class="select">
                    <select name="status_id">
                        @foreach ($statusOptions as $status)
                        <option value="{{ $status->id }}" @if (isset($post->status->id) && !empty($post->status->id)){{ $post->status->id === $status->id ? 'selected' : '' }} @endif>{{ ucfirst($status->name) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Canonical -->
        <div class="field column is-one-third">
            <label class="label control-label">Canonical link</label>
            <div class="control">
                <input class="checkbox" name="canonical" type="checkbox" {{ $post->canonical === 1 ? 'checked' : '' }}>
            </div>
        </div>
    </div>

    <div class="columns">
        <div class="field column is-one-half">
            <label class="label control-label">SEO Title</label>
            <div class="control">
                <input class="input" type="text" name="seo_title" placeholder="CTA | Title | Doe-Anderson" value="{{ !empty(old('seo_title')) ? old('seo_title') : $post->seo_title }}">
            </div>
        </div>

        <div class="field column is-one-half">
            <label class="label control-label">SEO Description</label>
            <div class="control">
                <textarea class="textarea" type="text" name="seo_description">{{ !empty(old('seo_description')) ? old('seo_description') : $post->seo_description }}</textarea>
            </div>
        </div>
    </div>

    <!-- post content -->
    <div class="field">
        <label class="label control-label">Content</label>

        <div class="control">
            <textarea class="textarea tiny-mce" name="content" rows="15">{{ $post->content }}</textarea>
        </div>
    </div>

    <!-- post excerpt -->
    <div class="field">
        <label class="label control-label">Excerpt</label>

        <div class="control">
            <textarea class="textarea tiny-mce" name="excerpt" rows="15">{{ $post->excerpt }}</textarea>
        </div>
    </div>

    
    <div class="buttons">
        <input class="button is-primary" type="submit" value="{{ $action === '/post' ? 'Create' : 'Edit' }} ">

        <a href="/posts/{{ $post->id }}/delete"      
            onclick="event.preventDefault();     
            document.getElementById('delete-form-{{ $post->id }}').submit();"     
            class="button is-danger">       
            Delete        
        </a>
    </div>
</form>

<form id="delete-form-{{ $post->id }}" action="/posts/{{ $post->id }}/delete" method="POST" style="display: none;">       
    {{ method_field('DELETE') }}      
    {{ csrf_field() }}        
</form>
@endsection
@include('tinymce');
