@extends('layouts.personal')
@section('content')
<h3>Ваши комментированные посты:</h3>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Название</th>
        <th colspan='2' scope="col">Действия</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
        <tr>
            <th>{{ $comment->id }}</th>
            <td>{{ $comment->message }}</td>
            <td><a title='Посмотреть' href="{{ route('admin.post.show', $comment->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
            <td><a title='Редактировать' class='text-success' href="{{ route('personal.comment.edit', $comment->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
            <td title='Удалить'>
                <form  action="{{ route('personal.comment.delete', $comment->id) }}" method='POST'>
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
@endsection