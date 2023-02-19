<?php

namespace App\Http\Requests;

use App\Services\ReportService;
use Illuminate\Foundation\Http\FormRequest;

class ReportGenerateRequest extends FormRequest
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
            'from' => 'required|date_format:Y-m-d',
            'to' => 'required|date_format:Y-m-d|after_or_equal:from',
            'report_type' => 'required|in:' . implode(',', ReportService::getAvailableReportsIds())
        ];
    }

    public function messages(): array
    {
        return [
            'from.required' => __(':field is required field.', ['field' => 'Date from']),
            'from.date_format' => __('Invalid date format. Allowed date format is Y-m-d.'),
            'to.required' => __(':field is required field.', ['field' => 'Date to']),
            'to.date_format' => __('Invalid date format. Allowed date format is Y-m-d.'),
            'to.after_or_equal' => __(':field can not be before :field_2', ['field' => 'Date to', 'field_2' => 'Date from']),
            'report_type.required' => __(':field is required field.', ['field' => 'Report type']),
            'report_type.in' => __('Invalid field value.'),
        ];
    }
}
