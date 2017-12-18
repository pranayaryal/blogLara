@extends('layouts.app')

@section('content')
  @include('posts.single', ['post' => $post])
@endsection
