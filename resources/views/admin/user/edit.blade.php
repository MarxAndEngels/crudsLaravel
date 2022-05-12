@extends('layouts.admin')
@section('content')
Редактирование пользователя
<div class="mb-3 col-6">
    <form action="{{ route('admin.user.update', $user->id) }}" method='POST'>
        @csrf
        @method('patch')
    <label for="exampleFormControlInput1" class="form-label">Имя</label>
    <input type="text" value={{ $user->name }} name='name' class="form-control" id="exampleFormControlInput1" placeholder="Название категории">
    @error('title')
      <p class='text-danger'>{{ $message }}</p>
     @enderror
     <label for="exampleFormControlInput2" class="form-label">Email</label>
    <input value={{ $user->email }} type="text" name='email' class="form-control" id="exampleFormControlInput2" placeholder="Название категории">
    @error('email')
      <p class='text-danger'>{{ $message }}</p>
     @enderror

     Выберите роль:
     <select name='role' class="form-select" aria-label="Default select example">
       @foreach ($roles as $id => $role)
       <option value="{{ $id }}" {{ $id == $user->id ? ' selected' : '' }}> {{ $role }}</option>
       @endforeach
     </select>

     <input type="text" name='user_id' hidden value={{ $user->id }}>

    <br>
    <button type='submit' class="btn btn-primary">Обновить пользователя</button>
</form>
</div>
  
@endsection