<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
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
            'TAB_NAME' => 'nullable|string',
            'BODY_SCRIPT' => 'nullable|string',
            'MAINTENANCE' => 'nullable|string',
            'LOGO_IMAGE' => 'nullable|image',
            'cover_delete' => 'nullable|string',
        ];
    }
}
