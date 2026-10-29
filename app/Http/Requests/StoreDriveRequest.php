<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreDriveRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'package_lpa' => ['required', 'numeric', 'min:0', 'max:99.99'],
            'min_cgpa' => ['required', 'numeric', 'min:0', 'max:10'],
            'last_date' => ['required', 'date', 'after_or_equal:today'],
        ];
    }

    /**
     * Get custom attribute names for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'package_lpa' => 'package',
            'min_cgpa' => 'minimum CGPA',
            'last_date' => 'last date',
        ];
    }
}
