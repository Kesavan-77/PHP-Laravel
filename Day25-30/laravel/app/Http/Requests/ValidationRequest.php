<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationRequest extends FormRequest
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
            'roll_no' => 'required|numeric',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'gender' => 'required|string',
            'age' => 'required|numeric|min:0|max:120'
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
            'roll_no.required' => 'Roll number is required',
            'roll_no.numeric' => 'Roll number must not contain character',
            'name' => 'Name is required',
            'email' => 'Email is required',
            'gender' => 'Gender is required',
            'age' => 'Age is required',
        ];
    }
}
