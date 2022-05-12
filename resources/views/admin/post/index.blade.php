@extends('layouts.admin')
@section('content')
<h3>Ваши посты:</h3>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Название</th>
        <th colspan='3' scope="col">Действия</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th>{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td><a title='Посмотреть' href="{{ route('admin.post.show', $post->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
            <td><a title='Редактировать' class='text-success' href="{{ route('admin.post.edit', $post->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
            <td title='Удалить'>
                <form  action="{{ route('admin.post.delete', $post->id) }}" method='POST'>
                   @csrf
                   @method('delete')
                    <button type='submit' class='border-0'>
                <i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
            </form>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
<br>
<br>
<a href={{ route('admin.post.create') }} class="btn btn-primary">Создать пост</a>
@endsection