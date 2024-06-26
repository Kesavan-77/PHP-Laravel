<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTripDetailsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // You can add your authorization logic here
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
            'from-date' => 'required|date|after_or_equal:today',
            'vehicle_id' => 'required',
            'to-date' => 'required|date|after:from-date',
            'from-location' => 'required|string|max:255',
            'to-location.*' => 'required|string|max:255',
            'vehicle_no' => 'required|string|max:255',
            'driver' => 'nullable|string|max:255',
            'proof' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'trip-description' => 'required|string|max:1000',
        ];
    }


    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'from-date.required' => 'The starting date is required.',
            'from-date.date' => 'The starting date must be a valid date.',
            'from-date.after_or_equal' => 'The starting date cannot be in the past.',
            'to-date.required' => 'The ending date is required.',
            'to-date.date' => 'The ending date must be a valid date.',
            'to-date.after' => 'The ending date must be after the starting date.',
            'from-location.required' => 'The starting location is required.',
            'from-location.string' => 'The starting location must be a valid string.',
            'from-location.max' => 'The starting location may not be greater than 255 characters.',
            'to-location.*.required' => 'The location field is required',
            'to-location.*.string' => 'Each destination location must be a valid string.',
            'to-location.*.max' => 'Each destination location may not be greater than 255 characters.',
            'vechile_no.string' => 'The vehicle number must be a valid string.',
            'vechile_no.max' => 'The vehicle number may not be greater than 255 characters.',
            'proof.image' => 'The proof image must be a valid image file.',
            'proof.mimes' => 'The proof image must be a file of type: jpeg, png, jpg, gif.',
            'proof.max' => 'The proof image may not be greater than 2 MB.',
            'trip-description.string' => 'The trip description must be a valid string.',
            'trip-description.max' => 'The trip description may not be greater than 1000 characters.',
        ];
    }
}
