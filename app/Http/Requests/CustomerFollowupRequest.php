<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerFollowupRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->id){
            $rule = [
                'task_id' => 'required|numeric|max:10',
                'followup_status' => 'required|numeric|max:10',
                'followup_date' => 'required|date_format:d-m-Y',
                'followup_time' => 'required|date_format:H:i',
                'followup_by' => 'nullable|numeric|max:10',
                'followup_by_type' => 'nullable|numeric|max:10',
                'followup_description' => 'required|string|max:255',
            ];
        }else{
            $rule = [
                'task_id' => 'required|numeric|max:10',
                'followup_status' => 'required|numeric|max:10',
                'followup_date' => 'required|date_format:d-m-Y',
                'followup_time' => 'required|date_format:H:i',
                'followup_by' => 'nullable|numeric|max:10',
                'followup_by_type' => 'nullable|numeric|max:10',
                'followup_description' => 'required|string|max:255',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'task_id.required' => 'Task id is required.',
            'task_id.numeric' => 'Task id must be a number.',
            'task_id.max' => 'Task id must not be greater than 10.',

            'followup_status.required' => 'Followup status is required.',
            'followup_status.numeric' => 'Followup status must be a number.',
            'followup_status.max' => 'Followup status must not be greater than 10.',

            'followup_date.required' => 'Followup date is required.',
            'followup_date.date_format' => 'Followup date is not valid.',

            'followup_time.required' => 'Followup time is required.',
            'followup_time.date_format' => 'Followup time is not valid.',

            'followup_by.numeric' => 'Followup by type must be a number.',
            'followup_by.max' => 'Followup by type must not be greater than 10.',

            'followup_by_type.numeric' => 'Followup by type must be a number.',
            'followup_by_type.max' => 'Followup by type must not be greater than 10.',

            'followup_description.required' => 'Followup description is required.',
            'followup_description.max' => 'Followup description must not be greater than 255 characters.',
            'followup_description.string' => 'Followup description must be a string.',
        ];
    }
}
