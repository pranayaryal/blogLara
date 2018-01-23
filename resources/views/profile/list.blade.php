<article class="post post--list">
  <header class="post_header">
    <h2 class="post_title">
      <div class="post_meta">
        @if(!empty($profile->avatar))
        <div class="author_avatar" style="background-image:url('{{ $profile->avatar }}')"></div>
        @else
        <div class="author_avatar"></div>
        @endif
      </div>
      <a href="{{ request()->root() . '/' . $profile->slug }}">{{ $profile->full_name }}</a>
    </h2>
  </header>

  @if(Auth::check())
  <div class="post_control">
    <a class="button is-small" href="/profiles/{{ $profile->id }}/edit">Edit</a>
    <a href="/profiles/{{ $profile->id }}/delete"
        onclick="event.preventDefault();
        document.getElementById('delete-form-{{ $profile->id }}').submit();"
        class="button is-danger is-small">
        Delete
    </a>
    <form id="delete-form-{{ $profile->id }}" action="/profiles/{{ $profile->id }}/delete" method="POST" style="display: none;">
      {{ method_field('DELETE') }}
      {{ csrf_field() }}
    </form>
  </div>
  @endif
</article>
  