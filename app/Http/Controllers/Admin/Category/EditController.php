<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }
}