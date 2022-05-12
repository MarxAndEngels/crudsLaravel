<?php

namespace App\Services;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostService
{
     public function store($data)
     {
        try{
           if(isset($data['tag_ids'])){
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
           }
            // $previewImage= $data['preview_image'];
            // $mainImage = $data['main_image'];
            // $previewImagePath = Storage::put('/images', $previewImage);
            // $mainImagePath = Storage::put('/images', $mainImage);
            
            $data['preview_image'] = Storage::disk('public')->put('images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('images', $data['main_image']);
    
            $post = Post::create($data);
            
            if(isset($tagIds)){
               $post->tags()->attach($tagIds); //чтоб к однуму посту добавилось несколько тегов
            }
        }
        catch(\Exeption $exeption){
           abort(404);
        }
        //try catch для того, чтобы не дублировалось создание поста
     }

}
