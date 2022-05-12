<?php

namespace App\Http\Requests\Admin\Post;

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
            'title'=>'required|string',
            'content'=>'required|string',
            'preview_image'=>'nullable|mimes:jpeg,jpg,png|max:10000',
            'main_image'=>'nullable|mimes:jpeg,jpg,png|max:10000',
            'category_id'=>'required|exists:categories,id',    //существует в категориях
            'tag_ids'=>'nullable|array',  
            'tag_ids.*'=>'nullable|exists:tags,id',    //tag_ids.* -- все что внутри тегах , должно существовать в бд
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Это поле должно соотвествовать строчному типу',
            'content.required' => 'Это поле необходимо для заполнения',
            'content.string' => 'Это поле должно соотвествовать строчному типу',
            'preview_image.required' => 'Это поле необходимо для заполнения',
            'preview_image.mimes'=> 'Файл должен содержать расширение peg,jpg,png',
            'preview_image.max'=> 'Файл должен быть максимум 10000кб',
            'main_image.required' => 'Это поле необходимо для заполнения',
            'main_image.mimes'=> 'Файл должен содержать расширение peg,jpg,png',
            'main_image.max'=> 'Файл должен быть максимум 10000кб',
            'category_id.required'=>'Это поле необходимо для заполнения',
            'category_id.exists'=>'Это поле должно быть в базе данных',
        ];
    }
}
