<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditController extends BaseController
{
    public function __invoke($id){
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        $postTags = $post->tags;
        return view('admin.post.edit', compact('post','categories','tags', 'postTags'));
    }
}