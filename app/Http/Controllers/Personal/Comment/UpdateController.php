<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Personal\Comment\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $id){
        $data= $request->validated();
        $comment = Comment::find($id);
        $comment->update($data);
        return redirect()->route('personal.comment.index');
    }
}