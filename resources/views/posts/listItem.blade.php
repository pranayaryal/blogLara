<article class="post post--list">
  <header class="post_header">
    <h2 class="post_title">
      <a href="{{ $post->slug }}">{{ $post->title }}</a>
    </h2>
    <div class="post_meta">
      @if(isset($post->author->profile))
      <div class="author_avatar" style="background-image:url('{{ $post->author->profile->avatar }}')"></div>
      @endif
      <div class="post_details">
        <a
          class="author_name"
          href="/profile/{{ $post->author->profile->slug }}"
          title="{{ $post->author->name }}">
            {{ $post->author->name }}
        </a> in <a class="category_name" href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a><time class="post_date">{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</time>
        </div>
    </div>
  </header>

  @if(auth::check())
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
      {{ csrf_field() }}
    </form>
  </div>
  @endif
</article>
