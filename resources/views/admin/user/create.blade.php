@extends('layouts.admin')
@section('content')
Добавление пользователя
<div class="mb-3 col-6">
    <form action="{{ route('admin.user.store') }}" method='POST'>
        @csrf
    <label for="exampleFormControlInput1" class="form-label">Имя</label>
    <input type="text" name='name' class="form-control" id="exampleFormControlInput1" placeholder="Название категории">
    @error('name')
      <p class='text-danger'>{{ $message }}</p>
     @enderror
    <label for="exampleFormControlInput2" class="form-label">Email</label>
    <input type="text" name='email' class="form-control" id="exampleFormControlInput2" placeholder="Название категории">
    @error('email')
      <p class='text-danger'>{{ $message }}</p>
     @enderror
    <label for="exampleFormControlInput3" class="form-label">Password</label>
    <input type="password" name='password' class="form-control" id="exampleFormControlInput3" placeholder="Название категории">
    @error('password')
      <p class='text-danger'>{{ $message }}</p>
     @enderror

     Выберите роль:
      <select name='role' class="form-select" aria-label="Default select example">
        @foreach ($roles as $id => $role)
        <option value="{{ $id }}" {{ $id == old('role') ? ' selected' : '' }}> {{ $role }}</option>
        @endforeach
      </select>

    <br>
    <button type='submit' class="btn btn-primary">Добавить пользователя</button>
</form>
</div>
  
@endsection