@extends('layouts.app')

@section('content')
<div class="container">
  @include('posts.single', ['post' => $post])
</div>
@endsection
