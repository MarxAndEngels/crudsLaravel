<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Http\Controllers\Admin\Post\BaseController;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request,$id){
        $data= $request->validated();
        $post = Post::find($id);

        if(isset($data['tag_ids'])){
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
        }
        
        if(isset($data['preview_image'])){
            $data['preview_image'] = Storage::disk('public')->put('images', $data['preview_image']);
        }
        if(isset($data['main_image'])){
            $data['main_image'] = Storage::disk('public')->put('images', $data['main_image']);
        }
        
        $post->update($data);
        
        if(isset($tagIds)){
            $post->tags()->sync($tagIds); //удаляет все привязки которые были у поста с этими тегами
        }

        return view('admin.post.show', compact('post'));
    }
}