<?php

namespace App\Http\Controllers\Personal\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(){
        $comments= Auth::user()->comment; //достаем комменты которые принадлежат только нам
        return view('personal.comment.index', compact('comments'));
    }
}