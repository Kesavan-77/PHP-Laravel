<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'=>'required',
            'uuid' => 'nullable|uuid',
            'driver_name' => 'required|string|max:255',
            'driver_ph_number' => 'required|string|regex:/^\+?[1-9]\d{1,14}$/',
            'driver_experience' => 'required|integer|min:0|max:50',
            'driver_charge' => 'required|numeric|min:0',
            'driver_gender' => 'required|string|in:male,female,other',
            'driver_age' => 'required|integer|min:18|max:100',
            'driver_license' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            'vehicle_type' => 'required|array',
            'vehicle_type.*' => 'string|in:car,truck,motorcycle,suv',
        ];
        
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'driver_name.required' => 'The driver name is required.',
            'driver_ph_number.required' => 'The driver phone number is required.',
            'driver_ph_number.regex' => 'The phone number format is invalid. Please use a valid international format.',
            'driver_experience.required' => 'Please enter the drivers experience in years.',
            'driver_experience.integer' => 'The driver experience must be an integer.',
            'driver_experience.max' => 'The driver experience cannot exceed 50 years.',
            'driver_charge.required' => 'The driver charge is required.',
            'driver_charge.numeric' => 'The driver charge must be a number.',
            'driver_gender.required' => 'The driver gender is required.',
            'driver_gender.in' => 'The selected gender is invalid. Please select a valid gender option.',
            'driver_age.required' => 'The driver age is required.',
            'driver_age.integer' => 'The driver age must be an integer.',

            'driver_license.required' => 'Please upload an image of the license.',
            'driver_license.mimes' => 'The license image must be a file of type: jpeg, png, jpg, gif, pdf.',
            'driver_license.max' => 'The vehicle image must not be larger than 2 MB.',

            'vehicle_type.required' => 'Please select at least one vehicle type.',
            'vehicle_type.array' => 'Vehicle type must be an array.',
            'vehicle_type.*.in' => 'The selected vehicle type is invalid. Only car, truck, motorcycle, and SUV are allowed.',
        ];
    }
}
