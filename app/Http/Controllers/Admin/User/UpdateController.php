<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request,$id){
        $data= $request->validated();
        $user = User::find($id);
        $user->update($data);
        return view('admin.user.show', compact('user'));
    }
}