<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __(':field is required field.', ['field' => 'Email address']),
            'email.max'=> __(':field cannot be more than :num symbols.', ['field' => 'Email', 'num' => 255]),
            'email.email' => __('This field must be a valid email address.'),
            'email.unique' => __('This email address already registered.'),
            'password.required' => __(':field is required field.', ['field' => 'Password']),
            'password.min' => __(':field must be at least :num characters long.', ['field' => 'Password', 'num' => 6]),
            'password.confirmed' => __(':field confirmation does not match.', ['field' => 'Password']),
        ];
    }
}
