@extends('layouts.personal')
@section('content')
Редактирование комментария
<div class="mb-3 col-6">
    <form action="{{ route('personal.comment.update', $comment->id) }}" method='POST'>
        @csrf
        @method('patch')
    <label for="exampleFormControlInput1" class="form-label">Сообщение</label>
     <textarea name='message' class="form-control" id="exampleFormControlInput1" cols="20" rows="5" placeholder="Комментарий">{{ $comment->message }}</textarea>
     @error('message')
     <p class='text-danger'>Это поле необходимо для заполнения</p>
    @enderror
    <br>
    <button type='submit' class="btn btn-primary">Обновить</button>
</form>
</div>
@endsection