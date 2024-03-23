<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotebookStoreRequest extends FormRequest
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
            'full_name' => 'required|max:255',
            'company' => 'max:255',
            'phone_number' => 'required|unique:notebooks,phone_number|regex:/^\+\d{1,3}\d{10}$/',
            'email' => 'required|email|unique:notebooks,email|max:255',
            'date_of_birth' => 'date',
            'photo_path' => 'image',
        ];
    }
}
