@extends('layouts.app')

@section('content')
  @include('posts.single', ['post' => $post])
@endsection

<div class="subscribe" id="mailing_list">
    @include('mailing-list')
</div>
