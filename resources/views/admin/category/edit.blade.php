@extends('layouts.admin')
@section('content')
Редактирование категории
<div class="mb-3 col-6">
    <form action="{{ route('admin.category.update', $category->id) }}" method='POST'>
        @csrf
        @method('patch')
    <label for="exampleFormControlInput1" class="form-label">Название категории</label>
    <input type="text" value={{ $category->title }} name='title' class="form-control" id="exampleFormControlInput1" placeholder="Название категории">
    @error('title')
      <p class='text-danger'>Это поле необходимо для заполнения</p>
     @enderror

    <br>
    <button type='submit' class="btn btn-primary">Обновить категорию</button>
</form>
</div>
  
@endsection