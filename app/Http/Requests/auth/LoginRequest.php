<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
                'employee_code_or_mobile_no' => 'required|string',
                'password' => 'required|string',
            ];
        }else{
            $rule = [
                'employee_code_or_mobile_no' => 'required|string',
                'password' => 'required|string',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'employee_code_or_mobile_no.required' => __('Employee ID or Mobile Number is required'),
            'password.required' => __('Password is required'),
        ];
    }
}
