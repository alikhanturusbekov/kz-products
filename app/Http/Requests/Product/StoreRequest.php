<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'location' => 'required',
            'price' => 'required|numeric',
            'contact_link' => 'required|URL',
            'category' => 'required',
            'description' => 'required',
            'photo' => 'sometimes|image',
        ];
    }
}
