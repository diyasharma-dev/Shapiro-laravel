<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:7', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:5', 'max:5000'],
            'case_type' => ['nullable', 'string', 'max:100'],
            // Honeypot field - should remain empty
            'website_hp' => ['nullable', 'max:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your full name.',
            'phone.required' => 'Please provide a valid phone number so we can reach you.',
            'message.required' => 'Please provide details about your case.',
            'message.min' => 'Message should contain at least 5 characters.',
            'website_hp.max' => 'Spam detected.',
        ];
    }
}
