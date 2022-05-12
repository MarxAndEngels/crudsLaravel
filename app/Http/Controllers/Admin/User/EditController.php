<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke($id){
        $user = User::find($id);
        $roles = User::getRoles();
        return view('admin.user.edit', compact('user','roles'));
    }
}