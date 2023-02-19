<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
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
            'title' => 'required|max:255|string',
            'comment' => 'required|string',
            'date' => 'required|date_format:Y-m-d',
            'minutes_spent' => 'required|integer|digits_between:1,11'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => __(':field is required field.', ['field' => 'Title']),
            'title.max'=> __(':field cannot be more than :num symbols.', ['field' => 'Title', 'num' => 255]),
            'title.string' => __(':field must be a string', ['field' => 'Title']),
            'comment.required' => __(':field is required field.', ['field' => 'Comment']),
            'comment.string' => __(':field must be a string', ['field' => 'Comment']),
            'date.required' => __(':field is required field.', ['field' => 'Date']),
            'date.date_format' => __('Invalid date format. Allowed date format is Y-m-d.'),
            'minutes_spent.required' => __(':field is required field.', ['field' => 'Minutes spent']),
            'minutes_spent.integer' => __(':field must be an integer', ['field' => 'Minutes spent']),
            'minutes_spent.digits_between' => __(':field field length cannot be more than :num', ['field' => 'Minutes spent', 'num' => 10]),
        ];
    }
}
