<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users,email,'. $this->user_id, 
             //чтобы уникальные email работали, получаем и разрешаем почту с этим айдишником
            'role'=>'required|integer',
            'user_id'=>'required|exists:users,id'
        ];
    }
}
