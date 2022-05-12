<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke($id){
      $user = User::find($id);
      return view('admin.user.show', compact('user'));
    }
}
