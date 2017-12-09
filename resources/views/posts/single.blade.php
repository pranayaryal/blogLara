<article class="entry">
  <header class="entry_header">
      @if (isset($no_link) && !empty($no_link))
      <h2 class="entry_title">{{ $post->title }} @if (auth::check())
      <a href="/posts/{{ $post->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
      @endif</h2>
      @else
      <h2 class="entry_title"><a href="/posts/{{ $post->slug }}">{{ $post->title }}@if (auth::check())
      <a href="/posts/{{ $post->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
      @endif</a></h2>
      @endif

      <div class="entry_meta">
        <div class="author_avatar" style="background-image:url(http://placecorgi.com/200);"></div>
        @if (isset($post->author))
        <div class="entry_details"><a class="author_name" href="/profile/{{ $post->author->id }}" title="{{ $post->author->name }}">{{ $post->author->name }}</a> in <a class="category_name" href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a></div>
        @endif
        <time class="entry_date">{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</time>
      </div>
  </header>

  <div class="entry_block entry_block--image">
    <picture>
      <source srcset="{{ $post->featured_image }}" media="(min-width: 1280px)">
      <img srcset="{{ $post->featured_image }}" alt="">
    </picture>
  </div>

  <div class="entry_block entry_block--content">
    {!! $post->content !!}
  </div>
</article>
