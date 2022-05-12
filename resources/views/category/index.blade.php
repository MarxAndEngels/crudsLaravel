@extends('layouts.personal')
@section('content')
Категории:
@foreach ($categorys as $category)
    <a href="{{ route('category.post.index', $category->id) }}">{{ $category->title }}</a>
@endforeach

@endsection
