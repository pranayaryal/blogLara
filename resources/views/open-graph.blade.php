{{-- article - Namespace URI: http://ogp.me/ns/article#

profile - Namespace URI: http://ogp.me/ns/profile#

profile:first_name - string - A name normally given to an individual by a parent or self-chosen.
profile:last_name - string - A name inherited from a family or marriage and by which the individual is commonly known.
profile:username - string - A short unique string to identify them.

  {{--  General OpenGraph data (indented to make HMTL output line up properly)  --}}
  <meta property="og:locale" content="en_US" />
  <meta property="og:title" content="{{ !empty($title) ? $title : 'Digital Marketing | Doe-Anderson | Louisville, KY' }}" />
  <meta property="og:description" content="{{ !empty($description) ? $description : 'Interested in the latest practices in the digital realm? Look no further' }}" />
  <meta property="og:url" content="{{ isset($post->featured_image) ? request()->root() . $post->featured_image : request()->root() }}" />
  <meta property="og:site_name" content="Doe-Anderson Advertising" />