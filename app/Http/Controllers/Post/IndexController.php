<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(){
        $posts = Post::withCount('likedPost')->orderBy('id','desc')->paginate(3); 
        //с атрибутов кол лайков юзеров
        $randomPosts = Post::get()->random(3);
        $likedPost = Post::withCount('likedPost')->orderBy('liked_post_count','desc')->get()->take(4); 
        //лайки likedPost - метод для отношения many to many 
        //withCount - дополнительный атрибут считающий сколько юзеров у каждого поста
        return view('post.index' , compact('posts','randomPosts','likedPost'));
    }
}
