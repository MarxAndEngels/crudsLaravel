@extends('layouts.admin')
@section('content')
<h3>Ваши категории:</h3>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Название</th>
        <th colspan='3' scope="col">Действия</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <th>{{ $category->id }}</th>
            <td>{{ $category->title }}</td>
            <td><a title='Посмотреть' href="{{ route('admin.category.show', $category->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
            <td><a title='Редактировать' class='text-success' href="{{ route('admin.category.edit', $category->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
            <td title='Удалить'>
                <form  action="{{ route('admin.category.delete', $category->id) }}" method='POST'>
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
<a href={{ route('admin.category.create') }} class="btn btn-primary">Создать категорию</a>
@endsection