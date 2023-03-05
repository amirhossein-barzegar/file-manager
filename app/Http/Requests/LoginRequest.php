<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => [
                'required',
                'min:4',
                'max:64',
            ],
            'password' => [
                'required',
                'min:6',
            ]
        ];
    }

    # Custom validation messages
    public function messages() {
        return [
            'username.required' => 'The :attribute field is required.',
            'username.min' => 'The :attribute field should have minimum 4 characters.',
            'username.max' => 'The :attribute field should have maximum 64 characters.',
            'password.required' => 'The :attribute field should is required.',
            'password.min' => 'The :attribute field should have minimum 6 characters.',
        ];
    }
}
