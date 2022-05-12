@extends('layouts.admin')
@section('content')
<h3>Ваша категория:</h3>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">{{ $category->id }}</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th>Название</th>
            <td>{{ $category->title }}</td>
          </tr>
    </tbody>
  </table>

@endsection