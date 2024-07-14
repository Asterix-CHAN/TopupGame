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
            'slug' => 'required|integer',
            'price' => 'required|numeric',
            'stock' => 'required|max:255',
            'transaction_date' => 'required|date',
            'category_id' => 'reuqired|max:255',
            'platform_id' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ];
    }
}
