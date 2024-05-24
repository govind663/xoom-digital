<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
                'coupon_name' => 'required|string|max:255',
                'coupon_code' => 'required|string|max:255',
                'coupon_type' => 'required|string|max:255',
                'coupon_value_percentage' => 'nullable|numeric|between:0,100',
                'coupon_value_fixed' => 'nullable|numeric',
                'coupon_valid_to' => 'required|date',
            ];
        }else{
            $rule = [
                'coupon_name' => 'required|string|max:255',
                'coupon_code' => 'required|string|max:255',
                'coupon_type' => 'required|string|max:255',
                'coupon_value_percentage' => 'nullable|numeric|between:0,100',
                'coupon_value_fixed' => 'nullable|numeric',
                'coupon_valid_to' => 'required|date',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'coupon_name.required' => __('Coupon name is required'),
            'coupon_code.required' => __('Coupon code is required'),
            'coupon_type.required' => __('Coupon type is required'),
            'coupon_valid_to.required' => __('Coupon valid date is required'),
        ];
    }
}
