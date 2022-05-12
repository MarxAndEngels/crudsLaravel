<?php

namespace App\Http\Controllers\Post\Comment;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Post\Comment\StoreRequest;

class StoreController extends Controller
{
    public function __invoke($id, StoreRequest $request){
        $data= $request->validated();
        $data['user_id'] = Auth::user()->id;
        $data['post_id'] = $id;
        Comment::create($data);
        return redirect()->route('post.show',$id);
    }
}