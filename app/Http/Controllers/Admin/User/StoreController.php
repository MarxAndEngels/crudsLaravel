<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\User\PasswordMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Admin\User\StoreRequest;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        $data= $request->validated();
        $password = Str::random(10);
        $data['password'] = Hash::make($data['password']);
        User::firstOrCreate(['email'=>$data['email']], $data); //если есть совпадение с такими емайлом пропускаем
        Mail::to($data['email'])->send(new PasswordMail($password));
        return redirect()->route('admin.user.index');
    }
}
