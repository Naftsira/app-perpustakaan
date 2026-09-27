<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_category'=> 'required|string|max:100',
            'deskripsi'=> 'nullable|string'
        ];
    }
    public function messages(): array
    {
        return [
            'nama_category.required'=> 'Nama kategori adlah required.',
            'nama_category.max'=> 'Batas Maks adalah 100 char.'

        ]
    }
}
