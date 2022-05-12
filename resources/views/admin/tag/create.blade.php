@extends('layouts.admin')
@section('content')
Добавление тегов
<div class="mb-3 col-6">
    <form action="{{ route('admin.tag.store') }}" method='POST'>
        @csrf
    <label for="exampleFormControlInput1" class="form-label">Название тега</label>
    <input type="text" name='title' class="form-control" id="exampleFormControlInput1" placeholder="Название тега">
    @error('title')
      <p class='text-danger'>Это поле необходимо для заполнения</p>
     @enderror

    <br>
    <button type='submit' class="btn btn-primary">Добавить тег</button>
</form>
</div>
  
@endsection