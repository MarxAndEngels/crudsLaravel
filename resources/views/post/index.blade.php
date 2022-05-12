@extends('layouts.personal')
@section('content')
<h2>Все посты:</h2>
  <div class='row' style='margin: 0 auto;'>
@foreach ($posts as $post)
<div class="card col-lg-4 sm-12" style="width: 22rem; margin: 40px">
    <img src="{{ 'storage/'.$post->preview_image }}" class="card-img-top" alt="...">
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
      <p class="card-text">Likes: {{ $post->liked_post_count }}</p>
      @endauth
      <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
@endforeach
</div>
 <center><div style='display:flex; justify-content: center'>{{ $posts->links() }}</div></center>

<h5>Популярные посты:</h5>
<br>
<div class="row g-4">
    @foreach ($likedPost as $el)
      <div class="card" style="width: 10rem; margin: 20px">
        <img src={{ 'storage/'.$el->preview_image }} class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Title: {{ $el->title }}</h5>
          <p class="card-text">Category: {{ $el->category->title }}</p>
          @auth
          <p class="card-text">Likes: {{ $el->liked_post_count }}</p>
          @endif
          @auth
      <form action="{{ route('post.like.store', $el->id) }}" method='POST'>
        @csrf
        @if(Auth::user()->likedPost->contains($el->id))
        <button><i class="fa fa-heart" aria-hidden="true"></i></button>
        @else
        <button><i class="fa fa-heart-o" aria-hidden="true"></i></button>
        @endif
      </form>
      @endauth
          <a href="{{ route('post.show', $el->id) }}" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    @endforeach
  </div>
<br>
<h5>Рандомные посты:</h5>
<br>
<div class="row g-4">
    @foreach ($randomPosts as $randomPost)
      <div class="card" style="width: 10rem; margin: 20px">
        <img src={{ 'storage/'.$randomPost->preview_image }} class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Title: {{ $randomPost->title }}</h5>
          <h5 class="card-title">Title: {{ $randomPost->id }}</h5>
          <p class="card-text">Category: {{ $randomPost->category->title }}</p>
          @auth
      <form action="{{ route('post.like.store', $randomPost->id) }}" method='POST'>
        @csrf
        @if(Auth::user()->likedPost->contains($randomPost->id))
        <button><i class="fa fa-heart" aria-hidden="true"></i></button>
        @else
        <button><i class="fa fa-heart-o" aria-hidden="true"></i></button>
        @endif
      </form>
      @endauth
          <a href="{{ route('post.show', $randomPost->id) }}" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    @endforeach
  </div>
@endsection
