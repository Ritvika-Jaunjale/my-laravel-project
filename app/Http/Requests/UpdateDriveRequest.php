<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;

class UpdateDriveRequest extends StoreDriveRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * Unlike creating, an existing drive may keep a last date in the past
     * so closed drives can still be corrected.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            ...parent::rules(),
            'last_date' => ['required', 'date'],
        ];
    }
}
