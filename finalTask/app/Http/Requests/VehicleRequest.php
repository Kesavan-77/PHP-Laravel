<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        // Allow the request to proceed.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'user_id' => 'required',
            'uuid' => 'nullable|uuid', // Mark as nullable since it's auto-generated
            'vehicle_no' => 'required|string|max:255|unique:vehicles,vehicle_no',
            'vehicle_type' => 'required|string|max:100',
            'vehicle_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vehicle_status' => 'required|string|in:Active,Inactive',
            'person_count' => 'required|integer|min:1|max:50',
            'vehicle_charge' => 'required|numeric|min:0',
        ];
    }

    /**
     * Get the custom messages for validation rules.
     */
    public function messages()
    {
        return [
            'user_id.required' => 'Please provide a user ID.',
            'uuid.uuid' => 'The UUID must be a valid UUID format.',

            'vehicle_no.required' => 'Please provide a vehicle number.',
            'vehicle_no.unique' => 'This vehicle number is already in use.',
            'vehicle_no.max' => 'The vehicle number should not exceed 255 characters.',

            'vehicle_type.required' => 'Please provide the type of vehicle.',
            'vehicle_type.max' => 'The vehicle type should not exceed 100 characters.',

            'vehicle_img.required' => 'Please upload an image of the vehicle.',
            'vehicle_img.image' => 'The uploaded file must be an image.',
            'vehicle_img.mimes' => 'The vehicle image must be a file of type: jpeg, png, jpg, gif.',
            'vehicle_img.max' => 'The vehicle image must not be larger than 2 MB.',

            'vehicle_status.required' => 'Please specify the status of the vehicle.',
            'vehicle_status.in' => 'The vehicle status must be either "Active" or "Inactive".',

            'person_count.required' => 'Please specify the number of persons the vehicle can carry.',
            'person_count.integer' => 'The person count must be a number.',
            'person_count.min' => 'The vehicle must carry at least 1 person.',
            'person_count.max' => 'The vehicle can carry a maximum of 50 persons.',

            'vehicle_charge.required' => 'Please provide the charge for the vehicle.',
            'vehicle_charge.numeric' => 'The vehicle charge must be a valid number.',
            'vehicle_charge.min' => 'The vehicle charge must be a positive value.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes()
    {
        return [
            'user_id' => 'user ID',
            'uuid' => 'UUID',
            'vehicle_no' => 'vehicle number',
            'vehicle_type' => 'vehicle type',
            'vehicle_img' => 'vehicle image',
            'vehicle_status' => 'vehicle status',
            'person_count' => 'person count',
            'vehicle_charge' => 'vehicle charge',
        ];
    }
}
