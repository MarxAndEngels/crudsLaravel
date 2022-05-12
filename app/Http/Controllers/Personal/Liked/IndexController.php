<?php

namespace App\Http\Controllers\Personal\Liked;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(){
        $posts= Auth::user()->likedPost; //достаем посты которые принадлежат только нам
        return view('personal.liked.index', compact('posts'));
    }
}