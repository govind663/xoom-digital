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
                'mobile_no' => 'required|string',
                'password' => 'required|string',
            ];
        }else{
            $rule = [
                'mobile_no' => 'required|string',
                'password' => 'required|string',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'mobile_no.required' => __('Mobile Number is required'),
            'password.required' => __('Password is required'),
        ];
    }
}
