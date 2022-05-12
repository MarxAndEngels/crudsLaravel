@extends('layouts.admin')
@section('content')

Добавление постов
<div class="mb-3 col-6">
    <form action="{{ route('admin.post.store') }}" method='POST' enctype="multipart/form-data">
        @csrf
    <label for="exampleFormControlInput1" class="form-label">Название поста</label>
    <input value="{{ old('title') }}" name='title' type="text" class="form-control" id="exampleFormControlInput1" placeholder="Название поста">
    @error('title')
      <p class='text-danger'>Это поле необходимо для заполнения</p>
     @enderror
     <textarea name='content' id="summernote">{{ old('content') }}</textarea>

     @error('content')
     <p class='text-danger'>Это поле необходимо для заполнения</p>
    @enderror

      <div class="input-group mb-3">
        <input name='preview_image' type="file" class="form-control">
         <label class="input-group-text" for="inputGroupFile01">Добавить фото на превью</label>
      </div>
        @error('preview_image')
     <p class='text-danger'>{{ $message }}</p>
     @enderror

      <div class="input-group mb-3">
        <input name='main_image' type="file" class="form-control">
        <label class="input-group-text" for="inputGroupFile02">Добавить главное фото</label>
      </div>
      @error('main_image')
      <p class='text-danger'>{{ $message }}</p>
      @enderror

      Выберите категорию:
      <select name='category_id' class="form-select" aria-label="Default select example">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? ' selected' : '' }}> {{ $category->title }}</option>
        @endforeach
      </select>

      @error('category_id')
      <p class='text-danger'>Это поле необходимо для заполнения</p>
      @enderror
      <br>
      Выберите теги:
      <select name='tag_ids[]' class="form-control js-example-tags" multiple="multiple">
        @foreach ($tags as $tag)
        {{-- если есть в массиве старом(от ларавель) наш тег ,выводим --}}
        <option {{ is_array(old('tag_ids')) && in_array( $tag->id, old('tag_ids')) ? ' selected' : '' }}  
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