<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(){
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
}
