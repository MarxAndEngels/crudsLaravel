<a href='{{ route('main.index') }}'>Blog</a> <br>
<a href='{{ route('admin.post.index') }}'>Posts</a> <br>
<a href='{{ route('admin.category.index') }}'>Categories</a> <br>
<a href='{{ route('admin.tag.index') }}'>Tags</a> <br>
<a href='{{ route('admin.user.index') }}'>Users</a> <br>
<a href='{{ route('admin.index') }}'>Home</a> <br>

{{-- выход отсюда --}}
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">Выйти</button>
</form>
