@extends('layouts.personal')
@section('content')
<h2>Все посты:</h2>
  <div class='row' style='margin: 0 auto;'>
@foreach ($posts as $post)
<div class="card col-lg-4 sm-12" style="width: 22rem; margin: 40px">
    <img src="{{ asset('storage/'.$post->preview_image) }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Title: {{ $post->title }}</h5>
      <p class="card-text">Category: {{ $post->category->title }}</p>
      @auth
      <form action="{{ route('post.like.store', $post->id) }}" method='POST'>
        @csrf
        @if(Auth::user()->likedPost->contains($post->id))
        <button><i class="fa fa-heart" aria-hidden="true"></i></button>
        @else
        <button><i class="fa fa-heart-o" aria-hidden="true"></i></button>
        @endif
      </form>
      @endauth
      @auth
      {{-- <p class="card-text">Likes: {{ $post->liked_post_count }}</p> --}}
      @endauth
      <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
@endforeach
</div>
 <center><div style='display:flex; justify-content: center'>{{ $posts->links() }}</div></center>
 @endsection