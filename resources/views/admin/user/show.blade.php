@extends('layouts.admin')
@section('content')
<h3>Ваша пользователи:</h3>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">{{ $user->id }}</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th>Name</th>
            <td>{{ $user->name }}</td>
          </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
          </tr>
    </tbody>
  </table>

@endsection