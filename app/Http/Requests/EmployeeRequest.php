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
                'mobile_no' => 'required',
                'email' => 'required|email',
                'user_type' => 'required|numeric|max:5',
                'designation' => 'required|string|max:255',
            ];
        }else{
            $rule = [
                'name' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10|digits:10|unique:users,mobile_no',
                'email' => 'required|email|unique:users,email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
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
            'mobile_no.unique' => __('The Mobile No has already been taken'),
            'mobile_no.regex' => __('The Mobile No must be a valid number'),
            'mobile_no.min' => __('The Mobile No must be at least 10 characters.'),
            'mobile_no.max' => __('The Mobile No must not exceed 10 characters.'),
            'mobile_no.digits' => __('The Mobile No must be exactly 10 digits.'),

            'email.required' => __('Email is required'),
            'email.email' => __('The Email must be a valid email address'),
            'email.unique' => __('The Email has already been taken'),
            'email.regex' => __('The Email must be a valid email address'),
            'email.max' => __('The Email must not exceed 255 characters.'),

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
