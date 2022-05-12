@extends('layouts.admin')
@section('content')
ADMIN
    <div>Посты: {{ $data['posts'] }}</div>
    <div>Теги: {{ $data['tag'] }}</div>
    <div>Категории: {{ $data['category'] }}</div>
    <div>Юзеры: {{ $data['user'] }}</div>
@endsection