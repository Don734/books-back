<?php

namespace App\Http\Requests\Admin;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'nullable|string',
            'password' => 'required_with:password_confirm|same:password_confirm|string|min:8',
            'password_confirm' => 'min:8',
            'user_image' => 'nullable|image',
            'user_image_delete' => 'nullable|string',
        ];
    }
}
