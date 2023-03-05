<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFileRequest extends FormRequest
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
            'name' => 'nullable|min:4|max:255',
            'file' => [
                'required',
                'max:20000',
                'file',
            ],
            'password' => 'nullable|min:6',
        ];
    }
    
    # Custom validation messages
    public function messages() : array
    {
        return [
            'name.min' => 'The :attribute field should have minimum 4 characters.',
            'name.max' => 'The :attribute field should have maximum 255 characters.',
            'file.mimes' => 'the :attribute should be of type of jpg,jpeg,png,bmp,webp,svg,pdf,doc,docx,xls,xlsx,ppt,pptx,mp3,mp4,avi,mkv.',
            'file.required' => 'Upload file field is required.',
            'file.file' => 'Only can upload of type file!',
            'file.max' => 'Max uploaded file size is 200MB',
            'password.min' => 'The :attribute field should have minimum 6 characters.'
        ];
    }
}
