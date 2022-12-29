<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'email' => 'required|string',
            'phone' => 'nullable|string',
            'password' => 'nullable|string|min:8',
            'password_confirm' => 'nullable|min:8',
            'user_image' => 'nullable|image',
            'user_image_delete' => 'nullable|string',
        ];
    }
}
