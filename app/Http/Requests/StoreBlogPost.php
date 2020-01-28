<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'name'  => 'required|max:3',
            'email' => 'required|max:30|email',
            'password' => 'required|max:5',
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'karakter name kamu terlalu banyak',
            'password.max' => 'password kamu jangan lebih dari 5 ya'
        ];
    }
}
