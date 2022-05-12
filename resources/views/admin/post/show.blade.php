@extends('layouts.admin')
@section('content')
<h3>Ваш пост:</h3>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">{{ $post->id }}</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th>Название</th>
            <td>{{ $post->title }}</td>
          </tr>
    </tbody>
  </table>

@endsection