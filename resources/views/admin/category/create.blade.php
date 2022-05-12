@extends('layouts.admin')
@section('content')
Добавление категории
<div class="mb-3 col-6">
    <form action="{{ route('admin.category.store') }}" method='POST'>
        @csrf
    <label for="exampleFormControlInput1" class="form-label">Название категории</label>
    <input type="text" name='title' class="form-control" id="exampleFormControlInput1" placeholder="Название категории">
    @error('title')
      <p class='text-danger'>Это поле необходимо для заполнения</p>
     @enderror

    <br>
    <button type='submit' class="btn btn-primary">Добавить категорию</button>
</form>
</div>
  
@endsection