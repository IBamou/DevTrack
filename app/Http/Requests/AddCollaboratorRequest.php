<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCollaboratorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|email',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Please enter an email address.',
            'user_id.email' => 'Please enter a valid email address.',
        ];
    }
}