<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
