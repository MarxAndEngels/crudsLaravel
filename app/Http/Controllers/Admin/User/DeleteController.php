<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
