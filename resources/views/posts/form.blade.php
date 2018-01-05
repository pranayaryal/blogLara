@extends('layouts.app')
@section('content')

@include('errors')

<form class="" role="form" action="{{ $action }}" method="POST" enctype="multipart/form-data">
  <h1 class="page-title">Edit Post</h1>
  <div class="columns">
    <div class="column is-two-thirds-tablet">
      <!-- Title -->
      {{ csrf_field() }}

      @if (!empty($post->id))
        {{ method_field('PUT') }}
        <input class="input" type="hidden" name="id" value="{{ $post->id }}">
      @endif

      <!-- Title -->
      <div class="field">
        <div class="control">
          <input class="input is-large" id="create-post-title" type="text" name="title" value="{!! old('title', optional($post)->title) !!}" placeholder="Title">
        </div>
      </div>

      <!-- Content -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-header-title">
            Content
          </h3>
        </div>
        <div class="field">
          <div class="control">
            <textarea class="textarea tiny-mce" name="content" rows="15">{!! old('content', optional($post)->content) !!}</textarea>
          </div>
        </div>
      </div>

      <!-- Excerpt -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-header-title">
            Excerpt
          </h3>
        </div>
        <div class="field">
          <div class="control">
            <textarea class="textarea tiny-mce" name="excerpt" rows="5">{!! old('excerpt', htmlentities($post->excerpt)) !!}</textarea>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-header-title">
            SEO
          </h3>
        </div>
        <div class="card-content">
          <div class="field">
            <label class="label control-label">Title</label>
            <div class="control">
              <input class="input" type="text" name="seo_title" placeholder="CTA | Title | Doe-Anderson" value="{!! old('seo_title', optional($post)->seo_title) !!}">
            </div>
          </div>

          <div class="field">
            <label class="label control-label">Description</label>
            <div class="control">
              <textarea class="textarea" type="text" name="seo_description" placeholder="This is your SEO description. Try to keep it between 50-300 characters.">{!! old('seo_description', optional($post)->seo_description) !!}</textarea>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="column">
      <div class="card">
        <div class="card-header">
          <h3 class="card-header-title">
            Settings
          </h3>
        </div>
        <div class="card-content">
          <!-- Status -->
          <div class="field">
            <label class="label control-label">Status</label>
            <div class="control">
              <div class="select is-fullwidth">
                <select name="status_id">
                  @foreach ($statusOptions as $status)
                  <option value="{{ $status->id }}" @if (isset($post->status->id) && !empty($post->status->id)){{ $post->status->id === $status->id ? 'selected' : '' }} @endif>{{ ucfirst($status->name) }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <!-- Canonical -->
          <div class="field">
            <div class="control">
              <label class="checkbox">
                <input class="checkbox" name="canonical" type="checkbox" {{ $post->canonical === 0 ? '' : 'checked' }}>
                Canonical link
              </label>
            </div>
          </div>

          <!-- Category -->
          <div class="field">
            <label class="label control-label">Category</label>
            <div class="control">
              <div class="select is-fullwidth">
                <select name="category_id">
                  @foreach ($categoryOptions as $category)
                  <option value="{{ $category->id }}" @if (isset($post->category->id) && !empty($post->category->id)) {{ $post->category->id === $category->id ? 'selected' : '' }} @endif>{{ ucfirst($category->name) }}</option>
                  @endforeach
                </select>
              </div>
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

          <!-- Author -->
          <div class="field">
              <label class="label control-label">Author</label>
              <div class="control">
                <div class="select is-fullwidth">
                  <select name="user_id">
                    @foreach ($authors as $author)
                    <option value="{{ $author->id }}" @if (isset($post->user_id) && !empty($post->user_id)) {{ $post->user_id === $author->id ? 'selected' : '' }} @endif>{{ $author->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

          
        </div>
      </div>

      <!-- Create / Save Post -->
      <div class="field">
        <div class="control">
          <input class="button is-primary is-medium is-fullwidth" type="submit" value="{{ $action === '/post' ? 'Create' : 'Update' }} ">
        </div>
      </div>

      <div class="columns">
        <div class="column">
          <!-- View Post -->
          <div class="field">
            <div class="control">
              <a href="/{{ $post->slug }}" class="button is-fullwidth is-small" target="_BLANK">View Post</a>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="field">
            <div class="control">
              <a href="/posts/{{ $post->id }}/delete"
                onclick="event.preventDefault();
                document.getElementById('delete-form-{{ $post->id }}').submit();"
                class="button is-danger is-fullwidth is-small">
                Delete Post
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<form id="delete-form-{{ $post->id }}" action="/posts/{{ $post->id }}/delete" method="POST" style="display: none;">
  {{ method_field('DELETE') }}
  {{ csrf_field() }}
</form>
@endsection
@include('tinymce');
