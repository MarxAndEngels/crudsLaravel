
<a href='{{ route('main.index') }}'>Blog</a> <br>
<a href='{{ route('personal.main.index') }}'>Personal</a> <br>
<a href='{{ route('personal.liked.index') }}'>Понравившиеся посты</a> <br>
<a href='{{ route('personal.comment.index') }}'>Комментарии</a> <br>

{{-- выход отсюда --}}
@auth
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">Выйти</button>
</form>
@endauth

<a href='{{ route('category.index') }}'>Комментарии постов</a> <br>