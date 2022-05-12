<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Post\BaseController;

class ShowController extends BaseController
{
    public function __invoke($id){
      $post = Post::find($id);
      return view('admin.post.show', compact('post'));
    }
}
