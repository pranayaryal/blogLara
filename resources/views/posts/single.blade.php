<article class="post">
  <header class="post_header">
      @if(auth::check())
          <?php $link = "/posts/$post->id/edit"; ?>
      @else
          <?php $link = $post->slug; ?>
      @endif
      @if (isset($no_link) && !empty($no_link))
      <h2 class="post_title">{{ $post->title }}</h2>
      @else
      <h2 class="post_title"><a href="{{ $link }}">{{ $post->title }}</a></h2>
      @endif

      <div class="post_meta">
        <div class="author_avatar" style="background-image:url('{{ $post->author->profile->avatar }}');"></div>
        @if (isset($post->author))
        <div class="post_details"><a class="author_name" href="/profile/{{ $post->author->profile->slug }}" title="{{ $post->author->name }}">{{ $post->author->name }}</a> in <a class="category_name" href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a></div>
        @endif
        <time class="post_date">{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</time>
      </div>
  </header>

  @if(!empty($post->featured_image))
  <div class="post_image">
    <picture>
      <source srcset="{{ $post->featured_image }}" media="(min-width: 1280px)">
      <img srcset="{{ $post->featured_image }}" alt="">
    </picture>
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
</article>

<div class="subscribe">
    @include('mailing-list')
</div>
