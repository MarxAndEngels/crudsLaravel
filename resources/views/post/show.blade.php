@extends('layouts.personal')
@section('content')
<h2>Пост</h2>
 <p>Месяц: {{ $data->translatedFormat('F') }}</p>
 <p>День: {{ $data->day }}</p>
 <p>Год: {{ $data->year }}</p>
 <p>Время: {{ $data->format('h:m') }}</p>
 <p>Кол комментариев {{ $post->comments()->count() }}</p>
  <img style='max-width: 500px; min-width:300px;' src="{{ asset('storage/'.$post->main_image) }}" alt="">
  <h2>Статья:</h2>
  <p>{{ $post->title }}</p>
  <p>{!! $post->content !!}</p>

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
  <h3>Напиши коммент:</h3>
  <form action="{{ route('post.comment.store', $post->id) }}" method='post'>
    @csrf
    <textarea style='border: 1px solid black; padding:10px;' name="message" cols="70" rows="5"></textarea>
   <br>
    <button type='submit' class="btn btn-primary">Добавить коммент</button>
</form>
<br>
<h3>Комментарии ({{ $post->comments->count() }}) </h3>
@foreach ($post->comments()->orderBy('id','desc')->get() as $comm)
     <div>Имя: {{ $comm->user->name }}</div>
    <div>Текст: {{ $comm->message }}</div>
    <div>Время {{ $comm->dateCarbone->diffForHumans() }}</div>
    <br>
@endforeach
@endauth

@guest
<a style='color:red;' href="{{ route('personal.main.index') }}">Чтобы комментировать войдите на сайт!</a>
@endguest

  <h5>Похожие посты:</h5>
<br>
<div class="row g-4">
    @foreach ($relatedPosts as $relatedPost)
      <div class="card" style="width: 10rem; margin: 20px">
        <img src={{ asset('storage/'.$relatedPost->preview_image) }} class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Title: {{ $relatedPost->title }}</h5>
          <p class="card-text">Category: {{ $relatedPost->category->title }}</p>
          <a href="{{ route('post.show', $relatedPost->id) }}" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    @endforeach
  </div>


@endsection
