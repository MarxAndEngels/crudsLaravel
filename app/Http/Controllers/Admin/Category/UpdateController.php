<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request,$id){
        $data= $request->validated();
        $category = Category::find($id);
        $category->update($data);
        return view('admin.category.show', compact('category'));
    }
}