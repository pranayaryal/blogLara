<article class="post post--list">
  <header class="post_header">
    <h2 class="post_title">
      @if(auth::check())
      <?php $link = "/posts/$post->id/edit"; ?>
      @else
      <?php $link = $post->slug; ?>
      @endif
      <a href="{{ $link }}">{{ $post->title }}</a>
    </h2>
    <div class="post_meta">
      <div class="author_avatar" style="background-image:url({{ $post->author->profile->avatar }})"></div>
      <div class="post_details"><a class="author_name" href="/profile/{{ $post->author->profile->slug }}" title="{{ $post->author->name }}">{{ $post->author->name }}</a> in <a class="category_name" href="/category/{{ $post->category->id }}">{{ $post->category->name }}</a></div>
      <time class="post_date">{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</time>
    </div>
  </header>
</article>
