<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class PersonalInformationRequest extends FormRequest
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
            'full_name' => ['required', 'max:255'],
            'image' => 'required',
            'profession' => 'required',
            'phone' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'address' => 'required',
            'cv' => ['file' => [
                'required',
                File::types(['pdf', 'docx', 'doc'])
            ]],
            'main_title' => 'required',
            'about' => 'required',
            'btn_contact_text' => 'required',
            'btn_contact_link' => 'required',
            'sub_title_left' => 'required',
            'small_title_left' => 'required',
            'sub_title_right' => 'required',
            'small_title_right' => 'required',
            'sub_title_bottom' => 'required',
            'small_title_bottom' => 'required',
        ];
    }
}
