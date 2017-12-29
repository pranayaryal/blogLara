@extends('layouts.app')

@section('content')
  @include('posts.single', ['post' => $post])

  <div class="subscribe" id="mailing_list">
      @include('mailing-list')
  </div>
@endsection
