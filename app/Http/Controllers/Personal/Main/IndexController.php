<?php

namespace App\Http\Controllers\Personal\Main;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(){
        $data = [];
        $data['posts'] = Post::all()->count();
        $data['category'] = Category::all()->count();
        $data['tag'] = Tag::all()->count();
        $data['user'] = User::all()->count();
        return view('personal.main.index');
    }
}