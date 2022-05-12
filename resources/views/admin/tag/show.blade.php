@extends('layouts.admin')
@section('content')
<h3>Ваш тег:</h3>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">{{ $tag->id }}</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th>Название</th>
            <td>{{ $tag->title }}</td>
          </tr>
    </tbody>
  </table>

@endsection