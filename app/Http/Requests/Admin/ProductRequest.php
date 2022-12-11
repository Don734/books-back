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
            'sale_price' => 'required|numeric',
            'size' => 'nullable|string',
            'age' => 'nullable|string',
            'age' => 'nullable|string',
            'binding' => 'nullable|string',
            'links' => 'nullable|array',
            'links.*' => 'nullable|string',
            'description' => 'nullable|string',
            'page_count' => 'nullable|numeric',
            'year' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'quantity' => 'nullable|numeric',
            'is_active' => 'nullable|string',
            'is_new' => 'nullable|string',
            'is_recommend' => 'nullable|string',
            'cover_image' => 'nullable|image',
            'cover_delete' => 'nullable|string',
        ];
    }
}
