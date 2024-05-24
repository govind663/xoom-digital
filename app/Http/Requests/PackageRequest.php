<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
                'package_type_id' => 'required|numeric',
                'description' => 'required|string',
                'amount' => 'required|numeric',
                'image' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
            ];
        }else{
            $rule = [
                'name' => 'required|string|max:255',
                'package_type_id' => 'required|numeric',
                'description' => 'required|string',
                'amount' => 'required|numeric',
                'image' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'name.required' => __('Package Name is required'),
            'name.string' => __('The package name must be a string.'),
            'name.max' => __('The length of package name should not exceed 255 characters'),

            'package_type_id.required' => __('Please select a package type'),
            'package_type_id.numeric' => __('The package type must be a number.'),

            'description.required' => __('Description is required'),
            'description.string' => __('The description must be a string.'),

            'amount.required' => __('Amount is required'),
            'amount.numeric' => __('The amount must be a number.'),

            'image.required' => __('Please upload an image'),
            'image.mimes' => __('The image must be a file of type: jpeg, png, jpg, pdf.'),
            'image.max' => __('The image size should not exceed 2 MB.'),
        ];
    }
}
