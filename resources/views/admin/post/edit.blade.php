@extends('layouts.admin')
@section('content')
Редактирование поста
<div class="mb-3 col-6">
    <form action="{{ route('admin.post.update', $post->id) }}" method='POST' enctype="multipart/form-data">
        @csrf
        @method('patch')
    <label for="exampleFormControlInput1" class="form-label">Название поста</label>
    <input value="{{ $post->title }}" name='title' type="text" class="form-control" id="exampleFormControlInput1" placeholder="Название поста">
    @error('title')
      <p class='text-danger'>Это поле необходимо для заполнения</p>
     @enderror
     <textarea name='content' id="summernote">{{ $post->content }}</textarea>

     @error('content')
     <p class='text-danger'>Это поле необходимо для заполнения</p>
    @enderror
    Ваш файл ->
    <img style='width:200px' src="{{ asset('storage/'.$post->preview_image) }}" alt="">
      <div class="input-group mb-3">
        <input name='preview_image' type="file" class="form-control" value={{ $post->preview_image }}>
         <label class="input-group-text" for="inputGroupFile01">Добавить фото на превью</label>
      </div>
        @error('preview_image')
     <p class='text-danger'>{{ $message }}</p>
     @enderror
     <br>
     
     Ваш файл ->
     <img style='width:200px' src="{{ asset('storage/'.$post->main_image) }}" alt="">
      <div class="input-group mb-3">
        <input name='main_image' type="file" class="form-control" value={{ $post->main_image }}>
        <label class="input-group-text" for="inputGroupFile02">Добавить главное фото</label>
      </div>
      @error('main_image')
      <p class='text-danger'>{{ $message }}</p>
      @enderror

      Выберите категорию:
      <select name='category_id' class="form-select" aria-label="Default select example">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}" {{$category->id == $post->category_id ? ' selected' : '' }}> {{ $category->title }}</option>
        @endforeach
      </select>

      @error('category_id')
      <p class='text-danger'>Это поле необходимо для заполнения</p>
      @enderror
      <br>
      Выберите теги:
      <select name='tag_ids[]' class="form-control js-example-tags" multiple="multiple">
        @foreach ($tags as $tag)
        {{-- собираем нас массив из метода в модели по айди (так как это коллекция () мы  переделываем в массив)--}}
        <option {{ is_array($post->tags->pluck('id')->toArray()) && in_array( $tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }}  
          value="{{ $tag->id }}"> {{ $tag->title }}</option>
        @endforeach
      </select>
      <br>
      <br>

    <button type='submit' class="btn btn-primary">Добавить пост</button>
</form>
</div>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
        ]
        });
    });


    $(".js-example-tags").select2({
  tags: true
});
  </script>
  
@endsection