<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'url' => 'nullable|string',
            'banner_text' => 'nullable|string',
            'is_active' => 'nullable|string',
            'is_advert' => 'nullable|string',
            'image' => 'nullable|image|max:1000',
            'image_delete' => 'nullable|string'
        ];
    }
}
