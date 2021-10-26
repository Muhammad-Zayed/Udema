<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name' => 'required|max:191|string',
            'price' => 'required|numeric',
            'image' => 'nullable|file|mimes:jpg,png,jpeg',
            'short_description' => 'required|max:191|string',
            'long_description' => 'required|string'
        ];
    }
}
