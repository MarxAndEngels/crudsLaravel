<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    public function __invoke($id){
        $post = Post::find($id);
        $posts = Auth::user()->likedPost()->detach($post->id); //likedPost() уже запрос в бд
        return redirect()->route('personal.liked.index');
    }
}
