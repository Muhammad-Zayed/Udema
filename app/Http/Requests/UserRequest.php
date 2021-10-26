<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email|max:191,unique:users,email',
            'phone' => 'required|string|max:191,unique:users,phone',
            'password' => 'required|min:6|max:191|confirmed',
            'role' => 'required|string|in:user,admin',
            'is_active' => 'required|boolean',
            'image' => 'nullable|file|mimes:jpg,png,jpeg'
        ];
    }
}
