<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'required|string',
            'barcode' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'quantity' => 'nullable|numeric',
            'is_active' => 'nullable|string',
            'upload_files' => 'nullable|array',
            'upload_files.*' => 'file|mimes:jpeg,png,jpg',
            'files_for_delete' => 'nullable|array',
            'files_for_delete.*' => 'nullable|string',
        ];
    }
}
