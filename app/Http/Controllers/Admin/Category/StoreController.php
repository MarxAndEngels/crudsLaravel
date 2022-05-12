<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        $data= $request->validated();
        Category::firstOrCreate(['title'=>$data['title']]);
        return redirect()->route('admin.category.index');
    }
}
