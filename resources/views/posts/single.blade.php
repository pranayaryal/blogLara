<article class="post">
  <header class="post_header">
    @if(isset($useH1) && $useH1 === true)
    <h1 class="post_title"><a href="{{ request()->root() . '/' . $post->slug }}">{{ $post->title }}</a></h1>
    @else
    <h2 class="post_title"><a href="{{ request()->root() . '/' . $post->slug }}">{{ $post->title }}</a></h2>
    @endif

    <div class="post_meta">
      @if(!empty($post->author->avatar))
      <div class="author_avatar" style="background-image:url('{{ $post->author->avatar }}');"></div>
      @else
      <div class="author_avatar"></div>
      @endif
      @if (!empty($post->author))
      <div class="post_details"><a class="author_name" href="/profile/{{ $post->author->slug }}" title="{{ $post->author->full_name }}">{{ $post->author->full_name }}</a> in <a class="category_name" href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a></div>
      @endif
      <time class="post_date">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</time>
      {{-- @if (!empty($post->updated_at))
      <time class="post_date edit_date"> | Edited: {{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</time>
      @endif --}}
    </div>
  </header>

  @if(!empty($post->featured_image))
  <div class="post_image">
    <a href="{{ request()->root() . '/' . $post->slug }}">
      <picture>
        <source srcset="{{ $post->featured_image }}" media="(min-width: 1280px)">
        <img srcset="{{ $post->featured_image }}" alt="{{ $post->title }} featured image">
      </picture>
    </a>
  </div>
  @endif

  @if(!empty($post->vimeo_id))
  <div class="post_video">
    <iframe src="https://player.vimeo.com/video/{{ $post->vimeo_id }}" title="{{ $post->title }} featured video" frameborder="0" width="982px" height="571px"></iframe>
  </div>
  @endif

  <div class="post_content">
    <div class="content">
      @if(!empty($full_content) && $full_content)
        {!! $post->content !!}
      @else
        {!! $post->excerpt !!}
      @endif
    </div>
  </div>

  @if(Auth::check())
  <div class="post_control">
    <a class="button is-small" href="/posts/{{ $post->id }}/edit">Edit</a>
    <a href="/posts/{{ $post->id }}/delete"
        onclick="event.preventDefault();
        document.getElementById('delete-form-{{ $post->id }}').submit();"
        class="button is-danger is-small">
        Delete
      </a>
    <form id="delete-form-{{ $post->id }}" action="/posts/{{ $post->id }}/delete" method="POST" style="display: none;">
      {{ method_field('DELETE') }}
    </form>
  </div>
  @endif
</article>
