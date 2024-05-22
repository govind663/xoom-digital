<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
                'name' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'mobile_no' => 'required|numeric|digits:10|unique:users,mobile_no',
                'email' => 'required|email|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'user_type' => 'required|numeric|max:5',
                'designation' => 'required|string|max:255',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required',
            ];
        }else{
            $rule = [
                'name' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'mobile_no' => 'required|numeric|digits:10|unique:users,mobile_no',
                'email' => 'required|email|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'user_type' => 'required|numeric|max:5',
                'designation' => 'required|string|max:255',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'name.required' => __('Name is required'),
            'name.max' => __('The length of name should not exceed 255 characters'),
            'name.string' => __('The name must be a string.'),

            'city.required' => __('City is required'),
            'city.max' => __('The length of city should not exceed 255 characters'),
            'city.string' => __('The city must be a string.'),

            'mobile_no.required' => __('Mobile No is required'),
            'mobile_no.max' => __('The length of Mobile No should not exceed 255 characters'),
            'mobile_no.unique' => __('The Mobile No has already been taken'),

            'email.required' => __('Email is required'),
            'email.max' => __('The length of Email should not exceed 255 characters'),
            'email.email' => __('The Email must be a valid email address'),
            'email.unique' => __('The Email has already been taken'),

            'user_type.required' => __('User Type is required'),
            'user_type.max' => __('The length of user type should not exceed 5 characters'),
            'user_type.numeric' => __('The user type must be a Number.'),

            'designation.required' => __('Designation is required'),
            'designation.max' => __('The length of designation should not exceed 255 characters'),
            'designation.string' => __('The designation must be a string.'),

            'password.required' => __('Password is required'),
            'password_confirmation.required' => __('Confirm Password is required'),
        ];
    }
}
