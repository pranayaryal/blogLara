<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ !empty($title) ? $title : 'Digital Marketing | Doe-Anderson | Louisville, KY' }}</title>
      <meta name="description" content="{{ !empty($description) ? $description : 'Interested in the latest practices in the digital realm? Look no further' }}">

      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    <div id="app">
      <header class="masthead">
        <a class="brand" href="/">
          <span class="acorn">
            <svg pointer-events="all" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="29" height="30" viewBox="0 0 29 30" enable-background="new 0 0 29 30" xml:space="preserve" preserveAspectRatio="xMinYMin meet">
              <path d="M28.1,17.6c-0.2,1.4-1.9,2.8-1.9,2.8c-0.6,1-2.3,1.7-2.3,1.7c-1.6,1.4-2.9,1-2.9,1s-0.9,0.7-1.7,1.3
              c-0.8,0.7-1.7,1.9-2.5,2.6c-2.2,1.9-3.8,2.6-5.5,2.9s-3.5,0-5.6-0.6c-2.1-0.6-3.5,0-3.5,0c-0.2-0.3-0.8-0.7-0.8-0.7
              c0.7-1.8,0.2-2.9-0.9-5.2c-1.1-2.5-0.8-4.3-0.1-6.8c0.7-2.3,2.8-4.7,3.5-5.5c0.7-0.8,0.1-1.8,0.1-2.7c0-0.9,0.9-1.7,0.9-1.7
              C5.2,5.9,6.3,5,6.3,5c0.2-0.8,1-1.3,1.3-1.7c0.4-0.2,0.6-0.6,1-1c0.4-0.4,1.1-0.4,1.1-0.4c1.6-1.1,2.5-0.8,2.5-0.8
              c1.2-0.6,2.6-0.2,2.6-0.2c0.6-0.2,1.4,0,2.1,0.2C17.6,1.3,18,1.9,18,1.9C19.1,2,20,3,20,3s1.1,0,1.9,0.2c0,0,2.7-1.6,2.9-3.2
              c0,0,1.2,0.9,3.1,1.1c-1.7,0.9-3.3,2.8-3.3,4C26,5.4,26.8,6.4,27,7.5c0.1,0.4-0.1,1.4,0,1.9c0.1,0.6,0.7,1.6,0.8,1.8
              c0.1,0.2,0.4,0.6,0.7,1.1c0.8,1.6,0.4,2.6,0.4,2.6C29.3,16.3,28.1,17.6,28.1,17.6z M10.5,7.8c0,0,1,1.1,1.8,1.1c0.9,0.1,2.1,0,3,0.3
              c0.9,0.3,1,1.3,2,1.3c1,0,1.6-1,1.8-1.3c0.3-0.2,0.7,0.3,0.7,0.3s1.1-0.8,1.3-2.1c0.2-1.3-0.9-2-0.9-2c-0.6-1.4-2.1-1.3-2.1-1.3
              S18,3.7,16.8,3.2c-1.2-0.4-1.7,1.4-2.7,1.4s-0.6-1.4-0.6-1.4c-1.7-1-2.9,0.4-2.9,0.4c-0.1,0.7-1.3,0.8-1.3,0.8
              c-1,0.2-1.1,1.7-1.1,1.7C8.8,8,10.5,7.8,10.5,7.8z M16.6,12.7c-1.8-1-2.8-0.9-3.5-1.6c-0.8-0.7-1.3-1.2-2.5-1.4s-1.7,0-2.2,0.6
              c-0.6,0.7-1.7,1.4-2.3,2.1c-0.7,0.6-3.1,3.3-3.6,6C2,21,2.8,23.3,3.2,23.7c0.3,0.4,0.6,2.1,0.8,2.3s3,0.3,4.7,0.3s3.9-1.1,5.7-3.1
              s2.3-3.9,3.8-4.1c1.4-0.3,3-0.2,3.6-1.3C22,16.7,20.2,14.7,16.6,12.7z"/>
            </svg>
          </span>
        </a>

        @if(Auth::check())
        <nav class="nav">
          <ul class="nav_menu">
              <li><a href="/">Home</a></li>
              <li><a href="/admin">Posts</a></li>
              <li><a href="/profile">Profile</a></li>
              <li><a href="{{ url('/logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
              <li>
                <form id="search-form" action="{{ url('/search') }}" method="POST">
                  {{ csrf_field() }}
                  <input name="query">
                  <input type="submit" class="button">
                </form>
              </li>
          </ul>
          <button class="nav_button"><i class="icon-plus"></i></button>
        </nav>
        @endif
      </header>

      <div class="contents">
        @yield('content')
      <div>

      <footer class="site-footer">
        &copy;{{ (\Carbon\Carbon::now())->year }} Doe-Anderson.
      </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
