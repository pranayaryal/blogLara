<article class="post post--list">
  <header class="post_header">
    <h2 class="post_title">
      <a href="{{ request()->root() . '/' . $post->slug }}">{{ $post->title }}</a>
    </h2>
    <div class="post_meta">
      @if(!empty($post->profile->avatar))
      <div class="author_avatar" style="background-image:url('{{ $post->author->avatar }}')"></div>
      @else
      <div class="author_avatar"></div>
      @endif
      <div class="post_details">
        <a
          class="author_name"
          href="/profile/{{ $post->author->slug }}"
          title="{{ $post->author->full_name }}">
            {{ $post->author->full_name }}</a> in
          <a class="category_name" href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a><time class="post_date">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</time>
        </div>
    </div>
  </header>

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
      {{ csrf_field() }}
    </form>
  </div>
  @endif
</article>
