{{-- article - Namespace URI: http://ogp.me/ns/article#

profile - Namespace URI: http://ogp.me/ns/profile#
profile:first_name - string - A name normally given to an individual by a parent or self-chosen.
profile:last_name - string - A name inherited from a family or marriage and by which the individual is commonly known.
profile:username - string - A short unique string to identify them.

  {{--  Site Description  --}}
  <meta name="description" content="{{ !empty($description) ? $description : 'Did someone say \'useful advertising\'? It does exist. Interested in the latest digital and traditional practices? Look no further.' }}">

  {{--  General OpenGraph data (indented to make HMTL output line up properly)  --}}
  <meta property="og:locale" content="en_US" />
  <meta property="og:title" content="{{ !empty($title) ? $title : 'Really Useful Thoughts | Doe-Anderson | Louisville, KY' }}" />
  <meta property="og:description" content="{{ !empty($description) ? $description : 'Did someone say \'useful advertising\'? It does exist. Interested in the latest digital and traditional practices? Look no further.' }}" />
  <meta property="og:url" content="{{ isset($post->featured_image) ? request()->root() . $post->featured_image : request()->root() }}" />
  <meta property="og:site_name" content="Doe-Anderson Advertising" />

  {{--  Twitter card OpenGraph data (indented to make HMTL output line up properly)  --}}
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:description" content="{{ !empty($description) ? $description : 'Did someone say \'useful advertising\'? It does exist. Interested in the latest digital and traditional practices? Look no further.' }}" />
  <meta name="twitter:title" content="{{ !empty($description) ? $description : 'Did someone say \'useful advertising\'? It does exist. Interested in the latest digital and traditional practices? Look no further.' }}" />
  <meta name="twitter:site" content="@Doeanderson" />
  <meta name="twitter:creator" content="@Doeanderson" />

  {{--  Article specific OpenGraph data (indented to make HMTL output line up properly)  --}}
  @if(isset($post->id))
    <meta property="og:type" content="article" />
    <meta property="article:publisher" content="https://www.facebook.com/adaptwithdoe" />
    <meta property="article:section" content="{{ ucfirst($post->category->name) }}" />
    <meta property="article:published_time" content="{{ $post->created_at }}" />

    @if(isset($post->updated_at))
      <meta property="article:modified_time" content="{{ $post->updated_at }}" />
    @endif

    @if(isset($post->author))
      <meta property="article:author" content="{{ request()->root() . '/' . $post->author->profile->slug }}" />
    @endif
  @endif

  {{--  Featured image for post and other pages  --}}
  @if(isset($post->featured_image))
    <meta property="og:image" content="{{ request()->root() . $post->featured_image }}" />
    <meta property="og:image:secure_url" content="{{ request()->root() . $post->featured_image }}" />
    <meta name="twitter:image" content="{{ request()->root() . $post->featured_image }}" />
  @else
    <meta property="og:image" content="/images/app/og-image.png" />
    <meta property="og:image:secure_url" content="/images/app/og-image.png" />
    <meta name="twitter:image" content="/images/app/og-image.png" />
  @endif

  {{--  Profile specific OpenGraph data (indented to make HMTL output line up properly)  --}}
  @if(isset($profile))
    <meta property="profile:first_name" content="{{ $profile->first_name }}" />
    <meta property="profile:last_name" content="{{ $profile->last_name }}" />
    <meta property="profile:username" content="{{ $profile->slug }}" />
  @endif

  {{--  Icons  --}}
  <link rel="icon" href="/images/app/favicon-32x32.png" sizes="32x32">
  <link rel="icon" href="/images/app/favicon-192x192.png" sizes="192x192">
  <link rel="apple-touch-icon-precomposed" href="/images/app/apple-touch-180x180.png">
  <meta name="msapplication-TileImage" content="/images/app/ms-tile-270x270.png">
