<?php

namespace App\Http\Controllers\Category;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(){
        $categorys = Category::all();
        return view('category.index', compact('categorys'));
    }
}