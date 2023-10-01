<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->route('product')->user->id == auth()->id();
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|max:255',
            'location' => 'sometimes',
            'price' => 'sometimes|numeric',
            'contact_link' => 'sometimes|URL',
            'category' => 'sometimes',
            'description' => 'sometimes',
            'photo' => 'sometimes|image',
        ];
    }
}
