<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
                'customer_name' => 'required|string|max:255',
                'customer_email' => 'nullable|string|max:255',
                'customer_phone' => 'required|string|max:255',
                'customer_address' => 'required|string|max:255',
                'customer_city' => 'required|string|max:255',
                'customer_pincode' => 'required|string|max:255',
                'package_id' => 'required|numeric',
                'package_amt' => 'required|numeric',
                'lead_source_id' => 'required|numeric',
                'lead_dt' => 'required|string|max:255',
                'meating_dt' => 'required|string|max:255',
                'meating_time' => 'required|string|max:255',
                'payment_receive_status' => 'required|numeric',
                'payment_type' => 'required|numeric',
                'payment_date' => 'required|string|max:255',
                'task_status' => 'required|numeric',
                'user_id' => 'required|numeric',
            ];
        }else{
            $rule = [
                'customer_name' => 'required|string|max:255',
                'customer_email' => 'nullable|string|max:255',
                'customer_phone' => 'required|string|max:255',
                'customer_address' => 'required|string|max:255',
                'customer_city' => 'required|string|max:255',
                'customer_pincode' => 'required|string|max:255',
                'package_id' => 'required|numeric',
                'package_amt' => 'required|numeric',
                'lead_source_id' => 'required|numeric',
                'lead_dt' => 'required|string|max:255',
                'meating_dt' => 'required|string|max:255',
                'meating_time' => 'required|string|max:255',
                'payment_receive_status' => 'required|numeric',
                'payment_type' => 'required|numeric',
                'payment_date' => 'required|string|max:255',
                'task_status' => 'required|numeric',
                'user_id' => 'required|numeric',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'Customer Name is required',
            'customer_name.string' => __('The customer name must be a string.'),
            'customer_name.max' => __('The length of customer name should not exceed 255 characters'),

            'customer_email.required' => 'Customer Email is required',
            'customer_email.string' => __('The customer email must be a string.'),
            'customer_email.max' => __('The length of customer email should not exceed 255 characters'),

            'customer_phone.required' => 'Customer Mobile No is required',
            'customer_phone.string' => __('The customer mobile no. must be a string.'),
            'customer_phone.max' => __('The length of customer mobile no. should not exceed 255 characters'),

            'customer_address.required' => 'Customer Address is required',
            'customer_address.string' => __('The customer address must be a string.'),
            'customer_address.max' => __('The length of customer address should not exceed 255 characters'),

            'customer_city.required' => 'Customer City is required',
            'customer_city.string' => __('The customer city must be a string.'),
            'customer_city.max' => __('The length of customer city should not exceed 255 characters'),

            'customer_pincode.required' => 'Customer Pincode is required',
            'customer_pincode.string' => __('The customer pincode must be a string.'),
            'customer_pincode.max' => __('The length of customer pincode should not exceed 255 characters'),

            'package_id.required' => __('Please select a package name.'),
            'package_id.numeric' => __('The package name must be a number.'),

            'package_amt.required' => __('Package amount is required.'),
            'package_amt.numeric' => __('The package name must be a number.'),

            'lead_source_id.required' => __('Please Select Lead Source.'),
            'lead_source_id.numeric' => __('The Lead Source must be a number.'),

            'lead_dt.required' => __('Lead Date is required.'),
            'meating_dt.required' => __('Meating Date is required.'),
            'meating_time.required' => __('Meating Time is required.'),
            'payment_receive_status.required' => __('Please Select Payment Received Status.'),
            'payment_type.required' => __('Please Select Payment Type.'),
            'payment_date.required' => __('Please Select Payment Date.'),
            'task_status.required' => __('Please Select Task Status.'),
            'user_id.required' => __('Please Assign User')
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->has('lead_dt')) {
            $this->merge([
                'lead_dt' => Carbon::createFromFormat('d-m-Y', $this->lead_dt)->format('Y-m-d'),
            ]);
        }

        if ($this->has('meating_dt')) {
            $this->merge([
                'meating_dt' => Carbon::createFromFormat('d-m-Y', $this->meating_dt)->format('Y-m-d'),
            ]);
        }

        if ($this->has('meating_time')) {
            $this->merge([
                'meating_time' => Carbon::createFromFormat('H:i:s', $this->meating_time)->format('H:i:s'),
            ]);
        }

        if ($this->has('payment_date')) {
            $this->merge([
                'payment_date' => Carbon::createFromFormat('d-m-Y', $this->payment_date)->format('Y-m-d'),
            ]);
        }
    }
}
