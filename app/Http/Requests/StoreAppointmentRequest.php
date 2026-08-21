<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'patient_id' => [
                'required',
                'exists:patients,id',
            ],

            'doctor_id' => [
                'required',
                'exists:doctors,id',
            ],

            'appointment_date' => [
                'required',
                'date',
                'after_or_equal:today',
            ],

            'appointment_time' => [
                'required',
                'date_format:H:i',

                Rule::unique('appointments', 'appointment_time')
                    ->where(function ($query) {
                        return $query
                            ->where('doctor_id', $this->doctor_id)
                            ->where('appointment_date', $this->appointment_date);
                    })
                    ->ignore($this->route('appointment')),
            ],

            'appointment_type' => [
                'required',
                Rule::in([
                    'Consultation',
                    'Follow-up',
                ]),
            ],

            'reason' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Pending',
                    'Confirmed',
                    'Completed',
                    'Cancelled',
                ]),
            ],

            'notes' => [
                'nullable',
                'string',
                'max:2000',
            ],
        ];
    }

    public function messages(): array
    {
        return [

            'patient_id.required' =>
                'Please select a patient.',

            'patient_id.exists' =>
                'Selected patient is invalid.',

            'doctor_id.required' =>
                'Please select a doctor.',

            'doctor_id.exists' =>
                'Selected doctor is invalid.',

            'appointment_date.required' =>
                'Appointment date is required.',

            'appointment_date.after_or_equal' =>
                'Appointment date cannot be in the past.',

            'appointment_time.required' =>
                'Appointment time is required.',

            'appointment_time.date_format' =>
                'Please enter a valid appointment time.',

            'appointment_time.unique' =>
                'This doctor already has an appointment at this date and time.',

            'appointment_type.required' =>
                'Please select appointment type.',

            'status.required' =>
                'Please select appointment status.',
        ];
    }
}