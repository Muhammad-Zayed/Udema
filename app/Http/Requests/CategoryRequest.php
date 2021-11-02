<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|max:191|string|unique:categories,name',
            'image' => 'nullable|file|mimes:jpg,png,jpeg'
        ];
    }
}
