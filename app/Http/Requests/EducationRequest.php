<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'unv_name' => ['required', 'max:255'],
            'degree' => ['required', 'max:255'],
            'branch' => ['required', 'max:255'],
            'year' => ['required', 'max:255'],
            'order' => ['nullable'],
        ];
    }
}
