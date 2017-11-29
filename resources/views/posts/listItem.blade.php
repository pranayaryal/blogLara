<article class="entry entry--list">
    <header class="entry_header">
        <h2 class="entry_title"><a href="/posts/{{ $post->id }}/{{ auth::check() ? 'edit' : '' }}">{{ $post->title }}</a></h2>
        <div class="entry_meta">
            <div class="author_avatar" style="background-image:url(http://placecorgi.com/200);"></div>
            <div class="entry_details"><a class="author_name" href="/profile/{{ $post->author->id }}" title="{{ $post->author->name }}">{{ $post->author->name }}</a> in <a class="category_name" href="/category/{{ $post->category->id }}">{{ $post->category->name }}</a></div>
            <time class="entry_date">Timestamp FromNow here</time>
        </div>
    </header>
    @if (auth::check())
    <div class="admin">
        <br>
        <a href="/posts/{{ $post->id }}/delete"
            onclick="event.preventDefault();
            document.getElementById('delete-form-{{ $post->id }}').submit();"
            class="btn btn-danger btn-sm">
            Delete
        </a>

        <form id="delete-form-{{ $post->id }}" action="/posts/{{ $post->id }}/delete" method="POST" style="display: none;">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
        </form>
    </div>
    <hr>
    @endif
</article>
