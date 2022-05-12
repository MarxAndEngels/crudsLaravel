<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\Post\BaseController;

class DeleteController extends BaseController
{
    public function __invoke($id){
        $post = Post::find($id);
        Storage::disk('public')->delete('images', $post->preview_image);
        Storage::disk('public')->delete('images', $post->main_image);
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
