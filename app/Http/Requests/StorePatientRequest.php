<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePatientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',

            'father_name' => 'required|string|max:255',

            'gender' => 'required|in:Male,Female,Other',

            'cnic' => [
                'required',
                'string',
                Rule::unique('patients', 'cnic')->ignore($this->patient),
            ],

            'age' => 'required|integer|min:1|max:120',

            'contact_number' => 'required|string|max:20',

            'address' => 'required|string|max:500',
        ];
    }
}