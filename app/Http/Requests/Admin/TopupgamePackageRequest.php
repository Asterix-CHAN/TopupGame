<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TopupgamePackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'developer' => 'required|max:255',
            'description' => 'required|max:255',
            'about' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|max:255',
            // 'platform' => 'required|max:255',
            // 'categories' => 'required|max:255',
            'category_id' => 'required|array|min:1',
            'category_id.*' => 'required|integer|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ];
    }
}
