<?php

namespace App\Http\Controllers\Post;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke($id){
        $post = Post::find($id);
        Carbon::setLocale('ru_Ru');
        $data = Carbon::parse($post->created_at);

        $relatedPosts = Post::where('category_id',$post->category_id)
        ->where('id', '!=', $post->id)->get()->take(3); 
        //схожие посты выводим по категориям

        return view('post.show' , compact('post','data','relatedPosts'));
    }
}
