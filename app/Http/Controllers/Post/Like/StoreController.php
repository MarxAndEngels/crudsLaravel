<?php

namespace App\Http\Controllers\Post\Like;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke($id){
        $post = Post::find($id);
        Auth::user()->likedPost()->toggle($post->id);
        //лайки, если есть свзять пользоватаеля с постом этим, то он отвяжется и наоборот
        return redirect()->back();
    }
}