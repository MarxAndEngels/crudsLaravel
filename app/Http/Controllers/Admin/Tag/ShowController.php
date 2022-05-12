<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke($id){
      $tag = Tag::find($id);
      return view('admin.tag.show', compact('tag'));
    }
}
